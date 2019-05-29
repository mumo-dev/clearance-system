@extends('admin.layouts.app')

@section('sidebar')
  
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">

    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.home')}}">
          <span data-feather="home"></span>
            Dashboard <span class="sr-only">(current)</span>
        </a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('admin.faculty')}}">
          <span data-feather="bar-chart-2"></span>
          Faculty
        </a>
      </li>
    
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Departments</span>
      <a class="d-flex align-items-center text-muted" href="#">
        <span data-feather="plus-circle"></span>
      </a>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link " href="{{ route('admin.accounts')}}">
          <span data-feather="layers"></span>
          View All
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.accounts.create')}}">
          <span data-feather="plus-square"></span>
          Add New
        </a>
      </li> 
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Manage Accounts</span>
      <a class="d-flex align-items-center text-muted" href="#">
        <span data-feather="plus-circle"></span>
      </a>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link " href="{{ route('admin.accounts')}}">
          <span data-feather="layers"></span>
          View All
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.accounts.create')}}">
          <span data-feather="plus-square"></span>
          Add New
        </a>
      </li>
      
    </ul>
  </div>
</nav>
@endsection

@section('header-title')
  <h6 class="text-white text-uppercase">Admin</h6>
@endsection

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
     @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
      @endif
      <div class="card">
        <div class="card border-0">
          <div class="card-header bg-white"> <h5 class="m-0">Add Faculty</h5></div>
          <div class="card-body"> 
            <form method="POST" action="{{ route('admin.add-faculty')}}">
            @csrf
                 <div class="form-group row">
                  <div class="col-6">
                    <input class="form-control" type="text"  name="name" placeholder="Faculty Name" required>
                  </div>
                   <div class="col-2">
                    <input type="submit" class="btn btn-success" value="ADD">
                  </div>
                </div>
            </form>
           
          </div>

          {{--  --}}
          <hr>
         
          <div class="p-4" >
            <h5>List of All Faculties</h5>
            <table class="table  table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>DELETE</th>
                 
                </tr>
              </thead>
              <tbody>

                 @foreach ($faculties as $faculty)
                    <tr>
                    <td>{{$faculty->id}}</td>
                    <td>{{$faculty->name}}</td>
                    <td>
                        <button class="btn btn-sm btn-danger">DELETE</button>
                    </td>
                   
                    </tr> 
                @endforeach
                
            </tbody>
          </table>
        </div>
        </div>
      </div>
  </div>
</div>

@endsection

