<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$titleHead}}</title>
    <!-- favicon -->
    <x-train-component.favicon />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>

<body class="bg-gradient-to-br hero-bg from-gray-50 to-gray-100 min-h-screen flex items-center justify-around">
    <div class="max-w-md w-full">
       
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-red-600 to-red-700 p-6 text-white">
                <div class="items-center justify-between grid grid-cols-2">
                    <div>
                        <h1 class="text-2xl font-bold">Welcome Back</h1>
                        <p class="text-red-100 mt-1">Sign in to your account</p>
                    </div>
                    <div class="rounded-xl flex justify-end">
                        <img src="{{asset('img/favicon.png')}}" class="w-2/4" alt="Home Logo">
                    </div>
                </div>
            </div>

            <div class="p-6">

                {{ $slot }}

            </div>
        </div>

        <div class="mt-6 text-center text-sm text-gray-50">
            <p>© <span>{{now()->format("Y")}}</span> Your Company. All rights reserved.</p>
        </div>
    </div>



    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Form submission
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form values
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const remember = document.getElementById('remember').checked;

            // In a real application, you would send this data to a server
            console.log('Login attempt:', {
                email,
                password,
                remember
            });

            // Show a success message (in a real app, this would be conditional on successful auth)
            alert('Login successful! (This is a demo)');
        });
    </script>
</body>

</html>