<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Events</title>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex h-screen overflow-hidden">
        @include('admin.navbar')
        <div class="flex flex-col flex-1 w-full">
            <header class="flex items-center justify-between h-16 bg-white border-b px-6">
                <div>
                    <h2 class="text-lg font-medium">Events</h2>
                </div>
                <div>
                    <form method="POST" action="{{ route('logout') }}" class="logout-form">
                        @csrf
                        <button type="submit" class="px-3 py-1 text-sm text-white bg-[#ff007f] rounded-md hover:bg-[#ff007f] hover:text-white">
                            Logout
                        </button>

                    </form>
                </div>
            </header>
            <main class="flex-1 p-6 bg-gray-100 overflow-y-auto">
                <div class="mb-6 flex items-center justify-between">
                    <div class="flex items-center space-x-2" id="#events-search" data-url="{{route('adminevents.search')}}">
                        <input
                            type="text"
                            placeholder="Search Events..."
                            class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300"
                            id="searchInput">
                    </div>
                    <div class="flex items-center space-x-2" data-url="{{route('adminevents.filter')}}" id="types-filter">
                        <select
                            class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300"
                            id="typeSelect">
                            <option value="all">All Events</option>
                            @foreach ($event_types as $event_type)
                            <option value="{{ $event_type->id }}">{{ $event_type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-center space-x-2" data-url="{{route('adminevents.filter')}}" id="events-filter">
                        <select
                            class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300"
                            id="filterSelect">
                            <option value="all">All Events</option>
                            <option value="available">Available</option>
                            <option value="unavailable">Unavailable</option>
                            <option value="decNaming">Title: A to Z</option>
                            <option value="incNaming">Title: Z to A</option>
                            <option value="decPrice">Price: High to Low</option>
                            <option value="incPrice">Price: Low to High</option>
                        </select>
                        <button
                            id="filterButton"
                            class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300">
                            Filter
                        </button>
                    </div>
                    <div>
                        <a
                            href="{{route('events.create')}}"
                            class="px-4 py-2 bg-purple-500 text-white rounded-md hover:bg-purple-600 focus:outline-none focus:ring focus:ring-purple-300">
                            + Add Event
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                    <table class="min-w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Event Type</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Event Date</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Event Time</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Location</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Ticket Price</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Poster</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Availability</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>

                        </thead>
                        <tbody id="eventTableBody">
                            @include('admin.partials.eventslist')
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <script src="{{asset('js/adminevents.js')}}"></script>
</body>

</html>