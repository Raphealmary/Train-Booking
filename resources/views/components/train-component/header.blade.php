 <header class="bg-white shadow-sm sticky top-0 z-20">
     <div class="container mx-auto px-4 py-4 flex justify-between items-center">
         <div class="flex items-center space-x-2">
             <img src="{{asset('img/favicon.png')}}" class="w-1/6" alt="logo.png">
             <span class="text-xl font-bold text-gray-800">RailExpress</span>
         </div>

         <nav class="hidden md:flex space-x-8">
             <a href="#" class="text-gray-600 hover:text-primary font-medium">Home</a>
             <a href="#" class="text-gray-600 hover:text-primary font-medium">Book Tickets</a>
             <a href="#" class="text-gray-600 hover:text-primary font-medium">Train Status</a>
             <a href="{{route('dashboard')}}" class="text-gray-600 hover:text-primary font-medium">My Bookings</a>

         </nav>

         <div class="flex items-center space-x-4">

             <div class="hidden md:block md:flex items-center bg-primary text-white px-4 py-2 rounded-lg hover:bg-red-700 transition duration-300"><b><i data-lucide="user" class="fas fa-bars text-xl block mr-2"></i> </b>
                 @guest
                 <a href="{{route('login')}}" class="hidden md:block  text-white px-4 py-2 rounded-lg hover:bg-red-700 transition duration-300">
                     Sign In </a>
                 @endguest

                 @auth
                 {{ Auth::user()->name }}
                 @endauth
             </div>
             <button id="menu-toggle" class="md:hidden text-gray-600">
                 <i data-lucide="menu" class="fas fa-bars text-xl"></i>
             </button>
         </div>
     </div>
 </header>