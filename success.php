<?php

session_start();
// Include configuration file 
require_once 'config.php';
// $db_conn = mysqli_connect("localhost", "root", "", "3dot");
include 'db_conn.php';

    // $pageview = $_GET['getID']; 
	// $selectproduct =mysqli_query($db_conn, "select * from products where id = '$pageview' ");
    // $rowproduct =mysqli_fetch_array($selectproduct,MYSQLI_ASSOC); 			
			
    $payment_id = $statusMsg = '';
    $ordStatus = 'error';

// Check whether stripe checkout session is not empty
if(!empty($_GET['session_id'])){
    $session_id = $_GET['session_id'];
    
    // Fetch transaction data from the database if already exists
    $sql = "SELECT * FROM orders WHERE checkout_session_id = '".$session_id."'";
    $result = $conn->query($sql);
	if ( !empty($result->num_rows) && $result->num_rows > 0) {
        $orderData = $result->fetch_assoc();        
        $paymentID = $orderData['id'];
        $transactionID = $orderData['txn_id'];
        $paidAmount = $orderData['paid_amount'];
        $paidCurrency = $orderData['paid_amount_currency'];
        $paymentStatus = $orderData['payment_status'];        
        $ordStatus = 'success';
        $statusMsg = 'Your Payment has been Successful!';
    }else{
        // Include Stripe PHP library 
        require_once 'stripe-php/init.php';
        
        // Set API key
        \Stripe\Stripe::setApiKey(STRIPE_API_KEY);
        
        // Fetch the Checkout Session to display the JSON result on the success page
        try {
            $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);
            $name = $checkout_session["customer_details"]->name;
            $email = $checkout_session["customer_details"]->email;
        }catch(Exception $e) { 
            $api_error = $e->getMessage(); 
        }
        
        if(empty($api_error) && $checkout_session){
            // Retrieve the details of a PaymentIntent
            try {
                $intent = \Stripe\PaymentIntent::retrieve($checkout_session->payment_intent);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                $api_error = $e->getMessage();
            }
            
            //Retrieves the details of customer
            // try {
            //     // Create the PaymentIntent
            //     $customer = \Stripe\Customer::retrieve($checkout_session->customer);
            // } catch (\Stripe\Exception\ApiErrorException $e) {
            //     $api_error = $e->getMessage();
            // }
            
            if(empty($api_error) && $intent){ 
                // Check whether the charge is successful
                if($intent->status == 'succeeded'){
                    // Customer details
                    // Transaction details
                    $transactionID = $intent->id;
                    $paidAmount = $intent->amount;
                    $paidAmount = ($paidAmount/100);
                    $paidCurrency = $intent->currency;
                    $paymentStatus = $intent->status;
                    $curr_date = date("Y-m-d");
                    $end_date = date('Y-m-d', strtotime($curr_date. ' + 30 days'));  
                    
					 // Insert transaction data into the database
                    
					  $sql = "INSERT INTO orders(user_name,name,email,plan_name,plan_price,item_price_currency,paid_amount,paid_amount_currency,txn_id,payment_status,checkout_session_id,created,modified) 
                    VALUES('".$_SESSION["email"]."','".$name."','".$email."','".$_SESSION['prod_name']."','".$_SESSION['price']."','".$_SESSION['currency']."','".$paidAmount."','".$paidCurrency."','".$transactionID."','".$paymentStatus."','".$session_id."',NOW(),NOW())"; 
                      
                      if($_SESSION['prod_name'] == "Basic"){$storage = 200;}
                       elseif($_SESSION['prod_name'] == "Pro"){$storage = 1000;}
                        else {$storage = 5000;}

                      $update = mysqli_query($conn, "UPDATE user_list set total_storage ='" . $storage . "', availabe_storage = 0, subscription_plan ='" . $_SESSION['prod_name'] . "', purchased_date = '" . $curr_date . "', subscription_end_date = '" .$end_date. "' WHERE email='" . $_SESSION['email'] . "'");
          
                    $_SESSION['plan'] = $_SESSION['prod_name'];
                    $insert = $conn->query($sql);
                    $paymentID = $conn->insert_id;
                    
						        $ordStatus = 'success';
						        $statusMsg = 'Your Payment has been Successful!';
                   
                }else{
                    $statusMsg = "Transaction has been failed!";
                }
            }else{
                $statusMsg = "Unable to fetch the transaction details! $api_error"; 
            }
            
            $ordStatus = 'success';
        }else{
            $statusMsg = "Transaction has been failed! $api_error"; 
        }
    }
}else{
	$statusMsg = "Invalid Request!";
}
?>


