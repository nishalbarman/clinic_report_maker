<?php 
include '../config.php';

$action = '';

if(isset($_POST['create'])) {
    $txnidd = $_POST['txnidd'];
    $serial = $_POST['address1'];
    $sql = "select * from payments where transaction_id = '$txnidd'";
    $result = mysqli_query($link, $sql);
    $count = mysqli_num_rows($result);

    if($count > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $url_encoded = $row['encoded_value'];
            $status = $row['status'];
        }

        if($status === 'success') {
            if(empty($url_encoded)) {
                $action = '';
                $error = 'Something went wrong!';
            } else {
                $action = 'http://healthkind.is-great.net/create/convert.php';    
            }
        } else {
            $error = 'Payment Unsuccessful for the transaction ID';
        }
    } else {
        $action = '';
        $error = 'Transaction id is invalid';
    }
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Download by transition if</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <style>
        * {
  	box-sizing: border-box;
  	font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
  	font-size: 16px;
  	-webkit-font-smoothing: antialiased;
  	-moz-osx-font-smoothing: grayscale;
}
body {
  	background-color: #ECECEC;
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
  	background-color: #04AA6D;
  	color: #ffffff;
}
.login form input[type="password"], .login form input[type="text"], .login form input[type="number"] {
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
  	background-color: #04AA6D;
      /* #3274d6; */
  	border: 0;
  	cursor: pointer;
  	font-weight: bold;
  	color: #ffffff;
  	transition: background-color 0.2s;
}
.login form input[type="submit"]:hover {
	background-color: #0a8f5e;
    /* #2868c7; */
  	transition: background-color 0.2s;
}

input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        display: none;
      }

</style>
    <script>
        var errr = '<?php echo $error; ?>';
        var hash = '<?php echo $action; ?>';
        function submitPayuForm() {
            if(errr != '') {
                document.getElementById("msg").style.display = "block";
            }
            if(hash == '') {
                return;
            }
            var payuForm = document.forms.payuForm;
            payuForm.submit();
        }
    </script>
	</head>
	<body onload="submitPayuForm()">
		<div class="login">
			<h1>Download Report By Txn ID</h1>
            <span id="msg" style="text-align:center; font-weight:bold; color:red;"><?php echo $error; ?></span>
			<form action="<?php echo $action;?>" method="POST" name="payuForm">
				<input type="hidden" name="link" value="<?php echo $url_encoded; ?>" />
                <input type="hidden" name="txnid" value="<?php echo $txnidd; ?>" />
                <input type="hidden" name="delete" value="true" />
<div style="display: flex">
                <label for="username">
					<i class="fas fa-user"></i>
				</label>
                <input type="number" name="address1" value="<?php echo $serial; ?>" placeholder="Serial No" required/>
</div>
<div style="display: flex">
                <label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="txnidd" placeholder="Transaction ID" id="username" value="<?php echo $txnidd; ?>"required>
                </div>
				<br>
				<input type="submit" name="create" value="Generate">
			</form>
		</div>
	</body>
</html>
