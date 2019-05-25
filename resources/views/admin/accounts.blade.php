@extends('admin.layouts.app')

@section('navigation')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('admin.home') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Manage Accounts</li>
</ol>

@endsection

@section('content')

<div class="d-flex justify-content-end">
  <button class="btn btn-success mb-2"> Add New</button>
</div>
<div class="card">
    <div class="card-header">Department Admin Accounts</div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        accounts
    </div>
</div>

@endsection