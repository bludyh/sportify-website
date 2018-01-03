<?php 
    require("../lib/authorization.php");
    
    if (IsResetPasswordAccessible()) {
        $visitorId = Database::ExecuteReader("SELECT visitor_id FROM password_recovery WHERE token_key=:token_key", [":token_key" => filter_input(INPUT_GET, "token", FILTER_SANITIZE_STRING)])[0]["visitor_id"];
        
        $visitor = new Visitor();
        $visitor->SelectVisitorBy("visitor_id", $visitorId);
    }
    else {
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<?php include("../lib/templates/head.inc.html"); ?>
    
<body>

	<div class="body-inner">

	<!-- <div class="preload"></div> -->

	<!-- Header start -->
	<header id="header" class="header header-transparent">
		<div class="container">
			<div class="row">
				<div class="navbar-header">
                                    <div class="logo">
                                        <a href="index.php">
                                            <img src="images/logo.png" alt="">
                                        </a>
                                    </div><!-- logo end -->
				</div><!-- Navbar header end -->
					
			</div><!-- Row end -->
		</div><!-- Container end -->
	</header><!--/ Header end -->

	<div id="page-banner-area" class="page-banner-area" style="background-image:url(images/banner/banner1.jpg)"></div><!-- Page Banner end -->

	<section id="main-container" class="main-container">
		<div class="container">
                    <div class="row text-center">
                            <span class="icon-wrap"><i class="fa fa-refresh" aria-hidden="true"></i></span>
                            <h2 class="section-title">Reset Your Password</h2>
                            <p class="section-sub-title">Enter your new password below</p>
                    </div><!--/ Title row end -->

                    <!-- Reset Password Form Start -->
                    <div id="form-container" style="height: 300px;">
                        <div class="row">
                            <div class="col-md-offset-2 col-sm-8"id="popup">

                            </div>
                        </div>
                        <form id="reset-password-form" class="form-horizontal" method="post">
                            <input type="hidden" id="email" name="email" value="<?php echo($visitor->email); ?>">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="new-password">New Password:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="new-password" name="new-password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="confirm-new-password">Confirm Password:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="confirm-new-password" name="confirm-new-password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary" id="reset-password-btn">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

	</section><!-- Main container end -->


	<?php include("../lib/templates/footer.inc.html"); ?>


	<!-- Javascript Files
	================================================== -->

	<!-- initialize jQuery Library -->
	<script type="text/javascript" src="js/jquery.js"></script>
        <!-- jQuery UI -->
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<!-- Bootstrap jQuery -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!-- Counter -->
	<script type="text/javascript" src="js/jquery.counterup.min.js"></script>
	<!-- Waypoints -->
	<script type="text/javascript" src="js/waypoints.min.js"></script>
	<!-- Color box -->
	<script type="text/javascript" src="js/jquery.colorbox.js"></script>
	<!-- Template custom -->
	<script type="text/javascript" src="js/custom.js"></script>
        <!-- jQuery validation -->
        <script type="text/javascript" src="js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/reset-password.js"></script>

        
	</div><!-- Body inner end -->
</body>

<!-- Mirrored from themefunction.com/html/eventime/tickets.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Nov 2017 17:36:36 GMT -->
</html>

