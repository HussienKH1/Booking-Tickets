$(document).ready(function() {
    let filterUrl = $('#sports-filter').data('url');

    $('.filter-checkbox').on('change', function() {
        let selectedSportTypes = [];

        $('.filter-checkbox:checked').each(function() {
            selectedSportTypes.push($(this).val());
        });
        console.log('Hello', selectedSportTypes)
        $.ajax({
            url: filterUrl,
            type: 'GET',
            data: {
                sporttypes: selectedSportTypes
            },
            success: function(response) {
                $('#sports-list').html(response);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });
});

$(document).ready(function() {
    let searchUrl = $('#sports-search').data('url');

    $('#sport-search').on('keyup', function() {
        let searchTerm = $(this).val();

        $.ajax({
            url: searchUrl,
            type: 'GET',
            data: {
                query: searchTerm
            },
            success: function(response) {
                $('#sports-list').html(response);

                applyHoverEffects();
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });
});
