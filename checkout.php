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
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fastkart">
    <meta name="keywords" content="Fastkart">
    <meta name="author" content="Fastkart">
    <link rel="icon" href="assets/images/icon/icon1.png" type="image/x-icon">
    <title>Checkout</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/slick/slick-theme.css">

    <!-- Iconly css -->
    <link rel="stylesheet" type="text/css" href="assets/css/bulk-style.css">

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="assets/css/style.css">
 
    <!-- stripe js-->
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body style="background-color: aliceblue;">
    <!-- Loader Start -->
    <div class="fullpage-loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <!-- Loader End -->

    <!-- Header Start -->
    <header class="pb-md-4 pb-0">
        <div class="top-nav top-header sticky-header">
            <div class="container-fluid-lg">
                <div class="row">
                    <div class="col-12">
                        <div class="navbar-top">
                            <button class="navbar-toggler d-xl-none d-inline navbar-menu-button" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                                <span class="navbar-toggler-icon">
                                    <i class="fa-solid fa-bars"></i>
                                </span>
                            </button>
                            <a href="index.html" class="web-logo nav-logo">
                               <img src="assets/images/icon/icon.png" class="img-fluid blur-up lazyload" alt="" style="width:70%;">
                            </a>

                            <div class="middle-box">
    
                                <div class="search-box">
                                    <div class="input-group">
                                        <input type="text" id="myText" name="srchValue" value="" class="form-control" placeholder="I'm searching for..."
                                            aria-label="Recipient's username" aria-describedby="button-addon2" required>
                                        <button onclick="myFunction()" class="srchClick btn" type="button" id="button-addon2">
                                            <i data-feather="search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="rightside-box">
                                <div class="search-full">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i data-feather="search" class="font-light"></i>
                                        </span>
                                        <input type="text" id="srchFld" class="form-control search-type" placeholder="Search here..">
                                        <span class="input-group-text close-search">
                                            <i data-feather="x" class="font-light"></i>
                                        </span>
                                    </div>
                                </div>
                                <ul class="right-side-menu">
                                    <li class="right-side">
                                        <div class="delivery-login-box">
                                            <div class="delivery-icon">
                                                <div class="search-box">
                                                    <i data-feather="search"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="right-side">
                                        <a href="contact-us.html" class="delivery-login-box">
                                            <div class="delivery-icon">
                                                <i data-feather="phone-call" style="color: #0c9077;"></i>
                                            </div>
                                        </a>
                                    </li>
                                    
                                    <li class="right-side" >
                                        <div class="onhover-dropdown header-badge">
                                            <a href="cart.html">
                                                <button type="button" class="btn p-0 position-relative header-wishlist">
                                                    <i data-feather="shopping-cart" style="color:#0da487;"></i>
                                                    <span class="total-count position-absolute top-0 start-100 translate-middle badge">
                                                    </span>
                                                </button>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="right-side onhover-dropdown">
                                        <div class="delivery-login-box">
                                            <!-- User Email -->
                                            <div class="onhover-dropdown header-badge">
                                                <h5 id="useremail" style="color: #0da487;"></h5>
                                            </div>
                                            <div class="delivery-icon">
                                                <i data-feather="user" style="color: #0c9077;"></i>
                                            </div>
                                        </div>

                                        <div class="onhover-div onhover-div-login">
                                            <ul class="user-box-name">
                                                <li class="product-box-contain" id="hideShowID">
                                                    <a href="login.html">Log In</a>
                                                </li>

                                                <li class="product-box-contain" id="myAccount">
                                                    <a href="user-dashboard.html">My Account</a>
                                                </li>

                                                <li class="product-box-contain" id="myOrders">
                                                    <a href="orders.html">My Orders</a>
                                                </li>

                                                <li class="product-box-contain">
                                                    <a href="forgot.html">Forgot Password</a>
                                                </li>

                                                <li class="product-box-contain">
                                                    <a onclick="deleteItems()">Log Out</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid-lg" style="background-image: url('assets/images/background/banner_07.png'); background-size: cover;">
            <div class="row">
                <div class="col-12">
                    <div class="header-nav">
                        <div class="breadscrumb-contain" style="padding-bottom: 15px; padding-top: 15px;">
                            <nav >
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">
                                            <i class="fa-solid fa-house" style="color: black;"></i>
                                        </a>
                                    </li>
    
                                    <li class="breadcrumb-item active"><b>Checkout</b></li>
                                </ol>
                            </nav>
                        </div>
                        <div class="header-nav-middle">
                            <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                                <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                                    <div class="offcanvas-header navbar-shadow">
                                        <h5>Menu</h5>
                                        <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    
                                    <div class="offcanvas-body">
                                        <ul class="navbar-nav">
                                            <li class="nav-item dropdown">
                                                <a class="nav-link" href="index.html">Home</a>
                                            </li>

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown">Product</a>
                                                <ul class="dropdown-menu" id="get-categorys">
                                                    <!-- dropdown data -->
                                                </ul>
                                            </li>

                                            <!-- <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown">Payment</a>
                                            </li>

                                            <li class="nav-item dropdown dropdown-mega">
                                                <a class="nav-link dropdown-toggle ps-xl-2 ps-0" href="javascript:void(0)" data-bs-toggle="dropdown">Shipping</a>
                                            </li>

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown">Wiki</a>
                                            </li>

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown">Seller</a>

                                            </li>

                                            <li class="nav-item dropdown new-nav-item">
                                                <label class="new-dropdown">New</label>
                                                <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown">Smt</a>

                                            </li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- mobile fix menu start -->
    <div class="mobile-menu d-md-none d-block mobile-cart" style="background-image: url('assets/images/background/banner_08.png'); background-size: cover;">
        <ul>
            <li class="active">
                <a href="index.html">
                    <i class="iconly-Home icli"></i>
                    <span>Home</span>
                </a>
            </li>

            <li>
                <a href="search.html" class="search-box">
                    <i class="iconly-Search icli"></i>
                    <span>Search</span>
                </a>
            </li>

            <li>
                <a href="cart.html">
                    <i class="iconly-Bag-2 icli fly-cate"></i>
                    <span>Cart</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- mobile fix menu end -->

    <!-- Checkout section Start -->
    <section class="checkout-section-2 section-b-space">
        <div class="container-fluid-lg">
            <!-- <form action="deliveryProduct.php" method="post"> -->
                <div class="row g-sm-4 g-3">
                    <div class="col-lg-8">
                        <div class="left-sidebar-checkout">
                            <div class="checkout-detail-box">
                                <ul>
                                    <li>
                                        <div class="checkout-icon" style="background-color: #b7b7b74d;">
                                            <lord-icon target=".nav-item" src="https://cdn.lordicon.com/ggihhudh.json"
                                                trigger="loop-on-hover"
                                                colors="primary:#121331,secondary:#646e78,tertiary:#0baf9a"
                                                class="lord-icon">
                                            </lord-icon>
                                        </div>
                                        <div class="checkout-box" style="background-color: #b7b7b74d;">
                                            <div class="checkout-title">
                                                <h4>Delivery Address</h4>
                                            </div>
                                    
                                            <div class="userAddress">
                                                   <!-- userAddress data -->
                                            </div>
                                        </div>
                                    </li>
                                    <li></li>
                                    <li>
                                        <div class="checkout-icon" style="background-color: #b7b7b74d;">
                                            <lord-icon target=".nav-item" src="https://cdn.lordicon.com/qmcsqnle.json"
                                                trigger="loop-on-hover" colors="primary:#0baf9a,secondary:#0baf9a"
                                                class="lord-icon">
                                            </lord-icon>
                                        </div>
                                        
                                        <div class="checkout-box" style="background-color: #b7b7b74d;">
                                            <div class="checkout-title">
                                                <h4>Payment Option</h4>
                                            </div>

                                            <div class="checkout-detail">
                                                <div class="accordion accordion-flush custom-accordion"
                                                    id="accordionFlushExample">
                                                    <div class="accordion-item">
                                                        <div class="accordion-header" id="flush-headingFour">
                                                            <div class="accordion-button collapsed"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#flush-collapseFour">
                                                                <div class="custom-form-check form-check mb-0">
                                                                    <label class="form-check-label" for="cash">
                                                                        <input class="form-check-input mt-0" type="radio"
                                                                            name="flexRadioDefault" id="cash"> Cash On Delivery</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="flush-collapseFour"
                                                            class="accordion-collapse collapse show"
                                                            data-bs-parent="#accordionFlushExample">
                                                            <div class="accordion-body">
                                                                <p class="cod-review">Pay digitally with SMS Pay
                                                                    Link. Cash may not be accepted in COVID restricted
                                                                    areas.</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion-item">
                                                        <div class="accordion-header" id="flush-headingOne">
                                                            <div class="accordion-button collapsed"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#flush-collapseOne">
                                                                <div class="custom-form-check form-check mb-0">
                                                                    <label class="form-check-label" for="credit"><input
                                                                            class="form-check-input mt-0" type="radio"
                                                                            name="flexRadioDefault" id="credit">
                                                                        Credit or Debit Card</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                                data-bs-parent="#accordionFlushExample">
                                                                <div class="accordion-body">
                                                                    <p class="cod-review" name="paymentoption" value="Credit or Debit Card">Credit & Debit Card Number, Expiry Date, CVV Number, Password </p>
                                                                    
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="right-side-summery-box">
                            <div class="summery-box-2" style="background-color: #b7b7b74d;">
                                <div class="summery-header">
                                    <h3>Order Summery</h3>
                                </div>

                                <div class="orderSummery">
                                    <!-- Order summery data -->
                                </div>
                                
                                <div class="orderSummeryTwo">
                                    <!-- Order Summery total data -->
                                </div>
                            </div>
                               
                            <div class="order-button">
                                <!-- Order button -->
                                    <button class="productDly btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold" id="ClickButton" name="delivery_product">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </form> -->
        </div>
    </section>
    <!-- Checkout section End -->

    <!-- Footer Section Start -->
    <footer class="section-t-space" style="background-image: url('assets/images/background/banner_08.png'); background-size: cover;">
        <!-- <footer class="section-t-space" style="background-image: url('assets/images/background/footer.jpg');color: white;"> -->
            <div class="container-fluid-lg">
                <div class="main-footer section-b-space section-t-space">
                    <div class="row g-md-4 g-3">
                        <div class="col-xl-4 col-lg-4 col-sm-12" style="text-align: center;">
                            <div class="footer-logo">
    
                                <div class="footer-logo-contain">
                                    <div class="footer-title">
                                        <h4 style="color: white;">Contact Details</h4>
                                    </div>
                                    <p style="padding-top:15px;color: white;">For registration questions please get in touch using the
                                        contact details below. For any questions use the form.</p>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-xl-4 col-lg-3 col-md-4 col-sm-12" style="text-align: center;">
                            <div class="footer-title" style="padding-top: 20px;">
                                <h4 style="color: white;">Address</h4>
                            </div>
    
                            <div class="footer-contain">
                                <a href="" class="text-content" style="color: white;">No.57, 17th Cross, 7th Main road, BTM 2nd Stage, Bangalore-560076</a>
                            </div>
                        </div>
    
                        <div class="col-xl-4 col-lg-4 col-sm-12" style="text-align: center;">
                            <div class="footer-title" style="padding-top: 20px;">
                                <h4 style="color: white;">Contact Us</h4>
                            </div>
                            <div class="footer-contain">
                                <ul>
                                    <li>
                                        <a href="contact-us.html" class="text-content" style="color: white;">info@outdidunified.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="sub-footer section-small-space">
                    <div class="reserve">
                        <h6 class="text-content" style="color: white;">©2023 Outdid Electronics</h6>
                    </div>
    
                    <div class="social-link">
                        <h6 class="text-content" style="color: white;">Stay connected :</h6>
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/" target="_blank">
                                    <i class="fa-brands fa-facebook-f" style="color:white"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/" target="_blank">
                                    <i class="fa-brands fa-twitter" style="color:white"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/" target="_blank">
                                    <i class="fa-brands fa-instagram" style="color:white"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://in.pinterest.com/" target="_blank">
                                    <i class="fa-brands fa-pinterest-p" style="color:white"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->

    <!-- Add address modal box start -->
    <div class="modal fade theme-modal" id="add-address" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Add a new address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-floating mb-4 theme-form-floating">
                            <input type="text" class="form-control" id="fname" placeholder="Enter First Name">
                            <label for="fname">First Name</label>
                        </div>
                    </form>

                    <form>
                        <div class="form-floating mb-4 theme-form-floating">
                            <input type="text" class="form-control" id="lname" placeholder="Enter Last Name">
                            <label for="lname">Last Name</label>
                        </div>
                    </form>

                    <form>
                        <div class="form-floating mb-4 theme-form-floating">
                            <input type="email" class="form-control" id="email" placeholder="Enter Email Address">
                            <label for="email">Email Address</label>
                        </div>
                    </form>

                    <form>
                        <div class="form-floating mb-4 theme-form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="address"
                                style="height: 100px"></textarea>
                            <label for="address">Enter Address</label>
                        </div>
                    </form>

                    <form>
                        <div class="form-floating mb-4 theme-form-floating">
                            <input type="email" class="form-control" id="pin" placeholder="Enter Pin Code">
                            <label for="pin">Pin Code</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-md" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn theme-bg-color btn-md text-white" data-bs-dismiss="modal">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Add address modal box end -->


    <!-- Tap to top start -->
    <div class="theme-option">
        <div class="back-to-top">
            <a id="back-to-top" href="#">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <!-- Tap to top end -->

    <!-- Bg overlay Start -->
    <div class="bg-overlay"></div>
    <!-- Bg overlay End -->

    <!-- latest jquery-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <!-- jquery ui-->
    <script src="assets/js/jquery-ui.min.js"></script>

    <!-- Lordicon Js -->
    <script src="assets/js/lusqsztk.js"></script>

    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap/popper.min.js"></script>
    <script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>

    <!-- feather icon js-->
    <script src="assets/js/feather/feather.min.js"></script>
    <script src="assets/js/feather/feather-icon.js"></script>

    <!-- Lazyload Js -->
    <script src="assets/js/lazysizes.min.js"></script>

    <!-- Delivery Option js -->
    <script src="assets/js/delivery-option.js"></script>

    <!-- Slick js-->
    <script src="assets/js/slick/slick.js"></script>
    <script src="assets/js/slick/custom_slick.js"></script>

    <!-- Quantity js -->
    <script src="assets/js/quantity.js"></script>

    <!-- script js -->
    <script src="assets/js/script.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

    <script type="text/javascript">
        // Order Summery start
        $(document).ready(function() {

            $.ajax({
                type: "POST",
                url: "getcart.php",
                success: function(response) {
                    val = $.parseJSON(response);
                    var len = val.length;
                    if (len > 0) {
                        var totalCart = 0;
                        for (var i = 0; i < len; i++) {
                            var id = val[i]['id'];
                            var name = val[i]['name'];
                            var price = val[i]['price'];
                            var img = val[i]['img'];
                            var quantity = val[i]['quantity'];
                            var qty_price_total= val[i]['qty_price_total'];
                            var total =val[i]['total'];
                           // alert(id)

                            $('.orderSummery').append('<ul class="summery-contain">'+
                                '<input type="hidden" name="id[]" value="'+ id +'">'+
                                '<li>'+
                                '<img src="assets/images/'+img+'" data-img="'+img+'" class="img-fluid lazyloaded checkout-image" alt="">'+
                                '<h4 data-name="'+name+'">'+name+'<span><b>Qty- X '+quantity+'</b></span></h4>'+
                                '<h4 class="price"><b>Rs. '+price+'</b></h4>'+
                                '<h4 class="price"><b>Rs. '+total+'</b></h4>'+
                                '</li>'+
                                '</ul>');
                                totalCart += price * quantity;
                        }
                       // alert(totalCart)
                        $(".orderSummeryTwo").append('<ul class="summery-total">'+
                            '<li>'+
                            '<h4>Subtotal</h4>'+
                            '<h4 class="price">Rs. '+totalCart.toFixed(2)+'</h4>'+
                            '</li>'+
                            '<li>'+
                            '<h4>Shipping</h4>'+
                            '<h4 class="price">Rs.80.00</h4>'+
                            '</li>'+
                            '<li class="list-total">'+
                            '<h4>Total (Rs)</h4>'+
                            '<h4 class="price">Rs.'+(totalCart+80).toFixed(2)+'</h4>'+
                            '<input type="hidden" id="pdtotal" value="'+(totalCart+80).toFixed(2)+'">'+
                            '</li>'+
                            '</ul>');
                            // '<button class="productDly btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold" id="payButton" name="delivery_product">Place Order</button>');
                    }else{
                        $('.orderSummery').append('<div style="text-align:center;color:#0da487; padding-top:10px; padding-bottom:10px;"><h3>Your Order Is Empty</h3></div>');
                             
                        $(".orderSummeryTwo").append('<ul class="summery-total">'+
                        '<li>'+
                        '<h4>Subtotal</h4>'+
                        '<h4 class="price">Rs.00.00</h4>'+
                        '</li>'+
                        '<li>'+
                        '<h4>Shipping</h4>'+
                        '<h4 class="price">Rs.80.00</h4>'+
                        '</li>'+
                        '<li class="list-total">'+
                        '<h4>Total (Rs)</h4>'+
                        '<h4 class="price">Rs.00.00</h4>'+
                        '</li>'+
                        '</ul>');
                       // '<button class="productDly btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold" name="delivery_product">Place Order</button>');
                    }
                }
            });
        });
        // All product view end

        function myFunction() {
            var srchValue = document.getElementById("myText").value;
            //  alert(srchValue);
            location.href = 'search.html?result='+ srchValue + '';
            // document.getElementById("demo").innerHTML = x;
        }
       // Order Summery end

        // User and delivery address
        $(document).ready(function(){
  
            $.ajax({ 
                type: "POST",
                url: "get_userlist.php",
                data: { data : email},
                success: function(response) {
                // alert(response);
                    val = $.parseJSON(response);
                    var len = val.length;
                        if (len > 0) {

                            for (var i = 0; i < len; i++) {

                                var name = val[i]['name'];
                                var email = val[i]['email'];
                                var password = val[i]['password'];
                                var phone = val[i]['phone'];
                                var gender = val[i]['gender'];
                                var birthday = val[i]['birthday'];
                                var address = val[i]['address'];
                                var country = val[i]['country'];
                                var city = val[i]['city'];
                                var pincode = val[i]['pincode'];

                                $('.userAddress').append('<div class="checkout-detail">'+
                                    '<div class="row g-4">'+
                                    '<div class="col-xxl-12 col-lg-12 col-md-6">'+
                                    '<div class="delivery-address-box">'+
                                    '<div>'+
                                    '<div class="form-check">'+
                                    '<input class="form-check-input" type="radio" name="jack" id="flexRadioDefault2" checked="checked">'+
                                    '</div>'+
                                    '<div class="checkout-detail">'+
                                    '<div class="modal-body" style="width:115%;">'+
                                    '<div class="form-floating mb-4 theme-form-floating">'+
                                    '<input type="text" class="form-control" name="name" value="'+ name +'" id="dname" placeholder="Enter Full Name" autocomplete="off" required>'+
                                    '<label for="name">Full Name</label>'+
                                    '</div>'+
                                    '<div class="form-floating mb-4 theme-form-floating">'+
                                    '<input type="number" class="form-control" name="phone" value="'+ phone +'" id="dphone" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;"  placeholder="Enter Phone Number" autocomplete="off" required>'+
                                    '<label for="phone">Phone Number</label>'+
                                    '</div>'+
                                    '<div class="form-floating mb-4 theme-form-floating">'+
                                    '<input type="email" class="form-control" name="" value="'+ email +'" id="email" placeholder="Enter Email Address" autocomplete="off" required>'+
                                    '<label for="email">Email Address</label>'+
                                    '</div>'+
                                    '<div class="form-floating mb-4 theme-form-floating">'+
                                    '<input type="address" class="form-control" placeholder="Leave a comment here" value="'+ address+'" name="address" id="daddress" style="height: 50px" autocomplete="off" required>'+
                                    '<label for="address">Enter Address</label>'+
                                    '</div>'+
                                    '<div class="form-floating mb-4 theme-form-floating">'+
                                    '<input type="text" class="form-control" name="pincode" value="'+ pincode +'" id="dpincode" min="6" max="6" placeholder="Enter Pin Code" autocomplete="off" required>'+
                                    '<label for="pin">Pin Code</label>'+
                                    '</div>'+
                                    '</div>'+
                                    '</div>'+
                                    '</div>'+
                                    '</div>'+
                                    '</div>'+
                                    '</div>'+
                                    '</div>');
                            }
                        }    
                }
            });  
        });
    </script>

