$(document).ready(function () {
    let filterUrl = $('#movies-filter').data('url');

    $('#filterButton').click(function () {
        const filterValue = $('#filterSelect').val();
        const genreValue = $('#genreSelect').val();

        $.ajax({
            url: filterUrl,
            method: "GET",
            data: {
                filter: filterValue,
                genre: genreValue   
            },
            success: function (response) {
                $('#movieTableBody').html(response);
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
                console.error(`Error: ${error}`);
                alert("Failed to filter movies. Please try again.");
            }
        });
    });
});

$(document).ready(function () {
    const searchUrl = $('#movies-search').data('url');
    $('#searchInput').on('input', function () {
        const query = $(this).val();
        $.ajax({
            url: searchUrl,
            method: "GET",
            data: { query: query }, 
            success: function (response) {
                $('#movieTableBody').html(response);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                alert("Failed to search movies. Please try again.");
            }
        });
    });
});

$(document).ready(function () {
    $(document).on('click', '.delete-movie-button', function () {
        const movieId = $(this).data('id');
        const deleteUrl = `/admin/movies/${movieId}`;

        if (confirm('Are you sure you want to delete this movie?')) {
            $.ajax({
                url: deleteUrl,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    alert(response.message);
                    $(`#movie-row-${movieId}`).remove();
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    console.error('Error:', error);
                    alert('Failed to delete the movie.');
                }
            });
        }
    });
});
