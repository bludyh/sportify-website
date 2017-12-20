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
				
				</div>
			
                            <?php include("../lib/templates/navbar.inc.html"); ?>

			</div><!-- Row end -->
		</div><!-- Container end -->
	</header><!--/ Header end -->

	<div id="page-banner-area" class="page-banner-area" style="background-image:url(images/banner/banner1.jpg)"></div><!-- Page Banner end -->

	<section id="main-container" class="main-container">
		<div class="container">
			<div style="margin-top: 100px" class="row text-center">
				<span class="icon-wrap"><i  class="fa fa-ticket"></i></span>
				<h2 class="section-title">Tickets</h2>
				<p class="section-sub-title">Be a part of this great event</p>
			</div><!--/ Title row end -->
                        
                        <form id="ticket-registration-form" class="form-horizontal" method="post">
                            <div class='form-group'>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Number Of Tickets:</label>
                                    <div class="col-sm-10">
                                        <button type="button" class="btn btn-default" id="addbtn" onclick="addTickets()"><span class="glyphicon glyphicon-plus"></span></button>
                                        <p style="margin-left: 10px; margin-right: 10px; display: inline;" id="number-tickets"></p>
                                        <button type="button" class="btn btn-default" id="addbtn" onclick="removeTickets()"><span class="glyphicon glyphicon-minus"></span></button>
                                    </div>
                                </div>
                                <div id="ticket-info-1" style="border-top: 1px solid">
                                    <h2 style="margin-bottom: 30px">Ticket 1</h2>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="firstname-1">First Name:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="fname form-control" id="firstname-1" name="firstname-1" style="text-transform: capitalize">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="lastname-1">Last Name:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="lname form-control" id="lastname-1" name="lastname-1" style="text-transform: capitalize">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="birthday-1">Date Of Birth:</label>
                                        <div class="col-sm-3">
                                            <input type="date" class="bday form-control" id="birthday-1" name="birthday-1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email-1">Email Address:</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="email form-control" id="email-1" name="email-1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email-confirm-1">Confirm Email Address:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="cemail form-control" id="email-confirm-1" name="email-confirm-1">
                                        </div>
                                    </div>
                                </div>
                                <div id="container"></div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default" id="ticketbtn">Next</button>
                                    </div>
                                </div>
                            </div>
                        </form>

			
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
        <!-- Ticket script -->
        <script type="text/javascript" src="js/ticket.js"></script>
	
        <script type="text/javascript" src="js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/ajax-registration.js"></script>
	</div><!-- Body inner end -->
</body>

<!-- Mirrored from themefunction.com/html/eventime/tickets.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Nov 2017 17:36:36 GMT -->
</html>