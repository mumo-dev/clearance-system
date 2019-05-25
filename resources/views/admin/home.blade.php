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
<div class="card">
    <div class="card-header">Dashboard</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        You are logged as admin!
    </div>
</div>

@endsection
