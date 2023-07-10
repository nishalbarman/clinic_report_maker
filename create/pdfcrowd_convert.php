<?php
include '../config.php';
require "pdfcrowd.php";
$txnid = $_POST['txnid'];
$url_enc = $_POST['link'];
$delete = $_POST['delete'];
$url = base64_decode($url_enc);
$p_name = $_POST['name'];
$p_age = $_POST['age'];
$size = 0;

if(empty($p_name)) {
    $p_name = "Change Me";
    $p_age = 21;
}

$filename = time().'_'.$p_name.'.pdf';

// $file_name = time().'_'.$p_name.'.pdf';
$sql = "INSERT INTO files (patient_name, patient_age, file_name, size, downloads) VALUES ('$p_name', $p_age, '$filename', $size, 0)";


// if(!empty($txnid)) {
//     $txnfile = fopen('txnids/'.$txnid.'.txt', "w") or die("Unable to open file!");
//     fwrite($txnfile, $url_enc);
//     fclose($txnfile);

// }


// else {
//     $txnfile = fopen('txnids/'.$txnid.'.txt', "w") or die("Unable to open file!");
//     fwrite($txnfile, $url_enc);
//     fclose($txnfile);
// }

if(empty($url)) {
    header("location: http://healthkind.is-great.net/create/");
    exit;
}

try
{
    // create the API client instance
    $client = new \Pdfcrowd\HtmlToPdfClient("healthkindlab", "116058bfa68d8df3e32adbd20f3f8204");

    // configure the conversion
    $client->setPageSize("A4");
    $client->setOrientation("portrait");
    $client->setNoMargins(true);
    $client->setPrintPageRange("1");
    $client->setMultipageBackgroundUrl("http://healthkind.is-great.net/create/assets/watermark.png");
    $client->setCustomJavascript("libPdfcrowd.removeZIndexHigherThan({zlimit: 90});");
    $client->setRenderingMode("viewport");
    $client->setSmartScalingMode("viewport-fit");

    // run the conversion and write the result to a file
    $client->convertUrlToFile($url, $filename);
    mysqli_query($link, $sql);
    rename($filename, '../uploads/'.$filename);
    if($delete === "true") {
        unlink('txnids/'.$txnid.'.txt');
    }
    header("location: http://healthkind.is-great.net/uploads/$filename");
}
catch(\Pdfcrowd\Error $why)
{
    // report the error
    error_log("Pdfcrowd Error: {$why}\n");

    // rethrow or handle the exception
    throw $why;
}

?>