<script>
    // Cart delivery
    var btnclick = document.getElementById('credit');
    btnclick.addEventListener("click", function (evt) {
        var credit = $("#credit").val();
        //alert(credit);
    
        if(credit){
             // id=payButton
            var buyBtn = document.getElementById('ClickButton');
            var responseContainer = document.getElementById('paymentResponse');

            // Handle any errors returned from Checkout
            var handleResult = function (result) {

            if (result.error) {
                responseContainer.innerHTML = '<p>'+result.error.message+'</p>';
            }
            buyBtn.disabled = true;
            buyBtn.textContent = 'Place Order';
            };

            // Specify Stripe publishable key to initialize Stripe.js
            var stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

            buyBtn.addEventListener("click", function (evt) {
                var dname = $("#dname").val();
                var dphone = $("#dphone").val();
                var daddress = $("#daddress").val();
                var dpincode = $("#dpincode").val();
                var pdtotal = $("#pdtotal").val();
                    
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
                    Name:dname,
                    Phone:dphone,
                    Address:daddress,
                    Pincode:dpincode,
                    ID:1,
                    Price:pdtotal,
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
        }
    });

    // Cash on delivery
    var cashbtnclick = document.getElementById('cash');
    cashbtnclick.addEventListener("click", function (evt) {
        var cash = $("#cash").val();
        //alert(cash);

        if(cash){
            var buyBtns = document.getElementById('ClickButton');
            buyBtns.addEventListener("click", function (evt) {
                var dname = $("#dname").val();
                var dphone = $("#dphone").val();
                var daddress = $("#daddress").val();
                var dpincode = $("#dpincode").val();
               
               location.href = 'deliveryProduct.php?name='+ dname +'&phone='+ dphone +'&address='+ daddress +'&pincode='+ dpincode +'&paymentoption=Cash On Delivery';
            });    
        }
    });   

    // Gpay on delivery
    var gpaybtnclick = document.getElementById('gpay');
    gpaybtnclick.addEventListener("click", function (evt) {
        var gpay = $("#gpay").val();
        alert(gpay);

    });   

    // Paytm on delivery
    var paytmbtnclick = document.getElementById('paytm');
    paytmbtnclick.addEventListener("click", function (evt) {
        var paytm = $("#paytm").val();
        alert(paytm);

    });   

     
  </script>
</html>
