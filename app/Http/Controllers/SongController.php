<?php

namespace App\Http\Controllers;

use App\Http\Requests\Songs\StoreSongRequest;
use App\Http\Requests\Songs\UpdateSongRequest;
use App\Models\Song;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{

    public function index()
    {
        $songs = Song::with(['user' => function ($query) {
            $query->where('is_active', 1)
                ->where('is_deleted', 0);
        }])
            ->where('is_deleted', 0)
            ->get();

        return inertia('Songs/Index', compact('songs'));
    }

    public function create()
    {
        $users = User::where('is_active', 1)
            ->where('is_deleted', 0)
            ->get();

        return inertia('Songs/Create', compact('users'));
    }

    public function store(StoreSongRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('music_file')) {
            $path = $request->file('music_file')->store('music', 'public');
        }

        Song::create([
            'user_id' => auth()->id(),
            'title' => $data['title'],
            'file_path' => $path
        ]);

        return redirect()->route('songs.index')->with('success', 'Song has been created successfully.');
    }


    public function edit($id)
    {
        $song = Song::with('user')->findOrFail($id);

        return inertia('Songs/Edit', compact('song'));
    }

    public function update(UpdateSongRequest $request, $id)
    {
        $data = $request->validated();

        $song = Song::findOrFail($id);

        $song->user_id = auth()->id();
        $song->title = $data['title'];

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
