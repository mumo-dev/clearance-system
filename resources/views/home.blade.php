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
                        <app-faculty :faculty="{{ Auth::user()->student->faculty}}"></app-faculty>

                        <hr class="m-1">
                        <h6 class="text-success p-2">Departments</h6>
                        <hr class="m-1">
                         <app-department 
                             :department="{{ Auth::user()->student->department}}" :isacademic="'true'">
                        </app-department> 
                        
    

                        @foreach ($departments as $department)
                            <hr class="m-1">
                            <app-department 
                             :department="{{ $department}}">
                            </app-department>
                        @endforeach
                        
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
