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
    <div class="card">
        <div class="card-header bg-white text-center text-info">
          <h5 class="m-0 font-weight-bold">Create Account For Department Head </h5> 
        </div>

        <div class="card-body">
            <form method="POST" action="#">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>

                    <div class="col-md-6">
                        <select  class="form-control" name="department">
                            <option selected disabled>Choose ...</option>
                            <option value="nursing">Nursing</option>
                            <option value="laboratory">Laboratory</option>
                            <option value="radiology">Radiology</option>
                            <option value="treatment">Treatment</option>
                            <option value="optical">Optical</option>
                            <option value="reception">Reception</option>
                        </select>

                        @if ($errors->has('department'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('department') }}</strong>
                            </span>
                        @endif
                    </div>
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
