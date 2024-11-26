$(document).ready(function () {
    $('#filterButton').on('click', function () {
        const filterValue = $('#filterSelect').val();
        const url = $('#Users-filter').data('url');
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: url,
            method: "GET",
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
            data: {
                filter: filterValue,
            },
            success: function (response) {
                if (response.success) {
                    $('#userTableBody').html(response);
                } else {
                    alert('Failed to load users.');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', xhr.responseText);
                alert('An error occurred while filtering users.');
            },
        });
    });
});
