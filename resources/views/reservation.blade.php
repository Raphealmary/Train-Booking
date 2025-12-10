<x-train-component.template>
    @slot("title")
    {{ "RailExpress - Modern Train Booking" }}
    @endslot

    <!-- Header -->
    <x-train-component.header />

    <!-- Mobile Menu -->
    <x-train-component.mobileview />
    <!-- // error from return -->
    @session("type")
    @slot("type")
    {{ session("type") }}
    @endslot

    @slot("msg")
    {{ session("msg") }}

    @endslot
    @endsession

    <!-- //error from reqest -->
    @if ($errors->any())
    @slot("type")
    {{ "error" }}
    @endslot
    @foreach($errors->all() as $errors)

    @slot("msg")

    {{ $errors }}
    @endslot
    @endforeach
    @endif
    <!-- Overlay for mobile menu -->
    <div id="overlay" class="overlay fixed inset-0 bg-black bg-opacity-50 z-10"></div>

    <!-- Hero Section -->
    <section class="hero-bg text-white py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">
                    RailExpress gets You, Stay Safe....
                </h1>
                <p class="text-xl mb-8">Book train tickets in seconds. Enjoy comfortable journeys with the best prices guaranteed.</p>
                <button class="bg-primary text-white font-semibold px-6 py-3 rounded-lg hover:bg-red-700 transition duration-300">Book Now</button>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="bg-white py-8 shadow-md -mt-10 relative z-5 mx-4 rounded-xl">
        <div class="container mx-auto px-4">
            <form id="myBookings">

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-gray-700 mb-2">From</label>
                        <div class="relative">
                            <select id="populatedDeparture" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-0 ring-0 focus:border-primary focus:ring-primary">
                                <option value="" selected>Select Departure city</option>
                                @foreach ($showRoute as $showRoutes)
                                <option value={{ $showRoutes->id}}>{{ $showRoutes->journey_route }}</option>
                                @endforeach

                            </select>
                            <i data-lucide="tram-front" class="fas fa-map-marker-alt absolute right-3 top-3 text-gray-400"></i>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">To</label>
                        <div class="relative">
                            <select required id="populatedDestination" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-0 ring-0 focus:border-primary focus:ring-primary">
                                <option selected value="">Destination city</option>



                            </select>
                            <i data-lucide="tram-front" class="fas fa-map-marker-alt absolute right-3 top-3 text-gray-400"></i>
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Passenger</label>
                        <div class="relative">
                            <select id="passenger" name="passenger" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-0 ring-0 focus:border-primary focus:ring-primary">
                                <option selected value="1">1-Passenger</option>
                                <option value="2">2-Passenger</option>
                                <option value="3">3-Passenger</option>
                                <option value="4">4-Passenger</option>


                            </select>
                            <i data-lucide="tram-front" class="fas fa-map-marker-alt absolute right-3 top-3 text-gray-400"></i>
                        </div>
                    </div>

                    <div>
                        <label class="block w-full text-gray-700 mb-2">Date</label>
                        <div class="relative">
                            <script>

                            </script>
                            <input id="travelDate" min="" max="" name="date" data-csrf-token="{{ csrf_token() }}" required type="date" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-0 ring-0 focus:border-primary focus:ring-primary">
                            <i class="fas fa-calendar-alt absolute right-3 top-3 text-gray-400"></i>
                        </div>
                    </div>

                </div>
                <div class="flex items pt-3">
                    <button type="submit" class="w-full bg-primary text-white p-3 rounded-lg hover:bg-red-700 transition duration-300 flex items-center justify-center space-x-2">
                        <i class="fas fa-search"></i>
                        <span>Search Bookings</span>
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- Features Section -->
    <section class="bg-white py-8 shadow-md mt-10 relative z-5 mx-4 rounded-xl">

        <div class="min-h-screen p-10">

            <!-- Top Notice -->
            <div class="max-w-5xl mx-auto mb-6">
                <div class="bg-green-100 text-green-700 text-center py-3 rounded-md shadow-sm">
                    You have 4 more ticket(s) left for 26 November, 2025 (check for available space)
                </div>
            </div>

            <form action="{{ route("userBookings") }}" method="post" id="payment">
                @csrf
                <input type="hidden" name="trainBooking" id="trainBooking">

                <input type="hidden" name="coachBooking" id="coachBooking">
                <input type="hidden" name="seatBooking" id="seatBooking">

                <input type="hidden" name="departBooking" id="departBooking">
                <input type="hidden" name="arrivalBooking" id="arrivalBooking">


                <input type="hidden" name="timeArrivalBooking" id="timeArrivalBooking">
                <input type="hidden" name="timeDepartBooking" id="timeDepartBooking">


                <input type="hidden" name="priceBooking" id="priceBooking">
                <input type="hidden" name="orignalPriceBooking" id="orignalPriceBooking">
                <input type="hidden" name="passengerBooking" id="passengerBooking">
                <input type="hidden" name="dateBooking" id="dateBooking">

                <!-- Main Content -->
                <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10">

                    <!-- LEFT SIDE: TRAVELER DETAILS -->
                    <div class="space-y-10">

                        <!-- Step 1 -->
                        <div>
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-8 h-8 rounded-full bg-green-600 text-white flex items-center justify-center font-semibold">1</div>
                                <h2 class="text-lg font-semibold">Enter Traveler Details</h2>
                            </div>
                            <p class="text-gray-600 mb-4">Enter your details to continue as a guest or sign in if you are a returning customer</p>

                            <!-- Radio Buttons -->
                            <div class="flex items-center gap-6 mb-4">
                                <label class="flex items-center gap-2 text-gray-700">
                                    <input type="radio" name="user" checked> For Myself
                                </label>
                                <label class="flex items-center gap-2 text-gray-700">
                                    <input type="radio" name="user"> For Someone else
                                </label>
                            </div>

                            <!-- Form -->
                            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                                <input id="full" name="fullname" type="text" placeholder="Full Name" class="border rounded-md px-3 py-2 w-full">

                            </div>

                            <input id="phone" type="text" name="phone" placeholder="Phone No" class="border rounded-md px-3 py-2 w-full mt-4">

                            <input id="email" type="email" name="email" placeholder="Email" class="border rounded-md px-3 py-2 w-full mt-4">


                        </div>

                        <!-- Step 2 -->
                        <div class="grid grid-cols-1 md:grid-cols-1 gap-4">

                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-8 h-8 rounded-full bg-green-600 text-white flex items-center justify-center font-semibold">2</div>
                                <h2 class="text-lg font-semibold">Choose Coache</h2>
                            </div>
                            <p class="text-red-600 font-medium mb-2">Choose seats in one coach. Switching coaches clears selections</p>

                            <!-- <select id="trainSelect" class="border rounded-md px-3 py-2 w-full">
                                <option selected value="">Choose Available Train</option>
                                @foreach ($showTrain as $showTrains)
                                <option value={{ $showTrains->id}}>{{ $showTrains->name }}</option>
                                @endforeach
                            </select> -->



                            <select id="coachSelect" class="border rounded-md px-3 py-2 w-full">
                                <option selected value="">Choose coach</option>
                                @foreach ($showCoach as $showCoachs)
                                <option value={{ $showCoachs->id}}>{{ $showCoachs->coach_type }}</option>
                                @endforeach

                            </select>
                            <div id="allSeats">
                                <!-- all seat here -->

                            </div>
                        </div>
                    </div>

                    <!-- RIGHT SIDE: BOOKING SUMMARY -->
                    <div>

                        <div class="border rounded-xl bg-white p-6 shadow-sm relative">

                            <!-- Timer -->
                            <div class="absolute top-4 right-4 text-gray-700 flex items-center gap-2">
                                <div class="flex items-center gap-1 text-sm font-semibold">
                                    <span>⏱</span> <span>00:00</span>
                                </div>
                            </div>

                            <h3 class="text-lg font-semibold mb-2">Your Booking</h3>
                            <p class="text-gray-600 text-sm mb-6">Please select a seat to reserve your booking!</p>

                            <!-- Booking Details -->
                            <div class="text-sm space-y-1">

                                <p class="flex justify-between"><strong>Train</strong><span id="Train-T">-</span></p>
                                <p class="flex justify-between"><strong>Coach</strong> <span id="coachB">-</span></p>
                                <p class="flex justify-between"><strong>Seat number</strong><span id="seatB">-</span> </p>
                                <p class="flex justify-between"><strong>Departure Date</strong> <span id="d-d">-</span></p>
                                <p class="flex justify-between"><strong>Departure Station</strong> <span id="d-station">-</span></p>
                                <p class="flex justify-between"><strong>Arrival Station</strong> <span id="a-station">-</span></p>
                                <p class="flex justify-between"><strong>Departure Time</strong><span id="d-time">-</span></p>
                                <p class="flex justify-between"><strong>Arrival Time</strong><span id="a-time">-</span></p>

                                <p class="flex justify-between"><strong>Email</strong> <span id="e-email">-</span></p>
                                <p class="flex justify-between"><strong>Phone number</strong><span id="p-phone">-</span></p>
                                <p class="flex justify-between"><strong>Full name</strong><span id="f-name">-</span></p>
                            </div>

                            <p class="text-center text-green-700 text-sm mt-4">
                                Kindly note that RailExpress does not offer refund after payment
                            </p>



                            <!-- Price Box -->
                            <div class="mt-6 bg-green-700 text-white p-5 rounded-lg text-center">
                                <p class="text-sm mb-2"><span id="p-passenger">0</span> seat (Adult) × ₦<span id="originalPrice">0</span> .00</p>
                                <p class="text-sm mb-4">Convenience Fee (6.5% OF Ticket fee) ₦00.00</p>
                                <p class="text-3xl font-bold">₦<span id="price">0</span> .00</p>
                            </div>

                            <button type="submit" class="mt-5 w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-lg text-lg">
                                Pay Now
                            </button>

                        </div>

                    </div>

                </div>
            </form>

        </div>

    </section>
    <script src="{{ asset("assest/seatLogic.js") }}"></script>
    <script src="{{ asset("assest/routeLogic.js") }}"></script>
    <!-- App Download -->
    <x-train-component.appdownload />


    <!-- Footer -->
    <x-train-component.footer />

    <!-- Bottom Navigation (Mobile Only) -->
    <x-train-component.bottom-nav />

</x-train-component.template>