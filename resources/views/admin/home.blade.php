@extends('admin.layouts.app')

@section('navigation')
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Dashboard</li>
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

         Welcome to admin Dashboard!
    </div>
</div>

@endsection
