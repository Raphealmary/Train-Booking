
$(document).ready(function () {

    $("#populatedDeparture").on("change", function (e) {
        e.preventDefault();
        var id = $(this).val();
        $.ajax({
            type: "get",
            url: "/get-route/" + id,
            success: function (response) {
                //console.log(response);
                let destination = ``;
                response.forEach(e => {
                    destination += `<option value=${e.destination_id}>${e.route.journey_route}</option>
                `;

                });
                $("#populatedDestination").html(destination);
            }
        });


    });

    //submit booking details


    $("#myBookings").on("submit", function (e) {
        e.preventDefault();
        var dataCollected = {
            depart: $("#populatedDeparture").val(),
            destination: $("#populatedDestination").val(),
            passenger: $("#passenger").val(),
            travelDate: $("#travelDate").val()
        }


        $.ajax({
            type: "post",
            url: "/reservationpost",
            data: dataCollected,
            headers: {
                "X-CSRF-TOKEN": $("#travelDate").data("csrf-token")
            },
            success: function (response) {
                console.log(response)

                response.forEach(e => {
                    //train
                    $("#Train-T").html(e.trainName);
                    $("#trainBooking").val(e.trainName);
                    //date
                    $("#d-d").html(e.date);
                    $("#dateBooking").val(e.date);
                    //depart
                    $("#d-station").html(e.start);
                    $("#departBooking").val(e.origin_id);
                    //arrival
                    $("#a-station").html(e.end);
                    $("#arrivalBooking").val(e.destination_id);
                    //arivaltime
                    $("#a-time").html(e.arrival);
                    $("#timeArrivalBooking").val(e.arrival);
                    //departTime
                    $("#d-time").html(e.departure);
                    $("#timeDepartBooking").val(e.departure);
                    //price
                    $("#price").html(e.price);
                    $("#priceBooking").val(e.price);
                    //orginalPrice
                    $("#originalPrice").html(e.originalPrice);
                    $("#orignalPriceBooking").val(e.originalPrice);

                    //passenger
                    $("#p-passenger").html(e.passenger);
                    $("#passengerBooking").val(e.passenger);

                });
            }
        });

    });

    $("#full").on("keyup", function () {

        $("#f-name").html($(this).val());
    });

    $("#email").on("keyup", function () {

        $("#e-email").html($(this).val());
    });
    $("#phone").on("keyup", function () {

        $("#p-phone").html($(this).val());
    });

});