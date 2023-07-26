<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <link rel="icon" type="image/x-icon" href="{{asset('/icons8-create-32.png')}}">
    <title>Create</title>
</head>
<style>
    body{
        background:#212529;
    }
    label{
        color:white;
    }
    h1{
        color:white;
        display:flex;
        justify-content:center;
    }
    p{
        color:white;
    }
    li{
        color:white;
    }
    input[type="radio"]{
        width:1.05em;
        height:1.05rem;
    }
</style>

<body>
    <h1 class="m-4">Create New Person</h1>
    <div class="container row center mt-5">
        <div class="col-6 m-auto ">
            <form method="POST" action="{{ route('submit-form') }}">
                @csrf
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" placeholder="Enter your first name" name="first_name" value="{{old('first_name')}}">
                    @error('first_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" placeholder="Enter your last name" name="last_name" value="{{old('last_name')}}">
                    @error('last_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Father Name</label>
                    <input type="text" class="form-control" placeholder="Enter father name" name="father_name" value="{{old('father_name')}}">
                    @error('father_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Birth Date</label>
                    <input type="date" class="form-control" placeholder="Enter birth Date" name="birth_date" value="{{old('birth_date')}}">
                    @error('birth_date')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <p>Civil Status:</p>
                    <input type="radio" name="civil_status" value="single" @if(old('civil_status') === 'single') checked @endif>
                    <label>Single</label>
                    <input type="radio" name="civil_status" value="married" class="ml-5" @if(old('civil_status')==='married') checked @endif>
                    <label>Married</label>
                    @error('civil_status')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-light" href="index">Go Back</a>
                </div>
            </form>



        </div>
    </div>
</body>
</html>
