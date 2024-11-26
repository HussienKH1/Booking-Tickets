$(document).ready(function () {
    // Get the URL for AJAX from the data attribute of the filter container
    let filterUrl = $('#types-filter').data('url');

    // Function to fetch the filtered events
    function fetchFilteredEvents() {
        // Get the selected values from the dropdowns
        const typeSelect = $('#typeSelect').val();
        const filterSelect = $('#filterSelect').val();

        // Send AJAX request with the filter values
        $.ajax({
            url: filterUrl, // The URL for the filtering action
            type: "GET",
            data: {
                type: typeSelect,  // Event type (all or specific type)
                filter: filterSelect // Additional filter like availability, name, price
            },
            success: function (response) {
                // Update the table with the filtered response
                $('#eventTableBody').html(response);
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
                console.error('Error:', error);
            }
        });
    }

    // Trigger the AJAX request when the filter button is clicked
    $('#filterButton').click(function () {
        fetchFilteredEvents();
    });

    // Trigger the AJAX request when a dropdown value changes
    $('#typeSelect').change(function () {
        fetchFilteredEvents();
    });

    $('#filterSelect').change(function () {
        fetchFilteredEvents();
    });
});

$(document).ready(function () {
    $(document).on('click', '.delete-button', function () {
        const sportId = $(this).data('id');
        const deleteUrl = `/admin/sports/${sportId}/delete`;

        if (confirm('Are you sure you want to delete this sport?')) {
            $.ajax({
                url: deleteUrl,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    alert(response.message);
                    $(`#sport-row-${sportId}`).remove();
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                    alert('Failed to delete the sport.');
                }
            });
        }
    });
});
