$("document").ready(function() {
    
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
            email: "Please enter your email address"
        },
        submitHandler: submit
    });  

    /* login submit */
    function submit() {
        var data = $("#login-form").serialize();
        $.ajax({
            type : 'POST',
            url : '_login.php',
            data : data,
            beforeSend: function(){
                $("#error").fadeOut();
                $("#login-btn").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Sending ...');
                },
            success : function(response){
                if ($.trim(response) === "ok"){
                    $("#login-btn").html('<img src="images/AjaxLoader.gif" height="16" width="16"/> &nbsp; Logging In ...');
                    setTimeout(' window.location.href = "user-profile.php"; ',4000);
                } else {
                    $("#error").fadeIn(1000, function(){
                    $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
                    $("#login-btn").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Log In');
                    });
                }
            }
        });
        return false;
    }
});


