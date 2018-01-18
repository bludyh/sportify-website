$("document").ready(function() {
    $("#forgotpassword").click(function(){
        $(".nav-tabs > .active").next("li").find("a").trigger("click");
        $("#popup-2").empty();
        $("label.error").hide();
        $(".error").removeClass("error");
    });
    $("#backbtn").click(function() {
        $(".nav-tabs > .active").prev("li").find("a").trigger("click");
        $("#popup-1").empty();
        $("label.error").hide();
        $(".error").removeClass("error");
        
    });
    
    /* login form validation */
    
    $("#login-form").validate({
        rules: {
            password: {
                required: true
            },
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            password:{
                required: "Please enter your password"
            },
            email: {
                required: "Please enter your email address",
                email: "Please enter a valid email address"
            }
        },
        submitHandler: function() {
            var data = "form-name=login&" + $("#login-form").serialize();
            $.ajax({
                type : "POST",
                url : "requests-handler.php",
                data : data,
                beforeSend: function(){
                    $("#popup-1").fadeOut();
                    $("#login-btn").html("<img src='images/ajax-loader.gif' height='16' width='16'/> &nbsp; Logging In ...");
                },
                success : function(response){
                    if ($.trim(response) === "ok"){
                        setTimeout("window.location.replace('dashboard.php');", 2000);
                    } else {
                        setTimeout(function() {
                            $("#email").val("");
                            $("#password").val("");
                            $("#popup-1").hide().html("<div class='alert alert-danger' style='text-align: center'><i class='fa fa-times' aria-hidden='true'></i> The email address or password you entered is not correct</div>").fadeIn(1000);
                            $("#login-btn").html("Login");
                        }, 2000);
                    }
                }
            });
        }
    });
    
    $("#forgot-password-form").validate({
        rules: {
            "reset-email": {
                required: true,
                email: true
            }
        },
        messages: {
            "reset-email": {
                required: "Please enter your email address",
                email: "Please enter a valid email address"
            }
        },
        submitHandler: function() {
            var data = "form-name=forgot-password&" + $("#forgot-password-form").serialize();
            $.ajax({
                type: "POST",
                url: "requests-handler.php",
                data: data,
                beforeSend: function() {
                    $("#popup-2").fadeOut();
                    $("#forgot-password-btn").html("<img src='images/ajax-loader.gif' height='16' width='16'/> &nbsp; Sending ...");
                },
                success: function() {
                    setTimeout(function() {
                        $("#reset-email").val("");
                        $("#popup-2").hide().html("<div class='alert alert-success' style='text-align: center'><i class='fa fa-check' aria-hidden='true'></i> Password reset link has been sent to your email!</div>").fadeIn(1000);
                        $("#forgot-password-btn").html("Send");
                    }, 2000);
                }
            });
        }
    });
    
});


