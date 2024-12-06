<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Movies</title>
</head>

<body>
    
    <div class="max-w-4xl mx-auto mt-6 p-6 bg-white border border-gray-300 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Add New Movie</h2>

        <!-- Form to add movie -->
        <form action="{{ isset($movie) ? route('movies.update', $movie->id) : route('movies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Movie Title -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-600">Movie Title</label>
                <input type="text" value="{{ old('title', $movie->title ?? '') }}" id="title" name="title" class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>
            </div>

            <!-- Movie Genre -->
            <div class="mb-4">
                <label for="genre" class="block text-sm font-medium text-gray-600">Genre</label>
                <select
                    id="genreSelect"
                    name="event[]"
                    multiple
                    class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                    @foreach ($genres as $genre)
                    <option
                        value="{{ $genre->id }}"
                        {{ isset($movie) && $movie->genres->contains($genre->id) ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                    @endforeach
                </select>
                <p class="text-sm text-gray-500 mt-1">Hold down the Ctrl (Windows) or Command (Mac) key to select multiple genres.</p>
            </div>


            @if (!isset($movie))
            <div class="mb-4">
                <label for="release_date" class="block text-sm font-medium text-gray-600">Release Date</label>
                <input type="date" id="release_date" name="release_date" class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>
            </div>
            @endif

            <!-- Rating -->
            <div class="mb-4">
                <label for="rating" class="block text-sm font-medium text-gray-600">Rating</label>
                <input type="number" step="0.1" id="rating" name="rating" class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" value="{{old ('rating', $movie->rating ?? '')}}" required>
            </div>

            <!-- Runtime -->
            <div class="mb-4">
                <label for="runtime" class="block text-sm font-medium text-gray-600">Runtime (minutes)</label>
                <input type="number" id="runtime" name="runtime" class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" value="{{old ('runtime', $movie -> runtime ?? '')}}" required>
            </div>

            <!-- Director -->
            <div class="mb-4">
                <label for="director" class="block text-sm font-medium text-gray-600">Director</label>
                <input type="text" id="director" name="director" class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" value="{{ old ('director', $movie -> director ?? '')}}" required>
            </div>

            <!-- Cast -->
            <div class="mb-4">
                <label for="cast" class="block text-sm font-medium text-gray-600">Cast</label>
                <input type="text" id="cast" name="cast" class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" value="{{ old ('cast', $movie -> cast ?? '')}}" required>
            </div>

            <!-- Synopsis -->
            <div class="mb-4">
                <label for="synopsis" class="block text-sm font-medium text-gray-600">Synopsis</label>
                <textarea id="synopsis" name="synopsis" rows="4" class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>{{ old('synopsis', $movie->synopsis ?? '') }}</textarea>
            </div>


            <!-- Language -->
            <div class="mb-4">
                <label for="language" class="block text-sm font-medium text-gray-600">Language</label>
                <input type="text" id="language" name="language" class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" value="{{ old ('language', $movie -> language ?? '')}}" required>
            </div>

            <!-- Country -->
            <div class="mb-4">
                <label for="country" class="block text-sm font-medium text-gray-600">Country</label>
                <input
                    type="text"
                    id="country"
                    name="country"
                    class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300"
                    value="{{ old('country', $movie->country ?? '') }}"
                    required>
            </div>


            <!-- Poster URL -->
            <div class="mb-4">
                <label for="poster_url" class="block text-sm font-medium text-gray-600">Poster URL</label>
                <input
                    type="text"
                    id="poster_url"
                    name="poster_url"
                    class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300"
                    value="{{ old('poster_url', $movie->poster_url ?? '') }}">
            </div>


            <!-- Trailer URL -->
            <div class="mb-4">
                <label for="trailer_url" class="block text-sm font-medium text-gray-600">Trailer URL</label>
                <input
                    type="text"
                    id="trailer_url"
                    name="trailer_url"
                    class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300"
                    value="{{ old('trailer_url', $movie->trailer_url ?? '') }}">
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
                        {{ old('availability_status', $movie->availability_status ?? false) ? 'checked' : '' }}>
                    <span class="ml-2">Available</span>
                </label>
            </div>


            <!-- Screening Times -->
            <div class="mb-4">
                <label for="screening_times" class="block text-sm font-medium text-gray-600">Screening Times (comma-separated)</label>
                <input
                    type="text"
                    id="screening_times"
                    name="screening_times"
                    class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="e.g., 18:00, 20:00, 22:00"
                    value="{{ old('screening_times', isset($movie) && $movie->screening_times ? implode(', ', json_decode($movie->screening_times)) : '') }}">
            </div>

            <script>
                document.querySelector('form').addEventListener('submit', function(e) {
                    const screeningInput = document.querySelector('#screening_times');
                    const timesArray = screeningInput.value.split(',').map(time => time.trim());
                    screeningInput.value = JSON.stringify(timesArray);
                });
            </script>

            <!-- Ticket Price -->
            <div class="mb-6">
                <label for="ticket_price" class="block text-sm font-medium text-gray-600">Ticket Price</label>
                <input
                    type="number"
                    step="0.01"
                    id="ticket_price"
                    name="ticket_price"
                    class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300"
                    value="{{ old('ticket_price', $movie->ticket_price ?? '') }}"
                    required>
            </div>


            <!-- Submit Button -->
            <div class="flex justify-end space-x-4">
                @if (!isset($movie))
                <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300">
                    Add Movie
                </button>
                @else
                <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300">
                    Update
                </button>
                @endif
                <a href="{{ route ('admin.movies')}}" class="px-6 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300">
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