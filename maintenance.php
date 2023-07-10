<?php
include "config.php";
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    include 'config.php';
    header("location: login.php");
    exit;
}

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "select maintenance from maintenance where 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $main = $row["maintenance"];
  }
} else {
  echo "0 results";
}

if(!(htmlspecialchars($_SESSION["username"]) === "Nishal")) {
    if($main === "true") {
        // echo "<center><h1 style='color: red; vertical-align: top;' >** Site is under maintenance, please try after some time. **</h1>";
        echo "<h2>While we are not planning further feature development in India, therefor we have decided to shut all our services post 06/12/2022 Midnight.</h2>";
    exit;
    }
} 
