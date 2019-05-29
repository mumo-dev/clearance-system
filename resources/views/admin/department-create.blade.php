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
        <a class="nav-link" href="{{ route('admin.faculty')}}">
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
        <a class="nav-link" href="{{ route('admin.department')}}">
          <span data-feather="layers"></span>
          View All
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('admin.department.create')}}">
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
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
          <div class="card-header bg-white"> <h5 class="m-0">Add Department</h5></div>
            <div class="card-body"> 
              <form method="POST" action="{{ route('admin.store-department')}}">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="Department name" required/>
                </div>
      
              
                  <label for="">Department Category:</label><br>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="inlineRadio1" name="is_academic" value="academic" required>
                    <label class="form-check-label" for="inlineRadio1">Academic</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"  id="inlineRadio2" name="is_academic" value="nonacademic" required>
                    <label class="form-check-label" for="inlineRadio2">Non Academic</label>
                  </div>

                  <div class="form-group d-none" id="faculty">
                    <label for="name">Faculty:</label>
                    <select class="form-control" name="faculty">
                        <option value="" selected disabled>choose faculty...</option>
                        @foreach ($faculties as $faculty)
                              <option value="{{ $faculty->id}}">{{ $faculty->name }}</option>
                        @endforeach
                    </select>
                </div>
                

                <div class="form-group">
                 <button type="submit" class="btn btn-success">ADD</button>
                </div>
               
              </form>
            
            </div>
          </div>
        </div>
        </div>
      </div> 
  </div>
<script>
   
    

</script>
  
</div>

@endsection

