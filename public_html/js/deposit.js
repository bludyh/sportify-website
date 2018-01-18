/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    $.validator.addMethod("positiveAmount", function(value) {
        return Number(value) > 0;
    }, "Please enter a positive amount!");
    
    $("#deposit-form").validate({
        rules: {
            "deposit-amount": {
                required: true,
                number: true,
                positiveAmount: true
            }
        },
        messages: {
            "deposit-amount":{
                required: "Please provide the amount you want to deposit!"
            }
        },
        onkeyup: function(element) {
            $(element).valid();
        }
    }); 
});
