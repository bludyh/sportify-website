/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$("document").ready(function() {
    $("#change-password-form").validate({
        rules: {
            "new-password": {
                required: true,
                minlength: 8
            },
            "confirm-new-password": {
                required: true,
                equalTo: "#new-password"
            }
        },
        messages: {
            "new-password":{
                required: "Please provide a new password!",
                minlength: "Password must contain at least 8 characters!"
            },
            "confirm-new-password": {
                required: "Please confirm your password!",
                equalTo: "Password not match!"
            }
        },
        onkeyup: function(element) {
            $(element).valid();
        },
        submitHandler: function() {
            var data = "form-name=change-password&" + $("#change-password-form").serialize();
            $.ajax({
                type: "POST",
                url: "requests-handler.php",
                data: data,
                beforeSend: function() {
                    $("#popup").fadeOut();
                    $("#change-password-btn").html("<img src='images/ajax-loader.gif' height='16' width='16'/> &nbsp; Processing ...");
                },
                success: function(response) {
                    var alert;
                    var icon;
                    var message;
                    if ($.trim(response) === "ok") {
                        alert = "success";
                        icon = "check";
                        message = "Your password has been changed successfully!";
                    }
                    setTimeout(function() {
                        $("#popup").hide().html("<div class='alert alert-" + alert + "' style='text-align: center'><i class='fa fa-" + icon + "' aria-hidden='true'></i> " + message + "</div>").fadeIn(1000);
                        $("#new-password").val("");
                        $("#confirm-new-password").val("");
                        $("#change-password-btn").html("Change");
                    }, 2000);
                }
            });
        }
    });
});

