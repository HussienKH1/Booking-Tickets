<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 p-6">
    @foreach($movies as $movie)
    <div class="relative group bg-gray-800 rounded-lg overflow-hidden shadow-lg movie-card" data-title="{{ $movie->title }}" data-genre="{{ $movie->genres->pluck('name')->join(', ') }}" data-release="{{ $movie->release_date ? $movie->release_date->year : 'Unknown' }}" data-synopsis="{{ Str::limit($movie->synopsis, 80) }}" data-rating="{{ $movie->rating }}">

        <img src="{{ $movie->poster_url }}" alt="{{ $movie->title }}" class="w-full h-112 object-cover transition-transform duration-300 group-hover:scale-105 cursor-pointer">

        <div class="absolute bottom-0 w-full p-4 bg-gray-800 text-pink-500 font-semibold text-lg transition-opacity duration-300 group-hover:opacity-0">
            {{ $movie->title }}
        </div>

        <div class="absolute inset-0 bg-gray-900 bg-opacity-80 p-6 details opacity-0 translate-y-full transition-transform duration-700">
            <h3 class="text-pink-500 font-semibold text-lg mb-2 movie-title"></h3>
            <p class="text-sm text-gray-400 mb-1 movie-genre"></p>
            <p class="text-sm text-gray-400 mb-2 movie-synopsis"></p>
            <p class="text-yellow-400 font-semibold movie-rating"></p>
            <a href="{{ route('movie_detail', $movie->id)}}" class="btn mt-4 bg-[#ff007f] relative inline-block px-4 py-2 text-white text-xs font-medium overflow-hidden rounded-lg z-10 transition-colors duration-700 ease-linear hover:text-[#ff007f]">
                View Details
            </a>
            <a href="{{asset ('booking')}}" class="btn mt-4 bg-[#faaC1D] relative inline-block px-4 py-2 text-white text-xs font-medium overflow-hidden rounded-lg z-10 transition-colors duration-700 ease-linear hover:text-[#faaC1D]">
                Book Now
            </a>
        </div>
    </div>
    @endforeach
</div>