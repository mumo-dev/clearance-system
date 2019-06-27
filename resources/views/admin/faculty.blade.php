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
        <a class="nav-link " href="{{ route('admin.department')}}">
          <span data-feather="layers"></span>
          View All
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.department.create')}}">
          <span data-feather="plus-square"></span>
          Add New
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/course">
          <span data-feather="plus-square"></span>
          Add Course
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
                        <button class="btn btn-sm btn-danger"  onclick="deleteFaculty('{{$faculty->id}}')"
                            data-toggle="modal" data-target="#deleteFacultyModal">DELETE</button>
                    </td>

                    </tr>
                @endforeach

            </tbody>
          </table>
        </div>
        </div>
      </div>
  </div>

  <script>
      function deleteFaculty(id){
          $('#facultyId').val(id);
      }
</script>
</div>


<!-- Modal -->
<div class="modal fade" id="deleteFacultyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="exampleModalLabel">Delete Faculty</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.faculty.delete')}}" method="post">
            @csrf
            <input type="hidden" id="facultyId" name="id">
            <div class="modal-body">
              Once deleted, the data is unrecoverable <br>
              Are you sure u want to delete this faculty?

            </div>
            <div class="modal-footer m-0 p-1">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
      </div>
    </div>
</div>

@endsection

