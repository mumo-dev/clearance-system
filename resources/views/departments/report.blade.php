@extends('admin.layouts.app')

@section('sidebar')

<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">

    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="{{route('department.home')}}">
          <span data-feather="home"></span>
            Dashboard <span class="sr-only">(current)</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link active" href="{{ route('department.reports')}}">
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

  <div class="card-header bg-white">
      List of Students Cleared
      <a href="/department/reports/generate" class="float-right btn btn-primary">Print</a>
    </div>
  <div class="card-body">

        <div class="table-responsive">
            <table class="table  table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Reg No</th>
                  <th>Cleared By</th>
                  <th>Time</th>
                </tr>
              </thead>
              <tbody>

              @foreach ($reports as $report)
                    <tr>
                      <td>{{$report->id}}</td>
                      <td>{{$report->student->user->name}}</td>
                      <td>{{$report->student->regno}}</td>
                      <td>{{ $report->clearedBy->user->name}}</td>
                      <td>{{$report->updated_at}}</td>

                    </tr>
              @endforeach

            </tbody>
        </table>
      </div>
 </div>
  </div>

</div>
@endsection
