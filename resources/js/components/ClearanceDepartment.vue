<template>
     <div>
        <div class="">
            <h6 class="text-success p-2"><strong>Faculty:</strong></h6>

            <h6 class="p-2 d-inline-block" style="width:300px">{{ faculty.name}}</h6>
            <div class="p-2 d-inline-block" v-if="!cleared && loaded">
                <input type="checkbox" class="form-check-inline" @click="updateClearance">Clear
            </div>
        </div>

        <div v-if="cleared">
            <strong class="p-2">Status:</strong> {{clearance.status=='pending'?'Clearance Officer will clear you soon':clearance.status }} <br>

            <template v-if="clearance.remarks">
                <strong class="p-2" >Remarks:</strong>
                {{clearance.remarks }}

            </template>
        </div>

    </div>
</template>

<script>
    export default {
        props:['faculty'],

        data(){
            return {
                cleared: false,
                loaded:false,
                clearance:{}
            }
        },

        mounted(){
           this.fetchStatus();
        },

        methods:{

            fetchStatus(){
                axios.get('/api/clearance/faculty/'+ this.faculty.id)
                .then(({data}) => {
                    if(data.message=="Found"){
                       this.cleared = this.loaded =true;
                       this.clearance = data.clearance
                    }else {
                        this.loaded = true;
                    }
                }).catch((err) => {

                });
            },

            updateClearance(){
                axios.post('/api/clearance/faculty/'+ this.faculty.id)
                .then(({data}) => {
                    if(data.message=="success"){
                       this.cleared = this.loaded =true;

                        this.clearance = data.clearance;



                       console.log(data);
                    }
                }).catch((err) => {

                });
            }

        }


    }
</script>
