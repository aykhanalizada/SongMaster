<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = "songs";
    protected $fillable = ["title", "release_year", "file_path", "is_deleted"];

    public function artists()
    {
        return $this->belongsToMany(Artist::class, 'artist_song')
            ->withTimestamps();
    }

}
