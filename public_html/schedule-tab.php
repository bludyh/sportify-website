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

	<div id="page-banner-area" class="page-banner-area" style="background-image:url(images/banner/banner1.jpg)">
		<!-- Subpage title start -->
		<div class="page-banner-title">
        	<div class="text-center">
	        	<h2>Schedule</h2>
	        	<ul class="breadcrumb">
	            <li>Home</li>
	            <li>Schedule</li>
	            <li><a href="#"> Schedule Tab Style</a></li>
          	</ul>
         </div>
      </div><!-- Subpage title end -->
	</div><!-- Page Banner end -->

	<section id="main-container" class="main-container">
		<div class="container">
			<div class="row text-center">
				<span class="icon-wrap"><i class="fa fa-calendar"></i></span>
				<h2 class="section-title">Schedule</h2>
				<p class="section-sub-title">Full-day Events with Awesome Speakers</p>
			</div><!--/ Title row end -->


			<div class="row">
				<div class="col-md-12">
					<div class="schedule-tab">
						<ul class="nav nav-tabs" id="nav-tabs">
						  	<li class="active">
						  		<a class="animated fadeIn" href="#tab_one" data-toggle="tab">
						  			<span class="tab-head">
										<span class="tab-text-title">Day One</span>					
									</span>
						  		</a>
						  	</li>
						  	<li>
							  	<a class="animated fadeIn" href="#tab_two" data-toggle="tab">
							  		<span class="tab-head">
										<span class="tab-text-title">Day Two</span>					
									</span>
							  	</a>
							</li>
						 	<li>
							  	<a class="animated fadeIn" href="#tab_three" data-toggle="tab">
							  		<span class="tab-head">
										<span class="tab-text-title">Day Three</span>					
									</span>
							  	</a>
							</li>
						</ul>

						<div class="tab-content">
					      <div class="tab-pane active animated fadeInRight" id="tab_one">
				        		<h2 class="schedule-date">Thursday, 17th August</h2>

				        		<div class="schedule-listing">
				        			<span class="schedule-slot-time">08:00 - 09:30 AM</span>
				        			<div class="schedule-slot-info">
				        				<div class="schedule-slot-info-content">
				        					<h3 class="schedule-slot-title">Registration</h3>
				        					<p class="schedule-slot-desc">Pick up your name badge and goodie bag</p>
				        				</div><!--Info content end -->
				        			</div><!-- Slot info end -->
				        		</div><!-- Slot listing 1 end -->

				        		<div class="schedule-listing">
				        			<span class="schedule-slot-time">09:30 - 11:15AM</span>
				        			<div class="schedule-slot-info">
				        				<a href="#">
				        					<img class="schedule-slot-speakers" src="images/speakers/speaker1.jpg" alt="" />
				        				</a>
				        				<div class="schedule-slot-info-content">
				        					<h3 class="schedule-slot-title">Dirty Little Tricks From The Dark Corners</h3>
				        					<h4 class="schedule-slot-speaker-name">Henry Sr. Flint</h4>
				        					<p class="schedule-slot-desc">Anna has collated all their findings for this talk on the different kinds that are out there, how they're built.</p>
				        				</div><!--Info content end -->
				        			</div><!-- Slot info end -->
				        		</div><!-- Slot listing 2 end -->

				        		<div class="schedule-listing">
				        			<span class="schedule-slot-time">11:15 - 13:15PM</span>
				        			<div class="schedule-slot-info">
				        				<a href="#">
				        					<img class="schedule-slot-speakers" src="images/speakers/speaker2.jpg" alt="" />
				        				</a>
				        				<div class="schedule-slot-info-content">
				        					<h3 class="schedule-slot-title">Using OLRs to Accomplish Your Most Important Goals</h3>
				        					<h4 class="schedule-slot-speaker-name">Melisa Lund</h4>
				        					<p class="schedule-slot-desc">We’re always looking at new ways to become more efficient web designers, new tools and generators appear nearly every day..</p>
				        				</div><!--Info content end -->
				        			</div><!-- Slot info end -->
				        		</div><!-- Slot listing 3 end -->

				        		<div class="schedule-listing">
				        			<span class="schedule-slot-time">13:30 - 14:30PM</span>
				        			<div class="schedule-slot-info">
				        				<div class="schedule-slot-info-content">
				        					<h3 class="schedule-slot-title">Lunch</h3>
				        					<p class="schedule-slot-desc">Five star buffet for everybody.</p>
				        				</div><!--Info content end -->
				        			</div><!-- Slot info end -->
				        		</div><!-- Slot listing 4 end -->

				        		<div class="schedule-listing listing-last">
				        			<span class="schedule-slot-time">14:35 - 16:00PM</span>
				        			<div class="schedule-slot-info">
				        				<a href="#">
				        					<img class="schedule-slot-speakers" src="images/speakers/speaker3.jpg" alt="" />
				        				</a>
				        				<div class="schedule-slot-info-content">
				        					<h3 class="schedule-slot-title">A frontier for designers: cultures of creativity</h3>
				        					<h4 class="schedule-slot-speaker-name">Agaton Johnsson</h4>
				        					<p class="schedule-slot-desc">We’re always looking at new ways to become more efficient web designers, new tools and generators appear nearly every day..</p>
				        				</div><!--Info content end -->
				        			</div><!-- Slot info end -->
				        		</div><!-- Slot listing 5 end -->

					      </div><!-- Tab pane 1 end -->

				        <div class="tab-pane animated fadeInRight" id="tab_two">
				      		<h2 class="schedule-date">Friday, 18th August</h2>

				        		<div class="schedule-listing">
				        			<span class="schedule-slot-time">09:30 - 11:15AM</span>
				        			<div class="schedule-slot-info">
				        				<a href="#">
				        					<img class="schedule-slot-speakers" src="images/speakers/speaker4.jpg" alt="" />
				        				</a>
				        				<div class="schedule-slot-info-content">
				        					<h3 class="schedule-slot-title">Three Star Product Experiences</h3>
				        					<h4 class="schedule-slot-speaker-name">Rebecca Henriksson</h4>
				        					<p class="schedule-slot-desc">Anna has collated all their findings for this talk on the different kinds that are out there, how they're built.</p>
				        				</div><!--Info content end -->
				        			</div><!-- Slot info end -->
				        		</div><!-- Slot listing 1 end -->

				        		<div class="schedule-listing">
				        			<span class="schedule-slot-time">11:15 - 13:15PM</span>
				        			<div class="schedule-slot-info">
				        				<a href="#">
				        					<img class="schedule-slot-speakers" src="images/speakers/speaker5.jpg" alt="" />
				        				</a>
				        				<div class="schedule-slot-info-content">
				        					<h3 class="schedule-slot-title">Sketching with confidence, clarity and imagination</h3>
				        					<h4 class="schedule-slot-speaker-name">Olle Gustavsson</h4>
				        					<p class="schedule-slot-desc">We’re always looking at new ways to become more efficient web designers, new tools and generators appear nearly every day..</p>
				        				</div><!--Info content end -->
				        			</div><!-- Slot info end -->
				        		</div><!-- Slot listing 2 end -->

				        		<div class="schedule-listing">
				        			<span class="schedule-slot-time">13:30 - 14:30PM</span>
				        			<div class="schedule-slot-info">
				        				<div class="schedule-slot-info-content">
				        					<h3 class="schedule-slot-title">Lunch</h3>
				        					<p class="schedule-slot-desc">Five star buffet for everybody.</p>
				        				</div><!--Info content end -->
				        			</div><!-- Slot info end -->
				        		</div><!-- Slot listing 3 end -->

				        		<div class="schedule-listing listing-last">
				        			<span class="schedule-slot-time">14:35 - 16:00PM</span>
				        			<div class="schedule-slot-info">
				        				<a href="#">
				        					<img class="schedule-slot-speakers" src="images/speakers/speaker6.jpg" alt="" />
				        				</a>
				        				<div class="schedule-slot-info-content">
				        					<h3 class="schedule-slot-title">Designing MVP Experiments That Work</h3>
				        					<h4 class="schedule-slot-speaker-name">Romeo Gunnarsson</h4>
				        					<p class="schedule-slot-desc">We’re always looking at new ways to become more efficient web designers, new tools and generators appear nearly every day..</p>
				        				</div><!--Info content end -->
				        			</div><!-- Slot info end -->
				        		</div><!-- Slot listing 4 end -->
				        </div><!-- Tab pane 2 end -->

				        	<div class="tab-pane animated fadeInLeft" id="tab_three">
				            <h2 class="schedule-date">Saturday, 19th August</h2>

				        		<div class="schedule-listing">
				        			<span class="schedule-slot-time">09:30 - 11:15AM</span>
				        			<div class="schedule-slot-info">
				        				<a href="#">
				        					<img class="schedule-slot-speakers" src="images/speakers/keynote1.jpg" alt="" />
				        				</a>
				        				<div class="schedule-slot-info-content">
				        					<h3 class="schedule-slot-title">Key Note: Packaging Modern Web Applications</h3>
				        					<h4 class="schedule-slot-speaker-name">Fredric Martinsson</h4>
				        					<p class="schedule-slot-desc">Anna has collated all their findings for this talk on the different kinds that are out there, how they're built.</p>
				        				</div><!--Info content end -->
				        			</div><!-- Slot info end -->
				        		</div><!-- Slot listing 1 end -->

				        		<div class="schedule-listing">
				        			<span class="schedule-slot-time">11:15 - 13:15PM</span>
				        			<div class="schedule-slot-info">
				        				<a href="#">
				        					<img class="schedule-slot-speakers" src="images/speakers/keynote3.jpg" alt="" />
				        				</a>
				        				<div class="schedule-slot-info-content">
				        					<h3 class="schedule-slot-title">WordPress REST API Authentication</h3>
				        					<h4 class="schedule-slot-speaker-name">Charles Petersson</h4>
				        					<p class="schedule-slot-desc">We’re always looking at new ways to become more efficient web designers, new tools and generators appear nearly every day..</p>
				        				</div><!--Info content end -->
				        			</div><!-- Slot info end -->
				        		</div><!-- Slot listing 2 end -->

				        		<div class="schedule-listing">
				        			<span class="schedule-slot-time">13:30 - 14:30PM</span>
				        			<div class="schedule-slot-info">
				        				<div class="schedule-slot-info-content">
				        					<h3 class="schedule-slot-title">Lunch</h3>
				        					<p class="schedule-slot-desc">Five star buffet for everybody.</p>
				        				</div><!--Info content end -->
				        			</div><!-- Slot info end -->
				        		</div><!-- Slot listing 3 end -->

				        		<div class="schedule-listing">
				        			<span class="schedule-slot-time">14:35 - 16:00PM</span>
				        			<div class="schedule-slot-info">
				        				<a href="#">
				        					<img class="schedule-slot-speakers" src="images/speakers/keynote2.jpg" alt="" />
				        				</a>
				        				<div class="schedule-slot-info-content">
				        					<h3 class="schedule-slot-title">Information Architecture for Everybody</h3>
				        					<h4 class="schedule-slot-speaker-name">Rebecca Henriksson</h4>
				        					<p class="schedule-slot-desc">We’re always looking at new ways to become more efficient web designers, new tools and generators appear nearly every day..</p>
				        				</div><!--Info content end -->
				        			</div><!-- Slot info end -->
				        		</div><!-- Slot listing 4 end -->

				        		<div class="schedule-listing listing-last">
				        			<span class="schedule-slot-time">16:30 - Late</span>
				        			<div class="schedule-slot-info">
				        				<div class="schedule-slot-info-content">
				        					<h3 class="schedule-slot-title">After Party</h3>
				        					<p class="schedule-slot-desc">Stick around and enjoy a dazzling after work.</p>
				        				</div><!--Info content end -->
				        			</div><!-- Slot info end -->
				        		</div><!-- Slot listing 5 end -->


				        	</div><!-- Tab pane 3 end -->	
						</div><!-- tab content -->
					</div><!-- Schedule tab end -->
				</div><!-- Col end -->
			</div><!-- Content row end -->
		</div><!-- Container end -->
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

	
	</div><!-- Body inner end -->
</body>

<!-- Mirrored from themefunction.com/html/eventime/schedule-tab.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Nov 2017 17:36:28 GMT -->
</html>