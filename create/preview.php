<?php include '../header.php';
include '../config.php';
include 'sessioncheck.php';

$selectMaxID = 'SELECT id FROM files ORDER BY id DESC LIMIT 1';
$maxIdResult = mysqli_query($link, $selectMaxID); //run query

if (mysqli_num_rows($maxIdResult) > 0) {  
    while($maxid = mysqli_fetch_assoc($maxIdResult)) {
        $serial = $maxid["id"] + 1;
    } 
} 

$action = "";
$udf1 = "no_url";
$udf2 = "no_url";
$udf3 = "no_url";
$udf4 = "no_url";

if (isset($_POST['create'])) {
    if(empty($serial)) {
        $serial = $_POST['serial'];
    }
    $sample = $_POST['patient_sample'];
    $name = $_POST['patient_name'];
    $age = $_POST['patient_age'];
    $gender = $_POST['patient_gender'];
    $reffered = $_POST['dr_name'];
    $date = $_POST['report_date'];
    $ige = $_POST['ige_val'];

    $return_url1 = "ige.php?serial=".$serial."&patient_sample=".$sample."&report_date=".$date;
    $return_url2 = "&dr_name=".$reffered."&patient_name=".$name."&patient_age=".$age;
    $return_url3 = "&patient_gender=".$gender."&ige_val=".$ige."&create=Submit";

    $udf1 = base64_encode($return_url1);
    $udf2 = base64_encode($return_url2);
    $udf3 = base64_encode($return_url3);

    // echo $udf1."<br>".$udf2."<br>".$udf3;
    // echo "<br>http://healthkind.is-great.net/create/".$return_url1.$return_url2.$return_url3;

}

if($udf1 === "no_url" || $udf2 === "no_url" || $udf3 === "no_url") {
    $action = "";
} else {
    $action = "http://healthkind.is-great.net/create/verify/index.php";
}


?>
<html>

