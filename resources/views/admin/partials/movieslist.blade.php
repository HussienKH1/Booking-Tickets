@foreach ($movies as $movie)
<tr>
    <td class="px-6 py-4 whitespace-nowrap">{{ $movie->title }}</td>
    <td class="px-6 py-4 whitespace-nowrap">{{ $movie->genres->pluck('name')->join(', ') }}</td>
    <td class="px-6 py-4 whitespace-nowrap">{{ $movie->release_date ? $movie->release_date->format('Y-m-d') : 'N/A' }}</td>
    <td class="px-6 py-4 whitespace-nowrap">{{ $movie->rating ?? 'N/A' }}</td>
    <td class="px-6 py-4 whitespace-nowrap">{{ $movie->director ?? 'N/A' }}</td>
    <td class="px-6 py-4 whitespace-nowrap">{{ $movie->language ?? 'N/A' }}</td>
    <td class="px-6 py-4 whitespace-nowrap">{{ $movie->country ?? 'N/A' }}</td>
    <td class="px-6 py-4 whitespace-nowrap">{{ $movie->ticket_price ? '$' . number_format($movie->ticket_price, 2) : 'N/A' }}</td>
    <td class="px-6 py-4 whitespace-nowrap flex justify-center">
        <input type="checkbox" {{ $movie->availability_status ? 'checked' : '' }} disabled>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <a href="{{ route('editmovies', ['id' => $movie->id]) }}"
        class="px-3 py-1 text-sm text-white bg-blue-500 rounded-md mr-1">
            Edit
        </a>
        <button
            class="delete-movie-button px-3 py-1 text-sm text-white bg-red-500 rounded-md"
            data-id="{{ $movie->id }}">
            Delete
        </button>
    </td>
</tr>
@endforeach