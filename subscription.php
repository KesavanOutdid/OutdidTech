<?php
  session_start();
  if(!isset($_SESSION["email"])){
    header("location:login.php");
  }

  // Include configuration file  
  require_once 'config.php';
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
    <script src="https://js.stripe.com/v3/"></script>
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
            <div class="page-header">
              <h3 class="page-title"> Subscription Plans </h3>              
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="container text-center pt-5">
                      <h4 class="mb-3 mt-5">Start up your Bussiness today</h4>
                      <p class="w-75 mx-auto mb-5">Choose a plan that suits you the best. If you are not fully satisfied, we offer 30-day money-back guarantee no questions asked!!</p>
                      <div class="row pricing-table">
                        <div class="col-md-4 grid-margin stretch-card pricing-card">
                          <div class="card border-primary border pricing-card-body">
                            <div class="text-center pricing-card-head">
                              <h3>Basic</h3>
                              <p>Basic Plan</p>
                              <h1 class="font-weight-normal mb-4">₹499</h1>
                            </div>
                            <ul class="list-unstyled plan-features">
                              <li>200GB Storage</li>
                              <li>Unlimited Streaming and Downloads</li>
                              <li>Maximum 2 Cameras</li>
                              <li>Add cameras ₹100</li>
                              <li>Supports Mp4</li>
                            </ul>
                            <div class="">
                              <button class="btn btn-outline-primary btn-block"  id="payButton">Buy Now</button>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 grid-margin stretch-card pricing-card">
                          <div class="card border border-success pricing-card-body">
                            <div class="text-center pricing-card-head">
                              <h3 class="text-success">Pro</h3>
                              <p>For Business</p>
                              <h1 class="font-weight-normal mb-4">₹999</h1>
                            </div>
                            <ul class="list-unstyled plan-features">
                              <li>1TB Storage</li>
                              <li>Unlimited Streaming and Downloads</li>
                              <li>Maximum 10 Cameras</li>
                              <li>Add cameras ₹100</li>
                              <li>Supports Mp4 & AVI</li>
                            </ul>
                            <div class="wrapper">
                              <button class="btn btn-success btn-block" id="payButton_2">Buy Now</button>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 grid-margin stretch-card pricing-card">
                          <div class="card border border-primary pricing-card-body">
                            <div class="text-center pricing-card-head">
                              <h3>Ultra</h3>
                              <p>Custom Business</p>
                              <h1 class="font-weight-normal mb-4">₹1999</h1>
                            </div>
                            <ul class="list-unstyled plan-features">
                              <li>5TB Storage</li>
                              <li>Unlimited Streaming and Downloads</li>
                              <li>Maximum 50 Cameras</li>
                              <li>Add cameras ₹100</li>
                              <li>Supports Mp4 & AVI & Mov</li>
                            </ul>
                            <div class="wrapper">
                              <button class="btn btn-outline-primary btn-block" id="payButton_3">Buy Now</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!-- partial -->
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"></span>
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © outdidunified.com 2023</span>
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

  <script>

    // id=payButton
    var buyBtn = document.getElementById('payButton');
    var responseContainer = document.getElementById('paymentResponse');

    // Handle any errors returned from Checkout
    var handleResult = function (result) {
      alert("new one");

    if (result.error) {
        responseContainer.innerHTML = '<p>'+result.error.message+'</p>';
    }
    buyBtn.disabled = true;
    buyBtn.textContent = 'Buy Now';
    };

    // Specify Stripe publishable key to initialize Stripe.js
    var stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

    buyBtn.addEventListener("click", function (evt) {
    buyBtn.disabled = true;
    buyBtn.textContent = 'Please wait...';
      var createCheckoutSession = function (stripe) {
      return fetch("stripe_charge.php", {
          method: "POST",
          headers: {
              "Content-Type": "application/json",
          },
          body: JSON.stringify({
        checkoutSession: 1,
        Name:"Basic",
        ID:1,
        Price:499,
        Currency:"inr",
          }),
      }).then(function (result) {
          return result.json();
      });
      };
    createCheckoutSession().then(function (data) {
        if(data.sessionId){
            stripe.redirectToCheckout({
                sessionId: data.sessionId,
            }).then(handleResult);
        }else{
            handleResult(data);
        }
    });
    });

  </script>

  <script>

    // id=payButton_2
    var buyBtn2 = document.getElementById('payButton_2');
    var responseContainer = document.getElementById('paymentResponse');    

    // Handle any errors returned from Checkout
    var handleResult = function (result) {
    if (result.error) {
        responseContainer.innerHTML = '<p>'+result.error.message+'</p>';
    }
    buyBtn2.disabled = false;
    buyBtn2.textContent = 'Buy Now';
    };

    // Specify Stripe publishable key to initialize Stripe.js
    var stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

    buyBtn2.addEventListener("click", function (evt) {
    buyBtn2.disabled = true;
    buyBtn2.textContent = 'Please wait...';
      var createCheckoutSession = function (stripe) {
      return fetch("stripe_charge.php", {
          method: "POST",
          headers: {
              "Content-Type": "application/json",
          },
          body: JSON.stringify({
              checkoutSession: 1,
        Name:"Pro",
        ID:2,
        Price:999,
        Currency:"inr",
          }),
      }).then(function (result) {
          return result.json();
      });
      };
    createCheckoutSession().then(function (data) {
        if(data.sessionId){
            stripe.redirectToCheckout({
                sessionId: data.sessionId,
            }).then(handleResult);
        }else{
            handleResult(data);
        }
    });
    });

  </script>

<script>
    // id=payButton_3
    var buyBtn3 = document.getElementById('payButton_3');
    var responseContainer = document.getElementById('paymentResponse');    

    // Handle any errors returned from Checkout
    var handleResult = function (result) {
    if (result.error) {
        responseContainer.innerHTML = '<p>'+result.error.message+'</p>';
    }
    buyBtn3.disabled = false;
    buyBtn3.textContent = 'Buy Now';
    };

    // Specify Stripe publishable key to initialize Stripe.js
    var stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

    buyBtn3.addEventListener("click", function (evt) {
    buyBtn3.disabled = true;
    buyBtn3.textContent = 'Please wait...';
      var createCheckoutSession = function (stripe) {
      return fetch("stripe_charge.php", {
          method: "POST",
          headers: {
              "Content-Type": "application/json",
          },
          body: JSON.stringify({
              checkoutSession: 1,
        Name:"Ultra",
        ID:3,
        Price:1999,
        Currency:"inr",
          }),
      }).then(function (result) {
          return result.json();
      });
      };
    createCheckoutSession().then(function (data) {
        if(data.sessionId){
            stripe.redirectToCheckout({
                sessionId: data.sessionId,
            }).then(handleResult);
        }else{
            handleResult(data);
        }
    });
    });
if("<?php echo $_SESSION["plan"]; ?>" == "Basic"){
  buyBtn.disabled = true;
  buyBtn.textContent = 'Currently Active';
  buyBtn2.textContent = 'Upgrade Now';
  buyBtn3.textContent = 'Upgrade Now';
}
if("<?php echo $_SESSION["plan"]; ?>" == "Pro"){
  buyBtn2.disabled = true;
  buyBtn2.textContent = 'Currently Active';
  buyBtn.textContent = 'Downgrade Now';
  buyBtn3.textContent = 'Upgrade Now';
}
if("<?php echo $_SESSION["plan"]; ?>" == "Ultra"){
  buyBtn3.disabled = true;
  buyBtn3.textContent = 'Currently Active';
  buyBtn.textContent = 'Downgrade Now';
  buyBtn2.textContent = 'Downgrade Now';
}
  </script>
</html>