<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Admin Dashboard</title>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex h-screen overflow-hidden">
        @include('admin.navbar')
        <div class="flex flex-col flex-1 w-full">
            <header class="flex items-center justify-between h-16 bg-white border-b px-6">
                <div>
                    <h2 class="text-lg font-medium">Dashboard</h2>
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
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Movies</p>
                                <p class="text-xl font-bold text-gray-900">{{ $moviesCount }}</p>
                            </div>
                            <div class="p-2 bg-blue-100 rounded-full">
                                <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M5 3v18l7-6 7 6V3H5z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Events</p>
                                <p class="text-xl font-bold text-gray-900">{{ $eventsCount }}</p>
                            </div>
                            <div class="p-2 bg-green-100 rounded-full">
                                <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M10 9h4v4h-4V9zM5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Sports</p>
                                <p class="text-xl font-bold text-gray-900">{{ $sportsCount }}</p>
                            </div>
                            <div class="p-2 bg-red-100 rounded-full">
                                <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M5 3v18l7-6 7 6V3H5z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Users</p>
                                <p class="text-xl font-bold text-gray-900">{{ $UsersCount }}</p>
                            </div>
                            <div class="p-2 bg-yellow-100 rounded-full">
                                <svg class="w-6 h-6 text-yellow-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 7a4 4 0 110-8 4 4 0 010 8zm-4.688 7.44A6.969 6.969 0 015 17a6.969 6.969 0 013.812-2.56c.64-2.03 2.47-3.44 4.813-3.44s4.172 1.41 4.812 3.44A6.969 6.969 0 0119 17a6.969 6.969 0 01-3.812-2.56"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <p class="text-sm font-medium text-gray-500">Most Booked Movie</p>
                        <p class="text-xl font-bold text-gray-900">{{ $mostBookedMovie->title}}</p>
                        <p class="text-sm text-gray-600">Bookings: {{ $mostBookedMovie->booked }}</p>
                    </div>
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <p class="text-sm font-medium text-gray-500">Most Booked Event</p>
                        <p class="text-xl font-bold text-gray-900">{{ $mostBookedEvent->title}}</p>
                        <p class="text-sm text-gray-600">Bookings: {{ $mostBookedEvent->booked  }}</p>
                    </div>
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <p class="text-sm font-medium text-gray-500">Most Booked Sport</p>
                        <p class="text-xl font-bold text-gray-900">{{ $mostBookedSport->title }}</p>
                        <p class="text-sm text-gray-600">Bookings: {{ $mostBookedSport->booked }}</p>
                    </div>
                </div>

                <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                    <table class="min-w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Date Created</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->created_at->format('Y-m-d') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button class="px-3 py-1 text-sm text-white bg-blue-500 rounded-md">Edit</button>
                                    <button class="px-3 py-1 text-sm text-white bg-red-500 rounded-md">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </main>
        </div>
    </div>
</body>

</html>