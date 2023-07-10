<?php include 'header.php';

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


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="robots" content="noindex">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Healthkind Lab | Admin</title>
    <style>
/* .login {
    border: 1px solid #555;
  	width: 605px;
    margin: 25px auto;
    padding: 30px;
    border: 1px solid #555;
    margin-bottom: 10px;
} */
.login h1 {
  	text-align: center;
  	color: #5b6574;
  	font-size: 24px;
  	padding: 20px 0 20px 0;
  	border-bottom: 1px solid #dee0e4;
}

.headBtn {
    margin-top: 20px;
}

.login form input[type="password"] {
  	width: 60%;
  	height: 50px;
  	border: 1px solid #dee0e4;
  	margin-bottom: 20px;
  	padding: 0 15px;
}
.login form input[type="submit"] {
  	width: 100%;
  	padding: 15px;
 	margin-top: 20px;
  	background-color: #04AA6D;
      /* #3274d6; */
  	border: 0;
  	cursor: pointer;
  	font-weight: bold;
  	color: #ffffff;
  	transition: background-color 0.2s;
    margin: 0px auto;
    border-radius: 4px;
}

/* input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-weight: bold;
  transition: background-color 0.2s;
} */


.login form input[type="submit"]:hover {
	background-color: #0a8f5e;
     /* #08a169; */
    /* #2868c7; */
  	transition: background-color 0.2s;
}

/* button {
    border: none;
    padding: 10px;
    border-radius: 5px;
} */
table {
    width: 80%;
    border-collapse: collapse;
    margin: 0px auto;
    margin-bottom: 50px;
}
th,
td {
    height: 50px;
    width: 100px; 
    vertical-align: center;
    /* text-align:center; */
    box-align: center;
    border: 1px solid black;
    /* padding: 5px; */
}

.file_name {
    padding-left: 5px;
}

.file_up {
    width: 100%;
    border: 1px solid #f1e1e1;
    display: block;
    padding: 5px 10px;
}

input[type=text], input[type=number] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

/* input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
} */

/* input[type=submit]:hover {
  background-color: #45a049;
} */

.login {
    border-radius: 5px;
    background-color: #f2f2f2;
    border: 1px solid #555;
    width: 80%;
    margin: 25px auto;
    padding: 30px;
    border: 1px solid #555;
    margin-bottom: 10px;
}

.addpatient {
   font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
   font-weight: bold;
   text-align: center;
   font-size: 20px;
   color: green;
}

    </style>
  </head>
  <body>
  <div class="content">
    <style>
        body{ font: 15px sans-serif; text-align: center; }
    </style>
  <!--<center>
    <p class="headBtn">
        <a href="home.php" class="btn btn-warning">-   Home   -</a>
        <a href="qr_gen.php" class="btn btn-danger ml-3">Generate QR</a>
        <a href="increament_reset.php" class="btn btn-danger ml-3">Reset Increament</a>
    </p>
    </center>-->
    <br>
    <center>
        <label class="addpatient">Upload Details</label>
    </center>
    <div class="login">
        <form action="index.php" method="post" enctype="multipart/form-data" >
            <label for="fname">Name</label>
            <input type="text" id="fname" name="pname" placeholder="Patient's Name..">

            <label for="lname">Age</label>
            <input type="number" id="lname" name="page" placeholder="Patient's Age..">
          <label>Upload Report</label>
          <input class = "file_up" type="file" name="myfile"> <br>
          <input type="hidden" value="" name="qr-text" id="qr-text" />
          <input type="submit" name="save" value="Submit" />
        </form>
        </div>
      <br>
    </div>
  </body>
</html>