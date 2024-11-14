<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/navbar.css')}}">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Document</title>
</head>
<body>
    <header>
        @include('navbar')
    </header>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-500 to-indigo-600">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Login</h2>
        
        <form action="#" method="POST">
            @CSRF
            <div class="mb-6">
                <label for="email" class="block text-sm font-semibold text-gray-600">Email</label>
                <input type="email" id="email" name="email" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your email" required>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-semibold text-gray-600">Password</label>
                <input type="password" id="password" name="password" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your password" required>
            </div>

            <div class="flex items-center justify-between mb-6">
                <label for="remember" class="flex items-center text-sm text-gray-600">
                    <input type="checkbox" id="remember" class="form-checkbox text-blue-500 rounded-md">
                    <span class="ml-2">Remember Me</span>
                </label>
                <a href="#" class="text-sm text-blue-600 hover:underline">Forgot Password?</a>
            </div>

            <button type="submit" class="w-full p-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">Login</button>
        </form>

        <div class="mt-6 text-center">
            <span class="text-sm text-gray-600">Don't have an account?</span>
            <a href="#" class="text-sm font-semibold text-blue-600 hover:underline">Sign Up</a>
        </div>
    </div>
</div>

</body>
</html>