<?php
include '../../config.php';

$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$serial = $_POST["address1"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt= "72toOcfuXCBizlYLEGqvVYeIUnXLOGsY";

$part1 = $_POST['udf1'];
$part2 = $_POST['udf2'];
$part3 = $_POST['udf3'];
$part4 = $_POST['udf4'];
$udf5 = $_POST['udf5'];

$url = "http://healthkind.is-great.net/create/".base64_decode($part1).base64_decode($part2).base64_decode($part3).base64_decode($part4);
$link_encode = base64_encode($url);

// $txnfile = fopen('../txnids/'.$txnid.'.txt', "w") or die("Unable to open file!");
// fwrite($txnfile, $link_encode);
// fclose($txnfile);

date_default_timezone_set("Asia/Calcutta");
$date =  'Not Available ('.$date = date('d/m/Y h:i:s a', time()).')';

$sql = "INSERT INTO `payments` (`serial`, `name`, `status`, `amount`, `transaction_id`, `encoded_value`, `pdf_created`, `pdf_onserver`) VALUES ('$serial', '$firstname', '$status', '$amount', '$txnid', '$link_encode', 0, '$date');";
$res = mysqli_query($link, $sql);

// Salt should be same Post Request 

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        // $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||'.$part4.'|'.$part3.'|'.$part2.'|'.$part1.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  } else {

// "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|||||"

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
         }
		 $hash = hash("sha512", $retHashSeq);
  
    //    if ($hash != $posted_hash) {
	    //    echo "Invalid Transaction. Please try again";
		//    } else {
        //  echo "<h3>Your transaction is failed"."</h3>";
        //  echo "<h4>Your transaction id is ".$txnid.".</h4>";
		//  }
         
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

    * {
  font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande",
    "Lucida Sans", Arial, sans-serif;
  box-sizing: border-box;
}

.content-t {
  display: flex;
  justify-content: center;
}

.content {
  position: absolute;
  text-align: center;
  top: 50%;
  transform: translate(0, -50%);
}

button {
  background-color: #ff8000;
  border: 1px;
  border-radius: 5px;
  color: white;
  padding: 15px 32px;
  margin-top: 40px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s;
  transition-duration: 0.4s;
  height: 50px;
  width: 200px;
}

button:hover {
  box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24),
    0 17px 50px 0 rgba(0, 0, 0, 0.19);
}

.content .order-r {
  color: black;
  font-size: 26px;
  font-weight: 1000;
}

.content .order-tq {
  color: black;
  font-size: 20px;
  font-weight: 1000;
}

.content .order-tra {
  color: #000000;
  font-size: 20px;
  font-weight: bold;
}

@media only screen and (max-width: 820px) {
  .content .order-r {
    font-size: 22px;
  }

  .content .order-tq {
    color: black;
    font-size: 19px;
    font-weight: 1000;
  }

  .content .order-tra {
    color: #000000;
    font-size: 19px;
    font-weight: bold;
  }
}

</style>
<script>

var hash = '<?php echo $part1 ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
function gotoLink() {
    document.location = "http://healthkind.is-great.net/";
}

timeLeft = 7;

function countdown() {
	timeLeft--;
	document.getElementById("seconds").innerHTML = String( timeLeft );

	if (timeLeft > 1) {
        if(timeLeft == 7) {
            document.getElementById("button").style.display = "block";
        }
		setTimeout(countdown, 1000);
	} else {
        
        document.location = "http://healthkind.is-great.net/";
    }
};

setTimeout(countdown, 1000);

</script>

</head>
<body >

<div class="content-t">
        <div class="content">

            <lable class="order-r">Your order has been recieved
            </lable>
            <p></p>
            <img src="../assets/cross.png" style="width: 160px; height: 160px;" />
            <p></p>
            <label class="order-tq">Your purchase was failed.
                !</label>
            <!--<p></p>
            <label class="order-tra">Your transaction id is:&nbsp;
                <?php echo $txnid; ?>
            </label>-->
            <br>
            <br>
            <label class="order-tq">Redirecting in <span id="seconds">7</span></label><br>

<br>
    <!--<div id="clock">
	    
    </div>-->
    <button id="button" class="button" onclick="gotoLink()" >CONTINUE</button>
    </center>

        </div>
    </div>
    
</body>
</html>