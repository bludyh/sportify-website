/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$("document").ready(function() {
    $("#reset-password-form").validate({
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
        onfocusout: function(element) {
            $(element).valid();
        },
        submitHandler: function() {
            var data = "form-name=reset-password&" + $("#reset-password-form").serialize();
            $.ajax({
                type: "POST",
                url: "requests-handler.php",
                data: data,
                beforeSend: function() {
                    $("#popup").fadeOut();
                    $("#reset-password-btn").html("<img src='images/ajax-loader.gif' height='16' width='16'/> &nbsp; Processing ...");
                },
                success: function(response) {
                    var alert;
                    var icon;
                    var message;
                    if ($.trim(response) === "ok") {
                        alert = "success";
                        icon = "check";
                        message = "Your password has been reset successfully! Click <a href='login.php'>here</a> to login";
                    }
                    else {
                        alert = "danger";
                        icon = "times";
                        message = response;
                    }
                    $("#reset-password-form").delay(1000).hide("slide", {direction: "left"}, 1000, function() {
                        $("#popup").hide().html("<div class='alert alert-" + alert + "' style='text-align: center'><i class='fa fa-" + icon + "' aria-hidden='true'></i> " + message + "</div>").fadeIn(1000, function() {
                            $("#reset-password-form").remove();
                        });
                    });
                }
            });
        }
    });
});

