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