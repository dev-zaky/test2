<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

  <div class="container py-5">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h2 class="float-start">Student List</h2>
                    <a href="{{ route('student.create')}}" class="float-end btn btn-outline-info btn-sm">Add Student</a>
                </div>
                <div class="card-body">
                    <table class="table table-responsive">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Roll</th>
                            <th>Reg</th>
                            <th>Address</th> 
                            <th>Description</th>
                            <th>Created At</th> 
                            <th>Updated At</th> 
                            <th>Action</th> 
                        </tr>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{$loop->iteration }}</td>
                                <td>{{$student->name}}</td>
                                <td>
                                    <img src="{{asset('storage/'.$student->image)}}" height="60px" width="60px" alt="">
                                </td>
                                <td>{{$student->roll}}</td>
                                <td>{{$student->reg}}</td>
                                <td>{{Str::limit($student->address, 20,'...')}}</td> 
                                <td>{{Str::limit($student->description, 20,'...')}}</td> 
                                <td>{{date('d-M-Y', strtotime($student->created_at))}}</td> 
                                <td>{{ !empty($student->updated_at) && $student->updated_at != $student->created_at ? date('d-M-Y', strtotime($student->updated_at)) : 'N/A' }}</td> 
                                <td>
                                    <div class="form-group">
                                        <a href="{{route('student.edit',$student->id)}}" class="btn btn-outline-info btn-sm">Edit</a>
                                        <a href="{{route('student.delete',$student->id)}}" class="btn btn-outline-danger btn-sm">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
  </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>