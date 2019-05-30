@extends('admin.layouts.app')

@section('sidebar')
  
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">

    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" href="{{route('department.home')}}">
          <span data-feather="home"></span>
            Dashboard <span class="sr-only">(current)</span>
        </a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link" href="{{ route('department.reports')}}">
          <span data-feather="bar-chart-2"></span>
          Reports
        </a>
      </li>
    
    </ul>

    
  </div>
</nav>
@endsection

@section('header-title')
  <h6 class="text-white text-uppercase">{{$department_title}}</h6>
@endsection

@section('content')
 @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
  @endif
<div class="card">
 
  <div class="card-header bg-white"> Clear Student </div>
  <div class="card-body">
      
      <table class="table  table-sm">
          <tr>
              <th>Name:</th>
              <td> {{ $clearance->student->user->name }}</td>
          </tr>
          <tr>
              <th>Registration Number:</th>
              <td> {{ $clearance->student->regno }}</td>
          </tr> 

          <tr>
              <th>Faculty:</th>
              <td> {{ $clearance->student->faculty->name }}</td>
          </tr>
          <tr>
              <th>Registration Number:</th>
              <td> {{ $clearance->student->department->name }}</td>
          </tr> 
      </table>
      <form method="post" action="{{ route('department.clear')}}">    
          @csrf
          <input type="hidden" name="id" value="{{$clearance->id}}" />

          <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio"  id="inlineRadio2" name="status" value="clear" required>
              <label class="form-check-label" for="inlineRadio2">Clear</label>
          </div>

          <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="inlineRadio1" name="status" value="notclear" required>
              <label class="form-check-label" for="inlineRadio1">Don't Clear</label>
          </div>

           <div class="form-group">
              <label><strong>Remarks:</strong> ( required if you don't clear a student)</label>
              <textarea class="form-control" name="remarks"></textarea>
           </div>

           <button type="submit" class="btn btn-success">submit</button>

      </form>

  </div>
  </div>

</div>
@endsection
