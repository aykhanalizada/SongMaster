<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSongRequest;
use App\Http\Requests\UpdateSongRequest;
use App\Models\Song;

class SongController extends Controller
{

    public function index()
    {
        $songs = Song::where('is_deleted', 0)->get();

        return inertia('Songs/Index', [
            'songs' => $songs
        ]);
    }

    public function create()
    {
        return inertia('Songs/Create');
    }

    public function store(StoreSongRequest $request)
    {
        $data = $request->validated();

        Song::create([
            'title' => $data['title'],
            'artist_name' => $data['artist_name'],
            'release_year' => $data['release_year']
        ]);

        return redirect()->route('songs.index')->with('success', 'Song has been created successfully.');
    }


    public function edit($id)
    {
        $song = Song::findOrFail($id);

        return inertia('Songs/Edit', ['song' => $song]);
    }

    public function update(UpdateSongRequest $request, $id)
    {
        $data = $request->validated();

        $song = Song::findOrFail($id);

        $song->title = $data['title'];
        $song->artist_name = $data['artist_name'];
        $song->release_year = $data['release_year'];

        $song->save();

        return redirect()->route('songs.index')->with('success', 'Song has been updated successfully.');
    }

    public function destroy($id)
    {
        $song = Song::findOrFail($id);

        if ($song) {
            $song->is_deleted = 1;
            $song->save();
        }

        return redirect()->route('songs.index')->with('success', 'Song has been deleted successfully.');
    }


}
