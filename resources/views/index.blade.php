<x-train-component.template>
    @slot("title")
    {{ "RailExpress - Modern Train Booking" }}
    @endslot

    <!-- Header -->
    <x-train-component.header />

    <!-- Mobile Menu -->
    <x-train-component.mobileview />


    <!-- Overlay for mobile menu -->
    <div id="overlay" class="overlay fixed inset-0 bg-black bg-opacity-50 z-10"></div>

    <!-- Hero Section -->
    <section class="hero-bg text-white py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Travel Smarter, Travel Faster with RailExpress</h1>
                <p class="text-xl mb-8">Book train tickets in seconds. Enjoy comfortable journeys with the best prices guaranteed.</p>
                <button class="bg-primary text-white font-semibold px-6 py-3 rounded-lg hover:bg-red-700 transition duration-300">Book Now</button>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="bg-white py-8 shadow-md -mt-10 relative z-5 mx-4 rounded-xl">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-gray-700 mb-2">From</label>
                    <div class="relative">
                        <select  class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-0 ring-0 focus:border-primary focus:ring-primary">
                            <option selected>Select Departure city</option>
                            <option value="">Cairo</option>
                            <option value="">Hong Kong</option>
                            <option value="">Tokyo</option>


                        </select>
                        <i data-lucide="tram-front" class="fas fa-map-marker-alt absolute right-3 top-3 text-gray-400"></i>
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">To</label>
                    <div class="relative">
                        <select  class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-0 ring-0 focus:border-primary focus:ring-primary">
                            <option selected value="">Destination city</option>
                            <option value="">China</option>
                            <option value="">Hong Kong</option>
                            <option value="">Tokyo</option>


                        </select>
                        <i data-lucide="tram-front" class="fas fa-map-marker-alt absolute right-3 top-3 text-gray-400"></i>
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Passenger</label>
                    <div class="relative">
                        <select  class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-0 ring-0 focus:border-primary focus:ring-primary">
                            <option selected value="">1-Passenger</option>
                            <option value="">2-Passenger</option>
                            <option value="">3-Passenger</option>
                            <option value="">4-Passenger</option>


                        </select>
                        <i data-lucide="tram-front" class="fas fa-map-marker-alt absolute right-3 top-3 text-gray-400"></i>
                    </div>
                </div>

                <div>
                    <label class="block w-full text-gray-700 mb-2">Date</label>
                    <div class="relative">
                        <input type="date" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-0 ring-0 focus:border-primary focus:ring-primary">
                        <i class="fas fa-calendar-alt absolute right-3 top-3 text-gray-400"></i>
                    </div>
                </div>

            </div>
            <div class="flex items pt-3">
                <button class="w-full bg-primary text-white p-3 rounded-lg hover:bg-red-700 transition duration-300 flex items-center justify-center space-x-2">
                    <i class="fas fa-search"></i>
                    <span>Search Trains</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Why Choose RailExpress?</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-md text-center train-card">
                    <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="zap" class="fas fill-red fa-bolt text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Fast Booking</h3>
                    <p class="text-gray-600">Book your tickets in under 60 seconds with our streamlined process.</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md text-center train-card">
                    <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="shield" class="fas fill-red fa-shield-alt text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Safe & Secure</h3>
                    <p class="text-gray-600">Your data and payments are protected with bank-level security.</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md text-center train-card">
                    <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="headset" class="fas fa-headset text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">24/7 Support</h3>
                    <p class="text-gray-600">Our customer service team is available round the clock to assist you.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Routes Slider -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Popular Routes</h2>

            <div class="slider-container relative">
                <div class="slider" id="slider">
                    <!-- Slide 1 -->
                    <div class="slide active">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="bg-gray-50 rounded-xl overflow-hidden shadow-md train-card">
                                <div class="h-40 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1515586838455-8f8f940d6853?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80')"></div>
                                <div class="p-6">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-xl font-semibold">New York to Boston</h3>
                                        <span class="bg-primary text-white text-sm px-2 py-1 rounded">Express</span>
                                    </div>
                                    <div class="flex justify-between text-gray-600 mb-4">
                                        <span><i class="far fa-clock mr-1"></i> 3h 25m</span>
                                        <span><i class="fas fa-train mr-1"></i> 12 daily trips</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-2xl font-bold text-primary">$49</span>
                                        <button class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition duration-300">Book Now</button>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-50 rounded-xl overflow-hidden shadow-md train-card">
                                <div class="h-40 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1513584684374-8bab748fbf90?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80')"></div>
                                <div class="p-6">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-xl font-semibold">Chicago to Detroit</h3>
                                        <span class="bg-secondary text-gray-900 text-sm px-2 py-1 rounded">Regional</span>
                                    </div>
                                    <div class="flex justify-between text-gray-600 mb-4">
                                        <span><i class="far fa-clock mr-1"></i> 4h 10m</span>
                                        <span><i class="fas fa-train mr-1"></i> 8 daily trips</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-2xl font-bold text-primary">$39</span>
                                        <button class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition duration-300">Book Now</button>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-50 rounded-xl overflow-hidden shadow-md train-card">
                                <div class="h-40 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1536240478700-b869070f9279?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80')"></div>
                                <div class="p-6">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-xl font-semibold">Seattle to Portland</h3>
                                        <span class="bg-green-500 text-white text-sm px-2 py-1 rounded">Eco</span>
                                    </div>
                                    <div class="flex justify-between text-gray-600 mb-4">
                                        <span><i class="far fa-clock mr-1"></i> 3h 15m</span>
                                        <span><i class="fas fa-train mr-1"></i> 10 daily trips</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-2xl font-bold text-primary">$45</span>
                                        <button class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition duration-300">Book Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="slide">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="bg-gray-50 rounded-xl overflow-hidden shadow-md train-card">
                                <div class="h-40 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1515586838455-8f8f940d6853?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80')"></div>
                                <div class="p-6">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-xl font-semibold">Los Angeles to San Diego</h3>
                                        <span class="bg-primary text-white text-sm px-2 py-1 rounded">Express</span>
                                    </div>
                                    <div class="flex justify-between text-gray-600 mb-4">
                                        <span><i class="far fa-clock mr-1"></i> 2h 45m</span>
                                        <span><i class="fas fa-train mr-1"></i> 15 daily trips</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-2xl font-bold text-primary">$35</span>
                                        <button class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition duration-300">Book Now</button>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-50 rounded-xl overflow-hidden shadow-md train-card">
                                <div class="h-40 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1513584684374-8bab748fbf90?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80')"></div>
                                <div class="p-6">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-xl font-semibold">Miami to Orlando</h3>
                                        <span class="bg-secondary text-gray-900 text-sm px-2 py-1 rounded">Regional</span>
                                    </div>
                                    <div class="flex justify-between text-gray-600 mb-4">
                                        <span><i class="far fa-clock mr-1"></i> 3h 30m</span>
                                        <span><i class="fas fa-train mr-1"></i> 9 daily trips</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-2xl font-bold text-primary">$42</span>
                                        <button class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition duration-300">Book Now</button>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-50 rounded-xl overflow-hidden shadow-md train-card">
                                <div class="h-40 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1536240478700-b869070f9279?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80')"></div>
                                <div class="p-6">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-xl font-semibold">Denver to Salt Lake City</h3>
                                        <span class="bg-green-500 text-white text-sm px-2 py-1 rounded">Eco</span>
                                    </div>
                                    <div class="flex justify-between text-gray-600 mb-4">
                                        <span><i class="far fa-clock mr-1"></i> 8h 20m</span>
                                        <span><i class="fas fa-train mr-1"></i> 4 daily trips</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-2xl font-bold text-primary">$75</span>
                                        <button class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition duration-300">Book Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="slide">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="bg-gray-50 rounded-xl overflow-hidden shadow-md train-card">
                                <div class="h-40 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1515586838455-8f8f940d6853?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80')"></div>
                                <div class="p-6">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-xl font-semibold">Washington DC to Philadelphia</h3>
                                        <span class="bg-primary text-white text-sm px-2 py-1 rounded">Express</span>
                                    </div>
                                    <div class="flex justify-between text-gray-600 mb-4">
                                        <span><i class="far fa-clock mr-1"></i> 2h 15m</span>
                                        <span><i class="fas fa-train mr-1"></i> 18 daily trips</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-2xl font-bold text-primary">$29</span>
                                        <button class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition duration-300">Book Now</button>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-50 rounded-xl overflow-hidden shadow-md train-card">
                                <div class="h-40 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1513584684374-8bab748fbf90?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80')"></div>
                                <div class="p-6">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-xl font-semibold">Atlanta to Charlotte</h3>
                                        <span class="bg-secondary text-gray-900 text-sm px-2 py-1 rounded">Regional</span>
                                    </div>
                                    <div class="flex justify-between text-gray-600 mb-4">
                                        <span><i class="far fa-clock mr-1"></i> 4h 05m</span>
                                        <span><i class="fas fa-train mr-1"></i> 7 daily trips</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-2xl font-bold text-primary">$38</span>
                                        <button class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition duration-300">Book Now</button>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-50 rounded-xl overflow-hidden shadow-md train-card">
                                <div class="h-40 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1536240478700-b869070f9279?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80')"></div>
                                <div class="p-6">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-xl font-semibold">Dallas to Houston</h3>
                                        <span class="bg-green-500 text-white text-sm px-2 py-1 rounded">Eco</span>
                                    </div>
                                    <div class="flex justify-between text-gray-600 mb-4">
                                        <span><i class="far fa-clock mr-1"></i> 3h 50m</span>
                                        <span><i class="fas fa-train mr-1"></i> 11 daily trips</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-2xl font-bold text-primary">$41</span>
                                        <button class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition duration-300">Book Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slider Controls -->
                <button id="prev-slide" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-md ml-4 hover:bg-gray-100 transition duration-300">
                    <i class="fas fa-chevron-left text-primary"></i>
                </button>
                <button id="next-slide" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-md mr-4 hover:bg-gray-100 transition duration-300">
                    <i class="fas fa-chevron-right text-primary"></i>
                </button>

                <!-- Slider Indicators -->
                <div class="flex justify-center mt-6 space-x-2">
                    <button class="slider-indicator w-3 h-3 rounded-full bg-primary opacity-100" data-slide="0"></button>
                    <button class="slider-indicator w-3 h-3 rounded-full bg-gray-300 opacity-50" data-slide="1"></button>
                    <button class="slider-indicator w-3 h-3 rounded-full bg-gray-300 opacity-50" data-slide="2"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- App Download -->
    <x-train-component.appdownload />

    <!-- Footer -->
    <x-train-component.footer />

    <!-- Bottom Navigation (Mobile Only) -->
    <x-train-component.bottom-nav />

</x-train-component.template>