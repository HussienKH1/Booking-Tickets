window.addEventListener("scroll", () => {
    const navbar = document.querySelector("nav");

    if (window.scrollY > 50) {
        navbar.classList.remove("bg-transparent")
        navbar.classList.remove("py-8")
        navbar.classList.add("bg-[#0b0b22]");
        navbar.classList.add("py-4")
    } else {
        navbar.classList.remove("bg-[#0b0b22]");
        navbar.classList.remove("py-4")
        navbar.classList.add("bg-transparent");
        navbar.classList.add("py-8")

    }
});


document.querySelectorAll("nav a").forEach(link => {
    link.addEventListener("click", function () {
        document.querySelectorAll("nav a").forEach(item => item.classList.remove("active"));
        this.classList.add("active");
    });
});


document.querySelectorAll('.menu-item').forEach(item => {
    const dropdown = item.nextElementSibling;
    const icon = item.querySelector('.chevron-icon');

    if (!dropdown || !icon) return;


    item.addEventListener('mouseenter', function () {
        dropdown.classList.remove('hidden'); 
        icon.classList.add('drop');
    });

    item.addEventListener('mouseleave', function () {
        dropdown.classList.add('hidden');
        icon.classList.remove('drop');
    });


    dropdown.addEventListener('mouseenter', function () {
        dropdown.classList.remove('hidden'); 
        icon.classList.add('drop');
    });


    dropdown.addEventListener('mouseleave', function () {
        dropdown.classList.add('hidden');
        icon.classList.remove('drop'); 
    });
});



  
  

