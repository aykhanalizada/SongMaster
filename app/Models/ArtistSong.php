<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtistSong extends Model
{
    protected $table = 'artist_song';
    protected $fillable = ['song_id', 'artist_id'];
}
