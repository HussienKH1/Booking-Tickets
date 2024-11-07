<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/home.css')}}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Ticket Trail</title>

</head>

<body class="bg-[#0b0b22] text-[#ffffff] ">
    <header>
        @include('navbar')
    </header>

    <section id="home">
        <div class="swiper mySwiper relative">
            <div class="swiper-wrapper">
                <div class="swiper-slide relative">
                    <img src="{{asset('images/Party.jpg')}}" class="w-full h-full object-cover" />
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white bg-black bg-opacity-50 p-4">
                        <span class="text-6xl font-extrabold tracking-wider mb-4 leading-tight drop-shadow-lg slide-text slide-down">
                            Reserve Your Spot
                        </span>
                        <span class="text-2xl font-semibold tracking-wide leading-snug drop-shadow-md slide-text slide-down">
                            Secure Your Tickets Now for an Unforgettable Experience!
                        </span>
                        <a href="#" class="btn bg-[#faaC1D] mt-10 relative inline-block px-5 py-3 text-white text-base font-medium overflow-hidden rounded-lg z-10 transition-colors duration-700 ease-linear hover:text-[#faaC1D] slide-text slide-down">
                            Book Now
                        </a>
                    </div>
                </div>

                <div class="swiper-slide relative">
                    <img src="{{asset('images/movies.jpg')}}" class="w-full h-full object-cover" />
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white bg-black bg-opacity-50 p-4">
                        <span class="text-6xl font-extrabold tracking-wider mb-4 leading-tight drop-shadow-lg slide-text slide-down">
                            Escape into the Magic of Cinema
                        </span>
                        <span class="text-2xl font-semibold tracking-wide leading-snug drop-shadow-md slide-text slide-down">
                            Book Your Tickets Now!
                        </span>
                        <a href="#" class="btn bg-[#faaC1D] mt-10 relative inline-block px-5 py-3 text-white text-base font-medium overflow-hidden rounded-lg z-10 transition-colors duration-700 ease-linear hover:text-[#faaC1D] slide-text slide-down">
                            Book Now
                        </a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <img src="{{asset('')}}" class="w-full h-full object-cover" />
                </div>
            </div>
            <div class="swiper-button-next bg-black bg-opacity-20 px-5 py-10"></div>
            <div class="swiper-button-prev bg-black bg-opacity-20 px-5 py-10"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <section id="movies" class=" text-white py-16 opacity-0 translate-y-4 transition-all duration-700">
        <div class="container mx-auto">
            <h1 class="text-4xl md:text-6xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-purple-500 mb-12 tracking-wide drop-shadow-lg animate-gradient">
                Book Your Blockbuster Spot Now
            </h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 p-6">
                @foreach($movies as $movie)
                <div class="relative group bg-gray-800 rounded-lg overflow-hidden shadow-lg movie-card" data-title="{{ $movie->title }}" data-genre="{{ $movie->genres->pluck('name')->join(', ') }}" data-release="{{ $movie->release_date ? $movie->release_date->year : 'Unknown' }}" data-synopsis="{{ Str::limit($movie->synopsis, 80) }}" data-rating="{{ $movie->rating }}">

                    <img src="{{ $movie->poster_url }}" alt="{{ $movie->title }}" class="w-full h-112 object-cover transition-transform duration-300 group-hover:scale-105">

                    <div class="absolute bottom-0 w-full p-4 bg-gray-800 text-pink-500 font-semibold text-lg transition-opacity duration-300 group-hover:opacity-0">
                        {{ $movie->title }}
                    </div>

                    <div class="absolute inset-0 bg-gray-900 bg-opacity-80 p-6 details opacity-0 translate-y-full transition-transform duration-700">
                        <h3 class="text-pink-500 font-semibold text-lg mb-2 movie-title"></h3>
                        <p class="text-sm text-gray-400 mb-1 movie-genre"></p>
                        <p class="text-sm text-gray-400 mb-2 movie-synopsis"></p>
                        <p class="text-yellow-400 font-semibold movie-rating"></p>
                        <a href="#" class="btn mt-4 bg-[#ff007f] relative inline-block px-4 py-2 text-white text-xs font-medium overflow-hidden rounded-lg z-10 transition-colors duration-700 ease-linear hover:text-[#ff007f]">
                            View Details
                        </a>
                        <a href="#" class="btn mt-4 bg-[#faaC1D] relative inline-block px-4 py-2 text-white text-xs font-medium overflow-hidden rounded-lg z-10 transition-colors duration-700 ease-linear hover:text-[#faaC1D]">
                            Book Now
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="events" class=" text-white py-16 opacity-0 translate-y-4 transition-all duration-700">
        
    </section>
</body>

<script src="{{asset ('js/navbar.js')}}"></script>
<script src="{{asset ('js/home.js')}}"></script>



</html>