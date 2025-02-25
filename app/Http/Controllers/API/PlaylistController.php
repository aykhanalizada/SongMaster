<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Playlists\StorePlaylistRequest;
use App\Http\Requests\Playlists\UpdatePlaylistRequest;
use App\Models\Playlist;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $playlists = Playlist::select("user_id", "name")
            ->where('is_deleted', 0)
            ->get();

        return response()->json($playlists);
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

        return response()->json([
            'message' => 'Successfully created',
            'playlist' => $playlist
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $playlist = Playlist::find($id);

        return response()->json($playlist);
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


        return response()->json([
            'message' => 'Successfully updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $playlist = Playlist::findOrFail($id);

        $playlist->is_deleted = 1;
        $playlist->save();

        return response()->json([
            'message' => 'Successfully deleted'
        ], 200);
    }
}