<?php 
  if(!isset($_SESSION["email"])){
    header("location:login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Outdid Surveillance </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <style>
      @media only screen and (min-width: 1200px) {
        .cen {
          padding-right: 50px;
          padding-top: 30px;
        }
      }
      @media only screen and (min-width: 1500px) {
        .cen {
          padding-right: 120px;
          padding-top: 80px;
        }
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="dashboard.php"><h3 style="color:#4dc349eb;">Outdid Surveillance</h3></a>
          <a class="sidebar-brand brand-logo-mini" href="dashboard.php"><h5 style="color:#4dc349eb;">3Dots</h5></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="assets/images/faces/blank_face.png" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?php echo $_SESSION["name"]; ?></h5>
                  <?php if($_SESSION['role'] == "user") { ?>
                  <span>User</span>
                  <?php } else { ?>
                  <span>Admin</span>
                  <?php } ?>
                </div>
              </div>              
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="dashboard.php">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Media Recorder</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="my_videos.php">
              <span class="menu-icon">
                <i class="mdi mdi-folder-image"></i>
              </span>
              <span class="menu-title">My Videos</span>
            </a>
          </li>
          <?php if($_SESSION['role'] == "Admin") { ?>
          <li class="nav-item menu-items">
            <a class="nav-link" href="userdetails.php">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
              <span class="menu-title">User Details</span>
            </a>
          </li>
          <?php } ?>
          <li class="nav-item menu-items">
            <a class="nav-link" href="settings.php">
              <span class="menu-icon">
                <i class="mdi mdi-settings"></i>
              </span>
              <span class="menu-title">settings</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="subscription.php">
              <span class="menu-icon">
                <i class="mdi mdi-cart"></i>
              </span>
              <span class="menu-title">Subscription Plans</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="assets/images/faces/blank_face.png" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $_SESSION["email"]; ?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <a class="dropdown-item preview-item" href="login.php">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>                  
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

          <div class="card col-lg-12 mx-auto">
              <div class="card-body px-5 py-5">
              <h1 class="<?php echo $ordStatus; ?>"><?php echo $statusMsg; ?></h1>
              <div class="wrapper">
                    <?php if(!empty($paymentID)){ ?>
                        <h4>Payment Information</h4>
                        <p><b>Reference Number:</b> <?php echo $paymentID; ?></p>
                        <p><b>Transaction ID:</b> <?php echo $transactionID; ?></p>
                        <p><b>Paid Amount:</b> <?php echo $paidAmount.' '.$paidCurrency; ?></p>
                        <p><b>Payment Status:</b> <?php echo $paymentStatus; ?></p>
                            
                        <h4>Product Information</h4>
                        <p><b>Plan:</b> <?php echo $_SESSION['prod_name']; ?></p>
                        <p><b>Price:</b> <?php echo $_SESSION['price'].' '.$_SESSION['currency']; ?></p>
                    <?php } ?>
                <a href="dashboard.php" class="btn-link">Back</a>
            </div>
              </div>
            </div>

        </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"></span>
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 3dotsmatrix.com 2023</span>
              <!-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span> -->
            </div>
          </footer>
          <!-- partial -->
      </div>
        <!-- main-panel ends -->
    </div>
      <!-- page-body-wrapper ends -->
  </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/js/mediarecorder.js" async></script>
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>