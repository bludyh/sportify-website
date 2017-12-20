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
	                <a href="index-2.php">
	                	<img src="images/logo.png" alt="">
	                </a>
         		</div><!-- logo end -->
				</div><!-- Navbar header end -->

	    			</nav><!--/ Collapse end -->

				</div><!-- Site nav inner end -->

			</div><!-- Row end -->
		</div><!-- Container end -->
	</header><!--/ Header end -->

	<div id="page-banner-area" class="page-banner-area" style="background-image:url(images/banner/banner2.jpg)">
		<!-- Subpage title start -->
		<div class="page-banner-title">
        	<div class="text-center">
	        	<h2>Login</h2>
	        	<ul class="breadcrumb">
	            <li>Home</li>
	            <li>About</li>
	            <li><a href="#"> Tickets</a></li>
          	</ul>
         </div>
      </div><!-- Subpage title end -->
	</div><!-- Page Banner end -->

	<section id="main-container" class="main-container">
		<div class="container">
			<div class="row text-center">
				<span class="icon-wrap"><i class="fa fa-ticket"></i></span>
				<h2 class="section-title">Login or Register</h2>
				<p class="section-sub-title">Be a part of this great event</p>
			</div><!--/ Title row end -->

			<!-- Login Form Start -->
			<main id="tg-main" class="tg-main tg-haslayout">
			<div class="container">
				<div class="row">
					<div class="col-sm-offset-2 col-sm-8">
						<div class="tg-commingsoon">
							
							<div class="tg-commingsoon-content">
							
							<!-- Login Form -->
							
							<div style="margin-top: 150px;" class="tg-formarea2">
							<div class="tg-getfreeebook">
								
<!--								<form class="tg-themeform tg-formgetfreeebook">
									<fieldset>
										
										<div class="form-group">
											<input type="tel" name="yournumber" class="form-control" placeholder="Your Email">
										</div>
										<div class="form-group">
											<input type="password" name="youremailid" class="form-control" placeholder="Your Password">
										</div>
										<button class="tg-btn" type="submit">Login</button>
									</fieldset>
								</form>-->

                                                                <form class="tg-themeform tg-formgetfreeebook form-login" method="post" id="login-form">
                                                                    <div id="error">
                                                                        <!-- error will be shown here ! -->
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="email" name="email" class="form-control" placeholder="Email Address" id="email">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="password" name="password" class="form-control" placeholder="Password" id="password">
                                                                    </div>
                                                                    <button class="tg-btn" type="submit" name="login-btn" id="login-btn">
                                                                        <span class="glyphicon glyphicon-log-in"></span> &nbsp; Log In
                                                                    </button>
                                                                </form>
							</div>
						</div>
			
			
			<!-- Login form end-->
		</div><!-- Conatiner end -->
	</section><!-- Main container end -->


	<?php include("../lib/templates/footer.inc.html"); ?>


	<!-- Javascript Files
	================================================== -->

	<!-- initialize jQuery Library -->
	<script type="text/javascript" src="js/jquery.js"></script>
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
        <!-- Ajax login -->
        <script type="text/javascript" src="js/ajax-login.js"></script>
	
	</div><!-- Body inner end -->
</body>

<!-- Mirrored from themefunction.com/html/eventime/tickets.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Nov 2017 17:36:36 GMT -->
</html>