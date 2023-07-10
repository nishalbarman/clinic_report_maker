<?php
include '../../config.php';

if(isset($_GET["i"])) {
    $i = $_GET['i'];
}

$action = "http://healthkind.is-great.net/create/convert.php";

if(isset($_POST)) {
   foreach($_POST as $post) {
       echo $post."<br>";
   }
   exit;
}

$status = $_POST["status"];
$firstname = $_POST["firstname"];
$amount = $_POST["amount"];
$txnid = $_POST["txnid"];
$posted_hash = $_POST["hash"];
$key = $_POST["key"];
$productinfo = $_POST["productinfo"];
$email = $_POST["email"];
$salt = "72toOcfuXCBizlYLEGqvVYeIUnXLOGsY";

$serial = $_POST['address1'];
$part1 = $_POST['udf1'];
$part2 = $_POST['udf2'];
$part3 = $_POST['udf3'];
$part4 = $_POST['udf4'];
$udf5 = $_POST['udf5'];

$filename = time() . '_' . $firstname . 'pdf';

$url = "http://healthkind.is-great.net/create/" . base64_decode($part1) . base64_decode($part2) . base64_decode($part3) . base64_decode($part4);
$link_encode = base64_encode($url);

date_default_timezone_set("Asia/Calcutta");
$date = 'Not Available (' . $date = date('d/m/Y h:i:s a', time()) . ')';

$sql = "INSERT INTO `payments` (`serial`, `name`, `status`, `amount`, `transaction_id`, `encoded_value`, `pdf_created`, `pdf_onserver`, `report_name`) VALUES ('$serial', '$firstname', '$status', '$amount', '$txnid', '$link_encode', 0, '$date', '$udf5');";
$res = mysqli_query($link, $sql);

$txnfile = fopen('../txnids/' . $txnid . '.txt', "w") or die("Unable to open file!");
fwrite($txnfile, $link_encode);
fclose($txnfile);


// Salt should be same Post Request 

if (isset($_POST["additionalCharges"])) {
    $additionalCharges = $_POST["additionalCharges"];
    $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '||||||' . $udf5 . '|' . $part4 . '|' . $part3 . '|' . $part2 . '|' . $part1 . '|' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
} else {
    $retHashSeq = $salt . '|' . $status . '||||||' . $udf5 . '|' . $part4 . '|' . $part3 . '|' . $part2 . '|' . $part1 . '|' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
}
$hash = hash("sha512", $retHashSeq);
if ($hash !== $posted_hash) {
    echo "<center><span style='color: black;
            font-size: 26px;
            font-weight: 1000; text-align: center;'>Invalid transaction, Please try again.
            </span></center>";
    header("location: http://healthkind.is-great.net/create/verify/failure.php");
    exit;
}
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

        var sub = 0;

        var hash = '<?php echo $part1 ?>';
        function submitPayuForm() {
            if (hash == '') {
                return;
            }
            var payuForm = document.forms.payuForm;
            payuForm.submit();
        }


        timeLeft = 10;

        function countdown() {
            if (sub != 0) {
                timeLeft = 1;
            }
            timeLeft--;
            document.getElementById("seconds").innerHTML = String(timeLeft);

            if (timeLeft > 1) {
                if (timeLeft == 8) {
                    document.getElementById("button").style.display = "block";
                }
                setTimeout(countdown, 1000);
            } else {
                if (sub == 0) {
                    var payuForm = document.forms.payuForm;
                    submitPayuForm();
                    
                }

            }
        };

        tLeft = 15;
        function buttonCount() {
            tLeft--;
            document.getElementById("seconds").innerHTML = String(tLeft);
            if (tLeft > 1) {
                setTimeout(buttonCount, 1000);
            } else {
                document.getElementById("button").style.background = "#4CAF50";
                document.getElementById("button").disabled = false;
            }
        };

        setTimeout(countdown, 1000);

        function timerStop() {
            sub = 1;
            document.getElementById("button").disabled = true;
            document.getElementById("button").style.background = "grey";
            tLeft = 15;
            buttonCount();
            var payuForm = document.forms.payuForm;
            submitPayuForm();
        };

    </script>

</head>

<body>
    <div class="content-t">
        <div class="content">
            
            <form action="<?php echo $action; ?>" method="POST" name="payuForm">
                <input type="hidden" name="link" value="<?php echo $link_encode; ?>" />
                <input type="hidden" name="txnid" value="<?php echo $txnid; ?>" />
                <input type="hidden" name="name" value="<?php echo $firstname; ?>" />
                <input type="hidden" name="age" value="<?php echo $productinfo; ?>" />
                <input type="hidden" name="reportname" value="<?php echo $udf5; ?>" />
                <input type="hidden" name="address1" value="<?php echo $serial; ?>" />
                
                <lable class="order-r">Your order has been received
            </lable>
            <p></p>
            <img src="../assets/verified.gif" style="width: 90px; height: 90px;" />
            <p></p>
            <label class="order-tq">Thank you for your purchase
                !</label>
            <p></p>
            <label class="order-tra">Your transaction id is:&nbsp;
                <?php echo $txnid; ?>
            </label><br><br>
            <center><label style="color:green;font-weight: bold; font-size: 20px;">Redirecting in</label>

                <br><br>
                <div id="clock">
                    <span syle="font-weight: bolder;" id="seconds">10</span><span syle="font-weight: bolder;"> seconds</span>
                </div>
                
                <button onclick="timerStop()" id="button" class="button" style="display: none">Generate
                    Report</button>
            </center>
            </form>

        </div>
    </div>
</body>

</html>