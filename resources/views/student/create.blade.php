<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

  <div class="container py-5">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h2 class="float-start">Student Create</h2>
                    <a href="{{route('student.index')}}" class="float-end btn btn-outline-info btn-sm">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <label>Name</label>
                                <input type="text" value="{{old('name')}}" name="name" class="form-control" placeholder="Enter your name:">
                                @include('feedback.error',['field'=>'name'])
                            </div> 
                            <div class="form-group col-md-6 mb-3">
                                <label>Email</label>
                                <input type="email" value="{{old('email')}}" name="email" class="form-control" placeholder="Enter your email:">
                                @include('feedback.error',['field'=>'email'])
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label>Roll</label>
                                <input type="number" value="{{old('roll')}}" name="roll" class="form-control" placeholder="Enter your roll no:">
                                @include('feedback.error',['field'=>'roll'])
                            </div> 
                            <div class="form-group col-md-6 mb-3">
                                <label>Registration</label>
                                <input type="number" value="{{old('reg')}}" name="reg" class="form-control" placeholder="Enter your registration no:">
                                @include('feedback.error',['field'=>'reg'])
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label>Phone</label>
                                <input type="number" value="{{old('number')}}" name="number" class="form-control" placeholder="Enter your phone number:">
                                @include('feedback.error',['field'=>'number'])
                            </div> 
                            <div class="form-group col-md-6 mb-3">
                                <label>Upload Image</label>
                                <input type="file" accept="image/*" name="image" class="form-control">
                                @include('feedback.error',['field'=>'image'])
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label>Address</label>
                                <textarea name="address" class="form-control" cols="30" rows="5" placeholder="Enter your address:">{{old('address')}}</textarea>
                                @include('feedback.error',['field'=>'address'])
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" cols="30" rows="5" placeholder="Enter your description:">{{old('description')}}</textarea>
                                @include('feedback.error',['field'=>'description'])
                            </div>
                            <div class="col-md-12">
                                <input type="submit" value="Create" class="btn btn-outline-info w-100">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>