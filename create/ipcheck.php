<?php 
$ip = getenv('HTTP_CLIENT_IP')?:
getenv('HTTP_X_FORWARDED_FOR')?:
getenv('HTTP_X_FORWARDED')?:
getenv('HTTP_FORWARDED_FOR')?:
getenv('HTTP_FORWARDED')?:
getenv('REMOTE_ADDR');

if($ip != "117.237.234.103" || $ip != "117.237.206.163") {
    $success_url = 'http://healthkind.is-great.net/create/verify/success.php';
    $failure_url = 'http://healthkind.is-great.net/create/verify/failure.php';
} else {
    $success_url = 'http://healthkindlab.tk/payment/verify/success.php';
    $failure_url = 'http://healthkindlab.tk/payment/verify/failure.php';
}

?>