<?php 
    include 'config.php';

    $action = '';

    $txnidd = $_GET['txnidd'];
    
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
                $error = "<script>alert('Something went wrong')</script>";
                // header("location: payments.php");
            } else {
                $action = 'http://healthkind.is-great.net/create/convert.php';   
            }
        }
        
    } else {
        $action = '';
        $error = "<script>alert('Transaction id is invalid')</script>";
        echo "<script>alert('Transaction id is invalid')</script>";
        // header("location: payments.php");
    }

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
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
			<form action="<?php echo $action;?>" method="POST" name="payuForm">
				
                <label for="username">
					<i class="fas fa-user"></i>
				</label>
                
                <input type="hidden" name="link" value="<?php echo $url_encoded; ?>" />
                <input type="hidden" name="txnid" value="<?php echo $txnidd; ?>" />
                <input type="hidden" name="delete" value="true" />

				<input type="hidden" name="txnidd" placeholder="Transaction ID" id="username" value="<?php echo $txnidd; ?>"required>
				<br>
				<input type="hidden" name="create" value="Download">
			</form>
		</div>
	</body>
</html>
