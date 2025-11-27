$(document).ready(function () {

    $("#populatedDeparture").on("change", function (e) {
        e.preventDefault();
        var id = $(this).val();
        $.ajax({
            type: "get",
            url: "/get-route/" + id,
            success: function (response) {
                console.log(response);
                let destination = ``;
                response.forEach(e => {
                    destination += `<option value=${e.destination_id}>${e.route.journey_route}</option>
                `;

                });
                $("#populatedDestination").html(destination);
            }
        });


    })


});