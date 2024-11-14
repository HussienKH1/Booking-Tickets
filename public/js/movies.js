function applyHoverEffects() {
    document.querySelectorAll('.movie-card').forEach(card => {
        card.addEventListener('mouseenter', () => {
            const details = card.querySelector('.details');
            const title = card.querySelector('.movie-title');
            const genre = card.querySelector('.movie-genre');
            const synopsis = card.querySelector('.movie-synopsis');
            const rating = card.querySelector('.movie-rating');

            title.textContent = card.getAttribute('data-title');
            genre.textContent = `${card.getAttribute('data-genre')} | ${card.getAttribute('data-release')}`;
            synopsis.textContent = card.getAttribute('data-synopsis');
            rating.textContent = `Rating: ${card.getAttribute('data-rating')}`;

            details.classList.remove('opacity-0', 'translate-y-full');
            details.classList.add('opacity-100', 'translate-y-0');
        });

        card.addEventListener('mouseleave', () => {
            const details = card.querySelector('.details');
            details.classList.remove('opacity-100', 'translate-y-0');
            details.classList.add('opacity-0', 'translate-y-full');
        });
    });
}

applyHoverEffects();

$(document).ready(function() {
    let filterUrl = $('#movies-filter').data('url');

    $('.filter-checkbox').on('change', function() {
        let selectedGenres = [];
    
        $('.filter-checkbox:checked').each(function() {
            selectedGenres.push($(this).val());
        });

        $.ajax({
            url: filterUrl,
            type: 'GET',
            data: {
                genres: selectedGenres
            },
            success: function(response) {
                $('#movies-list').html(response);
                applyHoverEffects();
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });
});

$(document).ready(function() {
    let searchUrl = $('#movies-search').data('url');

    $('#movie-search').on('keyup', function() {
        let searchTerm = $(this).val();

        $.ajax({
            url: searchUrl,
            type: 'GET',
            data: {
                query: searchTerm
            },
            success: function(response) {
                $('#movies-list').html(response);

                applyHoverEffects();
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });
});
