<?php 
 include "maintenance.php"; 
// Initialize the session
session_start();
 
if(!(htmlspecialchars($_SESSION["username"]) === "Nishal")) {
    include 'config.php';
} else {
    include 'filesLogic.php';
}

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
} else {
    header("location: home.php");
    exit;
}

// echo "<h2>While we are not planning further feature development in India, therefor we have decided to shut all our services post 06/12/2022 Midnight.</h2>";
// exit;


?>

<!DOCTYPE html>
<head>
<meta name="robots" content="noindex">
</head>
<body>
</body>
</html>