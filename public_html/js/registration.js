/* global noTickets */

function addValidationRules() {
    $(".fname").each(function() {
        $(this).rules("add", 
            {
                required: true,
                messages: {
                    required: "First name is required!"
                }
            });
    });
    $(".lname").each(function() {
        $(this).rules("add", 
            {
                required: true,
                messages: {
                    required: "Last name is required!"
                }
            });
    });
    $(".bday").each(function() {
        var date = $(this).val();
        $(this).rules("add", 
            {
                required: true,
                minAge: date,
                messages: {
                    required: "Date of birth is required!",
                    minAge: "Minimum age to attend our event is 18!"
                }
            });
    });
    $(".email").each(function(index) {
        $(this).rules("add", 
            {
                required: true,
                email: true,
                notEqual: [".email"],
                onkeyup: false,
                remote: {
                    type: "POST",
                    url: "requests-handler.php",
                    data: {
                        emailToCheck: function() {
                            return $("#email-" + (index + 1)).val();
                        }
                    }
                },
                messages: {
                    required: "Email address is required!",
                    email: "Please enter a valid email address!"
                }
            });
    });
    $(".cemail").each(function(index) {
        $(this).rules("add", 
            {
                required: true,
                equalTo: "#email-" + (index + 1),
                messages: {
                    required: "Please confirm your email address!",
                    equalTo: "Email address does not match!"
                }
            });
    });
    $(".phone").each(function() {
        $(this).rules("add", 
            {
                phoneNL: true
            });
    });
}

function ShowTicketSummary() {
    $("#table-body").empty();
    var html;
    
    for (i = 0; i < noTickets; i++) {
        var ticketNo = i + 1;
        var firstName = $("#firstname-" + (i + 1)).val();
        var lastName = $("#lastname-" + (i + 1)).val();
        var birthday = $("#birthday-" + (i + 1)).val();
        var email = $("#email-" + (i + 1)).val();
        var phone = $("#phone-" + (i + 1)).val();
        
        html += "<tr>\n\
            <td>" + ticketNo + "</td>\n\
            <td>" + firstName + "</td>\n\
            <td>" + lastName + "</td>\n\
            <td>" + birthday + "</td>\n\
            <td>" + email + "</td>\n\
            <td>" + phone + "</td>\n\
            <td>€55.00</td>\n\
        </tr>";
    }
    
    $("#table-body").html(html);
}

function ShowCampingSpotOverview() {
    $("#overview-img, #overview-text").empty();
    var str = $(".checkbox-marker:checked").next().attr("data-content");
    
    if (str !== undefined) {
        $("#overview-img").html(str.match(/<img.*\/>/));
        $("#overview-text").html(str.match(/<p>.*/) + "<p><strong>Price: </strong>€" + (noTickets * 20 + 10) + ".00</p>");
    }
    else {
        $("#overview-img").html("<p><em>None</em></p>");
    }
}

function ScrollTo(element) {
    $("html, body").animate({
        scrollTop: $(element).offset().top
    }, 500);
}

