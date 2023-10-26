<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

  <div class="container py-5">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h2 class="float-start">Student View</h2>
                    <a href="{{ route('student.index')}}" class="float-end btn btn-outline-info btn-sm">Back</a>
                </div>
                <div class="card-body">
                    <table class="table table-responsive">
                        <tr>
                            <th>Name</th>
                            <td>:</td>
                            <td>{{$student->name}}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td>:</td>
                            <td><img src="{{asset('storage/'.$student->image)}}" height="60px" width="60px" alt=""></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>:</td>
                            <td>
                                <span class="badge {{($student->status ==1) ? 'bg-success' : 'bg-warning'}}">
                                    {{($student->status ==1) ? 'Active' : 'Deactive'}}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Roll No</th>
                            <td>:</td>
                            <td>{{$student->roll}}</td>
                        </tr>
                        <tr>
                            <th>Reg No</th>
                            <td>:</td>
                            <td>{{$student->reg}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>:</td>
                            <td>{{$student->address}}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>:</td>
                            <td>{{$student->description}}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>:</td>
                            <td>{{date('d-M-Y', strtotime($student->created_at))}}</td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>:</td>
                            <td>{{ ($student->created_at != $student->updated_at) ? date('d-M-Y', strtotime($student->updated_at)) : 'N/A'}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>