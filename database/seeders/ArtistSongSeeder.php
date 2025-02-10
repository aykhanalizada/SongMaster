<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtistSongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('artist_song')->insert([
            [
                'song_id' => 1,
                'artist_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'song_id' => 2,
                'artist_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'song_id' => 3,
                'artist_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'song_id' => 4,
                'artist_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'song_id' => 4,
                'artist_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'song_id' => 5,
                'artist_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
