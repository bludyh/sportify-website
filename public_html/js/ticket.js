/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var noTickets;
var totalPrice;

function addTickets(){
    if (noTickets < 6) {
        noTickets += 1;
        if ($("input:checkbox").is(":checked")) {
            totalPrice = noTickets * 75 + 10;
        }
        else {
            totalPrice += 55;
        }
        
        var html = "<div id='ticket-info-" + noTickets + "'>\n\
            <h3 style='margin-bottom: 20px'>Ticket " + noTickets + "</h3>\n\
            <div class='form-group'>\n\
                <label class='control-label col-sm-2' for='firstname-" + noTickets + "'>First Name:</label>\n\
                <div class='col-sm-10'>\n\
                    <input type='text' class='fname form-control' id='firstname-" + noTickets + "' name='firstname-" + noTickets + "' style='text-transform: capitalize'>\n\
                </div>\n\
            </div>\n\
            <div class='form-group'>\n\
                <label class='control-label col-sm-2' for='lastname-" + noTickets + "'>Last Name:</label>\n\
                <div class='col-sm-10'>\n\
                    <input type='text' class='lname form-control' id='lastname-" + noTickets + "' name='lastname-" + noTickets + "' style='text-transform: capitalize'>\n\
                </div>\n\
            </div>\n\
            <div class='form-group'>\n\
                <label class='control-label col-sm-2' for='birthday-" + noTickets + "'>Date Of Birth:</label>\n\
                <div class='col-sm-3'>\n\
                    <input type='date' class='bday form-control' id='birthday-" + noTickets + "' name='birthday-" + noTickets + "'>\n\
                </div>\n\
            </div>\n\
            <div class='form-group'>\n\
                <label class='control-label col-sm-2' for='email-" + noTickets + "'>Email Address:</label>\n\
                <div class='col-sm-10'>\n\
                    <input type='email' class='email form-control' id='email-" + noTickets + "' name='email-" + noTickets + "'>\n\
                </div>\n\
            </div>\n\
            <div class='form-group'>\n\
                <label class='control-label col-sm-2' for='email-confirm-" + noTickets + "'>Confirm Email Address:</label>\n\
                <div class='col-sm-10'>\n\
                    <input type='text' class='cemail form-control' id='email-confirm-" + noTickets + "' name='email-confirm-" + noTickets + "'>\n\
                </div>\n\
            </div>\n\
            <div class='form-group'>\n\
                <label class='control-label col-sm-2' for='phone-" + noTickets + "'>Phone Number:</label>\n\
                <div class='col-sm-10'>\n\
                    <input type='text' class='phone form-control' id='phone-" + noTickets + "' name='phone-" + noTickets + "' placeholder='(Optional)'>\n\
                </div>\n\
            </div>\n\
        </div>\n\
        ";
        $("#container").append(html);
    }
    $("#number-tickets").html(noTickets);
    $("#total-price").html("Total: € " + totalPrice + ".00");
}

function removeTickets() {
    if (noTickets > 1) {
        var id = "#ticket-info-" + noTickets;
        $(id).remove();
    
        noTickets -= 1;
        if ($("input:checkbox").is(":checked")) {
            totalPrice = noTickets * 75 + 10;
        }
        else {
            totalPrice -= 55;
        }
    }
    $("#number-tickets").html(noTickets);
    $("#total-price").html("Total: € " + totalPrice + ".00");
}

$(document).ready(function() {
    noTickets = 1;
    totalPrice = 55;
    $("#number-tickets").html(noTickets);
    $("#total-price").html("Total: € " + totalPrice + ".00");
    $("#addbtn").click(addTickets);
    $("#removebtn").click(removeTickets);
    
    $("input:checkbox").on('click', function() {
        var $box = $(this);

        if ($box.is(":checked")) {
            var group = "input:checkbox[name='" + $box.attr("name") + "']";
            
            $(group).prop("checked", false);
            $(group).next().attr("src", "images/marker.png");
            
            $box.prop("checked", true);
            $box.next().attr("src", "images/selected-marker.png");

            totalPrice = noTickets * 75 + 10;
            $("#total-price").html("Total: € " + totalPrice + ".00");
        } else {
            $box.prop("checked", false);
            $box.next().attr("src", "images/marker.png");
            
            totalPrice = noTickets * 55;
            $("#total-price").html("Total: € " + totalPrice + ".00");
        }
    });
    
    $('[data-toggle="popover"]').popover({
        html: true,
        container: "body",
        trigger: "hover",
        placement : "top"
    });
});
