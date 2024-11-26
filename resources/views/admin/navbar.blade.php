<aside class="w-64 bg-gray-800 text-white">
    <div class="flex items-center justify-center h-16 bg-gray-900">
        <h1 class="text-xl font-bold">Admin Panel</h1>
    </div>
    <nav class="mt-6">
        <a href="{{route ('admin.page')}}" class="block px-6 py-3 text-sm font-medium hover:bg-gray-700 hover:text-gray-100">
            <span class="material-icons align-middle mr-2">Dashboard</span>
        </a>
        <a href="{{ route ('admin.movies')}}" class="block px-6 py-3 text-sm font-medium hover:bg-gray-700 hover:text-gray-100">
                    Movies
                </a>
                <a href="{{ route ('admin.events')}}" class="block px-6 py-3 text-sm font-medium hover:bg-gray-700 hover:text-gray-100">
                    Events
                </a>
                <a href="{{route ('admin.sports')}}" class="block px-6 py-3 text-sm font-medium hover:bg-gray-700 hover:text-gray-100">
                    Sports
                </a>
                <a href="{{route('admin.users')}}" class="block px-6 py-3 text-sm font-medium hover:bg-gray-700 hover:text-gray-100">
                    Users
                </a>
            </nav>
</aside>