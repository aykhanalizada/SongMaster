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
                'title' => 'Yenidən',
                'release_year' => 2020
            ],
            [
                'title' => 'Toxunma',
                'release_year' => 2021
            ],
            [
                'title' => 'Suallar',
                'release_year' => 2019
            ],
            [
                'title' => 'Dəlixanadan Məktublar 2',
                'release_year' => 2014
            ],
            [
                'title' => 'Molotow Cocktail',
                'release_year' => 2017
            ],
        ];

        foreach ($songs as $song) {
            Song::create($song);
        }
    }
}
