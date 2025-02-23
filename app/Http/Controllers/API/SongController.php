<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Songs\StoreSongRequest;
use App\Http\Requests\Songs\UpdateSongRequest;
use App\Models\Song;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::select("user_id", "title", "file_path")
            ->where('is_deleted', 0)
            ->get();

        return response()->json($songs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSongRequest $request)
    {
        $data = $request->validated();
        $path = null;

        if ($request->hasFile('music_file')) {
            $path = $request->file('music_file')->store('music', 'public');
        }

        $song = Song::create([
            'user_id' => auth()->id(),
            'title' => $data['title'],
            'file_path' => $path
        ]);

        return response()->json([
            'message' => 'Successfully created',
            'song' => $song
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $song = Song::find($id);

        return response()->json($song);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSongRequest $request, string $id)
    {
        $data = $request->validated();

        $song = Song::findOrFail($id);

        if ($song->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

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

        return response()->json([
            'message' => 'Successfully updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $song = Song::findOrFail($id);

        if ($song->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        if ($song) {
            $song->is_deleted = 1;
            $song->save();
        }

        return response()->json([
            'message' => 'Successfully deleted'
        ], 200);
    }
}
