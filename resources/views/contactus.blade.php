<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/home.css')}}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Contact Us</title>
</head>

<body>
    <header>
        @include('navbar')
    </header>

    <section class="py-16 bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 text-white">
        <div class="container mx-auto px-6 md:px-12">
            <h2 class="text-4xl md:text-5xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-purple-500 mb-10">
                Get in Touch with Us
            </h2>
            <p class="text-center text-gray-400 mb-16">
                Have questions or feedback? We'd love to hear from you. Fill out the form below, and we'll get back to you promptly.
            </p>
            <div class="max-w-4xl mx-auto">
                <form action="{{ route('contact.send') }}" method="POST" class="bg-white/20 backdrop-blur-lg rounded-xl shadow-lg p-8 space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Full Name</label>
                        <input type="text" id="name" name="name" required placeholder="Your Name"
                            class="w-full px-4 py-3 bg-gray-900/50 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 transition" 
                            value="{{ auth()->check() ? auth()->user()->name : '' }}"
                            {{ auth()->check() ? 'readonly' : '' }}>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                        <input type="email" id="email" name="email" required placeholder="Your Email"
                            class="w-full px-4 py-3 bg-gray-900/50 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 transition"
                            value="{{ auth()->check() ? auth()->user()->email : '' }}"
                            {{ auth()->check() ? 'readonly' : '' }}
                            >
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-300 mb-2">Message</label>
                        <textarea id="message" name="message" rows="5" required placeholder="Your Message"
                            class="w-full px-4 py-3 bg-gray-900/50 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 transition"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="bg-gradient-to-r from-pink-500 to-purple-500 hover:to-pink-500 text-white font-medium px-6 py-3 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <footer>
        @include('footer')
    </footer>

    <script src="{{asset('js/contact.js')}}"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>