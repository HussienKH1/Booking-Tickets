<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run()
    {

        $genres = [
            'Action',
            'Supernatural',
            'Adventure',
            'Animation',
            'Comedy',
            'Crime',
            'Drama',
            'Family',
            'Fantasy',
            'History',
            'Horror',
            'Music',
            'Mystery',
            'Romance',
            'Science Fiction',
            'Thriller',
            'War',
            'Western',
        ];

        foreach ($genres as $genre) {
            Genre::create(['name' => $genre]);
        }
    }
}

