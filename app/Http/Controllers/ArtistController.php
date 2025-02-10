<?php

namespace App\Http\Controllers;

use App\Http\Requests\Artists\StoreArtistRequest;
use App\Http\Requests\Artists\UpdateArtistRequest;
use App\Models\Artist;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = Artist::where('is_deleted', 0)->get();

        return inertia('Artists/Index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Artists/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArtistRequest $request)
    {
        $data = $request->validated();

        Artist::create([
            'name' => $data['name'],
        ]);

        return redirect()->route('artists.index')->with('success', 'Artist has been created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $artist = Artist::findOrFail($id);

        return inertia('Artists/Edit', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArtistRequest $request, $id)
    {
        $data = $request->validated();

        $song = Artist::findOrFail($id);

        $song->name = $data['name'];

        $song->save();

        return redirect()->route('artists.index')->with('success', 'Artist has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artist = Artist::findOrFail($id);

        if ($artist) {
            $artist->is_deleted = 1;
            $artist->save();
        }

        return redirect()->route('artists.index')->with('success', 'Artist has been deleted successfully.');
    }
}
