<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = "songs";
    protected $fillable = ["user_id", "title", "file_path", "is_deleted"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
