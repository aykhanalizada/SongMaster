<?php

namespace App\Http\Controllers;

use App\Http\Requests\Playlists\StorePlaylistRequest;
use App\Http\Requests\Playlists\UpdatePlaylistRequest;
use App\Models\Playlist;
use App\Models\Song;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $playlists = Playlist::select(['id', 'name'])
            ->withCount('songs')
            ->where('is_deleted', 0)
            ->get();

        return inertia('Playlists/Index', compact('playlists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $songs = Song::all();
        return inertia('Playlists/Create', compact('songs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlaylistRequest $request)
    {
        $data = $request->validated();

        $playlist = Playlist::create([
            'user_id' => auth()->id(),
            'name' => $data['name']
        ]);

        $playlist->songs()->attach($data['music_id']);

        return redirect()->route('playlists.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $playlist = Playlist::with('songs')->findOrFail($id);

        $songs = Song::all();

        return inertia('Playlists/Edit', compact('playlist', 'songs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlaylistRequest $request, string $id)
    {
        $data = $request->validated();

        $playlist = Playlist::findOrFail($id);

        $playlist->name = $data['name'];

        $playlist->songs()->sync($data['song_id']);

        return redirect()->route('playlists.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $playlist = Playlist::findOrFail($id);

        $playlist->is_deleted = 1;
        $playlist->save();

        return redirect()->route('playlists.index');
    }
}
