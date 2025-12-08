<x-train-component.template>
    @slot("title")
    {{ "Train Reservation Receipt - Modern Train Booking" }}
    @endslot

    <section class="bg-gray-100 hero-bg flex items-center justify-center min-h-screen">

        <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-md">
            <!-- Ticket Input -->
            <h1 class="text-2xl font-bold text-center mb-4">Enter Ticket Booking ID</h1>
            <div class="flex gap-2">
                <form action="{{ route("print") }}" method="post">
                    @csrf
                    <input name="bookingid" id="ticketCode" type="text" placeholder="Ticket Code" class="flex-1 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Print</button>
                </form>
            </div>


        </div>

    </section>

</x-train-component.template>