<?php
$serial = $_POST['address1'];
$sample = $_POST['patient_sample'];
$name = $_POST['patient_name'];
$age = $_POST['patient_age'];
$gender = $_POST['patient_gender'];
$reffered = $_POST['dr_name'];
$date = $_POST['report_date'];
$amount = $_POST['amount'];
// $ige = $_POST['ige_val'];

$part1 = $_POST['udf1'];
$part2 = $_POST['udf2'];
$part3 = $_POST['udf3'];
$part4 = $_POST['udf4'];
$udf5 = $_POST['udf5'];

$MERCHANT_KEY = "CY4YAH";
$SALT = "72toOcfuXCBizlYLEGqvVYeIUnXLOGsY";
// Merchant Key and Salt as provided by Payu.

// $PAYU_BASE_URL = "https://apitest.payu.in";		// For Sandbox Mode
$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|||||";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;

    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>

<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  <body onload="submitPayuForm()">
    <?php if($formError) { ?>
	
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      
    <input type="hidden" name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" />
          
    <input type="hidden" name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" />
        
    <input type="hidden" name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" />
        
    <input type="hidden" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" />
        
        
          <input type="hidden" name="productinfo" value="<?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?>"/>
        
        <input type="hidden" name="surl" value="<?php echo (empty($posted['surl'])) ? '' : $posted['surl'] ?>" size="64" />
        <input type="hidden" name="furl" value="<?php echo (empty($posted['furl'])) ? '' : $posted['furl'] ?>" size="64" />
        <input type="hidden" name="udf1" value="<?php echo $part1; ?>" />
        <input type="hidden" name="udf2" value="<?php echo $part2; ?>" />
        <input type="hidden" name="udf3" value="<?php echo $part3; ?>" />
        <input type="hidden" name="udf4" value="<?php echo $part4; ?>" />
        <input type="hidden" name="udf5" value="<?php echo $udf5; ?>" />
        <input type="hidden" name="address1" value="<?php echo $serial; ?>" />
        
        
          <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
          <?php if(1==0) { ?>
            <td colspan="4"><input type="submit" value="Submit" /></td>
          <?php } ?>
        
    </form>
  </body>
</html>
