<?php 
$file = "uploads/".base64_decode($_GET['file']);

// Header content type
header("Content-type: application/pdf");
  
header("Content-Length: " . filesize($file));
  
// Send the file to the browser.
readfile($file);
?> 
