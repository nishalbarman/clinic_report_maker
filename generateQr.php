<?php
include 'header.php';

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

<!doctype html>
	<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
		<style>
			/* CSS comes here */
			h3 {
			    text-align: center;
			}
			
			.content {
                border-radius: 5px;
                background-color: #f2f2f2;
                border: 1px solid #555;
                width: 80%;
                margin: 25px auto;
			    /* margin: 10px 250px 10px 250px; */
			    border: 2px solid #04AA6D;
			    padding: 20px;
			    
			}
			input {
			    padding:5px;
			    background-color:transparent;
			    border:none;
			    border-bottom:solid 4px #04AA6D;
			    width:250px;
			    font-size:16px;
                color: green;
                font-weight: bold;
			}
			
			.qr-btn {
                radius: 3px;
			    background-color: #04AA6D;
                /* #8c52ff; */
			    padding:8px;
			    color: white;
			    cursor:pointer;
			}

            #button_down {
                display: none;
                padding:5px;
			    background-color:transparent;
			    border:none;
			    border-bottom:solid 4px #04AA6D;
			    width:250px;
			    font-size:16px;
                color: green;
                font-weight: bold;
                margin-top: 10px;
                margin-bottom: 15px;
            }
		</style>
        <script>
            function candown (target, type) {

                let canvas = document.getElementById(target);

                let anchor = document.createElement("a");
                anchor.download = "download." + type;
                anchor.href = canvas.toDataURL("image/" + type);
 
                anchor.click();
                anchor.remove();
            }
        </script>
		<title>QR Code Generator</title>
	</head>
	<body>
      <style>
        body{ font: 15px sans-serif; text-align: center; }
    </style>
		<!--<center>
			<p>
				<a href="home.php" class="btn btn-warning">Go to Home</a> &nbsp;
				<a href="reports.php" class="btn btn-danger ml-3">Go to Reports</a>
			</p><br>
		<center>-->
	    <center>
        <div class="content">
		<h3 style="color: green;">Generate QR</h3><br>
        <div>
            <input id="qr-text" type="number" placeholder="Enter Serial No."/></div>
        <br/>
        <div>
            <button class="qr-btn" onclick="generateQRCode()">Create QR Code</button>
        </div>
        <br/>
        <p id="qr-result"></p>
        <canvas id="qr-code"></canvas><br>
        <div>
        <input id="button_down" type="button" value="Download" onclick="candown('qr-code', 'png')"/>
        </div>
        </center>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
		<script>
			/* JS comes here */
			
            
            function generateQRCode() {
                var qr;
			(function() {
                    qr = new QRious({
                    element: document.getElementById('qr-code'),
                    // size: 200,
                    // value: 'https://studytonight.com'
                });
            })();
                var qrtext = document.getElementById("qr-text").value;
                var url = "http://healthkind.is-great.net/reports.php?serial=" + qrtext;
                document.getElementById("qr-result").innerHTML = "<span style='font-weight:bold;color:green;'> QR code for</span> <br><span style='font-weight:bold;color:red;'>" + url +"</span> <span style='font-weight:bold;color:blue;'>:</span>";
                // alert(qrtext);
                qr.set({
                    foreground: 'black',
                    size: 100,
                    value: url
                });

                var mybutton = document.getElementById("button_down");
                mybutton.style.display = 'block';
            }
		</script>
        </div>
	</body>
</html>