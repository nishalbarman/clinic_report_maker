<?php 
include 'header.php';
include 'config.php';
include 'filesLogic.php';

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

if(!(htmlspecialchars($_SESSION["username"]) === "Nishal")) {
    header("location: home.php");
}
    
$sql = "select * from payments";
$result = mysqli_query($link, $sql);
$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="robots" content="noindex">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Healthkind Lab | Reports</title>
    <style>

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
  	background-color: #3274d6;
  	border: 0;
  	cursor: pointer;
  	font-weight: bold;
  	color: #ffffff;
  	transition: background-color 0.2s;
    margin: 0px auto;
    border-radius: 4px;
}

.login form input[type="submit"]:hover {
	background-color: #2868c7;
  	transition: background-color 0.2s;
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

#customers {
  border-collapse: collapse;
  margin: 0px auto;
  margin-bottom: 50px;
  font-family: Arial, Helvetica, sans-serif;
  width: 90%;
  
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding-left: 8px;
  padding-right: 8px;
}

#customers td {
  font-weight: bold;
  padding-top: 9px;
  padding-bottom: 9px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 11px;
  padding-bottom: 11px;
  text-align: left;
  background-color: #4FBFCD;
  /* background-color: #04AA6D; */
  color: white;
}

a {
    text-decoration: none;
    color: 4FBFCD;
}
a:hover {
    text-decoration: none;
    color: #43A9B6;
}

.mb-5, .my-5 {
    margin-bottom: 2rem!important;
    margin-left: 3rem;
    text-align: left;
}
.mt-5, .my-5 {
    margin-top: 2rem!important;
}

button {
    border: 1px solid blue;
    border-radius: 3px;
    height: 25px;
    width: 80px;
}
    </style>

    <script>
        let errr = '<?php echo $error; ?>';
        let hash = '<?php echo $action; ?>';
        function submitPayuForm() {
            
            if(hash == '') {
                return;
            }
            let payuForm = document.forms.payuForm;
            payuForm.submit();
        }
    </script>

  </head>
  <body>
  <div class="content">
    <style>
        body{ font: 15px sans-serif; }
    </style>
    <h1 class="my-5">Hi <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>, Welcome back..</h1>
    <div style="overflow-x:auto;">
    <table id="customers">
    <thead>
        <th style="text-align:center;">S. No.</th>
        <th style="text-align:center; width: 15%;">Name</th>
        <th style="text-align:center;">Status</th>
        <th style="text-align:center;">Amount</th>
        <!---<th style="text-align:center;">Size</th>--->
        <th style="text-align:center;">Transaction ID</th>
        <th style="text-align:center;">PDF Created</th>
        <th style="text-align:center;font-weight: bold;">On Server</th>
        <th style="text-align:center;">Report Name</th>
        <th style="text-align:center;">Generate</th>
    </thead>
    <tbody>
    <?php 
    $revf = array_reverse($files);
    foreach ($revf as $file): ?>
        <tr>
        <td style="text-align:center;"><?php echo $file['serial']; ?></td>
        <td style="text-align:left;"><?php echo ucwords(strtolower(str_replace("_", " ", $file['name']))); ?></td>
        <td style="text-align:center;"><?php echo $file['status']; ?></td>
        
        <!---<td style="text-align:center;"><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>--->
        <td style="text-align:center;"><?php echo $file['amount']; ?></td>
        <td style="text-align:center;"><?php echo $file['transaction_id']; ?></td>
        <td style="text-align:center;"><?php echo $file['pdf_created']; ?></td>
        <td style="text-align:center !important;">
            <?php echo $file['pdf_onserver']; ?>
        
        </td>
        <td style="text-align:center;"><?php echo $file['report_name']; ?></td>
        <!--<td style="text-align:center;font-size:14px;"class="file_name"><button style"border: 1px solid #4FBFCD;"><a target="_blank" id="btnShow" href="<?php echo 'transac-gen.php?txnidd=' . $file['transaction_id']; ?>">Generate</a></button></td>-->
        <td style="text-align:center;font-size:14px;"class="file_name">
            <form action="http://healthkind.is-great.net/create/convert.php" method="POST" name="payuForm">
                <input type="hidden" name="link" value="<?php echo $file['encoded_value']; ?>" />
                <input type="hidden" name="txnid" value="<?php echo $file['transaction_id']; ?>" />
                <input type="hidden" name="name" value="<?php echo $file['name']; ?>" />
                <input type="hidden" name="address1" value="<?php echo $file['serial']; ?>" />
                <input type="hidden" name="delete" value="true" />
				<input type="submit" name="create" value="Generate">
			</form></td>
        </tr>



    <?php endforeach;?>

    </tbody>
    </table>
    </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#btnShow').click(function(){
            $("#dialog").dialog();
            $("#frame").attr("src", "reports/my_pdf.pdf");
        }); 
    });
</script>
<div id="dialog" style="display: none;">
    <div>
        <iframe id="frame"></iframe>
    </div>
</div>
  </body>
</html>