<template>
     <div>
        <div class="">
            
            <h6 class="p-2  d-inline-block" style="width:300px">{{ department.name }}</h6>
            <div class="p-2 d-inline-block" v-if="!cleared && loaded">
                <input type="checkbox" class="form-check-inline" @click=" updateClearance">Clear
            </div>
        </div>

        <div v-if="cleared">
            <strong class="p-2">Status:</strong> {{clearance.status }} <br>

            <template v-if="clearance.remarks">
                <strong class="p-2" >Remarks:</strong>
                {{clearance.remarks }}
            </template>
        </div> 

     

    </div>
</template>

<script>
    export default {
        props:['department','isacademic'],

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
              
              let url = '/api/clearance/department/'+ this.department.id;
              if(this.isacademic){
                url += "?academic=true"
              } 
                axios.get(url)
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
                let url = '/api/clearance/department/'+ this.department.id;
                if(this.isacademic){
                  url += "?academic=true"
                } 
                axios.post(url)
                .then(({data}) => {
                    if(data.message=="success"){
                       this.cleared = this.loaded =true;
                       this.clearance = data.clearance

                       console.log(data);
                    }
                }).catch((err) => {
                    
                });
            }
        }


    }
</script>
