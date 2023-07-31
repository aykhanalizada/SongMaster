<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Home</title>

</head>
<style>
    body {
        background: #212529;
    }
</style>

<body>

    <div class="m-4 d-flex">
        <a class="btn btn-success me-auto" href="{{ route('gocreate') }}">Create New Person</a>
        <a class="btn btn-light" href="{{ route('logout') }}" >Logout</a>

    </div>


    @if (session('success'))
        <div class="alert alert-success m-4">
            {{ session('success') }}
        </div>
    @endif



    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Father Name</th>
                <th scope="col">Birth Date</th>
                <th scope="col">Civil Status</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($people as $person)
                <tr>
                    <td>{{ $person['id'] }}</td>
                    <td>{{ $person['first_name'] }}</td>
                    <td>{{ $person['last_name'] }}</td>
                    <td>{{ $person['father_name'] }}</td>
                    <td>{{ $person['birth_date'] }}</td>
                    <td>{{ $person['civil_status'] }}</td>
                    <td>
                        <a class="btn btn-success" href={{ 'edit/' . $person['id'] }}>Edit</a>
                        <a class="btn btn-danger" onclick="deletePerson({{ $person['id'] }})">Delete</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>



    <script>
        function deletePerson(personId) {
            if (confirm('Are you sure you want to delete this person?')) {
                window.location.href = '/delete/' + personId;
            } else {
                window.location.href = '/home';
            }
        }
    </script>

</body>

</html>
