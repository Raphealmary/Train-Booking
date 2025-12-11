<x-train-component.template>
    @slot("title")
    {{ "Train Reservation Receipt - Modern Train Booking" }}
    @endslot



    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 10px;
            color: #333;
            margin: 0;
            /* padding: 20px; */
        }

        .receipt-container {
            width: 300px;
            margin: auto;
            border: 1px solid #ccc;
            padding: 15px;
        }

        .title {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .section-title {
            font-size: 14px;
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 5px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 3px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 4px;
        }

        td,
        th {
            padding: 6px;
            border: 1px solid #ddd;
        }

        .no-border td {
            border: none;
            padding: 2px 0;
        }

        .barcode {
            margin-top: 15px;
            text-align: center;
        }

        .small {
            font-size: 11px;
            color: #777;
        }
    </style>

    <div class="receipt-container">

        <div class="title">RailExpress Booking Receipt</div>

        <!-- Booking Summary -->
        <div class="section-title">Booking Information</div>
        <table>

            <tr>
                <td><strong>Booking Date:</strong></td>
                <td>
                    {{ $data->created_at }}
                </td>
            </tr>
            <tr>
                <td><strong>Booking Reference:</strong></td>
                <td>{{ $data->booking_id }}</td>
            </tr>
        </table>

        <!-- Passenger -->
        <div class="section-title">Passenger Details</div>
        <table>
            <tr>
                <td><strong>Name:</strong></td>
                <td>{{ ucfirst($data->fullname) }}</td>
            </tr>
            <tr>
                <td><strong>Contact:</strong></td>
                <td>{{ $data->phone}}</td>
            </tr>
        </table>

        <!-- Journey -->
        <div class="section-title">Journey Details</div>
        <table>
            <tr>
                <td><strong>Train No:</strong></td>
                <td>{{ $data->trainBooking }}</td>
            </tr>
            <tr>
                <td><strong>Class:</strong></td>
                <td>{{ $data->coachBooking }}</td>
            </tr>
            <tr>
                <td><strong>Seat:</strong></td>
                <td>{{ $data->seatBooking }}</td>
            </tr>
            <tr>
                <td><strong>From:</strong></td>
                <td>{{ $data->route->journey_route }}</td>
            </tr>
            <tr>
                <td><strong>Departure:</strong></td>
                <td>{{ $data->timeDepartBooking." ".$data->dateBooking }}</td>
            </tr>
            <tr>
                <td><strong>To:</strong></td>
                <td>{{ $data->route2->journey_route }}</td>
            </tr>
            <tr>
                <td><strong>Arrival:</strong></td>
                <td>{{ $data->timeArrivalBooking." ".$data->dateBooking }}</td>
            </tr>

        </table>

        <!-- Fare -->
        <div class="section-title">Fare Breakdown</div>
        <table>
            <tr>
                <td>Base Fare</td>
                <td>{{ $data->orignalPriceBooking }}</td>
            </tr>

            <tr>
                <td>Additional Users</td>
                <td>{{ $data->passengerBooking }} passenger</td>
            </tr>
            <tr>
                <td><strong>Total Paid</strong></td>
                <td><strong>{{ $data->priceBooking }}</strong></td>
            </tr>
        </table>

        <!-- Payment -->
        <!-- <div class="section-title">Payment Method</div>
    <table>
        <tr>
            <td><strong>Method:</strong></td>
            <td>Visa • **** 4242</td>
        </tr>
    </table> -->

        <!-- Ticket Status -->
        <div class="section-title">Ticket Status</div>
        <table>
            <tr>
                <td><strong>Status:</strong></td>
                <td>CONFIRMED</td>
            </tr>
        </table>

        <!-- Barcode -->
        <div class="barcode">
            <!-- Replace with your Base64 barcode -->

            <img src="data:image/png;base64,{{ base64_encode(QrCode::size(100)->generate( $data->booking_id )) }}" width="150">
            <div class="small">{{ $data->booking_id }}</div>
        </div>

        <div class="small" style="margin-top: 15px; text-align: center;">
            Thank you for choosing RailExpress Co.<br>
            Customer Care: +234 (085) 555-0123
        </div>

    </div>


</x-train-component.template>