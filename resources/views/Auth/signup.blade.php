<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/navbar.css')}}">
    <link rel="stylesheet" href="{{ asset('css/login.css')}}">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <title>Document</title>
</head>

<body>
    <header>
        @include('navbar')
    </header>

    <section class="signup-container relative h-screen">
        <div class="swiper-container absolute inset-0 z-0">
            <div class="swiper mySwiper w-full h-full">
                <div class="swiper-wrapper">
                    <div class="swiper-slide "><img src="{{asset('images/Party.jpg')}}" class="w-full h-full object-cover" /></div>
                    <div class="swiper-slide "><img src="{{asset('images/movies.jpg')}}" class="w-full h-full object-cover" /></div>
                    <div class="swiper-slide ">
                        <div class="relative w-full h-full">
                            <img src="{{asset('images/sport.jpg')}}" class="w-full h-full object-cover" />
                            <div class="absolute inset-0 bg-black opacity-50"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center items-center h-full z-10 relative">
            <div class="lform relative w-[25vw] h-[70vh] bg-transparent border-2 border-white/30 rounded-2xl backdrop-blur-lg shadow-[0_4px_15px_rgba(0,0,0,0.5)] flex justify-center items-center transition-height ease-in-out duration-200">
                <div class="signup-form w-full px-12">
                    <h2 class="text-3xl text-[#ff007f] text-center font-bold tracking-wide">Sign Up</h2>
                    <form method="POST" action="{{route ('signup')}}">
                        @csrf
                        <div class="input-box relative w-full h-[50px] border-b-2 border-white/20 my-[24px]">
                            <input
                                type="text"
                                name="name"
                                id="name"
                                required
                                class="peer w-full h-full bg-transparent border-none outline-none text-white text-base font-medium pl-2 pr-10 tracking-wide"
                                placeholder=" ">
                            <label
                                for="name"
                                class="absolute left-2 top-[-5px] text-sm text-[#ff007f] font-medium transition-all duration-500 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:translate-y-[-50%] peer-placeholder-shown:text-white peer-placeholder-shown:text-base peer-focus:top-[-5px] peer-focus:text-sm peer-focus:text-[#ff007f]">
                                Full Name
                            </label>
                        </div>
                        <div class="input-box relative w-full h-[50px] border-b-2 border-white/20 my-[24px]">
                            <input
                                type="email"
                                name="email"
                                id="email"
                                required
                                class="peer w-full h-full bg-transparent border-none outline-none text-white text-base font-medium pl-2 pr-10 tracking-wide"
                                placeholder=" ">
                            <label
                                for="email"
                                class="absolute left-2 top-[-5px] text-sm text-[#ff007f] font-medium transition-all duration-500 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:translate-y-[-50%] peer-placeholder-shown:text-white peer-placeholder-shown:text-base peer-focus:top-[-5px] peer-focus:text-sm peer-focus:text-[#ff007f]">
                                Email
                            </label>
                        </div>
                        <div class="input-box relative w-full h-[50px] border-b-2 border-white/20 my-[24px]">
                            <input
                                type="password"
                                name="password"
                                id="password"
                                required
                                class="peer w-full h-full bg-transparent border-none outline-none text-white text-base font-medium pl-2 pr-10 tracking-wide"
                                placeholder=" ">
                            <label
                                for="password"
                                class="absolute left-2 top-[-5px] text-sm text-[#ff007f] font-medium transition-all duration-500 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:translate-y-[-50%] peer-placeholder-shown:text-white peer-placeholder-shown:text-base peer-focus:top-[-5px] peer-focus:text-sm peer-focus:text-[#ff007f]">
                                Password
                            </label>
                        </div>
                        <div class="input-box relative w-full h-[50px] border-b-2 border-white/20 my-[24px]">
                            <input
                                type="password"
                                name="password_confirmation"
                                id="password_confirmation"
                                required
                                class="peer w-full h-full bg-transparent border-none outline-none text-white text-base font-medium pl-2 pr-10 tracking-wide"
                                placeholder=" ">
                            <label
                                for="password_confirmation"
                                class="absolute left-2 top-[-5px] text-sm text-[#ff007f] font-medium transition-all duration-800 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:translate-y-[-50%] peer-placeholder-shown:text-white peer-placeholder-shown:text-base peer-focus:top-[-5px] peer-focus:text-sm peer-focus:text-[#ff007f]">
                                Confirm Password
                            </label>
                        </div>
                        <div class="terms flex justify-between text-sm text-[#ff007f] font-medium mt-[-10px] mb-5">
                            <label class="flex items-center">
                                <input type="checkbox" name="terms" id="terms" class="accent-[#ff007f] mr-2">
                                Agree to Terms and Conditions
                            </label>
                        </div>
                        <button
                            type="submit"
                            class="relative w-full h-[45px] bg-transparent text-white text-lg font-semibold overflow-hidden rounded-md group">
                            <span class="relative z-10">Sign Up</span>
                            <div class="absolute inset-0 border-2 border-transparent rounded-md transition-all duration-300 group-hover:border-[#ff007f]"></div>
                            <div class="absolute inset-0 rounded-md bg-gradient-to-r from-[#ff007f] via-transparent to-[#ff007f] animate-spin-border opacity-0 group-hover:opacity-100"></div>
                        </button>

                        <div class="login-register mt-6 text-center text-sm text-white font-medium">
                            <p>Already have an account? <a href="{{asset('login')}}" class="text-white hover:text-[#ff007f] hover:underline register-link">Log In</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
</body>

</html>