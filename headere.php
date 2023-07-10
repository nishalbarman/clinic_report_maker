<?php

?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}
a {
    text-decoration: none;
}
nav {
   overflow: hidden;
   background-color: #04AA6D;
   padding: 10px;
}
.links {
   font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
   font-weight: bold;
   float: left;
   color:white;
   text-align: center;
   padding: 12px;
   text-decoration: none;
   font-size: 18px;
   line-height: 25px;
   border-radius: 4px;
}
nav .logo {
   font-size: 25px;
   font-weight: bold;
   font-color: red;
}
nav .links:hover {
   
   color: black;
   text-decoration: none;
}
nav .selected {
   /* background-color: white; 
   /* rgb(214, 238, 77); */
   /* color: black; */ 
}
.rightSection {
   float: right;
}
@media screen and (max-width: 870px) {
   nav .links {
      float: none;
      display: block;
      text-align: left;
      text-decoration: none;
   }
   .rightSection {
      float: none;
   }
}
</style>
</head>
<body>
<nav>
<a class="links logo" href="http://healthkind.is-great.net/home.php">HealthKind Lab</a>
<!--<img src="http://healthkind.is-great.net/assets/logo.png" />-->
</div>
<div class="rightSection">
    <a class="selected links" href="http://healthkind.is-great.net/home.php">Home</a>
    <a href="http://healthkind.is-great.net/addReport.php" class="links">Add Report</a>
    <a href="http://healthkind.is-great.net/reportMaker.php" class="links">Create Report</a>
    <a href="http://healthkind.is-great.net/generateQr.php" class="links">Generate QR</a>
    <a href="http://healthkind.is-great.net/create/txndown.php" class="links">Txn Down</a>
    <a href="http://healthkind.is-great.net/increament_reset.php" class="links">Reset Increment</a>
    <a href="http://healthkind.is-great.net/logout.php" class="links">Log Out</a>
</div>
</nav>
</body>
</html>
