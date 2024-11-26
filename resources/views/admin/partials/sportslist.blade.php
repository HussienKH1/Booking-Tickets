@foreach ($events as $event)
<tr>
    <td class="px-6 py-4 whitespace-nowrap">{{ $event->title }}</td>
    <td class="px-6 py-4 whitespace-nowrap">{{ $event->sport_type }}</td>
    <td class="px-6 py-4 whitespace-nowrap">{{ $event->event_date ? $event->event_date->format('Y-m-d') : 'N/A' }}</td>
    <td class="px-6 py-4 whitespace-nowrap">{{ $event->event_time ?? 'N/A' }}</td>
    <td class="px-6 py-4 whitespace-nowrap">{{ $event->team_a ?? 'N/A' }}</td>
    <td class="px-6 py-4 whitespace-nowrap">{{ $event->team_b ?? 'N/A' }}</td>
    <td class="px-6 py-4 whitespace-nowrap">{{ $event->location ?? 'N/A' }}</td>
    <td class="px-6 py-4 whitespace-nowrap">
        {{ $event->ticket_price ? '$' . number_format($event->ticket_price, 2) : 'Free' }}
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        @if ($event->poster_url)
        <a href="{{ $event->poster_url }}" target="_blank" class="text-blue-500 underline">View Poster</a>
        @else
        N/A
        @endif
    </td>
    <td class="px-6 py-4 whitespace-nowrap flex justify-center">
        <input type="checkbox" {{ $event->availability_status ? 'checked' : '' }} disabled>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
    <a href="{{ route('sportedit', ['id' => $event->id]) }}"
        class="px-3 py-1 text-sm text-white bg-blue-500 rounded-md mr-1">
            Edit
        </a>
        <button
            class="px-3 py-1 text-sm text-white bg-red-500 rounded-md delete-button"
            data-id="{{ $event->id }}">
            Delete
        </button>
    </td>
</tr>
@endforeach
