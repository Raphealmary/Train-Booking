<x-app-layout>


    @slot("titleHead")
    {{ "Dashboard - RailExpress" }}
    @endslot



    <x-slot name="header">
        <h2 class="font-semibold text-xl text-red-800 leading-tight">

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6">


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
                                Status
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
                            <th scope="row" class=" font-medium text-heading whitespace-nowrap">
                                @if ( $show->status == "paid" )


                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    Approved / Paid
                                </span>


                                @else
                                <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                    Not Paid / Pending
                                </span>

                                @endif
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
                                {{ $show->passengerBooking. "x" .number_format( $show->orignalPriceBooking,00) ."=". number_format($show->priceBooking,00) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $show->dateBooking }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div>
                                    @if ($show->status != "paid")
                                    <form action="{{ route("callback",$show->Type) }}" method="get">
                                        @csrf
                                        <input type="hidden" name="reference" value="{{ $show->reference }}">
                                        <button type="submit"
                                            class="font-medium bg-red-600 text-white px-4 py-2 rounded-lg text-fg-brand hover:underline">ReQuery
                                        </button>
                                    </form>
                                    @endif

                                    <form action="{{ route("print") }}" method="post">
                                        @csrf
                                        <input type="hidden" name="bookingid" value="{{ $show->booking_id  }}">
                                        <button type="submit"
                                            class="font-medium bg-green-600 text-white px-4 py-2 rounded-lg text-fg-brand hover:underline">Print
                                        </button>
                                    </form>

                                </div>
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
                {{ $shows->links() }}
            </div>


        </div>
    </div>


    <x-train-component.footer />
</x-app-layout>