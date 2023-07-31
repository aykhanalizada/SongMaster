<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Login</title>
</head>

<body class="bg-dark text-light">
    <div class="d-flex align-items-center justify-content-center vh-100">

        <form method="POST" action="{{ url('/login') }}"   style="width:23em">
            @csrf
            <h1 class="mb-4">Member Login</h1>



            <div class="form-outline mb-4" style="height: 70px" >
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" placeholder=" Enter Email"/>
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <div class="form-outline mb-4" style="height: 70px">
                <label class="form-label">Password</label>

                <input type="password" class="form-control" name="password" placeholder="Enter Password" />
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <div class="row mb-4">
                <div class="col d-flex justify-content-center">

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" checked />
                        <label class="form-check-label" for="remember"> Remember me </label>
                    </div>
                </div>

                <div class="col">
                    <p><a href="#"
                            class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Forgot
                            password?</a></p>

                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>


            <div class="">
                <p>Not a member? <a href="{{ route('register') }}"
                        class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Register</a>
                </p>

            </div>
        </form>
    </div>
</body>

</html>
