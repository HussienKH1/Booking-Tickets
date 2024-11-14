<?php

namespace Database\Seeders;

use App\Models\Sport_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class sports_type extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $sports = [
            'Football',
            'Basketball',
            'Tennis',
            'Cricket',
            'Baseball',
            'Rugby',
            'Golf',
            'Swimming',
            'Cycling',
            'Boxing',
            'Table Tennis',
            'Badminton',
            'Volleyball',
            'Hockey',
            'American Football',
            'Wrestling',
            'Skiing',
            'Snowboarding',
            'Fencing',
            'Karate',
            'Martial Arts',
            'Surfing',
            'Gymnastics',
            'Athletics',
            'Rowing',
            'Handball',
            'Softball',
            'Lacrosse',
            'MMA',
            'Ultimate Frisbee',
            'Polo',
            'Archery',
            'Bowling',
            'Equestrian',
            'Sailing',
            'Diving',
            'Track and Field',
            'Billiards',
            'Snooker',
            'Various',
            'Motor Racing'
        ];

        foreach ($sports as $sport) {
            Sport_type::create(['name' => $sport]);
        }
    }
}
