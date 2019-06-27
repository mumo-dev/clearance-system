@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">Create Profile </div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form method="post" action={{ route('profile.create')}}>
                        @csrf
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" value='{{Auth::user()->name}}' disabled>
                        </div>

                        <div class="form-group">
                            <label>Registration Number:</label>
                            <input type="text" name="regno" class="form-control" value='{{Auth::user()->regno}}' disabled >

                        </div>

                        <div class="form-group">
                            <label>Faculty:</label>
                            <select name="faculty" class="form-control" id="sel_faculty" onchange="fetchDepartment()" required>
                                <option value="" selected disabled>Choose ...</option>
                                @foreach ($faculties as $faculty)
                                    <option value="{{ $faculty->id}}">{{ $faculty->name }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Department:</label>
                            <select name="department" class="form-control" id="sel_depart" onchange="fetchCourses()" required>
                                <option value="" selected disabled>Choose ...</option>

                            </select>
                        </div>

                         <div class="form-group">
                            <label>Course:</label>
                            {{-- <input type="text" name="course" class="form-control" placeholder="eg. Bsc. Computer Science" required> --}}
                            <select name="course" class="form-control" id="sel_course" required>
                                <option value="" selected disabled>Choose ...</option>

                            </select>
                        </div>

                        <div class="form-group">
                          <button type="submit" class="btn btn-success">Create</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
      function fetchDepartment(){
        var facultyId = $("#sel_faculty").val();
        $.ajax({
          url: '/faculties/'+ facultyId,
          type: 'get',
          dataType: 'json',
          success: function(response){
             console.log(response)
             var len = response.length;

            $("#sel_depart").empty();

            for( var i = 0; i<len; i++){
                var id = response[i]['id'];
                var name = response[i]['name'];

                $("#sel_depart").append("<option value='"+id+"'>"+name+"</option>");

            }
          }
        })
      }


    </script>
</div>
@endsection



