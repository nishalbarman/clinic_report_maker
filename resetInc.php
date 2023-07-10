<?php include_once 'config.php';

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

if(!(htmlspecialchars($_SESSION["username"]) === "Nishal")) {
    echo "<script>alert('Action not allowed');</script>";
    exit;
}

    $id = $_POST['serial'];
    $sql2 = "ALTER TABLE `files` AUTO_INCREMENT = $id";

    if (mysqli_query($link, $sql2)) {
        header("location: home.php");
    } else {
        echo "<br> Increament reset unsuccessfull: " . mysqli_error($link);;
    }

    // header("location: /home.php");

 //redirect here
// include 'data.php';
// header("location: home.php");

?>