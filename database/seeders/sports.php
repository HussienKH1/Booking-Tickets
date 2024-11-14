<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class sports extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $sportsEvents = [
            [
                'title' => 'Champions League Final',
                'sport_type' => 'Football',
                'event_date' => '2024-05-01',
                'event_time' => '20:00:00',
                'team_a' => 'Dortmund',
                'team_b' => 'Real Madrid',
                'location' => 'Wembley Stadium, London',
                'ticket_price' => 250.00,
                'poster_url' => 'https://i.redd.it/9ao5rccpo9zc1.jpeg',
                'availability_status' => true,
            ],
            [
                'title' => 'NBA Finals Game 1',
                'sport_type' => 'Basketball',
                'event_date' => '2024-06-10',
                'event_time' => '18:30:00',
                'team_a' => 'Boston Celtics',
                'team_b' => 'Mavericks',
                'location' => 'Staples Center, Los Angeles',
                'ticket_price' => 300.00,
                'poster_url' => 'https://cdn.nba.com/manage/2024/06/matchup-graphic-1080-240531-784x441.jpg',
                'availability_status' => true,
            ],
            [
                'title' => 'Wimbledon Men’s Final',
                'sport_type' => 'Tennis',
                'event_date' => '2024-07-14',
                'event_time' => '14:00:00',
                'location' => 'All England Club, London',
                'ticket_price' => 450.00,
                'poster_url' => 'https://tennisgallerywimbledon.com/cdn/shop/files/Scan_20240715.jpg?v=1721064395',
                'availability_status' => true,
            ],
            [
                'title' => 'The Ashes Test Match',
                'sport_type' => 'Cricket',
                'event_date' => '2024-08-01',
                'event_time' => '10:00:00',
                'team_a' => 'England',
                'team_b' => 'Australia',
                'location' => 'Lord\'s, London',
                'ticket_price' => 150.00,
                'poster_url' => 'https://media.gettyimages.com/id/1171088786/photo/leeds-england-ben-stokes-of-england-celebrates-hitting-the-winning-runs-to-win-the-3rd.jpg?s=612x612&w=gi&k=20&c=QdXvjvh26goXyfl-6PV_-gwd5MLuDkFvYHnMW4wut_g=',
                'availability_status' => false,
            ],
            [
                'title' => 'Tour de France Stage 12',
                'sport_type' => 'Cycling',
                'event_date' => '2024-07-17',
                'event_time' => '09:00:00',
                'location' => 'Pyrenees Mountains, France',
                'ticket_price' => 0.00,
                'poster_url' => 'https://d2779tscntxxsw.cloudfront.net/66900fb511ef8.png',
                'availability_status' => true,
            ],
            [
                'title' => 'US Open Golf Championship',
                'sport_type' => 'Golf',
                'event_date' => '2023-06-13',
                'event_time' => '08:00:00',
                'location' => 'Pebble Beach, California',
                'ticket_price' => 400.00,
                'poster_url' => 'https://leewybranski.com/wp-content/uploads/2022/11/2023-U.S.-OPEN-2-scaled.jpg',
                'availability_status' => true,
            ],
            [
                'title' => 'World Series Game 4',
                'sport_type' => 'Baseball',
                'event_date' => '2024-10-25',
                'event_time' => '19:30:00',
                'team_a' => 'New York Yankees',
                'team_b' => 'Los Angeles Dodgers',
                'location' => 'Yankee Stadium, New York',
                'ticket_price' => 250.00,
                'poster_url' => 'https://pbs.twimg.com/media/GbEGT0vWAAA8Ot2?format=jpg&name=4096x4096',
                'availability_status' => true,
            ],
            [
                'title' => 'Formula 1 Grand Prix Monaco',
                'sport_type' => 'Motor Racing',
                'event_date' => '2024-05-26',
                'event_time' => '15:00:00',
                'location' => 'Monaco Circuit, Monte Carlo',
                'ticket_price' => 1000.00,
                'poster_url' => 'https://storage.googleapis.com/pod_public/1300/220018.jpg',
                'availability_status' => false,
            ],
            [
                'title' => 'World Swimming Championship',
                'sport_type' => 'Swimming',
                'event_date' => '2024-07-24',
                'event_time' => '10:00:00',
                'location' => 'Tokyo Aquatic Center, Tokyo',
                'ticket_price' => 50.00,
                'poster_url' => 'https://www.finswimmer.com/wp-content/uploads/2024/01/postercoralsprings2024-jpg.webp',
                'availability_status' => true,
            ],
            [
                'title' => 'Super Bowl LVIII',
                'sport_type' => 'American Football',
                'event_date' => '2024-02-04',
                'event_time' => '18:30:00',
                'team_a' => 'Chiefs',
                'team_b' => 'Eagles',
                'location' => 'Allegiant Stadium, Las Vegas',
                'ticket_price' => 1500.00,
                'poster_url' => 'https://sportsposterwarehouse.com/cdn/shop/files/super-bowl-lviii-2024-28x40-banner_1024x1024.jpg?v=1684507347',
                'availability_status' => true,
            ],
            [
                'title' => 'Olympics Opening Ceremony',
                'sport_type' => 'Various',
                'event_date' => '2024-07-26',
                'event_time' => '20:00:00',
                'location' => 'Olympic Stadium, Paris',
                'ticket_price' => 200.00,
                'poster_url' => 'https://images.fandango.com/ImageRenderer/820/0/redesign/static/img/default_poster.png/0/images/masterrepository/fandango/236336/Imax.png',
                'availability_status' => true,
            ],
            [
                'title' => 'FIFA World Cup Final',
                'sport_type' => 'Football',
                'event_date' => '2022-11-08',
                'event_time' => '17:00:00',
                'team_a' => 'Team A',
                'team_b' => 'Team B',
                'location' => 'MetLife Stadium, New Jersey',
                'ticket_price' => 600.00,
                'poster_url' => 'https://img.pikbest.com/origin/06/91/64/19WpIkbEsTayF.jpg!w700wp',
                'availability_status' => false,
            ],
        ];

        foreach ($sportsEvents as $event) {
            Sport::create($event);
        }
    }
}
