<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/navbar.css')}}">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>

<body>
    <header>
        @include('navbar')
    </header>
    <div class="relative h-screen bg-gray-900 text-white">
        <div
            class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('{{ $movie->poster_url }}');">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        </div>

        <div class="relative z-10 flex items-center justify-between h-full px-10">
            <div class="max-w-lg">
                <h1 class="text-5xl font-bold">{{ $movie->title }}</h1>

                <p class="mt-3 text-lg text-gray-300">
                    {{ $movie->runtime }} mins &bull; {{ $movie->release_date->format('Y') }} &bull;
                    Rating: {{ $movie->rating }}/10
                </p>

                <p class="mt-5 text-gray-300">{{ $movie->synopsis }}</p>

                <div class="flex mt-5 space-x-4">
                    <a
                        href="{{ $movie->trailer_url }}"
                        class="btn bg-[#faaC1D] mt-10 relative inline-block px-5 py-3 text-white text-base font-medium overflow-hidden rounded-lg z-10 transition-colors duration-700 ease-linear hover:text-[#faaC1D] slide-text slide-down">
                        Watch Trailer
                    </a>
                    <a
                        href="{{asset ('booking')}}"
                        class="btn bg-[#ff007f] mt-10 relative inline-block px-5 py-3 text-white text-base font-medium overflow-hidden rounded-lg z-10 transition-colors duration-700 ease-linear hover:text-[#ff007f] slide-text slide-down">
                        Book Now
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>