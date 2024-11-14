<div id="filter" class=" bg-gray-50 shadow-xl p-6 rounded-2xl">
    <h3 class="text-xl font-bold mb-5 text-gray-900">Filter</h3>

    <!-- Genres, Sport Types, or Event Types dynamically rendered -->
    <div class="space-y-6">
        @if(isset($genres))
        <div>
            <p class="font-semibold text-gray-700 mb-2">Genres</p>
            <div class="space-y-2" id="movies-filter" data-url="{{ route('movies.filter') }}">
                @foreach($genres as $genre)
                <label class="flex items-center p-2 rounded-lg hover:bg-gray-100 transition ease-in-out duration-200 cursor-pointer">
                    <div class="relative">
                        <input type="checkbox" name="genres[]" value="{{ $genre->id }}" class="filter-checkbox sr-only peer">
                        <div class="w-6 h-6 bg-gray-200 rounded-lg flex items-center justify-center peer-checked:bg-indigo-500 peer-checked:text-white transition-colors duration-200">
                            <svg class="w-4 h-4 opacity-0 peer-checked:opacity-100 transition-opacity duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                    <span class="ml-3 text-gray-800">{{ $genre->name }}</span>
                </label>
                @endforeach
            </div>
        </div>
        @elseif(isset($sportTypes))
        <div>
            <p class="font-semibold text-gray-700 mb-2">Sport Types</p>
            <div class="space-y-2">
                @foreach($sportTypes as $sportType)
                <label class="flex items-center p-2 rounded-lg hover:bg-gray-100 transition ease-in-out duration-200 cursor-pointer">
                    <div class="relative">
                        <input type="checkbox" name="sportTypes[]" value="{{ $sportType->id }}" class="filter-checkbox sr-only peer">
                        <div class="w-6 h-6 bg-gray-200 rounded-lg flex items-center justify-center peer-checked:bg-indigo-500 peer-checked:text-white transition-colors duration-200">
                            <svg class="w-4 h-4 opacity-0 peer-checked:opacity-100 transition-opacity duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                    <span class="ml-3 text-gray-800">{{ $sportType->name }}</span>
                </label>
                @endforeach
            </div>
        </div>
        @elseif(isset($event_types))
        <div>
            <p class="font-semibold text-gray-700 mb-2">Event Types</p>
            <div class="space-y-2">
                @foreach($event_types as $event_type)
                <label class="flex items-center p-2 rounded-lg hover:bg-gray-100 transition ease-in-out duration-200 cursor-pointer">
                    <div class="relative">
                        <input type="checkbox" name="event_types[]" value="{{ $event_type->id }}" class="filter-checkbox sr-only peer">
                        <div class="w-6 h-6 bg-gray-200 rounded-lg flex items-center justify-center peer-checked:bg-indigo-500 peer-checked:text-white transition-colors duration-200">
                            <svg class="w-4 h-4 opacity-0 peer-checked:opacity-100 transition-opacity duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                    <span class="ml-3 text-gray-800">{{ $event_type->name }}</span>
                </label>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>