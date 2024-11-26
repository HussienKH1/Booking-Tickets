@foreach ($users as $user)
    <tr>
    <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
    <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
    <td class="px-6 py-4 whitespace-nowrap">{{ $user->created_at ? $user->created_at->format('Y-m-d') : 'N/A' }}</td>
    <td class="px-6 py-4 whitespace-nowrap">
        <button
            class="px-3 py-1 text-sm text-white bg-red-500 rounded-md delete-button"
            data-id="{{ $user->id }}">
            Delete
        </button>
    </td>
    </tr>
@endforeach