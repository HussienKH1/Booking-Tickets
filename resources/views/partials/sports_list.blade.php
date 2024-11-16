<div class="relative px-8 py-12" id="timeline-container">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
        @foreach($sportsEvents as $index => $event)
        <div class="flex flex-col items-center bg-white rounded-3xl shadow-xl border border-gray-200 hover:border-[#faaC1D] transition-all duration-300 transform hover:-translate-y-2 max-w-xs mx-auto overflow-hidden">
            <div class="relative w-full h-48 rounded-t-3xl overflow-hidden">
                <img src="{{ $event->poster_url }}" alt="{{ $event->title }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/30"></div>
            </div>
            <div class="p-6 text-center">
                <h3 class="text-2xl font-semibold text-gray-900">{{ $event->title }}</h3>
                <p class="text-gray-600 text-sm mt-1">{{ $event->sport_type }} | {{ $event->location }}</p>
                <div class="flex justify-center items-center space-x-2 text-gray-500 mt-2">
                    <p>{{ \Carbon\Carbon::parse($event->event_date)->format('M j, Y') }}</p>
                    <span class="text-xs">•</span>
                    <p>{{ \Carbon\Carbon::parse($event->event_time)->format('g:i A') }}</p>
                </div>
                @if($event->team_a && $event->team_b)
                <p class="text-gray-700 mt-3 text-sm font-medium">{{ $event->team_a }} vs {{ $event->team_b }}</p>
                @endif
                <p class="text-[#faaC1D] text-lg font-extrabold mt-4">${{ number_format($event->ticket_price, 2) }}</p>
                
                <a href="{{asset ('booking')}}" class="btn mt-5 bg-[#faaC1D] relative inline-block px-4 py-2 text-white text-xs font-medium overflow-hidden rounded-lg z-10 transition-colors duration-700 ease-linear hover:text-[#faaC1D]">
                    Book Now
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
