<x-train-admin.layout>
    @slot("title")
    {{ "Bookings | Admin" }}

    @endslot

    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <x-train-admin.aside />

        <div class="flex flex-col flex-1 w-full">

            <x-train-admin.nav />





            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Bookings
                    </h2>

                    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base  bg-white text-gray-700 dark:text-gray-200 divide-y dark:divide-gray-700 dark:bg-gray-800 rounded-2xl">
                        <table class="w-full text-sm text-left rtl:text-right text-body">
                            <caption class="p-5 text-4xl font-bold text-left rtl:text-right text-heading">
                                My Bookings
                                <p class="mt-1.5 text-lg font-normal text-body">{{ "Bookings in RailExpress" }}</p>
                            </caption>
                            <thead class="text-sm text-body bg-neutral-secondary-medium ">
                                <tr class="text-xs font-semibold tracking-wide text-left text-white uppercase  dark:border-gray-700  dark:text-white bg-purple-600">
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Booking ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Train
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Coach/Seat
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Departure
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Arrival
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Time Departure/Time Arrival
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Price Bookings
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Date for Bookings
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Print Tickets
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white text-gray-700 dark:text-gray-200 divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @if ($shows->count() > 0)
                                @foreach ($shows as $show)


                                <tr class="bg-neutral-primary-soft ">
                                    <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                        {{ $show->booking_id }}
                                    </th>

                                    <td class="px-6 py-4">
                                        {{ $show->trainBooking }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $show->coachBooking. " | ". $show->seatBooking}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $show->route->journey_route }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $show->route2->journey_route }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $show->timeDepartBooking . " | ". $show->timeArrivalBooking}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $show->passengerBooking. "x" . $show->orignalPriceBooking ."=".  $show->priceBooking }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $show->dateBooking }}
                                    </td>
                                    <td class="px-6 py-4 text-right">

                                        <form action="{{ route("print") }}" method="post">
                                            @csrf
                                            <input type="hidden" name="bookingid" value="{{ $show->booking_id  }}">
                                            <button type="submit"
                                                class="font-medium bg-green-600 text-white px-4 py-2 rounded-lg text-fg-brand hover:underline">Print
                                            </button>
                                        </form>
                                    </td>
                                </tr>


                                @endforeach
                                @else

                                <tr>
                                    <!-- //endhere -->
                                    <div class="bg-white dark:bg-red-500 overflow-hidden shadow-sm sm:rounded-lg">
                                        <div class="p-6 text-gray-900 dark:text-gray-100">
                                            {{ __("No Bookings Yet!") }}
                                        </div>
                                    </div>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>



                </div>
            </main>
        </div>
    </div>




</x-train-admin.layout>