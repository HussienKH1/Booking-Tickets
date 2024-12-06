<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Events</title>
</head>

<body>
    
    <div class="max-w-4xl mx-auto mt-6 p-6 bg-white border border-gray-300 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Add New Event</h2>

        <form action="{{isset($event) ? route('events.update', $event->id) : route('events.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-600">Event Title</label>
                <input type="text" value="{{ old('title', $event->title ?? '') }}" id="title" name="title" class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>
            </div>
            <div class="mb-4">
                <label for="event_type" class="block text-sm font-medium text-gray-600">Event Type</label>
                <select
                    id="event_type"
                    name="event_type"
                    class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300"
                    required>
                    <option value="" disabled selected>Select Event Type</option>
                    @foreach ($event_types as $event_type)
                    <option
                        value="{{ $event_type->name }}"
                        {{ old('event_type', $event->event_type ?? '') === $event_type->name ? 'selected' : '' }}>
                        {{ $event_type->name }}
                    </option>
                    @endforeach
                </select>
                <p class="text-sm text-gray-500 mt-1">Choose one event type.</p>
            </div>
            @if (!isset($event))
            <div class="mb-4">
                <label for="event_date" class="block text-sm font-medium text-gray-600">Event Date</label>
                <input type="date" id="event_date" name="event_date" class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" value="{{ old('event_date', $event->event_date ?? '') }}">
            </div>
            @endif
            <div class="mb-4">
                <label for="event_time" class="block text-sm font-medium text-gray-600">Event Time</label>
                <input type="time" id="event_time" name="event_time" class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300"  value="{{ old('event_time', isset($event->event_time) ? date('H:i', strtotime($event->event_time)) : '') }}">
            </div>
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-600">Location</label>
                <input type="text" id="location" name="location" class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" value="{{ old('location', $event->location ?? '') }}">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
                <textarea id="description" name="description" rows="4" class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">{{ old('description', $event->description ?? '') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="ticket_price" class="block text-sm font-medium text-gray-600">Ticket Price (in dollars)</label>
                <input type="number" step="0.01" id="ticket_price" name="ticket_price" class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" value="{{ old('ticket_price', $event->ticket_price ?? '') }}">
            </div>
            <div class="mb-4">
                <label for="poster_url" class="block text-sm font-medium text-gray-600">Poster URL</label>
                <input type="text" id="poster_url" name="poster_url" class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" value="{{ old('poster_url', $event->poster_url ?? '') }}">
            </div>
            <div class="mb-4">
                <input type="hidden" name="availability_status" value="0">
                <label for="availability_status" class="inline-flex items-center text-sm font-medium text-gray-600">
                    <input type="checkbox" id="availability_status" name="availability_status" value="1" class="form-checkbox text-blue-500 rounded-md" {{ old('availability_status', $event->availability_status ?? true) ? 'checked' : '' }}>
                    <span class="ml-2">Available</span>
                </label>
            </div>

            <div class="flex justify-end space-x-4">
                @if (!isset($event))
                <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300">
                    Add Event
                </button>
                @else
                <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300">
                    Update Event
                </button>
                @endif
                <a href="{{ route('admin.events') }}" class="px-6 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300">
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