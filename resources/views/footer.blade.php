<footer class="bg-[#0b0b22] text-white py-16 px-6">
    <div class="container mx-auto">
        <!-- Logo and Brand Name -->
        <div class="flex justify-center mb-8">
            <a href="{{ asset('home') }}" class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-15 h-8 mr-2">
                <span class="text-[#ffffff] text-3xl font-bold">TICKET<span class="text-[#ff007f]">TRAIL</span></span>
            </a>
        </div>

        <!-- Footer Links -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-8 text-center md:text-left">
            <!-- Quick Links -->
            <div>
                <h3 class="font-semibold mb-4 text-lg">Quick Links</h3>
                <ul>
                    <li><a href="{{ asset('home') }}" class="text-gray-400 hover:text-[#ff007f] transition duration-300 ease-in-out">Home</a></li>
                    <li><a href="{{ asset('movies') }}" class="text-gray-400 hover:text-[#ff007f] transition duration-300 ease-in-out">Movies</a></li>
                    <li><a href="{{ asset('events') }}" class="text-gray-400 hover:text-[#ff007f] transition duration-300 ease-in-out">Events</a></li>
                    <li><a href="{{ asset('sports') }}" class="text-gray-400 hover:text-[#ff007f] transition duration-300 ease-in-out">Sports</a></li>
                </ul>
            </div>

            <!-- Contact Us -->
            <div>
                <h3 class="font-semibold mb-4 text-lg">Contact Us</h3>
                <ul>
                    <li><a href="mailto:info@tickettrail.com" class="text-gray-400 hover:text-[#ff007f] transition duration-300 ease-in-out">info@tickettrail.com</a></li>
                    <li><a href="tel:+1234567890" class="text-gray-400 hover:text-[#ff007f] transition duration-300 ease-in-out">+1 234 567 890</a></li>
                    <li><a href="{{ asset('contact') }}" class="text-gray-400 hover:text-[#ff007f] transition duration-300 ease-in-out">Contact Page</a></li>
                </ul>
            </div>

            <!-- Follow Us -->
            <div class="flex flex-col items-center justify-center">
                <h3 class="font-semibold mb-4 text-lg">Follow Us</h3>
                <ul class="space-y-4 text-center">
                    <li><a href="#" class="text-gray-400 hover:text-[#ff007f] transition duration-300 ease-in-out text-xl"><ion-icon name="logo-facebook"></ion-icon></a></li>
                    <li><a href="#" class="text-gray-400 hover:text-[#ff007f] transition duration-300 ease-in-out text-xl"><ion-icon name="logo-xing"></ion-icon></a></li>
                    <li><a href="#" class="text-gray-400 hover:text-[#ff007f] transition duration-300 ease-in-out text-xl"><ion-icon name="logo-instagram"></ion-icon></a></li>
                    <li><a href="#" class="text-gray-400 hover:text-[#ff007f] transition duration-300 ease-in-out text-xl"><ion-icon name="logo-youtube"></ion-icon></a></li>
                </ul>
            </div>


            <!-- Newsletter -->
            <div>
                <h3 class="font-semibold mb-4 text-lg">Newsletter</h3>
                <p class="text-gray-400 mb-4">Subscribe to our newsletter to receive the latest updates and offers.</p>
                <form action="#" method="POST">
                    <input type="email" name="email" class="w-full p-3 rounded-md bg-gray-800 text-white border border-gray-700 focus:outline-none focus:border-[#ff007f]" placeholder="Your email">
                    <button type="submit" class="mt-4 w-full p-3 bg-[#ff007f] text-white font-semibold rounded-md hover:bg-[#ff007f] focus:outline-none transition duration-300">Subscribe</button>
                </form>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="mt-12 text-center text-gray-400 text-sm">
            <p>&copy; 2024 TicketTrail. All rights reserved.</p>
            <p>Made with Aboubaker Al Khatib/ Rayan Ayesh/ Nour Al Hariri</p>
        </div>
    </div>
</footer>

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>