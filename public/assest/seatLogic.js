
$(document).ready(function () {
    let allSeats = $("#allSeats");
    $("#coachSelect").on("change", function (e) {
        e.preventDefault()
        var train = $(this).val();

        $.ajax({
            type: "GET",
            url: "/get-seat/" + train,

            success: function (response) {

                let $seats = `<div>`;
                for (let index = 0; index < response.length; index += 4) {

                    $seats += `<div class="space-y-4">
   
        <div class="flex justify-between">

           
            <div class="flex space-x-2">
        
                    <div data-status="${response[index].status}" data-seat="${response[index].seat_no}" class="clickSeat mb-1 flex flex-col items-center rounded text-black cursor-pointer">
                     <div><svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 24 24" fill="none" stroke="${response[index].status == "available" ? 'red' : 'green'}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-armchair-icon lucide-armchair"><path d="M19 9V6a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v3"/><path d="M3 16a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5a2 2 0 0 0-4 0v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V11a2 2 0 0 0-4 0z"/><path d="M5 18v2"/><path d="M19 18v2"/></svg></div>
                    <p>${response[index].seat_no}</p>
                        
                    </div>
                
                    <div data-status="${response[index + 1].status}" data-seat="${response[index + 1].seat_no}" class="clickSeat mb-1 mr-3 flex flex-col items-center rounded text-black cursor-pointer">
                         <div><svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 24 24" fill="none" stroke="${response[index + 1].status == "available" ? 'red' : 'green'}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-armchair-icon lucide-armchair"><path d="M19 9V6a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v3"/><path d="M3 16a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5a2 2 0 0 0-4 0v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V11a2 2 0 0 0-4 0z"/><path d="M5 18v2"/><path d="M19 18v2"/></svg></div>
                          <p>${response[index + 1].seat_no}</p>
                    </div>
             
            </div>

          
            <div class="flex space-x-2">
                
                    <div data-status="${response[index + 2].status}" data-seat="${response[index + 2].seat_no}" class="clickSeat mb-1 flex flex-col items-center rounded text-black cursor-pointer">
                     <div><svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 24 24" fill="none" stroke="${response[index + 2].status == "available" ? 'red' : 'green'}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-armchair-icon lucide-armchair"><path d="M19 9V6a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v3"/><path d="M3 16a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5a2 2 0 0 0-4 0v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V11a2 2 0 0 0-4 0z"/><path d="M5 18v2"/><path d="M19 18v2"/></svg></div>
                        <p>${response[index + 2].seat_no}</p>
                    </div>
                
                    <div data-status="${response[index + 3].status}" data-seat="${response[index + 3].seat_no}" class="clickSeat mb-1 flex flex-col items-center rounded text-black cursor-pointer">
                    <div><svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 24 24" fill="none" stroke="${response[index + 3].status == "available" ? 'red' : 'green'}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-armchair-icon lucide-armchair"><path d="M19 9V6a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v3"/><path d="M3 16a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5a2 2 0 0 0-4 0v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V11a2 2 0 0 0-4 0z"/><path d="M5 18v2"/><path d="M19 18v2"/></svg></div>
                        <p>${response[index + 3].seat_no}</p>
                    </div>
               
            </div>

        </div>
  
</div>`;


                };

                $seats += `</div>`;
                allSeats.html($seats);


                let clicked = $(".clickSeat");

                $(clicked).on("click", function () {
                    let gottenClicked = $(this).data("seat");
                    let gottenStatus = $(this).data("status");
                    if (gottenStatus === "booked") {
                        alert("Already Booked");
                        $("#coachB").text("");
                    } else {

                        $("#coachB").text(gottenClicked);

                    }
                });







            }
        });
    });

});

