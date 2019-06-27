<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>Department Report</title>
</head>
<body onload="window.print()">

    <div class="container">
            <h1>{{ $department_title}}</h1>
            <div class="card">

              <div class="card-header bg-white">List of Students Cleared </div>
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
    </div>

</body>
</html>
