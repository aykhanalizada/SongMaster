<?php

namespace Database\Seeders;

use App\Models\Song;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $songs = [
            [
                'user_id' => 1,
                'title' => 'Yenidən'
            ],
            [
                'user_id' => 1,
                'title' => 'Toxunma'
            ],
            [
                'user_id' => 1,
                'title' => 'Suallar'
            ],
            [
                'user_id' => 1,
                'title' => 'Dəlixanadan Məktublar 2'
            ],
            [
                'user_id' => 1,
                'title' => 'Molotow Cocktail'
            ],
        ];

        foreach ($songs as $song) {
            Song::create($song);
        }
    }
}
