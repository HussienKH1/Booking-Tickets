$(document).ready(function () {
    $(document).on('click', '.delete-button', function () {
        const userId = $(this).data('id'); 
        const deleteUrl = `/user/${userId}/delete`;  
        if (confirm('Are you sure you want to delete this user?')) {
            $.ajax({
                url: deleteUrl, 
                type: 'DELETE', 
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    alert(response.message); 
                    $(`#user-row-${userId}`).remove(); 
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                    alert('Failed to delete the user. Please try again later.');
                }
            });
        }
    });
});
