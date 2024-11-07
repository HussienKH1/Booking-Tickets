<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Movies_seed extends Seeder
{
    public function run()
    {
        $movies = [
            [
                'title' => 'The Shawshank Redemption',
                'genre' => ['Drama'],
                'release_date' => '1994-09-22',
                'rating' => 9.3,
                'runtime' => 142,
                'director' => 'Frank Darabont',
                'cast' => 'Tim Robbins, Morgan Freeman',
                'synopsis' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.',
                'language' => 'English',
                'country' => 'USA',
                'poster_url' => 'https://vice-press.com/cdn/shop/files/shawshank-redemption-film-vault-poster-matt-ferguson-florey.jpg?v=1687346916&width=1100',
                'trailer_url' => 'https://www.youtube.com/watch?v=NmzuHjWmXOc',
                'availability_status' => true,
                'screening_times' => json_encode(['18:00', '20:00', '22:00']),
                'ticket_price' => 12.99,
            ],
            [
                'title' => 'The Godfather',
                'genre' => ['Crime, Drama'],
                'release_date' => '1972-03-24',
                'rating' => 9.2,
                'runtime' => 175,
                'director' => 'Francis Ford Coppola',
                'cast' => 'Marlon Brando, Al Pacino, James Caan',
                'synopsis' => 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.',
                'language' => 'English',
                'country' => 'USA',
                'poster_url' => 'https://i5.walmartimages.com/seo/The-Godfather-Original-Movie-Poster-poster-Frameless-Gift-12-x-18-inch-30cm-x-46cm_c6df3fd5-1e9c-49ca-8cb6-1af6078df4c2.b21fd8bc877c5645b9340a53580833a2.jpeg',
                'trailer_url' => 'https://www.youtube.com/watch?v=UaVTIH8mujA',
                'availability_status' => true,
                'screening_times' => json_encode(['19:00', '21:00', '23:00']),
                'ticket_price' => 15.00,
            ],
            [
                'title' => 'The Dark Knight',
                'genre' => ['Action, Crime, Drama'],
                'release_date' => '2008-07-18',
                'rating' => 9.0,
                'runtime' => 152,
                'director' => 'Christopher Nolan',
                'cast' => 'Christian Bale, Heath Ledger, Aaron Eckhart',
                'synopsis' => 'When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham.',
                'language' => 'English',
                'country' => 'USA',
                'poster_url' => 'https://cdn.awsli.com.br/600x700/1610/1610163/produto/177680308/poster-batman-o-cavaleiro-das-trevas-e-90b14a9e.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=LDG9bisJEaI',
                'availability_status' => true,
                'screening_times' => json_encode(['17:30', '20:30', '23:30']),
                'ticket_price' => 14.50,
            ],
            [
                'title' => 'The Exorcist',
                'genre' => ['Horror, Supernatural'],
                'release_date' => '1973-12-26',
                'rating' => 8.1,
                'runtime' => 122,
                'director' => 'William Friedkin',
                'cast' => 'Ellen Burstyn, Max von Sydow, Linda Blair',
                'synopsis' => 'When a young girl is possessed by a mysterious entity, her mother seeks the help of two priests to save her.',
                'language' => 'English',
                'country' => 'USA',
                'poster_url' => 'https://m.media-amazon.com/images/I/61tF7jKagWL._AC_UF894,1000_QL80_.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=BU2eYAO31Cc',
                'availability_status' => true,
                'screening_times' => json_encode(['21:00', '23:30']),
                'ticket_price' => 10.50,
            ],
            [
                'title' => 'Hereditary',
                'genre' => ['Horror, Supernatural'],
                'release_date' => '2018-06-08',
                'rating' => 7.3,
                'runtime' => 127,
                'director' => 'Ari Aster',
                'cast' => 'Toni Collette, Milly Shapiro, Gabriel Byrne',
                'synopsis' => 'A grieving family is haunted by tragic and disturbing occurrences.',
                'language' => 'English',
                'country' => 'USA',
                'poster_url' => 'https://m.media-amazon.com/images/M/MV5BNTEyZGQwODctYWJjZi00NjFmLTg3YmEtMzlhNjljOGZhMWMyXkEyXkFqcGc@._V1_.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=V6wWKNij_1M',
                'availability_status' => true,
                'screening_times' => json_encode(['19:00', '21:45']),
                'ticket_price' => 13.00,
            ],
            [
                'title' => 'A Quiet Place',
                'genre' => ['Horror, Thriller'],
                'release_date' => '2018-04-06',
                'rating' => 7.5,
                'runtime' => 90,
                'director' => 'John Krasinski',
                'cast' => 'Emily Blunt, John Krasinski, Millicent Simmonds',
                'synopsis' => 'A family is forced to live in silence while hiding from creatures that hunt by sound.',
                'language' => 'English',
                'country' => 'USA',
                'poster_url' => 'https://m.media-amazon.com/images/M/MV5BMjI0MDMzNTQ0M15BMl5BanBnXkFtZTgwMTM5NzM3NDM@._V1_.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=WR7cc5t7tv8',
                'availability_status' => true,
                'screening_times' => json_encode(['18:30', '21:00', '23:15']),
                'ticket_price' => 11.75,
            ],
            [
                'title' => 'The Conjuring',
                'genre' => ['Horror, Supernatural'],
                'release_date' => '2013-07-19',
                'rating' => 7.5,
                'runtime' => 112,
                'director' => 'James Wan',
                'cast' => 'Vera Farmiga, Patrick Wilson, Lili Taylor',
                'synopsis' => 'Paranormal investigators Ed and Lorraine Warren work to help a family terrorized by a dark presence.',
                'language' => 'English',
                'country' => 'USA',
                'poster_url' => 'https://image.tmdb.org/t/p/original/rQfX2xx8TUoNvyk892yKWNikJaM.jpg',
                'trailer_url' => 'https://example.com/conjuring-trailer.mp4',
                'availability_status' => true,
                'screening_times' => json_encode(['19:00', '21:30', '23:45']),
                'ticket_price' => 12.50,
            ],
            [
                'title' => 'The Ring',
                'genre' => ['Horror, Mystery'],
                'release_date' => '2002-10-18',
                'rating' => 7.1,
                'runtime' => 115,
                'director' => 'Gore Verbinski',
                'cast' => 'Naomi Watts, Martin Henderson, Brian Cox',
                'synopsis' => 'A journalist must investigate a mysterious videotape that causes the death of anyone who watches it.',
                'language' => 'English',
                'country' => 'USA',
                'poster_url' => 'https://m.media-amazon.com/images/M/MV5BNDA2NTg2NjE4Ml5BMl5BanBnXkFtZTYwMjYxMDg5._V1_.jpg',
                'trailer_url' => 'https://www.youtube.com/watch?v=yybjV3U68wc',
                'availability_status' => true,
                'screening_times' => json_encode(['20:00', '22:30']),
                'ticket_price' => 11.00,
            ],
        ];

        foreach ($movies as $movieData) {
            $movie = Movie::create([
                'title' => $movieData['title'],
                'release_date' => $movieData['release_date'],
                'rating' => $movieData['rating'],
                'runtime' => $movieData['runtime'],
                'director' => $movieData['director'],
                'cast' => $movieData['cast'],
                'synopsis' => $movieData['synopsis'],
                'language' => $movieData['language'],
                'country' => $movieData['country'],
                'poster_url' => $movieData['poster_url'],
                'trailer_url' => $movieData['trailer_url'],
                'availability_status' => $movieData['availability_status'],
                'screening_times' => $movieData['screening_times'],
                'ticket_price' => $movieData['ticket_price'],
            ]);
        
            $genreIds = [];
        
            foreach ($movieData['genre'] as $genreName) {
                
                $individualGenres = array_map('trim', explode(',', $genreName));
                
                foreach ($individualGenres as $genre) {
                    $genreInstance = Genre::firstOrCreate(['name' => $genre]);
                    $genreIds[] = $genreInstance->id;
                }
            }
        
            
            $movie->genres()->sync($genreIds);
        }
    }
}
