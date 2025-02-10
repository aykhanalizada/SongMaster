<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artists = [
            ['name' => 'Paster'],
            ['name' => 'Rüzgar'],
            ['name' => 'RG'],
            ['name' => 'Qaraqan'],
            ['name' => 'Okaber'],
        ];

        foreach ($artists as $artist) {
            Artist::create($artist);
        }

    }
}
