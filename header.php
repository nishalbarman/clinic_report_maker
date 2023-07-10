<?php 
 include "maintenance.php"; 
// echo "<h2>While we are not planning further feature development in India, therefor we have decided to shut all our services post 06/12/2022 Midnight.</h2>";
//  exit;
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/style.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700,900" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src='/script.js'></script>
        <style>
            @media screen and (max-width: 690px) {

.menu li{
	display: none;
}

.icon{
    font-weight: 900 !important;
    font-size: 27px !important;
    padding: 0;
    margin: auto !important;
    display: flex;
}
	.logo img {
	    height: 40px;
        margin-top: 6px;
	}
}

.head_container {
    margin-right: 1rem;
}


.spinner {
    width: 64px;
    height: 64px;
    border: 8px solid;
    border-color: #3d5af1 transparent #3d5af1 transparent;
    border-radius: 50%;
    animation: spin-anim 1.2s linear infinite;
    opacity: 1;
}

@keyframes spin-anim {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

.loader-container {
    width: 100%;
    height: 100vh;
    
    justify-content: center;
    align-items: center;
    position: fixed;
    background: #000;
    z-index: 1;
    top: 0;
    opacity: 0.6;
    display: none;
}

</style>
	</head>
	<body>
    <nav>
		<header>
			<div class="head_container">
				<div class="logo">
					<img src="http://healthkind.is-great.net/create/assets/health_logo_new.png" />
				</div>
				<div class="menu" id="myTopnav">
					<ul>
						<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="openNav()">&#9776;</a>
						<li><a href="http://healthkind.is-great.net/home.php"><img src="http://healthkind.is-great.net/assets/header_logo/home.png" style="height:30px; width: 30px; padding: 1px;"/></a></li>
						<li><a href="http://healthkind.is-great.net/reportMaker.php"><img src="http://healthkind.is-great.net/assets/header_logo/create.png" style="height:30px; width: 30px; padding: 1px;"/></a></li>
						<li><a href="http://healthkind.is-great.net/addReport.php"><img src="http://healthkind.is-great.net/assets/header_logo/upload.png" style="height:30px; width: 30px; padding: 1px;"/></a></li>
						<li><a href="http://healthkind.is-great.net/create/txndown.php"><img src="http://healthkind.is-great.net/assets/header_logo/download.png" style="height:30px; width: 30px; padding-bottom: 4px;"/></a></li>
						<li><a href="http://healthkind.is-great.net/generateQr.php"><img src="http://healthkind.is-great.net/assets/header_logo/qr-code.png" style="height:30px; width: 30px; padding: 1px; padding-bottom: 3px;"/></a></li>
                        <li><a href="http://healthkind.is-great.net/changeSettings.php"><img src="http://healthkind.is-great.net/assets/header_logo/setting.png" style="height:28px; width: 28px; padding: 1px; padding-bottom: 3px;"/></a></li>
                        <li><a href="http://healthkind.is-great.net/increament_reset.php"><img src="http://healthkind.is-great.net/assets/header_logo/reset.png" style="height:28px; width: 28px; padding: 1px; padding-bottom: 2px;"/></a></li>
                        <li><a href="http://healthkind.is-great.net/logout.php"><img src="http://healthkind.is-great.net/assets/header_logo/logout.png" style="height:30px; width: 30px; padding: 1px; padding-bottom: 3px;"/></a></li>
					</ul>
				</div>
			</div>
		</header>
        
		<div id="mySidenav" class="sidenav">
			  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			  <a href="http://healthkind.is-great.net/home.php">Home</a>
			  <a href="http://healthkind.is-great.net/reportMaker.php">Generate</a>
			  <a href="http://healthkind.is-great.net/addReport.php">Upload</a>
			  <a href="http://healthkind.is-great.net/create/txndown.php">Download</a>
			  <a href="http://healthkind.is-great.net/generateQr.php">QR Code</a>
              <a href="http://healthkind.is-great.net/changeSettings.php">Setting</a>
              <a href="http://healthkind.is-great.net/increament_reset.php">Reset Inc</a>
              <a href="http://healthkind.is-great.net/logout.php">LogOut</a>
              <br>
			  <p style="color: #1c3664; text-align: center">HealthkindLab &copy; 2022</p>
		</div>
        </nav>

        <div id="loader" class="loader-container">
            <div class="spinner"></div>
        </div>
	</body>
</html>