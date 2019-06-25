@extends('admin.layouts.app')

@section('sidebar')

<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">

    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link " href="{{route('admin.home')}}">
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
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Manage Accounts</span>
      <a class="d-flex align-items-center text-muted" href="#">
        <span data-feather="plus-circle"></span>
      </a>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.accounts')}}">
          <span data-feather="layers"></span>
          View All
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('admin.accounts.create')}}">
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
  <div class="col-md-8">
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header bg-white text-center text-info">
          <h5 class="m-0 font-weight-bold">Create Account For Clearance Officer</h5>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.account.store')}}">
                @csrf

                <div class="form-group">
                    <label for="name">{{ __('First Name') }}</label>
                    <input id="name" type="text" class="form-control" name="first_name"  required autofocus>
                </div>

                <div class="form-group">
                    <label for="lastname">{{ __('Last Name') }}</label>
                    <input id="lastname" type="text" class="form-control" name="last_name"  required autofocus>
                </div>

                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control" name="email" required>

                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>

                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                </div>

                <label for="">Head of:</label><br>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"  id="inlineRadio2" name="department_choice" value="faculty" required>
                    <label class="form-check-label" for="inlineRadio2">Faculty</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="inlineRadio1" name="department_choice" value="academicdepartment" required>
                    <label class="form-check-label" for="inlineRadio1">Academic Department</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="inlineRadio3" name="department_choice" value="department" required>
                    <label class="form-check-label" for="inlineRadio1">Non-Academic Department</label>
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

                <div class="form-group d-none" id="academicdepartment">
                    <label for="name">Academic Department:</label>
                    <select class="form-control" name="academicdepartment">
                        <option value="" selected disabled>choose department...</option>
                        @foreach ($academicDepartments as $department)
                              <option value="{{ $department->id}}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group d-none" id="department">
                    <label for="name">Non-Academic Department:</label>
                    <select class="form-control" name="department">
                        <option value="" selected disabled>choose department...</option>
                        @foreach ($nonAcademicdepartments as $department)
                              <option value="{{ $department->id}}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Create') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection
