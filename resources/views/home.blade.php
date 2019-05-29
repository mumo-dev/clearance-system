@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">Clearance Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class>

                        <table class="table  table-sm">
                            <tr>
                                <th>Name:</th>
                                <td> {{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <th>Registration Number:</th>
                                <td> {{ Auth::user()->student->regno }}</td>
                            </tr> 
                        </table>

                        <hr class="m-1">
                        <div>
                            <div class="">
                                <h6 class="text-success p-2"><strong>Faculty:</strong></h6>

                                <span class="p-2" style="width:300px">{{ Auth::user()->student->faculty->name}}</span>
                                <div class="p-2 d-inline-block">
                                        <input type="checkbox" class="form-check-inline">Clear</div>
                            </div>
                            <div>
                                <strong class="p-2">Status:</strong> Pending <br>
                                <strong class="p-2">Remarks:</strong>
                                some really long ....
 
                            </div> 
              
                        </div>

                        <hr class="m-1">
                        <h6 class="text-success p-2">Departments</h6>
                        <hr class="m-1">
                        <div>
                            <div class="d-flex"> 
                                <span class="p-2" style="width:300px">
                                    {{ Auth::user()->student->department->name}}
                                </span>
                                <div class="p-2">
                                    <input type="checkbox" class="form-check-inline">Clear
                                </div>
                            </div>
                            <div>
                             <strong class="p-2">Status:</strong> Pending <br>
                              <strong class="p-2">Remarks:</strong>
                              ss ome really long ....

                              
                            </div> 
              
                        </div>
                       

                        @foreach ($departments as $department)
                            <hr class="m-1">
                            <div>
                                <div class="d-flex"> 
                                    <span class="p-2" style="width:300px">
                                        <strong> {{ $department->name }}</strong> 
                                    </span>
                                    <div class="p-2">
                                        <input type="checkbox" class="form-check-inline">Clear
                                    </div>
                                </div>
                                <div>
                                <strong class="p-2">Status:</strong> Pending <br>
                                <strong class="p-2">Remarks:</strong>
                                ss ome really long ....

                                
                                </div> 
                
                            </div>
                        @endforeach
                        
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
