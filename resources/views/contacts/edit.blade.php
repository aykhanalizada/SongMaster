<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="icon" href="/icons8-edit-32.png">
    <title>Edit</title>
</head>
<style>
    body {
        background: #212529;
    }

    label {
        color: white;
    }

    h1 {
        color: white;
        display: flex;
        justify-content: center;
    }

    p {

        color: white;

    }

    input[type="radio"] {
        width: 1.05em;
        height: 1.05rem;
    }
</style>

<body>
    <h1 class="m-4">Edit Information</h1>

    <div class="container row center mt-5">
        <div class="col-6 m-auto ">
            <form method="POST" action="/home">
                @csrf
                <input type="hidden" class="form-control" name="id"
                    value="{{ isset($data['id']) ? $data['id'] : '' }}">
                <div class="form-group">
                    <label> First Name</label>
                    <input type="text" class="form-control" placeholder="Enter your first name" name="first_name"
                        value={{ $data['first_name'] }}>
                    @error('first_name')
                        <p class="btn-danger mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" placeholder="Enter your last name" name="last_name"
                        value={{ $data['last_name'] }}>
                    @error('last_name')
                        <p class="btn-danger mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Father Name</label>
                    <input type="text" class="form-control" placeholder="Enter father name" name="father_name"
                        value={{ $data['father_name'] }}>
                    @error('father_name')
                        <p class="btn-danger mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Birth Date</label>
                    <input type="date" class="form-control" placeholder="Enter birth Date" name="birth_date"
                        value={{ $data['birth_date'] }}>
                    @error('birth_date')
                        <p class="btn-danger mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mt-1">
                    <p>Civil Status:</p>
                    <input id="cv" type="radio" name="civil_status" value="Single"
                        {{ $data['civil_status'] === 'single' ? 'checked' : '' }}>
                    <label for="cv">Single</label>
                    <input id="cv2" type="radio" name="civil_status" value="Married"
                        {{ $data['civil_status'] === 'married' ? 'checked' : '' }} class="ml-5">
                    <label for="cv2">Married</label>
                    @error('civil_status')
                        <p class="civil_status">{{ $message }}</p>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-light" href="{{ route('home') }}">Go Back</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
