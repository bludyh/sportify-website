/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var noTickets;
$( document ).ready(function() {
    noTickets = 1;
    document.getElementById("number-tickets").innerHTML = noTickets;
});

function addTickets(){
    if (noTickets < 6) {
        noTickets += 1;
    
        var html = "<div id='ticket-info-" + noTickets + "' style='border-top: 1px solid'>\n\
            <h2>Ticket " + noTickets + "</h2>\n\
            <div class='form-group' style='margin-bottom: 30px'>\n\
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
        </div>\n\
        ";
        $( "#container" ).append( html );
    }
    document.getElementById("number-tickets").innerHTML = noTickets;
}

function removeTickets() {
    if (noTickets > 1) {
        var id = "#ticket-info-" + noTickets;
        $( id ).remove();
    
        noTickets -= 1;
    }
    document.getElementById("number-tickets").innerHTML = noTickets;
}
