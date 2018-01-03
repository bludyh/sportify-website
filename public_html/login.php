<?php 
    require("../lib/authorization.php");
    
    if (IsRememberMeEnabled() || IsLoggedIn()) {
        header("Location: dashboard.php");
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

                            <?php include("../lib/templates/navbar.inc.html"); ?>
					
			</div><!-- Row end -->
		</div><!-- Container end -->
	</header><!--/ Header end -->

	<div id="page-banner-area" class="page-banner-area" style="background-image:url(images/banner/banner1.jpg)"></div><!-- Page Banner end -->

	<section id="main-container" class="main-container">
		<div class="container">
                    <div style="margin-top: 100px" class="row text-center">
                            <span class="icon-wrap"><i  class="fa fa-sign-in"></i></span>
                            <h2 class="section-title">Login</h2>
                            <p class="section-sub-title">Be a part of this great event</p>
                    </div><!--/ Title row end -->

                    <!-- Login Form Start -->
                    <div id="form-container" style="height: 300px;">
                        <ul class="nav nav-tabs" style="display: none">
                            <li class="active"><a href="#tab-1" data-toggle="tab"></a></li>
                            <li><a href="#tab-2" data-toggle="tab"></a></li>
                         </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab-1">
                                <div class="row">
                                    <div class="col-md-offset-2 col-sm-8" id="popup-1">
                                        
                                    </div>
                                </div>
                                <form id="login-form" class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Email Address:</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="password">Password:</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="password" name="password">
                                        </div>
                                    </div>
                                    <div class="form-group"> 
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <div class="checkbox">
                                                <label><input type="checkbox" id="remember-me" name="remember-me" value="1"> Remember me</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary" id="login-btn">Login</button>
                                            <a style="margin-left: 10px; display: inline; cursor: pointer;" id="forgotpassword">Forgot your password?</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tab-2">
                                <div class="row">
                                    <div class="col-md-offset-2 col-sm-8"id="popup-2">

                                    </div>
                                </div>
                                <form id="forgot-password-form" class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <p style="text-align: center">Don't worry! Just fill in your email address below and we'll help you reset your password.</p>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="reset-email">Email Address:</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="reset-email" name="reset-email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-6 col-sm-6" style="text-align: right">
                                            <a style="margin-right: 20px; display: inline; cursor: pointer;" id="backbtn"><i class="fa fa-chevron-left" aria-hidden="true"></i> <strong>BACK</strong></a>
                                            <button type="submit" class="btn btn-primary" id="forgot-password-btn">Send</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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
        <script type="text/javascript" src="js/additional-methods.min.js"></script>
        <!-- Login script -->
        <script type="text/javascript" src="js/login.js"></script>
        
	</div><!-- Body inner end -->
</body>

<!-- Mirrored from themefunction.com/html/eventime/tickets.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Nov 2017 17:36:36 GMT -->
</html>