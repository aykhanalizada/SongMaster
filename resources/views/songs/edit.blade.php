@extends('layout.app')
@section('content')
    <div class="content-container">

        <h1 class="m-4 text-light d-flex justify-content-center">Edit New Song</h1>
        <div class="container row center mt-5">
            <div class="col-6 m-auto ">
                <form method="POST" action="{{ route('songs.update',['song'=>$song->id]) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group mb-3">
                        <label class="text-light">Title</label>
                        <input type="text" class="form-control" placeholder="Enter title" name="title"
                               value="{{$song->title}}">
                        @error('title')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="text-light">Artist Name</label>
                        <input type="text" class="form-control" placeholder="Enter artist name" name="artist_name"
                               value="{{$song->artist_name}}">
                        @error('artist_name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="text-light">Release Year</label>
                        <input type="text" class="form-control" placeholder="Enter release year" name="release_year"
                               value="{{$song->release_year}}">
                        @error('release_year')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="d-flex justify-content-between mb-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-light" href="{{route('songs.index')}}">Go Back</a>
                    </div>
                </form>


            </div>
        </div>

    </div>
@endsection

