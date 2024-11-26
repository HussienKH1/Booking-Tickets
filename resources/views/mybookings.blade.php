<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/mybookings.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css')}}">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>My Bookings</title>
</head>

<body class="bg-[#0b0b22] text-white">
    <header>
        @include('navbar')
    </header>

    <div class="container mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold text-pink-500 mb-6">My Bookings</h1>

        @if($movies->isEmpty())
        <div class="bg-gray-800 text-center py-6 rounded-lg shadow-lg">
            <p class="text-gray-400 text-lg">You have no bookings yet.</p>
        </div>
        @else
        <div class="space-y-6">
            @foreach($movies as $movie)
            <div class="bg-gray-900 rounded-lg shadow-md overflow-hidden">
                <div class="flex items-center">
                    <img src="{{ $movie->poster_url }}" alt="{{ $movie->title }}"
                        class="w-32 h-48 object-cover rounded-l-lg">

                    <div class="flex-1 px-6 py-4">
                        <h2 class="text-xl font-semibold text-pink-500">{{ $movie->title }}</h2>
                        <p class="text-sm text-gray-400 mt-1">Genre: {{ $movie->genres->pluck('name')->join(', ') }}</p>
                        <p class="text-sm text-gray-400">Release Year: {{ $movie->release_date ? $movie->release_date->year : 'Unknown' }}</p>
                        <p class="text-sm text-gray-400 mt-2">{{ Str::limit($movie->synopsis, 150) }}</p>
                        <p class="mt-3 text-sm text-yellow-400 font-semibold">
                            Rating: {{ $movie->rating }}
                        </p>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
        @endif
        @if($events->isEmpty())
        <div class="bg-gray-800 text-center py-6 rounded-lg shadow-lg">
            <p class="text-gray-400 text-lg">You have no event bookings yet.</p>
        </div>
        @else
        <div class="space-y-6">
            @foreach($events as $event)
            <div class="bg-gray-900 rounded-lg shadow-md overflow-hidden">
                <div class="flex items-center">
                    <img src="{{ $event->poster_url }}" alt="{{ $event->title }}"
                        class="w-32 h-48 object-cover rounded-l-lg">
                    <div class="flex-1 px-6 py-4">
                        <h2 class="text-xl font-semibold text-pink-500">{{ $event->title }}</h2>
                        <p class="text-sm text-gray-400 mt-1">
                            Date: {{ $event->event_date->format('F d, Y') }} | Time: {{ $event->event_time }}
                        </p>
                        <p class="text-sm text-gray-400 mt-1">
                            Location: {{ $event->location }}
                        </p>
                        <p class="text-sm text-gray-400 mt-2">
                            {{ Str::limit($event->description, 150) }}
                        </p>
                        <p class="mt-3 text-sm text-yellow-400 font-semibold">
                            Ticket Price: ${{ number_format($event->ticket_price, 2) }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
        @if($sportsEvents->isEmpty())
        <div class="bg-gray-800 text-center py-6 rounded-lg shadow-lg">
            <p class="text-gray-400 text-lg">You have no sports event bookings yet.</p>
        </div>
        @else
        <div class="space-y-6">
            @foreach($sportsEvents as $event)
            <div class="bg-gray-900 rounded-lg shadow-md overflow-hidden">
                <div class="flex items-center">
                    <img src="{{ $event->poster_url }}" alt="{{ $event->title }}"
                        class="w-32 h-48 object-cover rounded-l-lg">
                    <div class="flex-1 px-6 py-4">
                        <h2 class="text-xl font-semibold text-pink-500">{{ $event->title }}</h2>
                        <p class="text-sm text-gray-400 mt-1">
                            {{ $event->sport_type }} | {{ $event->location }}
                        </p>
                        <p class="text-sm text-gray-400 mt-2">
                            {{ \Carbon\Carbon::parse($event->event_date)->format('M j, Y') }}
                            at {{ \Carbon\Carbon::parse($event->event_time)->format('g:i A') }}
                        </p>
                        <p class="text-gray-400 mt-2">
                            {{ $event->team_a }} vs {{ $event->team_b }}
                        </p>
                        <p class="text-xl text-[#faaC1D] font-extrabold mt-4">${{ number_format($event->ticket_price, 2) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>

    <footer class="py-6 bg-gray-900 text-center text-gray-400">
        © {{ date('Y') }} Ticket Trail. All rights reserved.
    </footer>
</body>

</html>