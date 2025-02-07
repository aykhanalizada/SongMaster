<?php

namespace Database\Seeders;

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
                'title' => 'Belə Olmaz',
                'artist_name' => 'RG',
                'release_year' => 2018,
            ],
            [
                'title' => 'Etiraf Otağı',
                'artist_name' => 'H.O.S.T',
                'release_year' => 2008,
            ],
            [
                'title' => 'Yenə Gedirəm',
                'artist_name' => 'Rüzgar',
                'release_year' => 2018,
            ],
            [
                'title' => 'Gel Bana',
                'artist_name' => 'Mustafa Sandal',
                'release_year' => 2019,
            ],
            [
                'title' => '1st class',
                'artist_name' => 'Paster',
                'release_year' => 2016,
            ],
        ];
    }
}
