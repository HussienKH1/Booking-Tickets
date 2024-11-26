<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/navbar.css')}}">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Events</title>

</head>

<body>
    <header>
        @include('navbar')
    </header>
    <div class="w-full mb-6 mt-6 flex justify-center">
        <div class="relative w-2/3 md:w-1/2 lg:w-1/3" data-url="{{ route('events.search') }}" id="events-search">
            <input type="text" id="event-search" placeholder="Search..." class="w-full px-5 py-3 rounded-full shadow-md border border-gray-300 focus:outline-none focus:shadow-lg focus:border-gray-400 transition duration-200 text-gray-800 placeholder-gray-500">
            <div class="absolute inset-y-0 right-5 flex items-center">
                <a href="#" class="text-gray-500 hover:text-indigo-600 transition duration-200">
                    <ion-icon name="search-outline" class="text-2xl"></ion-icon>
                </a>
            </div>
        </div>
    </div>

    <section class="flex flex-row gap-6 px-6">
        <div id="events-filter" data-url="{{ route('filter.events') }}">
            @include('filter', ['event_types' => $event_types, 'genres' => null, 'sportTypes' => null])
        </div>
        <div class="container mx-auto" id="events-list">
            @include('partials.events_list', ['events' => $events])
        </div>

    </section>
    <footer>
        @include('footer')
    </footer>
    <script >
        $(document).ready(function() {
    let filterUrl = $('#events-filter').data('url');

    $('.filter-checkbox').on('change', function() {
        let selectedEventTypes = [];

        $('.filter-checkbox:checked').each(function() {
            selectedEventTypes.push($(this).val());
        });

        $.ajax({
            url: filterUrl,
            type: 'GET',
            data: {
                event_types: selectedEventTypes
            },
            success: function(response) {
                $('#events-list').html(response);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });
});

$(document).ready(function() {
    let searchUrl = $('#events-search').data('url');

    $('#event-search').on('keyup', function() {
        let searchTerm = $(this).val();

        $.ajax({
            url: searchUrl,
            type: 'GET',
            data: {
                query: searchTerm
            },
            success: function(response) {
                $('#events-list').html(response);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });
});
    </script>
</body>

</html>