$("document").ready(function() {
    $("#addbtn, #removebtn").each(function() {
        $(this).click(addValidationRules);
    });
    
    $.validator.addMethod("minAge", function(value) {
        var today = new Date();
        var birthDate = new Date(value);
        var age = today.getFullYear() - birthDate.getFullYear();

        if (age > 17) {
            return true;
        }
    });
    
    $.validator.addMethod("phoneNL", function(phone_number, element) {
        phone_number = phone_number.replace(/\s+/g, "");
        return this.optional(element) || phone_number.length > 9 && phone_number.match(/^[0-9\+\-\(\)\s]+$/);
    }, "Please specify a valid phone number");
    
    $.validator.addMethod("notEqual", function(value, element, options) {
        var elements = $(element).parents("form").find(options[0]);
        var valueToCompare = value;
        var matchesFound = 0;
        
        $.each(elements, function() {
            if ($(this).val() === valueToCompare) {
                matchesFound++;
            }
        });
        
        if (this.optional(element) || matchesFound <= 1) {
            return true;
        }
        else {
            
        }
    }, "Same email address cannot be used for multiple tickets!");
    
    $("#ticket-registration-form").validate({
        onkeyup: function(element) {
            var element_id = $(element).attr('id');
            if (this.settings.rules[element_id].onkeyup !== false) {
                $.validator.defaults.onkeyup.apply(this, arguments);
            }
        },
        onfocusout: function(element) { 
            $(element).valid(); 
        },
        submitHandler: function() {
            var data = "form-name=ticket-registration&" + "number-tickets=" + noTickets + "&" + $("#ticket-registration-form").serialize();
            $.ajax({
                type: "POST",
                url: "requests-handler.php",
                data: data,
                beforeSend: function() {
                    $("#next-btn").html('<img src="images/ajax-loader.gif" height="16" width="16"/> &nbsp; Processing ...');
                },
                success: function(response) {
                    var alert;
                    var icon;
                    var message;
                    if ($.trim(response) === "ok") {
                        alert = "success";
                        icon = "check";
                        message = "Thank you for purchasing <strong>Sportify Festival 2018</strong> ticket! Your order has been processed successfully. Please check your email inbox for details about your ticket, event account and instructions. We hope you will have a great time at our event";
                    }
                    else {
                        alert = "danger";
                        icon = "times";
                        message = response;
                    }
                    $("#wrapper").fadeOut(1000, function() {
                        ScrollTo("#dunno");
                        $(this).empty();
                        $("#popup").hide().html("<div class='alert alert-" + alert + "' style='text-align: center'><i class='fa fa-" + icon + "' aria-hidden='true'></i> " + message + "</div>").fadeIn(1000);
                    });
                }
            });
        }
    });
    
    addValidationRules();
    
    $("ul.nav-tabs > li > a").click(function() {
        if ($("#ticket-registration-form").valid()) {
            if ($(this).attr("href") === "#step-1") {
                $("#back-btn").empty();
                $("#next-btn").html("Next");
            }
            else if ($(this).attr("href") === "#step-3") {
                $("#back-btn").html("<i class='fa fa-chevron-left' aria-hidden='true'></i> <strong>BACK</strong>");
                $("#next-btn").html("Order Now");

                ShowTicketSummary();
                ShowCampingSpotOverview();
            }
            else {
                $("#back-btn").html("<i class='fa fa-chevron-left' aria-hidden='true'></i> <strong>BACK</strong>");
                $("#next-btn").html("Next");
            }
        }
        else {
            return false;
        }
    });
    
    $("#edit-btn").click(function() {
        $("a[href='#step-1']").trigger("click");
        
        ScrollTo("#wrapper");
    });
    
    $("#change-btn").click(function() {
        $("a[href='#step-2']").trigger("click");
        
        ScrollTo("#wrapper");
    });
    
    $("#next-btn").click(function() {
        if ($("#ticket-registration-form").valid()) {
            $("#back-btn").html("<i class='fa fa-chevron-left' aria-hidden='true'></i> <strong>BACK</strong>");
            
            if ($(".nav-tabs > .active").next("li").find("a").attr("href") === "#step-3") {
                $("#next-btn").html("Order Now");
                
                ShowTicketSummary();
                ShowCampingSpotOverview();
            }
            
            if ($(".nav-tabs > .active").find("a").attr("href") === "#step-3") {
                $("#ticket-registration-form").submit();
            } else {
                $(".nav-tabs > .active").next("li").removeClass("disabled").find("a").attr("data-toggle", "tab").trigger("click");
                
                ScrollTo("#wrapper");
            }
        }
        else {
            return false;
        }
    });
    
    $("#back-btn").click(function() {
        if ($(".nav-tabs > .active").prev("li").find("a").attr("href") === "#step-1") {
            $("#back-btn").empty();
        }
        $("#next-btn").html("Next");
        $(".nav-tabs > .active").prev("li").find("a").trigger("click");
        
        ScrollTo("#wrapper");
    });
    
});


