<x-app-layout>


    @slot("titleHead")
    {{ "Dashboard - RailExpress" }}
    @endslot



    <x-slot name="header">
        <h2 class="font-semibold text-xl text-red-800 leading-tight">

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default bg-white rounded-2xl">
                <table class="w-full text-sm text-left rtl:text-right text-body">
                    <caption class="p-5 text-4xl font-bold text-left rtl:text-right text-heading">
                        My Bookings
                        <p class="mt-1.5 text-lg font-normal text-body">{{ ucFirst(Auth::user()->name) ." bookings in RailExpress" }}</p>
                    </caption>
                    <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-t border-default-medium">
                        <tr>
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
                    <tbody>
                        @if ($shows->count() > 0)
                        @foreach ($shows as $show)


                        <tr class="bg-neutral-primary-soft border-b border-default">
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
    </div>


    <x-train-component.footer />
</x-app-layout>