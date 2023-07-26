<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <link rel="icon" type="image/x-icon" href="{{asset('/icons8-home-32.png')}}">
  <title>Home</title>

</head>
<style>
body{
  background:#212529;
}


</style>
<body>

<div class="m-4">
  <a class="btn btn-success" href="{{route('gocreate')}}">Create New Person</a>
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

      @foreach($people as $person)

    <tr>
      <td>{{$person['id']}}</td>
      <td>{{$person['first_name']}}</td>
      <td>{{$person['last_name']}}</td>
      <td>{{$person['father_name']}}</td>
      <td>{{$person['birth_date']}}</td>
      <td>{{$person['civil_status']}}</td>
<td>
  <a class="btn btn-success" href={{"edit/" .$person['id'] }}>Edit</a>
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
    }
    else {
        window.location.href='/index';
    }
  }
  </script>

</body>
</html>
