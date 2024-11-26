<nav class="flex items-center justify-between {{ request()->is('/') || request()->is('home') || request()->is('login') || request()->is('signup') || request() -> routeIs('movie_detail') ? 'py-8' : 'py-4' }} px-8 {{ request()->is('/') || request()->is('home') || request()->is('login') || request()->is('signup') || request() -> routeIs('movie_detail') ? 'bg-transparent' : 'bg-[#0b0b22]' }} {{ request()->is('/') || request()->is('home') || request()->is('login') || request()->is('signup') || request() -> routeIs('movie_detail') ? 'fixed' : '' }}  z-50 w-full transition-all duration-1000">
    <div class="flex items-center">
        <a href="{{asset ('home')}}"><img src="{{asset('images/logo.png')}}" alt="Logo" class="w-15 h-8 mr-2"></a>
        <span class="text-[#ffffff] text-lg font-bold">TICKET<span class="text-[#ff007f]">TRAIL</span></span>
    </div>
    <div class="hidden md:flex space-x-6 text-[#ffffff] font-medium">
        <ul class="flex space-x-6">
            <li>
                <a href="{{asset ('home')}}" class="menu-item relative hover:text-[#ff007f] transition duration-300 ease-in-out">HOME</a>
            </li>
            <li class="relative group">
                <a href="{{asset ('movies')}}" class="menu-item relative hover:text-[#ff007f] transition duration-300 ease-in-out">
                    MOVIES <ion-icon name="chevron-down-outline" class="chevron-icon"></ion-icon>
                </a>
                <div class="dropdown absolute left-0 hidden text-gray-700 bg-white border border-gray-200 rounded-lg shadow-lg p-4 z-10 group-hover:block">
                    @foreach ($genres->take(5) as $genre)
                    <a href="{{ route('movies.filterByGenre', ['id' => $genre->id]) }}" class="block py-2 px-4 rounded-md hover:bg-[#ff007f] hover:text-white transition duration-200 ease-in-out">
                        {{$genre->name}}
                    </a>
                    @endforeach
                    <a href="{{asset ('movies')}}" class="block py-2 px-4 mt-2 text-center text-[#ff007f] font-semibold hover:text-white hover:bg-[#ff007f] rounded-md transition duration-200 ease-in-out">
                        View all →
                    </a>
                </div>
            </li>
            <li class="relative group">
                <a href="{{asset ('events')}}" class="menu-item relative hover:text-[#ff007f] transition duration-300 ease-in-out">
                    EVENTS <ion-icon name="chevron-down-outline" class="chevron-icon"></ion-icon>
                </a>
                <div class="dropdown absolute left-0 hidden text-gray-700 bg-white border border-gray-200 rounded-lg shadow-lg p-4 z-10 group-hover:block">
                    @foreach ($event_types->take(5) as $event_type)
                    <a href="{{ route('eventsfilter', ['id' => $event_type->id]) }}" class="block py-2 px-4 rounded-md hover:bg-[#ff007f] hover:text-white transition duration-200 ease-in-out">
                        {{$event_type->name}}
                    </a>

                    @endforeach
                    <a href="{{asset('events')}}" class="block py-2 px-4 mt-2 text-center text-[#ff007f] font-semibold hover:text-white hover:bg-[#ff007f] rounded-md transition duration-200 ease-in-out">
                        View all →
                    </a>
                </div>
            </li>
            <li class="relative group">
                <a href="{{asset ('sports')}}" class="menu-item relative hover:text-[#ff007f] transition duration-300 ease-in-out">
                    SPORTS <ion-icon name="chevron-down-outline" class="chevron-icon"></ion-icon>
                </a>
                <div class="dropdown absolute left-0 hidden text-gray-700 bg-white border border-gray-200 rounded-lg shadow-lg p-4 z-10 group-hover:block">
                    @foreach ($sporttypes->take(5) as $type)
                    <a href="{{ route('sportsfilter', ['id' => $type->id]) }}" class="block py-2 px-4 rounded-md hover:bg-[#ff007f] hover:text-white transition duration-200 ease-in-out">
                        {{$type->name}}
                    </a>
                    @endforeach
                    <a href="{{asset ('sports')}}" class="block py-2 px-4 mt-2 text-center text-[#ff007f] font-semibold hover:text-white hover:bg-[#ff007f] rounded-md transition duration-200 ease-in-out">
                        View all →
                    </a>
                </div>
            </li>
            <li>
                <a href="#" class="menu-item relative hover:text-[#ff007f] transition duration-300 ease-in-out">CONTACT</a>
            </li>
        </ul>
    </div>

    <div class="flex items-center space-x-4">
        @if(Auth::check())
        <a href="{{asset('mybookings')}}" class="btn bg-[#ff007f] relative inline-block px-4 py-2 text-white text-xs font-medium overflow-hidden rounded-lg z-10 transition-colors duration-700 ease-linear hover:text-[#ff007f]">
            My Bookings
        </a>
        <form method="POST" action="{{ route('logout') }}" class="logout-form">
            @csrf
            <button type="submit" class="btn bg-[#ff007f] relative inline-block px-4 py-2 text-white text-xs font-medium overflow-hidden rounded-lg z-10 transition-colors duration-700 ease-linear hover:text-[#ff007f]">
                Logout
            </button>
        </form>
        @else
        <a href="{{asset('login')}}" class="btn bg-[#ff007f] relative inline-block px-4 py-2 text-white text-xs font-medium overflow-hidden rounded-lg z-10 transition-colors duration-700 ease-linear hover:text-[#ff007f]">
            Get Started
        </a>
        @endif
    </div>
</nav>