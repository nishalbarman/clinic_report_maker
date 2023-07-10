<?php

include '../config.php';
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

$token = getToken($conn);
$serial = getSerial($link);
$serial_new = $_POST['address1'];
$txnid = $_POST['txnid'];
$url_enc = $_POST['link'];
$delete = $_POST['delete'];
$url = base64_decode($url_enc);
$p_name = $_POST['name'];
$p_age = $_POST['age'];
$size = 0;

if (empty($p_name)) {
    $p_name = "Default";
    $p_age = 00;
}

$filename = time() . '_' . $p_name . '.pdf';
if (empty($url)) {
    // header("location: http://healthkind.is-great.net/");
    echo "Something went wrong";
    exit;
}

$url_enc_str = str_replace(" ", "%20", $url);
$shurl = file_get_contents('http://tinyurl.com/api-create.php?url=' . $url_enc_str);
$fn_url = 'http://13.234.114.167:8000/api/render?url=' . $shurl . '&pdf.pageRanges=1&pdf.format=A4&emulateScreenMedia=false&pdf.margin.top=0cm&pdf.margin.right=0cm&pdf.margin.bottom=0cm&pdf.margin.left=0cm';

$ch = curl_init($fn_url);
$save_file_loc = '../uploads/' . $filename;
$fp = fopen($save_file_loc, 'wb');
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
fclose($fp);


if (checkMain($conn) === "false") {
    $sql = "INSERT INTO files (patient_name, patient_age, file_name, size, downloads) VALUES ('$p_name', '$p_age', '$filename', $size, 0)";
    $conn->query($sql);
}
if ($delete === "true") {
    unlink('txnids/' . $txnid . '.txt');
}
$back_up = 'backups/' . $serial . '_' . $p_name;
file_put_contents($back_up, base64_decode($url_enc) . '                                                  ' . $url_enc);
header("location: http://healthkind.is-great.net/$save_file_loc");

function getToken($conn)
{
    $sql = "SELECT * FROM pdf";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $token = $row["token"];
        }
    }
    return $token;
}

function getSerial($link)
{
    $selectMaxID = 'SELECT id FROM files ORDER BY id DESC LIMIT 1';
    $maxIdResult = mysqli_query($link, $selectMaxID); //run query

    if (mysqli_num_rows($maxIdResult) > 0) {
        while ($maxid = mysqli_fetch_assoc($maxIdResult)) {
            $serial = $maxid["id"] + 1;
        }
    }
    return $serial;
}

function checkMain($conn)
{
    $sql = "select maintenance from maintenance where 1";
    $results = $conn->query($sql);
    if ($results->num_rows > 0) {
        while ($row = $results->fetch_assoc()) {
            $main = $row["maintenance"];
        }
    }
    return $main;
}