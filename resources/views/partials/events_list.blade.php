<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-16">
    @foreach ($events as $event)
    <div class="event-card relative bg-white/30 backdrop-blur-lg rounded-2xl overflow-hidden shadow-2xl group hover:scale-105 transform transition-all duration-300 ease-in-out">
        <div class="event-image relative overflow-hidden h-96">
            <img src="{{ $event->poster_url }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-all duration-500 ease-in-out">
        </div>
        <div class="event-details absolute inset-0 p-6 bg-white/30 backdrop-blur-md rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">
            <h3 class="text-3xl text-white font-bold mb-2">{{ $event->title }}</h3>
            <p class="text-lg text-gray-200">{{ $event->event_date }} | {{ $event->event_time }}</p>
            <p class="text-gray-300 mt-4 text-sm">{{ Str::limit($event->description, 120) }}</p>
            <p class="text-xl text-[#faaC1D] mt-6">${{ number_format($event->ticket_price, 2) }}</p>
            <a href="#" class="btn mt-4 bg-[#ff007f] relative inline-block px-4 py-2 text-white text-xs font-medium overflow-hidden rounded-lg z-10 transition-colors duration-700 ease-linear hover:text-[#ff007f]">
                View Details
            </a>
            <a href="{{asset ('booking')}}" class="btn mt-4 bg-[#faaC1D] relative inline-block px-4 py-2 text-white text-xs font-medium overflow-hidden rounded-lg z-10 transition-colors duration-700 ease-linear hover:text-[#faaC1D]">
                Book Now
            </a>
        </div>
    </div>
    @endforeach
</div>
