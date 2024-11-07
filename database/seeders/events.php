<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class events extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $events = [
            [
                'title' => 'The Rolling Stones Concert',
                'event_type' => 'Concerts',
                'event_date' => '2024-12-10',
                'event_time' => '20:00:00',
                'location' => 'Madison Square Garden, New York, NY',
                'description' => 'Join us for an unforgettable night with the legendary Rolling Stones!',
                'ticket_price' => 150.00,
                'poster_url' => 'https://i.etsystatic.com/16989522/r/il/f2f4fa/4064761854/il_570xN.4064761854_qzwh.jpg',
                'availability_status' => true,
            ],
            [
                'title' => 'Adele Live in Concert',
                'event_type' => 'Concerts',
                'event_date' => '2024-11-15',
                'event_time' => '19:30:00',
                'location' => 'O2 Arena, London, UK',
                'description' => 'Adele performing her greatest hits in a magical concert event.',
                'ticket_price' => 180.00,
                'poster_url' => 'https://static.wikia.nocookie.net/adeles/images/8/88/Weekends_with_Adele_%28Second_Leg%29_.jpg/revision/latest?cb=20230409231939',
                'availability_status' => true,
            ],

            [
                'title' => 'The Lion King Musical',
                'event_type' => 'Theater',
                'event_date' => '2024-12-05',
                'event_time' => '19:00:00',
                'location' => 'Lyceum Theatre, London, UK',
                'description' => 'The spectacular Broadway musical brings the magic of The Lion King to life.',
                'ticket_price' => 120.00,
                'poster_url' => 'https://i.pinimg.com/736x/6e/58/dd/6e58ddc35e5f77efd79934ed51b145ec.jpg',
                'availability_status' => true,
            ],

            [
                'title' => 'Coachella Festival 2025',
                'event_type' => 'Festivals',
                'event_date' => '2025-04-15',
                'event_time' => '12:00:00',
                'location' => 'Indio, California',
                'description' => 'Join us for one of the biggest music festivals in the world.',
                'ticket_price' => 350.00,
                'poster_url' => 'https://uploads.tracklist.com.br/wp-content/uploads/2022/06/coachella-758x426.png',
                'availability_status' => true,
            ],

            [
                'title' => 'Tech Innovation Summit 2025',
                'event_type' => 'Conferences',
                'event_date' => '2025-02-25',
                'event_time' => '09:00:00',
                'location' => 'San Francisco, CA',
                'description' => 'The world’s leading technology summit featuring innovators and entrepreneurs.',
                'ticket_price' => 300.00,
                'poster_url' => 'https://datafloq.com/wp-content/uploads/2024/10/General-Banner-DIS25-Summit-1280x720-1.png',
                'availability_status' => true,
            ],

            [
                'title' => 'Kevin Hart: Reality Check Tour',
                'event_type' => 'Comedy & Stand-up',
                'event_date' => '2024-07-6',
                'event_time' => '21:00:00',
                'location' => 'Staples Center, Los Angeles, CA',
                'description' => 'A night of laughter with the one and only Kevin Hart.',
                'ticket_price' => 100.00,
                'poster_url' => 'https://m.media-amazon.com/images/M/MV5BNjExMjQ1YTctNmM0OC00YWE5LWJkNmUtNWUxOTFiNDFiMjAwXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg',
                'availability_status' => true,
            ],

            [
                'title' => 'Photography 101 Workshop',
                'event_type' => 'Workshops',
                'event_date' => '2024-11-10',
                'event_time' => '14:00:00',
                'location' => 'Los Angeles, CA',
                'description' => 'Learn the basics of photography from professional photographers.',
                'ticket_price' => 50.00,
                'poster_url' => 'https://tagmango.com/staticassets/1725458378532.jpeg',
                'availability_status' => true,
            ],

            [
                'title' => 'Electric Daisy Carnival',
                'event_type' => 'Nightlife',
                'event_date' => '2024-12-15',
                'event_time' => '22:00:00',
                'location' => 'Las Vegas, NV',
                'description' => 'Experience the largest electronic dance music festival in the world!',
                'ticket_price' => 200.00,
                'poster_url' => 'https://i.redd.it/m3av9mrv2fs61.png',
                'availability_status' => true,
            ],
        ];

        foreach ($events as $event) {
            $event = Event::create([
                'title' => $event['title'],
                'event_type' => $event['event_type'],
                'event_date' => $event['event_date'],
                'event_time' => $event['event_time'],
                'location' => $event['location'],
                'description' => $event['description'],
                'ticket_price' => $event['ticket_price'],
                'poster_url' => $event['poster_url'],
                'availability_status' => $event['availability_status'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
