<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>Register</title>
</head>

<body class="bg-dark text-light">


    <div class="d-flex align-items-center justify-content-center vh-100">

        <div>
            <form method="POST" action="{{ url('/register') }}">
                @csrf
                <h1 class="mb-4 mt-5">Member Registration</h1>


                <div class="form-outline mb-4" style="height: 70px" >
                    <label class="form-label ">Name</label>
                    <input type="text"class="form-control form-control " name="name"   placeholder="Enter Name"  value="{{old('name')}}"  />

               @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>

                <div class="form-outline mb-4 " style="height: 70px" >
                        <label class="form-label" >Username</label>
                     <input type="text"  class="form-control form-control" name="username"  placeholder=" Enter Username" value="{{old('username')}}"  />

                    @error('username')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>


                <div class="form-outline mb-4" style="height: 70px" >
                    <label class="form-label" >Email</label>
                    <input type="email"  class="form-control form-control"  name="email"  placeholder=" Enter Email"  value="{{old('email')}}"       />

                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>


                <div class="form-outline mb-4" style="height: 70px" >
                    <label class="form-label" >Password</label>
                    <input type="password" class="form-control form-control" name="password"  placeholder=" Enter Password"    value="{{old('password')}}"      />

                    @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>


                <div class="form-outline mb-4" style="height: 70px" >
                    <label class="form-label">Repeat password</label>
                    <input type="password" class="form-control form-control"  name="password_confirmation"  placeholder=" Enter Password again"    value="{{old('password')}}"  />

                    @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>

                {{-- <div class="form-check d-flex justify-content-center mb-4">
                    <input class="form-check-input me-1" type="checkbox" value="" id="registerCheck" checked
                        aria-describedby="registerCheckHelpText" />
                    <label class="form-check-label" for="registerCheck">
                        I have read and agree to the terms
                    </label>
                </div> --}}
<div>
    <p><a href="{{route('login')}}" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Already registered?</a></p>
    <button type="submit" class="btn btn-primary btn-block mb-3 mt-1 w-100">Register</button>
</div>
            </form>
        </div>
    </div>
    </div>
    </form>


    </div>
</body>

</html>
