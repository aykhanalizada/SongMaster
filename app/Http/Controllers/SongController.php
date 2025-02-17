<?php

namespace App\Http\Controllers;

use App\Http\Requests\Songs\StoreSongRequest;
use App\Http\Requests\Songs\UpdateSongRequest;
use App\Models\Artist;
use App\Models\Song;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{

    public function index()
    {
        $songs = Song::with(['artists' => function ($query) {
            $query->where('is_deleted', 0);
        }])
            ->where('is_deleted', 0)
            ->get();

        return inertia('Songs/Index', compact('songs'));
    }

    public function create()
    {
        $artists = Artist::where('is_deleted', 0)->get();

        return inertia('Songs/Create', compact('artists'));
    }

    public function store(StoreSongRequest $request)
    {
        $data = $request->validated();

        $song = Song::create([
            'title' => $data['title'],
            'release_year' => $data['release_year']
        ]);

        $song->artists()->attach($data['artist_id']);

        return redirect()->route('songs.index')->with('success', 'Song has been created successfully.');
    }


    public function edit($id)
    {
        $song = Song::with('artists')->findOrFail($id);

        $artists = Artist::where('is_deleted', 0)->get();

        return inertia('Songs/Edit', compact('song', 'artists'));
    }

    public function update(UpdateSongRequest $request, $id)
    {
        $data = $request->validated();

        $song = Song::findOrFail($id);

        $song->title = $data['title'];
        $song->release_year = $data['release_year'];


        $song->artists()->sync($data['artist_id']);

        if ($request->hasFile('music_file')) {

            if ($song->file_path) {
                Storage::disk('public')->delete($song->file_path);
            }

            $path = $request->file('music_file')->store('music', 'public');
            $song->file_path = $path;

        }

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
