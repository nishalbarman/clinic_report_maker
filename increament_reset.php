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
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <style>
        * {
  	box-sizing: border-box;
  	
  	font-size: 14px;
  	-webkit-font-smoothing: antialiased;
  	-moz-osx-font-smoothing: grayscale;
}

.login {
  	width: 400px;
  	background-color: #ffffff;
  	box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
  	margin: 100px auto;
}
.login h1 {
  	text-align: center;
  	color: #5b6574;
  	font-size: 24px;
  	padding: 20px 0 20px 0;
  	border-bottom: 1px solid #dee0e4;
}
.login form {
  	display: flex;
  	flex-wrap: wrap;
  	justify-content: center;
  	padding-top: 20px;
}
.login form label {
  	display: flex;
  	justify-content: center;
  	align-items: center;
  	width: 50px;
  	height: 50px;
  	background-color: #45d632;
  	color: #ffffff;
}
.login form input[type="text"] {
  	width: 310px;
  	height: 50px;
  	border: 1px solid #dee0e4;
  	margin-bottom: 20px;
  	padding: 0 15px;
}
.login form input[type="submit"] {
  	width: 100%;
  	padding: 15px;
 	margin-top: 20px;
  	background-color: #45d632;
      /* #3274d6; */
  	border: 0;
  	cursor: pointer;
  	font-weight: bold;
  	color: #ffffff;
  	transition: background-color 0.2s;
}
.login form input[type="submit"]:hover {
	background-color: #44c433;
    /* #2868c7; */
  	transition: background-color 0.2s;
}
</style>
	</head>
	<body>
      <style>
        body { background-color: white;
            font: 15px sans-serif;
            text-align: center;
        }
    </style>
		<div class="login">
			<h1>Reset</h1>
			<form action="resetInc.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="serial" placeholder="Increamet Value" id="username" required>
				<br>
				<input type="submit" value="Reset">
			</form>
		</div>
	</body>
</html>
