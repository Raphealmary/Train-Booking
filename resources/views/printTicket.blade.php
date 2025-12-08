<x-train-component.template>
    @slot("title")
    {{ "Train Reservation Receipt - Modern Train Booking" }}
    @endslot

    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-6 border border-gray-300">

        <!-- Header -->
        <div class="flex items-center justify-between border-b pb-4">
            <div>
                <h1 class="text-xl font-bold">Electronic Reservation Slip (ERS) - B2B</h1>
                <p class="text-sm text-gray-600">IRCTC • Indian Railway</p>
            </div>

            <div class="text-right">
                <img src="https://dummyimage.com/100x40/000/fff&text=PayPoint" class="h-10" />
            </div>
        </div>

        <!-- Trip Info -->
        <div class="grid grid-cols-2 gap-4 mt-4">
            <div class="border p-3 rounded">
                <h2 class="font-semibold text-gray-700">Boarding From</h2>
                <p class="text-gray-800">New Farakka Jn (NRK)</p>
                <p class="text-xs text-gray-500">Departure: 19:57 • 12-Aug-2022</p>
            </div>

            <div class="border p-3 rounded">
                <h2 class="font-semibold text-gray-700">To</h2>
                <p class="text-gray-800">Delhi (DLI)</p>
                <p class="text-xs text-gray-500">Arrival: 04:50 • 14-Aug-2022</p>
            </div>
        </div>

        <!-- Train Details -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4 text-sm">
            <div><strong>PNR:</strong> 6306615128</div>
            <div><strong>Train No/Name:</strong> 13483 / FARAKKA EXP</div>
            <div><strong>Class:</strong> Sleeper Class (SL)</div>
            <div><strong>Distance:</strong> 1424 KM</div>
        </div>

        <!-- Passenger Table -->
        <h2 class="mt-6 font-semibold text-lg border-b pb-2">Passenger Details</h2>

        <table class="w-full text-sm mt-3 border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">#</th>
                    <th class="p-2 border">Name</th>
                    <th class="p-2 border">Age</th>
                    <th class="p-2 border">Gender</th>
                    <th class="p-2 border">Booking Status</th>
                    <th class="p-2 border">Current Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td class="p-2 border">1</td>
                    <td class="p-2 border">HASEN SEKH</td>
                    <td class="p-2 border">43</td>
                    <td class="p-2 border">M</td>
                    <td class="p-2 border">RAC/17</td>
                    <td class="p-2 border">RAC/16</td>
                </tr>
                <tr class="text-center">
                    <td class="p-2 border">2</td>
                    <td class="p-2 border">RINTU SEKH</td>
                    <td class="p-2 border">43</td>
                    <td class="p-2 border">M</td>
                    <td class="p-2 border">RAC/18</td>
                    <td class="p-2 border">RAC/17</td>
                </tr>
                <tr class="text-center">
                    <td class="p-2 border">3</td>
                    <td class="p-2 border">SARIFUL SEKH</td>
                    <td class="p-2 border">42</td>
                    <td class="p-2 border">M</td>
                    <td class="p-2 border">RAC/19</td>
                    <td class="p-2 border">RAC/18</td>
                </tr>
                <!-- Add more rows as required -->
            </tbody>
        </table>

        <!-- Payment Details -->
        <h2 class="mt-6 font-semibold text-lg border-b pb-2">Payment Details</h2>

        <div class="text-sm mt-3">
            <p><strong>Ticket Fare:</strong> 3600</p>
            <p><strong>IRCTC Conv. Fee:</strong> 17.7</p>
            <p><strong>Agent Service Charge:</strong> 20.00</p>
            <p><strong>Total Amount:</strong> ₹3676.00</p>
        </div>

        <!-- QR + Agent -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">

            <!-- QR -->
            <div class="flex justify-center items-center">
                <div class="border p-3">
                    <img src="https://dummyimage.com/150x150/000/fff&text=QR" class="h-40 w-40" />
                </div>
            </div>

            <!-- Agent Details -->
            <div class="text-sm">
                <h2 class="font-semibold mb-2">Agent Details</h2>
                <p><strong>Principal Agent:</strong> Pay Point India Network Pvt. Ltd.</p>
                <p><strong>Email:</strong> MUNNA94752@GMAIL.COM</p>
                <p><strong>Customer Care:</strong> 9475269043</p>
                <p><strong>Address:</strong> Bahadurpur, West Bengal</p>
            </div>

        </div>

        <p class="text-xs text-gray-500 mt-6 border-t pt-3">
            *Original ID proof required while travelling.
            *Printed timings may be updated; verify with Railway enquiry.
        </p>

    </div>


</x-train-component.template>