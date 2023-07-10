<?php 
/* 
 * This is - PayPal and database configuration -  
*/ 
  
// PayPal configuration 
define('PAYPAL_ID', 'nishalbarman@gmail.com'); 
define('PAYPAL_SANDBOX', FALSE); //TRUE or FALSE 
 
define('PAYPAL_RETURN_URL', 'http://healthkind.is-great.net/create/paypal/paypal_success.php'); 
define('PAYPAL_CANCEL_URL', 'http://healthkind.is-great.net/create/paypal/paypal_cancel.php'); 
define('PAYPAL_NOTIFY_URL', 'http://healthkind.is-great.net/create/paypal/paypal_ipn.php'); 
define('PAYPAL_CURRENCY', 'INR'); 

// Database configuration 
define('DB_HOST', 'sql212.byethost32.com	
'); 
define('DB_USERNAME', 'b32_32494563'); 
define('DB_PASSWORD', '@NishalBoss21'); 
define('DB_NAME', 'b32_32494563_healthkind'); 

// Change not required 
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");

// [ b_boy@gmail.com ]