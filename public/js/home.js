var swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    effect: "fade",
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    on: {
        slideChangeTransitionStart: function () {
            // Add slide-down animation to outgoing slide text
            document.querySelectorAll('.swiper-slide-active .slide-text').forEach(element => {
                element.classList.remove('slide-up');
                element.classList.add('slide-down');
            });
        },
        slideChangeTransitionEnd: function () {
            // Add slide-up animation to incoming slide text
            document.querySelectorAll('.swiper-slide-active .slide-text').forEach(element => {
                element.classList.remove('slide-down');
                element.classList.add('slide-up');
            });
        }
    }
});

window.addEventListener('load', function () {
    const firstSlideText = document.querySelectorAll('.swiper-slide:first-child .slide-text');
    firstSlideText.forEach(element => {
        element.classList.add('slide-up');
    });
});


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

document.addEventListener('DOMContentLoaded', () => {
    const sections = document.querySelectorAll('#movies, #events');

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.remove('opacity-0', 'translate-y-4');
                entry.target.classList.add('opacity-100', 'translate-y-0');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.2
    });

    sections.forEach(section => {
        observer.observe(section);
    });
});
