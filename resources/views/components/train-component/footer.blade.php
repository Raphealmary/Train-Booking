 <footer class="bg-gray-100  py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                       <img src="{{asset('img/favicon.png')}}" class="w-1/6" alt="logo.png">
                        <span class="text-xl font-bold">RailExpress</span>
                    </div>
                    <p class="text-gray-500">Travel with comfort and convenience across the country with our premium train services.</p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-gray-500">
                        <li><a href="#" class="hover:text-white transition duration-300">Home</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Book Tickets</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Train Status</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Offers</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Support</h3>
                    <ul class="space-y-2 text-gray-500">
                        <li><a href="#" class="hover:text-white transition duration-300">Help Center</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Contact Us</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">FAQ</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Refund Policy</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Newsletter</h3>
                    <p class="text-gray-500 mb-4">Subscribe to get special offers and travel tips.</p>
                    <div class="flex">
                        <input type="email" placeholder="Your email" class="px-4 py-2 w-full rounded-l-lg focus:outline-none text-gray-800 focus:border-none border-none focus:ring-0 ring-0">
                        <button class="bg-primary text-white px-4 py-2 rounded-r-lg hover:bg-primary transition duration-300">
                            <i data-lucide="send"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="border-t border-primary mt-8 pt-8 text-center text-gray-500">
                <p>&copy; {{ date("Y") }} RailExpress. All rights reserved.</p>
            </div>
        </div>
    </footer>