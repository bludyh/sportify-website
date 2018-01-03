<!DOCTYPE html>
<html lang="en">

<?php
    include("../lib/templates/head.inc.html");
    spl_autoload_register(function ($class_name) {
        $file = dirname(filter_input(INPUT_SERVER, "DOCUMENT_ROOT")) . "/lib/classes/" . $class_name . ".php";
        if (file_exists($file)) {
            require_once($file);
        }
    });
?>
	
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
            <div id="dunno" class="container">
			<div style="margin-top: 100px" class="row text-center">
				<span class="icon-wrap"><i  class="fa fa-ticket"></i></span>
				<h2 class="section-title">Tickets</h2>
				<p class="section-sub-title">Be a part of this great event</p>
			</div><!--/ Title row end -->
                        
                        <div class="row">
                            <div class="col-md-offset-2 col-sm-8" id="popup">

                            </div>
                        </div>
                        
                        <?php $noAvailTickets = Database::ExecuteScalar("SELECT COUNT(*) FROM ticket WHERE ticket_price IS NULL"); ?>
                        <?php if ($noAvailTickets == 0) : ?>
                        <h1 style="text-align: center;">Sorry! We're sold out :(</h1>
                        <?php else : ?>
                        <div id="wrapper">
                            <ul class="nav nav-tabs" style="margin-bottom: 20px;">
                                <li class="active"><a href="#step-1" data-toggle="tab">Step 1</a></li>
                                <li class="disabled"><a href="#step-2">Step 2</a></li>
                                <li class="disabled"><a href="#step-3">Step 3</a></li>
                             </ul>

                            <!-- Form -->
                            <form id="ticket-registration-form" class="form-horizontal" method="post">
                                <div class="tab-content">
                                    <!-- Step 1 -->
                                    <div id="step-1" class="tab-pane fade in active">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h3 style="margin-top: 0px;">1. Fill in your ticket details</h3>
                                            </div>
                                            <div class="col-sm-8" style="text-align: right;">
                                                <label style="margin-right: 10px;">Number Of Tickets:</label>
                                                <button type="button" class="btn btn-default" id="addbtn"><span class="glyphicon glyphicon-plus valid"></span></button>
                                                <p style="margin-left: 10px; margin-right: 10px; display: inline;" id="number-tickets"></p>
                                                <button type="button" class="btn btn-default" id="removebtn"><span class="glyphicon glyphicon-minus valid"></span></button>
                                                <p style="margin-left: 10px; display: inline;">x €55.00/ticket</p>
                                            </div>
                                        </div>
                                        <div id="ticket-info-1">
                                            <h3 style="margin-bottom: 20px;">Ticket 1</h3>
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
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="phone-1">Phone Number:</label>
                                                <div class="col-sm-10">
                                                    <input type="tel" class="phone form-control" id="phone-1" name="phone-1" placeholder="(Optional)">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="container"></div>
                                    </div>
                                    <!-- End of Step 1 -->

                                    <!-- Step 2 -->
                                    <div id="step-2" class="tab-pane fade">
                                        <div style="margin-bottom: 20px;">
                                            <h3>2. Choose your camping spot</h3>

                                            <p>Here you can choose your own camping spot to fully enjoy our wonderful 3-day event. 
                                            Each camping spot is available for maximum 6 people.</p>
                                            <p>You can only reserve one camping spot per order.</p>
                                            <strong>Price: €10.00 (reservation fee) + no. of people x €20.00/person</strong>

                                            <div id="map">
                                                <div><img src="images/map.png" width="100%;"/></div>
                                                <div id="overlay">

                                                    <?php
                                                        $spot = Database::ExecuteReader("SELECT * FROM camping_spot WHERE spot_price IS NULL");
                                                        for ($i = 0; $i < sizeof($spot); $i++) {
                                                            if ($spot[$i]["location"] == "Zone A") {
                                                                $img = "zonea.jpg";
                                                                $location = "Zone A";
                                                                $desciption = "Lorem ipsum dolor sit amet, commodo pertinacia in eum, mel vide eirmod equidem id. Ius eligendi insolens adipisci eu, cum mundi malorum ei. Mea possim phaedrum ea.";
                                                            }
                                                            else if ($spot[$i]["location"] == "Zone B") {
                                                                $img = "zoneb.jpg";
                                                                $location = "Zone B";
                                                                $desciption = "Lorem ipsum dolor sit amet, commodo pertinacia in eum, mel vide eirmod equidem id. Ius eligendi insolens adipisci eu, cum mundi malorum ei. Mea possim phaedrum ea.";
                                                            }
                                                            else if ($spot[$i]["location"] == "Zone C") {
                                                                $img = "zonec.jpg";
                                                                $location = "Zone C";
                                                                $desciption = "Lorem ipsum dolor sit amet, commodo pertinacia in eum, mel vide eirmod equidem id. Ius eligendi insolens adipisci eu, cum mundi malorum ei. Mea possim phaedrum ea.";
                                                            }
                                                            else if ($spot[$i]["location"] == "Zone D") {
                                                                $img = "zoned.jpg";
                                                                $location = "Zone D";
                                                                $desciption = "Lorem ipsum dolor sit amet, commodo pertinacia in eum, mel vide eirmod equidem id. Ius eligendi insolens adipisci eu, cum mundi malorum ei. Mea possim phaedrum ea.";
                                                            }
                                                            else if ($spot[$i]["location"] == "Zone E") {
                                                                $img = "zonee.jpg";
                                                                $location = "Zone E";
                                                                $desciption = "Lorem ipsum dolor sit amet, commodo pertinacia in eum, mel vide eirmod equidem id. Ius eligendi insolens adipisci eu, cum mundi malorum ei. Mea possim phaedrum ea.";
                                                            }
                                                            else if ($spot[$i]["location"] == "Zone F") {
                                                                $img = "zonef.jpg";
                                                                $location = "Zone F";
                                                                $desciption = "Lorem ipsum dolor sit amet, commodo pertinacia in eum, mel vide eirmod equidem id. Ius eligendi insolens adipisci eu, cum mundi malorum ei. Mea possim phaedrum ea.";
                                                            }

                                                            $popover = "<img src='images/" . $img . "' style='width: 100%'/>"
                                                                    . "<p><strong>Spot: </strong>No." . $spot[$i]["spot_id"] . "</p>"
                                                                    . "<p><strong>Location: </strong>" . $location . "</p>"
                                                                    . "<p><strong>Description: </strong>" . $desciption . "</p>";

                                                            $left = json_decode(($spot[$i]["map_coords"]))[0];
                                                            $top = json_decode(($spot[$i]["map_coords"]))[1];

                                                            $marker = "<label class='overlay' style='left: " . $left . "px; top: " . $top . "px;'>"
                                                                        . "<input type='checkbox' class='checkbox-marker' name='spotid' value='" . ($spot[$i]["spot_id"]) . "'/>"
                                                                        . "<img class='marker' src='images/marker.png' data-toggle='popover' data-content='" . htmlentities($popover, ENT_QUOTES) . "'/>"
                                                                    . "</label>";

                                                            echo($marker);
                                                        }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Step 2 -->

                                    <!-- Step 3 -->
                                    <div id="step-3" class="tab-pane fade">
                                        <div style="margin-bottom: 20px;">
                                            <h3>3. Review and place your order</h3>
                                            <h3>We're almost done!</h3>
                                            <p>Please review your order carefully before proceeding to payment.</p>
                                            <p><strong>Important: </strong>After you click on <strong>ORDER NOW</strong>, you will not be able to withdraw your order. 
                                            We will then send your ticket to the email address you have provided. 
                                            Be sure to use a valid email address that you have access to.
                                            </p>
                                            
                                            <div style="padding: 30px 50px 0px 50px">
                                                <p><strong style="margin-right: 20px">Ticket Summary</strong><a style="cursor: pointer;" id="edit-btn">Edit</a></p>
                                                <div class="table-responsive">        
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Ticket#</th>
                                                                <th>First Name</th>
                                                                <th>Last Name</th>
                                                                <th>Date Of Birth</th>
                                                                <th>Email Address</th>
                                                                <th>Phone</th>
                                                                <th>Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="table-body">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            
                                            <div style="padding: 20px 50px 20px 50px">
                                                <p><strong style="margin-right: 20px">Camping Spot Overview</strong><a style="cursor: pointer;" id="change-btn">Change</a></p>
                                                <div class="row">
                                                    <div id="overview-img" class="col-sm-4">

                                                    </div>
                                                    <div id="overview-text" class="col-sm-6">

                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <h3>Choose a payment method</h3>
                                            <div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="radio" checked="checked"> <strong>iDEAL</strong>
                                                        <img src="images/ideal.gif" style="display: block; height: 100px;" />
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="radio"> <strong>PayPal</strong>
                                                        <img src="images/paypal.png" style="display: block; height: 100px;" />
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="radio"> <strong>Credit Card</strong>
                                                        <img src="images/credit-cards.png" style="display: block; height: 100px;" />
                                                    </label>
                                                </div>
                                            </div>
                                            <p>By placing your order, you agree to our <a href="#">terms and conditions</a>.</p>
                                        </div>

                                    </div>
                                    <!-- End of Step 3 -->

                                </div>
                            </form>
                            <div>
                                <div class="col-sm-offset-6 col-sm-6" style="padding: 0; margin-top: 20px; text-align: right">
                                    <h3 style="margin-right: 20px; display: inline;" id="total-price"></h3>
                                    <a style="margin-right: 20px; display: inline; cursor: pointer;" id="back-btn"></a>
                                    <button type="button" class="btn btn-primary" id="next-btn">Next</button>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
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
        <!-- jQuery Validation -->
        <script type="text/javascript" src="js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/additional-methods.min.js"></script>
        <!-- Ticket script -->
        <script type="text/javascript" src="js/ticket.js"></script>
        <script type="text/javascript" src="js/registration.js"></script>
        
	</div><!-- Body inner end -->
</body>

<!-- Mirrored from themefunction.com/html/eventime/tickets.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Nov 2017 17:36:36 GMT -->
</html>