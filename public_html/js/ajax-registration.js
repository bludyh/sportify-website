$("document").ready(function() {
    $.validator.addMethod("minAge", function(value) {
        var today = new Date();
        var birthDate = new Date(value);
        var age = today.getFullYear() - birthDate.getFullYear();

        if (age > 17) {
            return true;
        }
    });
    
    $("#ticket-registration-form").on("submit", function() {
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
        $(".email").each(function() {
            $(this).rules("add", 
                {
                    required: true,
                    email: true,
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
    });
    
    $("#ticket-registration-form").validate({
        sumitHandler: submit
    });
    
    function submit() {
        
    }
    
    /* signup form validation */    
//    $("#ticket-registration-form").validate({
//        rules: {
//            "firstname-1": { required: true },
//            email: {
//                required: true,
//                email: true
//            },
//            password: {
//                required: true,
//                minlength: 8
//            },
//            cpassword: {
//                required: true,
//                equalTo: "#password"
//            }
//        },
//        messages: {
//          name: "Please enter your full name",
//          email: "Please enter a valid email address",
//          password: {
//              required: "Please provide a password",
//              minlength: "Password must contain at least 8 characters"
//          },
//          cpassword: {
//              required: "Please confirm your password",
//              equalTo: "Password not match !"
//          }
//        },
//        submitHandler: submit
//    });
//    
//    /* submit form */
//    
//    function submit() {
//        var data = $("#signup-form").serialize();
//        $.ajax({
//            type: "POST",
//            url: "_signup.php",
//            data: data,
//            beforeSend: function() {
//                $("#error").fadeOut();
//                $("#signup-btn").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Sending ...');
//            },
//            success: function(response) {      
//                if($.trim(response) === "error"){
//                    $("#error").fadeIn(1000, function(){
//                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Email already taken !</div>');
//                        $("#signup-btn").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign Up');
//                    });
//                } else if($.trim(response) === "registered") {
//                    $("#signup-btn").html('<img src="images/AjaxLoader.gif" height="16" width="16"/> &nbsp; Signing Up ...');
//
//                    var login_data = "email=" + $("#email").val() + "&password=" + $("#password").val();
//                    $.ajax({
//                        type: 'POST',
//                        url: '_login.php',
//                        data: login_data,
//                        success: function(response) {
//                            if ($.trim(response) === "ok") {
//                                setTimeout(' window.location.href = "getting-started.php"; ',4000);
//                            }
//                        }
//                    });
//                } else{
//                    $("#error").fadeIn(1000, function(){
//                        $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+ response +' !</div>');
//                        $("#signup-btn").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign Up');
//                    });
//                }
//            }
//        });
//    }
});


