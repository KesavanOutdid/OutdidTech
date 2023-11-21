<?php 
// Product Details 
// Minimum amount is $0.50 US 
// Test Stripe API configuration 

define('STRIPE_API_KEY', 'sk_test_51MJCTESIjPscyFT9Ns4UwU71Cibj0XoYwNXSvOwy62WnZNbukMBkXSrbrNPT6oDB1YwByZoqXIq7RdALg1ZnjrxX00iKBMpjDx');  
define('STRIPE_PUBLISHABLE_KEY', ' pk_test_51MJCTESIjPscyFT97nks5qxqe5JJRUKJA3Dr3Zwr7x4TrkRPrZtgxtvFEx1vjl3l1zkiOn4S6PcgBngWwnSE1m6R00cqTYMjCe'); 

define('STRIPE_SUCCESS_URL', 'http://localhost/outdidtech/deliveryProduct.php');
define('STRIPE_CANCEL_URL', 'http://localhost/outdidtech/checkout.php');

// Database configuration   
define('DB_HOST', 'localhost');  
define('DB_USERNAME', 'root');  
define('DB_PASSWORD', '');  
define('DB_NAME', 'outdidtech_electronics'); 
?>



