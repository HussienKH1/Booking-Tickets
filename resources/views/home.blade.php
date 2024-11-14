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
                    <div class="relative w-full h-full">
                        <img src="{{asset('images/sport.jpg')}}" class="w-full h-full object-cover" />
                        <div class="absolute inset-0 bg-black opacity-50"></div>
                    </div>
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white bg-black bg-opacity-50 p-4">
                        <span class="text-6xl font-extrabold tracking-wider mb-4 leading-tight drop-shadow-lg slide-text slide-down">
                            Unleash the Thrill of the Game
                        </span>
                        <span class="text-2xl font-semibold tracking-wide leading-snug drop-shadow-md slide-text slide-down">
                            Join the Action Today!
                        </span>
                        <a href="#" class="btn bg-[#faaC1D] mt-10 relative inline-block px-5 py-3 text-white text-base font-medium overflow-hidden rounded-lg z-10 transition-colors duration-700 ease-linear hover:text-[#faaC1D] slide-text slide-down">
                            Book Now
                        </a>
                    </div>
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
            <div class="text-center mt-12">
                <a href="#" class="mt-8 inline-block px-8 py-3 text-lg font-semibold text-white rounded-full bg-gradient-to-r from-pink-500 to-purple-500 relative overflow-hidden group shadow-lg transform transition-all duration-500 ease-in-out hover:scale-105 hover:shadow-xl">
                    <span class="absolute inset-0 w-full h-full bg-white opacity-10 group-hover:opacity-0 transition-opacity duration-500 ease-in-out"></span>
                    <span class="relative z-10">View All Movies</span>
                    <span class="absolute right-0 bottom-0 w-20 h-20 bg-pink-500 opacity-50 rounded-full transform translate-x-1/2 translate-y-1/2 group-hover:translate-x-0 group-hover:translate-y-0 transition-all duration-700 ease-in-out"></span>
                </a>
            </div>
    </section>

    <section class="events-section py-20 bg-gradient-to-r from-blue-900 via-purple-900 to-indigo-900 backdrop-blur-sm">
        <div class="container mx-auto px-6">
            <h2 class="text-5xl font-extrabold text-center text-white mb-16">Upcoming Events</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-16">
                @foreach ($events as $event)
                <div class="event-card relative bg-white/30 backdrop-blur-lg rounded-2xl overflow-hidden shadow-2xl group hover:scale-105 transform transition-all duration-300 ease-in-out">
                    <div class="event-image relative overflow-hidden">
                        <img src="{{ $event->poster_url }}" alt="{{ $event->title }}" class="w-full h-72 object-cover group-hover:scale-105 transition-all duration-500 ease-in-out">
                    </div>
                    <div class="event-details absolute inset-0 p-6 bg-white/30 backdrop-blur-md rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">
                        <h3 class="text-3xl text-white font-bold mb-2">{{ $event->title }}</h3>
                        <p class="text-lg text-gray-200">{{ $event->event_date }} | {{ $event->event_time }}</p>
                        <p class="text-gray-300 mt-4 text-sm">{{ Str::limit($event->description, 120) }}</p>
                        <p class="text-xl text-[#faaC1D] mt-6">${{ number_format($event->ticket_price, 2) }}</p>
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
            <div class="text-center mt-12">
                <a href="#" class="mt-8 inline-block px-8 py-3 text-lg font-semibold text-white rounded-full bg-gradient-to-r from-pink-500 to-purple-500 relative overflow-hidden group shadow-lg transform transition-all duration-500 ease-in-out hover:scale-105 hover:shadow-xl">
                    <span class="absolute inset-0 w-full h-full bg-white opacity-10 group-hover:opacity-0 transition-opacity duration-500 ease-in-out"></span>
                    <span class="relative z-10">View All Events </span>
                    <span class="absolute right-0 bottom-0 w-20 h-20 bg-pink-500 opacity-50 rounded-full transform translate-x-1/2 translate-y-1/2 group-hover:translate-x-0 group-hover:translate-y-0 transition-all duration-700 ease-in-out"></span>
                </a>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 text-white relative">
        <div class="container mx-auto px-6">
            <h2 class="text-5xl font-extrabold text-center mb-16 text-pink-500">Upcoming Sports Events</h2>
            <div class="absolute inset-y-0 left-0 flex items-center">
                <button class="p-3 bg-pink-500 rounded-full text-white shadow-md hover:bg-pink-600 transition" id="left-button">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center">
                <button class="p-3 bg-pink-500 rounded-full text-white shadow-md hover:bg-pink-600 transition" id="right-button">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>

            <div class="relative overflow-x-auto no-scrollbar px-12 py-8" id="timeline-container">
                <div class="flex space-x-16 justify-start items-center min-w-full">
                    @foreach($sportsEvents as $index => $event)
                    <div class="flex flex-col items-center max-w-xs">
                        <div class="w-48 h-48 rounded-full overflow-hidden shadow-lg mb-6 transition-transform duration-300 hover:scale-105 hover:shadow-pink-500/50">
                            <img src="{{ $event->poster_url }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                        </div>
                        <div class="relative p-6 bg-gray-800 rounded-xl shadow-lg text-center transform transition-all duration-300 hover:shadow-2xl hover:bg-gray-900">
                            <h3 class="text-2xl font-semibold mb-1 text-pink-400">{{ $event->title }}</h3>
                            <p class="text-gray-400 text-sm mb-2">{{ $event->sport_type }} | {{ $event->location }}</p>
                            <p class="text-gray-500 mb-1">{{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y') }}</p>
                            <p class="text-gray-500">{{ \Carbon\Carbon::parse($event->event_time)->format('g:i A') }}</p>
                            @if($event->team_a && $event->team_b)
                            <p class="text-gray-300 mt-2 text-sm">{{ $event->team_a }} vs {{ $event->team_b }}</p>
                            @endif
                            <p class="text-[#faaC1D] text-lg font-bold mt-3">${{ number_format($event->ticket_price, 2) }}</p>
                            <a href="#" class="btn mt-4 bg-[#faaC1D] relative inline-block px-4 py-2 text-white text-xs font-medium overflow-hidden rounded-lg z-10 transition-colors duration-700 ease-linear hover:text-[#faaC1D]">
                                Book Now
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="text-center mt-12">
                <a href="#" class="mt-8 inline-block px-8 py-3 text-lg font-semibold text-white rounded-full bg-gradient-to-r from-pink-500 to-purple-500 relative overflow-hidden group shadow-lg transform transition-all duration-500 ease-in-out hover:scale-105 hover:shadow-xl">
                    <span class="absolute inset-0 w-full h-full bg-white opacity-10 group-hover:opacity-0 transition-opacity duration-500 ease-in-out"></span>
                    <span class="relative z-10">View All Sports </span>
                    <span class="absolute right-0 bottom-0 w-20 h-20 bg-pink-500 opacity-50 rounded-full transform translate-x-1/2 translate-y-1/2 group-hover:translate-x-0 group-hover:translate-y-0 transition-all duration-700 ease-in-out"></span>
                </a>
            </div>
        </div>
    </section>

    <footer>
        @include('footer')
    </footer>

</body>

<script src="{{asset ('js/navbar.js')}}"></script>
<script src="{{asset ('js/home.js')}}"></script>



</html>