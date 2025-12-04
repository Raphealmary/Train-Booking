<div id="mobile-menu" class="mobile-menu fixed top-0 left-0 w-64 h-full bg-white z-30 shadow-lg p-6">
    <div class="flex justify-between items-center mb-8">
        <div class="flex items-center space-x-2">
            <img src="{{asset('img/favicon.png')}}" class="w-1/6" alt="logo.png">
            <i class="fas fa-train text-primary text-xl"></i>
            <span class="text-lg font-bold text-gray-800">RailExpress</span>
        </div>
        <button id="menu-close" class="text-gray-600">
            <i data-lucide="x" class="fas fa-times text-xl"></i>
        </button>
    </div>

    <nav class="flex flex-col space-y-6">
        <a href="{{route('home')}}" class="text-gray-800 hover:text-primary font-medium text-lg">Home</a>
        @guest
        <a href="{{route('reservationIndex')}}" class="text-gray-800 hover:text-primary font-medium text-lg">Book Tickets</a>
        <a href="#" class="text-gray-800 hover:text-primary font-medium text-lg">Print Ticket</a>
        @endguest
        <a href="{{route('dashboard')}}" class="text-gray-800 hover:text-primary font-medium text-lg">My Bookings</a>
        <a href="#" class="text-gray-800 hover:text-primary font-medium text-lg">Offers</a>
        <a href="#" class="text-gray-800 hover:text-primary font-medium text-lg">Help</a>

        <a href="{{route('login')}}" class="bg-primary block text-white text-center px-4 py-2 rounded-lg hover:bg-red-700 transition duration-300 mt-4">
            @guest

            Sign In
            @endguest

            @auth
            {{ Auth::user()->name }}
            @endauth
        </a>
        @auth
        <form action="{{route('logout')}}" method="post">
            @csrf

            <button type="submit" class="ring-2 ring-red-500 block text-red-500 text-center px-4 py-1 rounded-lg hover:ring-red-500 transition duration-300 w-full">Logout</button>
        </form>
        @endauth
    </nav>
</div>