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
          const currentSlide = this.slides[this.activeIndex];
          const previousSlide = this.slides[this.previousIndex];

          const currentTexts = currentSlide.querySelectorAll('.slide-text');
          const previousTexts = previousSlide.querySelectorAll('.slide-text');

          previousTexts.forEach((text) => {
              text.classList.add('translate-y-full', 'opacity-0');
          });

          currentTexts.forEach((text) => {
              text.classList.remove('translate-y-full', 'opacity-0');
              text.classList.add('translate-y-0', 'opacity-100');
          });
      },
        slideChangeTransitionEnd: function () {
          const currentSlide = this.slides[this.activeIndex];

          const currentTexts = currentSlide.querySelectorAll('.slide-text');

          currentTexts.forEach((text) => {
              text.classList.remove('translate-y-full', 'opacity-0');
          });
      }
  }
});


document.querySelectorAll('.movie-card').forEach(card => {
    card.addEventListener('mouseenter', () => {
        const details = card.querySelector('.details');
        const title = card.querySelector('.movie-title');
        const genre = card.querySelector('.movie-genre');
        const synopsis = card.querySelector('.movie-synopsis');
        const rating = card.querySelector('.movie-rating');

        // Update the details with the corresponding movie data
        title.textContent = card.getAttribute('data-title');
        genre.textContent = `${card.getAttribute('data-genre')} | ${card.getAttribute('data-release')}`;
        synopsis.textContent = card.getAttribute('data-synopsis');
        rating.textContent = `Rating: ${card.getAttribute('data-rating')}`;

        // Trigger the slide-up animation
        details.classList.remove('opacity-0', 'translate-y-full');
        details.classList.add('opacity-100', 'translate-y-0');
    });

    card.addEventListener('mouseleave', () => {
        const details = card.querySelector('.details');
        // Reset the slide-down animation
        details.classList.remove('opacity-100', 'translate-y-0');
        details.classList.add('opacity-0', 'translate-y-full');
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const sections = document.querySelectorAll('#movies');

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.remove('opacity-0', 'translate-y-4'); // Remove the hidden state
                entry.target.classList.add('opacity-100', 'translate-y-0'); // Add visible state
                observer.unobserve(entry.target); // Stop observing once visible
            }
        });
    }, {
        threshold: 0.2 // Adjust this value as needed
    });

    sections.forEach(section => {
        observer.observe(section); // Start observing each section
    });
});