<head>
	<title>Blood frp value intitialize</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
		.header {
			text-align: center;
			color: #5b6574;
			font-size: 30px;
			font-weight: bold;
		}

		.button, .form form input[type="submit"] {
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




		.button, .login form input[type="submit"]:hover {
			background-color: #0a8f5e;
			/* #08a169; */
			/* #2868c7; */
			transition: background-color 0.2s;
		}

		input {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}

		select {
			width: 100%;
			padding: 10px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}

		.form {
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

		/* input[type="date"]::-webkit-calendar-picker-indicator {
			background: transparent;
			bottom: 0;
			color: transparent;
			cursor: pointer;
			height: auto;
			left: 0;
			position: absolute;
			right: 0;
			top: 0;
			width: auto;
		} */
	</style>

	<script>
		var hash = '<?php echo $udf1 ?>';
        alert(hash);
		function submitPayuForm() {
			if (hash == 'no_url') {
				return;
			}
			var payuForm = document.forms.payuForm;
			payuForm.submit();
		}
	</script>
</head>

<body onload="submitPayuForm()">
	<div class="content">
		<center>
			<h class="header">IGE Report<label>
		</center>
		<div class="form">
			<form action="<?php echo $action; ?>" method="POST" name="payuForm">

				<input type="hidden" name="key" value="CY4YAH" />
				<input type="hidden" name="hash" value="" />
				<input type="hidden" name="txnid"
					value="<?php echo substr(hash('sha256', mt_rand() . microtime()), 0, 20);?>" />
				<input type="hidden" name="amount" value="22" />
				<input type="hidden" name="firstname" id="firstname" value="<?php echo $name; ?>" />
				<input type="hidden" name="email" id="email" value="nishalbarman@gmail.com" />
				<input type="hidden" name="phone" value="9476887301" />
				<input type="hidden" value="<?php echo $age; ?>" name="productinfo">
				<input type="hidden" name="surl" value="<?php echo $success_url; ?>" size="64" />
				<input type="hidden" name="furl" value="<?php echo $failure_url; ?>" size="64" />
				<input type="hidden" name="service_provider" value="payu_paisa" size="64" />
				<input type="hidden" name="udf1" value="<?php echo $udf1; ?>" />
				<input type="hidden" name="udf2" value="<?php echo $udf2; ?>" />
				<input type="hidden" name="udf3" value="<?php echo $udf3; ?>" />


				<label>Serial No. :</label>
				<input id="serial" type="number" placeholder="Serial number" value="<?php echo $serial; ?>"
					name="serial" disabled />
				<br>
				<label>Sample Lab No. :</label>
				<input id="sample" type="text" placeholder="Sample Number" value="<?php echo $sample; ?>"
					name="patient_sample" />
				<br>
				<label>Report Date. :</label>
				<input id="report_date" type="date" onfocus="this.showPicker()" value="<?php echo $date; ?>"
					name="report_date" />
				<br>
				<label>Reffered By:</label>
				<input id="dr_name" type="text" placeholder="Dr Name" value="<?php echo $reffered; ?>"
					name="dr_name" />
				<br>
				<label>Name:</label>
				<input id="name" type="text" placeholder="Enter Name" value="<?php echo $name; ?>"
					name="patient_name" />
				<br>
				<label>Age</label>
				<input id="age" type="number" placeholder="Enter Age" value="<?php echo $age; ?>" name="patient_age" />
				<br>
				<label>Gender</label>
				<br>
				<select id="gender" name="patient_gender" value="<?php echo $gender; ?>">
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>

				<br>
				<label>IGE :</label>
				<input id="ige" type="number" placeholder="IGE Value" step="any" min="0" value="<?php echo $ige; ?>"
					name="ige_val" />
				<br>
				<br>

                <input id="submit" type="submit" name="create" class="button" style="display: none;"/>
				<button id="preview" type="button" class="button" data-toggle="modal"
					data-target="#exampleModalLong">Preview</button>
			</form>
		</div>
	</div>
	</div>
	</div>

















	<!-- Modal -->
	<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Preview Details</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
                    <h4>Patient Details</h4>
						<label>Serial No. : <span id="m_serial"></span></label>
						
						<br>
						<label>Sample Lab No. : <span id="m_sample"></span></label>
						
						<br>
						<label>Report Date. : <span id="m_date"></span></label>
						
						<br>
						<label>Reffered By: <span id="m_dr_name" ></span></label>
						
						<br>
						<label>Name: <span id="m_name" ></span></label>
						<br>
						<label>Age : <span id="m_age" ></span></label>
						
						<br>
						<label>Gender : <span id="m_gender" ></span></label>
						<br>
						
                    <h4>Report Details</h4>
						
						<label>IGE : <span id="m_ige" ></span></label>
						
						<br>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>&nbsp;
					<button id="sub" type="button" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</div>
	</div>

	<script>

        var mod = document.getElementById("preview");
		var btn = document.getElementById("sub");

		mod.onclick = function () {
			var serial = document.getElementById("serial").value;
            document.getElementById("m_serial").innerHTML = serial;

			var sample = document.getElementById("sample").value;
            document.getElementById("m_sample").innerHTML = sample;

			var dr_name = document.getElementById("dr_name").value;
            document.getElementById("m_dr_name").innerHTML = dr_name;

			var report_date = document.getElementById("report_date").value;
            document.getElementById("m_date").innerHTML = report_date;

			var p_name = document.getElementById("name").value;
            document.getElementById("m_name").innerHTML = p_name;

			var p_age = document.getElementById("age").value;
            document.getElementById("m_age").innerHTML = p_age;

			var p_gender = document.getElementById("gender").value;
            document.getElementById("m_gender").innerHTML = p_gender;

			var ige = document.getElementById("ige").value;
            document.getElementById("m_ige").innerHTML = ige;

		}

        btn.onclick = function() {
            // document.getElementById("submit").style.display = "block";
            document.getElementById("submit").click();
        }

	</script>




</body>

</html>