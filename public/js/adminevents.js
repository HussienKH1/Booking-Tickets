$(document).ready(function () {
    let filterUrl = $('#events-filter').data('url');

    $('#filterButton').click(function () {
        const typeSelect = $('#typeSelect').val();
        const filterSelect = $('#filterSelect').val();

        $.ajax({
            url: filterUrl,
            type: "GET",
            data: {
                typeSelect: typeSelect,
                filterSelect: filterSelect
            },
            success: function (response) {
                $('#eventTableBody').html(response);
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
                console.error('Error:', error);
            }
        });
    });
});

$(document).ready(function () {
    let searchUrl = $('#events-search').data('url'); // Get the URL for the search

    $('#searchInput').on('input', function () {
        const searchQuery = $(this).val();

        $.ajax({
            url: searchUrl,
            type: 'GET',
            data: {
                search: searchQuery // Send the search query to the server
            },
            success: function (response) {
                // Update the table body with the filtered events
                $('#eventTableBody').html(response);
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
                alert('Failed to fetch the events.');
            }
        });
    });
});

$(document).ready(function () {
    $(document).on('click', '.delete-button', function () {
        const eventId = $(this).data('id');
        const deleteUrl = `/admin/events/${eventId}/delete`;

        if (confirm('Are you sure you want to delete this event?')) {
            $.ajax({
                url: deleteUrl,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    alert(response.message);
                    $(`#event-row-${eventId}`).remove();
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                    alert('Failed to delete the event.');
                }
            });
        }
    });
});

