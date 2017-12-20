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

	<div id="page-banner-area" class="page-banner-area" style="background-image:url(images/banner/banner1.jpg)">
		
	</div><!-- Page Banner end -->

	<section id="main-container" class="main-container">
		<div class="container">
			<div class="row text-center">
				
				<h2 style="margin-top: 100px;" class="section-title">Festival Location</h2>
				<p class="section-sub-title">A short guide to Sportify venue and places to stay</p>
			</div><!--/ Title row end -->


			<div class="row">
				<div id="map" class="map"></div>

				<div class="gap-60"></div>

				<div class="venu-details text-center clearfix">

					<h2 class="section-title">Festival Venue</h2>
					<p class="section-sub-title"><strong>Our main festival venue is the Philips Stadium 5611BM, Eindhocwn The Netherlands</strong></p>

					<div class="col-md-4">
						<img class="img-responsive" src="images/pages/venu-img4.jpg" alt="img">
					</div>
					<div class="col-md-4">
						<img class="img-responsive" src="images/pages/venu-img5.jpg" alt="img">
					</div>

					<div class="col-md-4">
						<img class="img-responsive" src="images/pages/venu-img7.jpg" alt="img">
					</div>
				</div><!-- Venue details end -->
			</div><!-- Content row 1 end -->

			<div class="gap-60"></div>

			<div class="row text-center">
				<h2 class="section-title">Places to Stay</h2>
				<p class="section-sub-title"><strong>There are plenty of camping spots available. In order to secure yourself a camping spot, buy a ticket!.</strong></p>

				<div class="col-md-4">
					<div class="feature-box">
						<span class="feature-box-icon">
							<i class="fa fa-handshake-o"></i>
						</span>
						<h3 class="feature-title">Buy Your Ticket</h3>
						<div class="feature-box-content">
							<p>The festival camping spots can are for individuals.</p>
							<p><a class="btn btn-primary" href="#">Book Now</a></p>
						</div>
					</div><!-- Feature box end -->
				</div><!-- Col end -->

				<div class="col-md-4">
					<div class="feature-box">
						<span class="feature-box-icon">
							<i class="fa fa-building-o"></i>
						</span>
						<h3 class="feature-title">Tick the camping option</h3>
						<div class="feature-box-content">
							<p>For group bookings, we highly recommend taking a look at our Buy tickets section</p>
							<p><a class="btn btn-primary" href="#">Book a Camping</a></p>
						</div>
					</div><!-- Feature box end -->
				</div><!-- Col end -->

				<div class="col-md-4">
					<div class="feature-box">
						<span class="feature-box-icon">
							<i class="fa fa-hotel"></i>
						</span>
						<h3 class="feature-title">Your all set</h3>
						<div class="feature-box-content">
							<p>If you're on a budget, you can check out some different kinds that are out there, how they're built. of these hostel options.</p>
							<p><a class="btn btn-primary" href="#">Find a Room</a></p>
						</div>
					</div><!-- Feature box end -->
				</div><!-- Col end -->

			</div><!-- Content row 2 end -->



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

<!-- Mirrored from themefunction.com/html/eventime/venue.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Nov 2017 17:36:34 GMT -->
</html>