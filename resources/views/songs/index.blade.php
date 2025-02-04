@extends('layout.app')
@section('content')
    <div class="content-container">

        <div class="m-4 d-flex">
            <a class="btn btn-success me-auto" href="{{ route('songs.create') }}">Create New Song</a>

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
                <th scope="col">Title</th>
                <th scope="col">Artis Name</th>
                <th scope="col">Release Year</th>
                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody>

            @foreach ($songs as $song)
                <tr>
                    <td>{{ $song['id'] }}</td>
                    <td>{{ $song['title'] }}</td>
                    <td>{{ $song['artist_name'] }}</td>
                    <td>{{ $song['release_year'] }}</td>
                    <td>
                        <div class="d-flex">
                            <a class="btn btn-success me-2" href={{route('songs.edit',['song'=>$song->id])}}>Edit</a>

                            <form action="{{ route('songs.destroy', $song->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this song?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

    </div>
@endsection
