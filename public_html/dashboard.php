<?php 
    require("../lib/authorization.php");
    
    if (!IsRememberMeEnabled() && !IsLoggedIn()) {
        header("Location: login.php");
        exit();
    }
    
    spl_autoload_register(function ($class_name) {
        $file = dirname(filter_input(INPUT_SERVER, "DOCUMENT_ROOT")) . "/lib/classes/" . $class_name . ".php";
        if (file_exists($file)) {
            require_once($file);
        }
    });
    
    $visitor = new Visitor();
    if (!isset($_SESSION["visitor_id"])) {
        $_SESSION["visitor_id"] = Database::ExecuteReader("SELECT visitor_id FROM remember_me WHERE identifier_key=:identifier_key", [":identifier_key" => filter_input(INPUT_COOKIE, "identifier", FILTER_SANITIZE_STRING)])[0]["visitor_id"];
    }
    $visitor->SelectVisitorBy("visitor_id", $_SESSION["visitor_id"]);
?>

<!DOCTYPE html>
<html lang="en">

<?php
    include("../lib/templates/head.inc.html");
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
	                	<img src="images/logo.png" alt="logo">
	                </a>
         		</div><!-- logo end -->
				
				</div>
			
                          

			</div><!-- Row end -->
		</div><!-- Container end -->
	</header><!--/ Header end -->

	<div id="page-banner-area" class="page-banner-area" style="background-image:url(images/banner/banner.png)" ></div><!-- Page Banner end -->

        <section id="main-container" class="main-container">

            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <h2 style="color: #ea531c">User Dashboard</h2>
                        <div>
                            <img src="<?php echo("https://chart.googleapis.com/chart?chs=300x300&amp;cht=qr&amp;chl=" . $visitor->ticketId ."&amp;choe=UTF-8"); ?>" alt="qrcode" style="width: 100%; margin-left: -50px;" />
                            <p style="margin: -30px 0 20px 35px;"><strong>#<?php echo($visitor->ticketId); ?></strong></p>
                        </div>
                        <div>
                            <ul class="fa-ul">
                                <li><i class="fa-li fa fa-user-circle fa-lg"></i>&nbsp; <?php echo($visitor->firstName . " " . $visitor->lastName); ?></li>
                                <li><i class="fa-li fa fa-calendar fa-lg"></i>&nbsp; 
                                    <?php 
                                        $time = strtotime($visitor->birthday);
                                        $formatedDate = date("d/m/Y", $time);
                                        echo($formatedDate);
                                    ?>
                                </li>
                                <li><i class="fa-li fa fa-envelope fa-lg"></i>&nbsp; <?php echo($visitor->email); ?></li>
                                <li><i class="fa-li fa fa-mobile fa-lg"></i>&nbsp; <?php echo ($visitor->phone != NULL) ? $visitor->phone : "<em>None</em>"; ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <h2>Welcome <?php echo($visitor->firstName . " " . $visitor->lastName); ?>!</h2>
                        <p>You will find all information about your event account in this page. Click on one of the buttons below to see more details.</p>
                        <div class="row" style="margin: 30px 0 0 0;">
                            <a class="col-sm-2 nav-dashboard-btn" style="background-color: #0859d2;" data-toggle="pill" href="#tab-balance">
                                <i class="fa fa-money fa-5x" aria-hidden="true"></i>
                                <span style="display: block;">Balance</span>
                            </a>
                            <a class="col-sm-2 nav-dashboard-btn" style="background-color: #e5e10b;" data-toggle="pill" href="#tab-deposit">
                                <i class="fa fa-arrow-circle-up fa-5x" aria-hidden="true"></i>
                                <span style="display: block;">Deposit</span>
                            </a>
                            <a class="col-sm-2 nav-dashboard-btn" style="background-color: #f37735;" data-toggle="pill" href="#tab-camping">
                                <i class="fa fa-map-marker fa-5x" aria-hidden="true"></i>
                                <span style="display: block;">Camping Spot</span>
                            </a>
                            <a class="col-sm-2 nav-dashboard-btn" style="background-color: #04b710;" data-toggle="pill" href="#tab-history">
                                <i class="fa fa-history fa-5x" aria-hidden="true"></i>
                                <span style="display: block;">History</span>
                            </a>
                            <a class="col-sm-2 nav-dashboard-btn" style="background-color: #73086d;" data-toggle="pill" href="#tab-settings">
                                <i class="fa fa-cogs fa-5x" aria-hidden="true"></i>
                                <span style="display: block;">Settings</span>
                            </a>
                            <a class="col-sm-2 nav-dashboard-btn" style="background-color: #ba3a3b; cursor: pointer;" id="logout-btn">
                                <i class="fa fa-sign-out fa-5x" aria-hidden="true"></i>
                                <span style="display: block;">Log Out</span>
                            </a>
                            <form id="logout-form" method="post" action="requests-handler.php">
                                <input type="hidden" name="form-name" value="logout">
                            </form>
                        </div>
                        <div class="tab-content">
                            <div id="tab-balance" class="tab-pane fade">
                                <h3>Balance</h3>
                                <p>This is your current account balance. You can deposit money to start spending at our event.</p>
                                <strong>Available Balance: </strong>
                                <h2>€<?php echo($visitor->balance); ?></h2>
                            </div>
                            <div id="tab-deposit" class="tab-pane fade">
                                <h3>Deposit</h3>
                                <p>Here you can deposit money into your event account to use at our event. We provide various payment method for you to choose from.</p>
                                <form id="deposit-form" class="form-horizontal" action="requests-handler.php" method="post">
                                    <input type="hidden" name="form-name" value="deposit">
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="deposit-amount"><strong>Amount To Deposit:</strong></label>
                                        <div class="col-sm-8 inner-addon">
                                            <i class="fa fa-eur fa-lg" aria-hidden="true"></i>
                                            <input type="text" class="form-control" id="deposit-amount" name="deposit-amount">
                                        </div>
                                    </div>
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
                                        <p>By depositing money into your event account, you agree to our <a href="#">terms and conditions</a>.</p>
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="deposit-btn" style="margin-top: 10px;">Deposit</button>
                                </form>
                            </div>
                            <div id="tab-camping" class="tab-pane fade">
                                <h3>Camping Spot</h3>
                                <p>You can find your camping spot information here.</p>
                                
                                <?php if ($visitor->spotId !== NULL) : {
                                        $spot = Database::ExecuteReader("SELECT * FROM camping_spot WHERE spot_id=:spot_id", [":spot_id" => $visitor->spotId])[0];
                                        if ($spot["location"] == "Zone A") {
                                            $img = "zonea.jpg";
                                            $desciption = "Lorem ipsum dolor sit amet, commodo pertinacia in eum, mel vide eirmod equidem id. Ius eligendi insolens adipisci eu, cum mundi malorum ei. Mea possim phaedrum ea.";
                                        }
                                        else if ($spot["location"] == "Zone B") {
                                            $img = "zoneb.jpg";
                                            $desciption = "Lorem ipsum dolor sit amet, commodo pertinacia in eum, mel vide eirmod equidem id. Ius eligendi insolens adipisci eu, cum mundi malorum ei. Mea possim phaedrum ea.";
                                        }
                                        else if ($spot["location"] == "Zone C") {
                                            $img = "zonec.jpg";
                                            $desciption = "Lorem ipsum dolor sit amet, commodo pertinacia in eum, mel vide eirmod equidem id. Ius eligendi insolens adipisci eu, cum mundi malorum ei. Mea possim phaedrum ea.";
                                        }
                                        else if ($spot["location"] == "Zone D") {
                                            $img = "zoned.jpg";
                                            $desciption = "Lorem ipsum dolor sit amet, commodo pertinacia in eum, mel vide eirmod equidem id. Ius eligendi insolens adipisci eu, cum mundi malorum ei. Mea possim phaedrum ea.";
                                        }
                                        else if ($spot["location"] == "Zone E") {
                                            $img = "zonee.jpg";
                                            $desciption = "Lorem ipsum dolor sit amet, commodo pertinacia in eum, mel vide eirmod equidem id. Ius eligendi insolens adipisci eu, cum mundi malorum ei. Mea possim phaedrum ea.";
                                        }
                                        else if ($spot["location"] == "Zone F") {
                                            $img = "zonef.jpg";
                                            $desciption = "Lorem ipsum dolor sit amet, commodo pertinacia in eum, mel vide eirmod equidem id. Ius eligendi insolens adipisci eu, cum mundi malorum ei. Mea possim phaedrum ea.";
                                        }
                                        
                                        $left = json_decode(($spot["map_coords"]))[0];
                                        $top = json_decode(($spot["map_coords"]))[1];
                                    }
                                ?>
                                
                                <div class="row">
                                    <div id="overview-img" class="col-sm-5">
                                        <img src="images/<?php echo($img); ?>" style="width: 100%;">
                                        <div style="text-align: center; margin-top: 10px">
                                            <a id="modal-trigger" style="cursor: pointer;"><i class="fa fa-map" aria-hidden="true"></i>&nbsp; View on map</a>
                                        </div>
                                    </div>
                                    <div id="overview-text" class="col-sm-7">
                                        <p><strong>Spot: </strong>No.<?php echo($spot["spot_id"]); ?></p>
                                        <p><strong>Location: </strong><?php echo($spot["location"]); ?></p>
                                        <p><strong>Description: </strong><?php echo($desciption); ?></p>
                                        <p><strong>Price: </strong>€<?php echo($spot["spot_price"]); ?></p>
                                    </div>
                                </div>
                                
                                <div id="myModal" class="modal">

                                    <!-- The Close Button -->
                                    <span class="close">&times;</span>

                                    <!-- Modal Content (The Image) -->
                                    <div class="modal-content">
                                        <img src="images/full-map.png" width="100%">                                            
                                        <?php echo("<img src='images/marker.png' class='marker overlay' style='left: " . $left . "px; top: " . $top . "px;'/>"); ?>
                                    </div>

                                </div>
                                
                                <?php else : ?>
                                <p><em>No camping spot reserved</em></p>
                                <?php endif; ?>
                                
                            </div>
                            <div id="tab-history" class="tab-pane fade">
                                <h3>History</h3>
                                <p>You can keep track of all your activities during the event here. Your purchases and rentals will also appear in this page.</p>
                                <div>
                                    
                                    <?php 
                                        $myActivities = new Activity($visitor->visitorId);
                                        
                                        if (empty($myActivities->activities)) {
                                    ?>
                                            <p><em>No recent activity</em></p>
                                    <?php
                                        }
                                        else {
                                    ?>
                                            <div class="row" style="margin-top: 20px; padding: 0 20px 0 20px;">
                                                <div class="col-sm-6">
                                                    <p><strong>Activity</strong></p>
                                                </div>
                                                <div class="col-sm-6" style="text-align: right">
                                                    <p><strong>Time</strong></p>
                                                </div>
                                            </div>
                                    <?php
                                            foreach ($myActivities->activities as $activity) {
                                                if (is_a($activity, "CheckingHistory")) {  
                                    ?>
                                                    <button class="accordion">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <i class="fa fa-sign-<?php echo ($activity->checkingAction === "IN") ? "in" : "out"; ?> fa-lg" aria-hidden="true"></i>
                                                                &nbsp; <?php echo($activity->ToString(FALSE)); ?>
                                                            </div>
                                                            <div class="col-sm-6" style="text-align: right"><?php echo(date("d/m/Y H:i:s", $activity->time)); ?></div>
                                                        </div>
                                                    </button>
                                                    <div class="accordion-panel">
                                                        <p><strong>Description: </strong><?php echo($activity->ToString()); ?></p>
                                                    </div>
                                    <?php
                                                }
                                                else if (is_a($activity, "PurchaseHistory")) {
                                    ?>
                                                    <button class="accordion">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i>
                                                                &nbsp; <?php echo($activity->purchaseDetails[0]["item"]->store->store_name); ?> Purchase Payment
                                                            </div>
                                                            <div class="col-sm-6" style="text-align: right"><?php echo(date("d/m/Y H:i:s", $activity->time)); ?></div>
                                                        </div>
                                                    </button>
                                                    <div class="accordion-panel">
                                                        <p><strong>Description: </strong><?php echo($activity->ToString()); ?></p>
                                                        <p><strong>Details: </strong></p>
                                                        <div class="table-responsive">        
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Item</th>
                                                                        <th>Category</th>
                                                                        <th>Quantity</th>
                                                                        <th>Price</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="table-body">
                                                                    <?php 
                                                                        foreach ($activity->purchaseDetails as $detail) {
                                                                    ?>
                                                                            <tr>
                                                                                <td><?php echo $detail["item"]->item_name; ?></td>
                                                                                <td><?php echo $detail["item"]->item_category; ?></td>
                                                                                <td><?php echo $detail["purchase_quantity"]; ?></td>
                                                                                <td>€<?php echo $detail["item"]->item_price; ?></td>
                                                                            </tr>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td><strong>Total: €<?php echo $activity->totalPrice; ?></strong></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                    <?php
                                                }
                                                else if (is_a($activity, "RentalHistory")) {
                                    ?>
                                                    <button class="accordion">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <i class="fa fa-handshake-o fa-lg" aria-hidden="true"></i>
                                                                &nbsp; <?php echo($activity->rentalDetails[0]["item"]->store->store_name); ?> Rental Payment
                                                            </div>
                                                            <div class="col-sm-6" style="text-align: right"><?php echo(date("d/m/Y H:i:s", $activity->time)); ?></div>
                                                        </div>
                                                    </button>
                                                    <div class="accordion-panel">
                                                        <p><strong>Description: </strong><?php echo($activity->ToString()); ?></p>
                                                        <p><strong>Details: </strong></p>
                                                        <div class="table-responsive">        
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Item</th>
                                                                        <th>Category</th>
                                                                        <th>Status</th>
                                                                        <th>Price</th>
                                                                        <th>Deposit</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="table-body">
                                                                    <?php 
                                                                        foreach ($activity->rentalDetails as $detail) {
                                                                    ?>
                                                                            <tr>
                                                                                <td><?php echo $detail["item"]->item_name; ?></td>
                                                                                <td><?php echo $detail["item"]->item_category; ?></td>
                                                                                <td><?php echo ($detail["return_time"] !== NULL) ? "<em style='color: green'>Returned</em>" : "<em style='color: red'>Not yet returned</em>"; ?></td>
                                                                                <td>€<?php echo $detail["item"]->item_price; ?></td>
                                                                                <td>€<?php echo $detail["item"]->deposit_price; ?></td>
                                                                            </tr>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td><strong>Total: €<?php echo $activity->totalPrice; ?></strong></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                    <?php
                                                }
                                                else if (is_a($activity, "TransactionHistory")) {
                                    ?>
                                                    <button class="accordion">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <i class="fa fa-exchange fa-lg" aria-hidden="true"></i>
                                                                &nbsp; Account Balance Transaction
                                                            </div>
                                                            <div class="col-sm-6" style="text-align: right"><?php echo(date("d/m/Y H:i:s", $activity->time)); ?></div>
                                                        </div>
                                                    </button>
                                                    <div class="accordion-panel">
                                                        <p><strong>Description: </strong><?php echo($activity->ToString()); ?></p>
                                                        <p><strong>Details: </strong></p>
                                                        <div class="table-responsive">        
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Transaction Type</th>
                                                                        <th>Deposit Method</th>
                                                                        <th>Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="table-body">
                                                                    <tr>
                                                                        <td><?php echo $activity->transactionAction; ?></td>
                                                                        <td><?php echo ($activity->depositMethod !== NULL) ? $activity->depositMethod : "<em>None</em>"; ?></td>
                                                                        <td>€<?php echo $activity->transactionAmount; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                    <?php
                                                }
                                            }
                                        }
                                    ?>

                                </div>
                            </div>
                            <div id="tab-settings" class="tab-pane fade">
                                <h3>Settings</h3>
                                <p>Change your account password here</p>
                                <div id="popup">
                                    
                                </div>
                                <form id="change-password-form" class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="new-password">New Password:</label>
                                        <div class="col-sm-7">
                                            <input type="password" class="form-control" id="new-password" name="new-password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="confirm-new-password">Confirm Password:</label>
                                        <div class="col-sm-7">
                                            <input type="password" class="form-control" id="confirm-new-password" name="confirm-new-password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="submit" class="btn btn-primary" id="change-password-btn">Change</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

	</section><!-- Main container end -->



    

    <div class="copyright text-center">
            <div class="container">
                    <div class="row">
                            <div class="col-md-12">
                                    <div class="footer-social">
                                            <ul>
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                            </ul>
                                    </div><!-- Footer social end -->

                                    <div class="copyright-info">
                                            <span>Copyright © 2017 Sportify. All Rights Reserved.</span>
                                    </div><!-- Copyright info end -->

                                    <div class="footer-menu">
                                            <ul class="nav unstyled">
                                                    <li><a href="index.php">Home</a></li>
                                                    <li><a href="schedule.php">Schedule</a></li>
                                                    <li><a href="venue.php">Venue</a></li>
                                                    <li><a href="index.php#countdown">About</a></li>
                                                    <li><a href="contact.php">Contact Us</a></li>
                                            </ul>
                                    </div><!-- Footer menu end -->

                            </div><!-- Col end -->

                    </div><!-- Copyright Row end -->

                    <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top affix">
                            <button class="btn btn-primary" title="Back to Top">
                                    <i class="fa fa-angle-double-up"></i>
                            </button>
                    </div>
            </div><!-- Copyright Container end -->
    </div><!-- Copyright end -->


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
        <!-- Logout script -->
        <script type="text/javascript" src="js/logout.js"></script>
        <!-- jQuery Validation -->
        <script type="text/javascript" src="js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/additional-methods.min.js"></script>
        <!-- Deposit script -->
        <script type="text/javascript" src="js/deposit.js"></script>
        <!-- Change password script -->
        <script type="text/javascript" src="js/change-password.js"></script>
        <!-- Modal image -->
        <script type="text/javascript" src="js/modal-image.js"></script>
        <!-- Accordion -->
        <script type="text/javascript" src="js/accordion.js"></script>
	</div><!-- Body inner end -->
</body>
</html>
