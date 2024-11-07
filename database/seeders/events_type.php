<?php

namespace Database\Seeders;

use App\Models\Event_Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class events_type extends Seeder
{
    public function run(): void
    {
        $types = [
            'Concerts',
            'Theater',
            'Festivals',
            'Conferences',
            'Comedy & Stand-up',
            'Family & Kids',
            'Workshops',
            'Nightlife',
            'Virtual Events'
        ];

        foreach ($types as $type){
            Event_Type::create(['name' => $type]);
        }
    }
}
