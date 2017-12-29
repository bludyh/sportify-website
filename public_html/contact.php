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

				<?php include("../lib/templates/navbar.inc.html"); ?>

			</div><!-- Row end -->
		</div><!-- Container end -->
	</header><!--/ Header end -->
	
	<div id="page-banner-area" class="page-banner-area" style="background-image:url(images/banner/banner1.jpg)"></div><!-- Banner end -->

	<section id="main-container" class="main-container">
		<div class="container">
                    <div style="margin-top: 100px" class="row text-center">
                        <span class="icon-wrap"><i  class="fa fa-phone"></i></span>
                        <h2 class="section-title">Contact Us</h2>
                        <p class="section-sub-title">Need more information?</p>
                    </div><!--/ Title row end -->
                    
			<div id="map" class="map"></div>

			<div class="gap-60"></div>

			<div class="row">

				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
	    			<h3 class="title-classic">Send Message</h3>
	    			<form id="contact-form" action="http://themefunction.com/html/eventime/contact-form.php" method="post" role="form">
	    				<div class="error-container"></div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Name</label>
								<input class="form-control form-control-name" name="name" id="name" placeholder="" type="text" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Email</label>
									<input class="form-control form-control-email" name="email" id="email" 
									placeholder="" type="email" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Subject</label>
									<input class="form-control form-control-subject" name="subject" id="subject" 
									placeholder="" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Message</label>
							<textarea class="form-control form-control-message" name="message" id="message" placeholder="" rows="10" required></textarea>
						</div>
						<div class="text-right"><br>
							<button class="btn btn-primary solid blank" type="submit">Send Message</button> 
						</div>
					</form>
	    		</div><!-- Col end -->

	    		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

	    			<div class="gap-20"></div>

					<div class="sidebar sidebar-left">
						<div class="widget contact-info">
							<div class="contact-info-box">
								<i class="fa fa-building">&nbsp;</i>
								<div class="contact-info-box-content">
									<h4>Office</h4>
									<p>Sportify HQ, Philips Stadion Eindhoven 5611BM</p>
								</div>
							</div>

							<div class="contact-info-box">
								<i class="fa fa-envelope">&nbsp;</i>
								<div class="contact-info-box-content">
									<h4>Email</h4>
									<p>contact@sportify.nl</p>
								</div>
							</div>

							<div class="contact-info-box">
								<i class="fa fa-phone-square">&nbsp;</i>
								<div class="contact-info-box-content">
									<h4>Phone</h4>
									<p>+31 (0)68 555 6102</p>
								</div>
							</div>

						</div><!-- Widget end -->
					</div><!-- Sidebar left end -->
				</div><!-- Sidebar col end -->
			
			</div><!-- Content row -->
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
	<!-- Google Map -->
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCsa2Mi2HqyEcEnM1urFSIGEpvualYjwwM"></script>
	<!-- Doc https://developers.google.com/maps/documentation/javascript/get-api-key -->
	<!-- For latitude and longitude use http://www.latlong.net/ -->

	<script type="text/javascript" src="js/gmap3.js"></script>

	<script type="text/javascript">

		/* Google Map */

		$(function () {
	       $('#map')
	         .gmap3({
	           address:"121 King Street, Melbourne Victoria 3000 Australia",
	           zoom: 13,
	           center:[-37.817274,144.955709],
	           mapTypeId : google.maps.MapTypeId.ROADMAP,
	           scrollwheel: false
	         })
	         .marker([
		        {position:[-37.817274,144.955709]},
		        {icon: "http://maps.google.com/mapfiles/marker_grey.png"}
		      ])
	     });

	</script>

	<!-- Template custom -->
	<script type="text/javascript" src="js/custom.js"></script>

	
	</div><!-- Body inner end -->
</body>

<!-- Mirrored from themefunction.com/html/eventime/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Nov 2017 17:36:45 GMT -->
</html>