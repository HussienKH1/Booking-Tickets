<nav class="flex items-center justify-between py-8 px-8 bg-transparent fixed z-50 w-full transition-all duration-1000">
    <div class="flex items-center">
        <img src="" alt="Logo" class="w-8 h-8 mr-2">
        <span class="text-[#ffffff] text-lg font-bold">TICKET<span class="text-[#ff007f]">TRAIL</span></span>
    </div>
    <div class="hidden md:flex space-x-6 text-[#ffffff] font-medium">
        <ul class="flex space-x-6">
            <li>
                <a href="#" class="menu-item relative hover:text-[#ff007f] transition duration-300 ease-in-out">HOME</a>
            </li>
            <li class="relative group">
                <a href="#" class="menu-item relative hover:text-[#ff007f] transition duration-300 ease-in-out">
                    MOVIES <ion-icon name="chevron-down-outline" class="chevron-icon"></ion-icon>
                </a>
                <div class="dropdown absolute left-0 hidden text-gray-700 bg-white border border-gray-200 rounded-lg shadow-lg p-4 z-10 group-hover:block">
                    @foreach ($genres->take(5) as $genre)
                    <a href="#" class="block py-2 px-4 rounded-md hover:bg-[#ff007f] hover:text-white transition duration-200 ease-in-out">
                        {{$genre->name}}
                    </a>
                    @endforeach
                    <a href="#" class="block py-2 px-4 mt-2 text-center text-[#ff007f] font-semibold hover:text-white hover:bg-[#ff007f] rounded-md transition duration-200 ease-in-out">
                        View all →
                    </a>
                </div>
            </li>
            <li class="relative group">
                <a href="#" class="menu-item relative hover:text-[#ff007f] transition duration-300 ease-in-out">
                    EVENTS <ion-icon name="chevron-down-outline" class="chevron-icon"></ion-icon>
                </a>
                <div class="dropdown absolute left-0 hidden text-gray-700 bg-white border border-gray-200 rounded-lg shadow-lg p-4 z-10 group-hover:block">
                @foreach ($event_types->take(5) as $event_type)
                    <a href="#" class="block py-2 px-4 rounded-md hover:bg-[#ff007f] hover:text-white transition duration-200 ease-in-out">
                        {{$event_type->name}}
                    </a>
                    @endforeach
                    <a href="#" class="block py-2 px-4 mt-2 text-center text-[#ff007f] font-semibold hover:text-white hover:bg-[#ff007f] rounded-md transition duration-200 ease-in-out">
                        View all →
                    </a>
                </div>
            </li>
            <li class="relative group">
                <a href="#" class="menu-item relative hover:text-[#ff007f] transition duration-300 ease-in-out">
                    SPORTS <ion-icon name="chevron-down-outline" class="chevron-icon"></ion-icon>
                </a>
                <div class="dropdown absolute left-0 hidden bg-white border border-gray-300 p-2 z-10 group-hover:block">
                    <a href="#" class="block py-1 hover:text-[#ff007f]">Sport 1</a>
                    <a href="#" class="block py-1 hover:text-[#ff007f]">Sport 2</a>
                    <a href="#" class="block py-1 hover:text-[#ff007f]">Sport 3</a>
                </div>
            </li>
            <li>
                <a href="#" class="menu-item relative hover:text-[#ff007f] transition duration-300 ease-in-out">CONTACT</a>
            </li>
        </ul>
    </div>

    <div class="flex items-center space-x-4">
        <ion-icon name="search-outline" class="text-[#ffffff] text-xl"></ion-icon>
        <a href="#" class="btn bg-[#ff007f] relative inline-block px-4 py-2 text-white text-xs font-medium overflow-hidden rounded-lg z-10 transition-colors duration-700 ease-linear hover:text-[#ff007f]">
            GET TICKETS
        </a>
    </div>
</nav>