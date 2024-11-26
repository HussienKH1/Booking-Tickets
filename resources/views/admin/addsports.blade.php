<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Sports</title>
</head>

<body>
    <div class="max-w-4xl mx-auto mt-6 p-6 bg-white border border-gray-300 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Add New Sport</h2>

        <form action="{{isset($event) ? route('sports.update', $event->id) : route('sports.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-600">Event Title</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $event->title ?? '') }}"
                    class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300"
                    required>
            </div>

            <!-- Sport Type -->
            <div class="mb-4">
                <label for="sport_type" class="block text-sm font-medium text-gray-600">Sport Type</label>
                <select
                    id="sport_type"
                    name="sport_type"
                    class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300"
                    required>
                    <option value="" disabled selected>Select Sport Type</option>
                    @foreach ($sportTypes as $type)
                    <option
                        value="{{ $type->name }}"
                        {{ old('sport_type', $event->sport_type ?? '') == $type->name ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <!-- Event Date -->
            @if (!isset($sport))
            <div class="mb-4">
                <label for="event_date" class="block text-sm font-medium text-gray-600">Event Date</label>
                <input
                    type="date"
                    id="event_date"
                    name="event_date"
                    value="{{ old('event_date', $event->event_date ?? '') }}"
                    class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>
            @endif

            @if (!isset($event))
            <!-- Event Time -->
            <div class="mb-4">
                <label for="event_time" class="block text-sm font-medium text-gray-600">Event Time</label>
                <input
                    type="time"
                    id="event_time"
                    name="event_time"
                    value="{{ old('event_time', isset($event->event_time) ? date('H:i', strtotime($event->event_time)) : '') }}"
                    class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>
            @endif


            <!-- Team A -->
            <div class="mb-4">
                <label for="team_a" class="block text-sm font-medium text-gray-600">Team A</label>
                <input
                    type="text"
                    id="team_a"
                    name="team_a"
                    value="{{ old('team_a', $event->team_a ?? '') }}"
                    class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <!-- Team B -->
            <div class="mb-4">
                <label for="team_b" class="block text-sm font-medium text-gray-600">Team B</label>
                <input
                    type="text"
                    id="team_b"
                    name="team_b"
                    value="{{ old('team_b', $event->team_b ?? '') }}"
                    class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <!-- Location -->
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-600">Location</label>
                <input
                    type="text"
                    id="location"
                    name="location"
                    value="{{ old('location', $event->location ?? '') }}"
                    class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <!-- Ticket Price -->
            <div class="mb-4">
                <label for="ticket_price" class="block text-sm font-medium text-gray-600">Ticket Price</label>
                <input
                    type="number"
                    step="0.01"
                    id="ticket_price"
                    name="ticket_price"
                    value="{{ old('ticket_price', $event->ticket_price ?? '') }}"
                    class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <!-- Poster URL -->
            <div class="mb-4">
                <label for="poster_url" class="block text-sm font-medium text-gray-600">Poster URL</label>
                <input
                    type="url"
                    id="poster_url"
                    name="poster_url"
                    value="{{ old('poster_url', $event->poster_url ?? '') }}"
                    class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <!-- Availability Status -->
            <div class="mb-4">
                <input type="hidden" name="availability_status" value="0">
                <label for="availability_status" class="inline-flex items-center text-sm font-medium text-gray-600">
                    <input
                        type="checkbox"
                        id="availability_status"
                        name="availability_status"
                        value="1"
                        class="form-checkbox text-blue-500 rounded-md"
                        {{ old('availability_status', $event->availability_status ?? true) ? 'checked' : '' }}>
                    <span class="ml-2">Available</span>
                </label>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end space-x-4">
                @if (!isset($event))
                <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300">
                    Add Sports Event
                </button>
                @else
                <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300">
                    Update
                </button>
                @endif
                <a href="{{ route('admin.sports') }}" class="px-6 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300">
                    Exit
                </a>
            </div>
        </form>


    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</body>

</html>