<?php

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

if(!(htmlspecialchars($_SESSION["username"]) === "Nishal")) {
    echo "<script>alert('Action not allowed');</script>";
    exit;
}

if (isset($_POST['save'])) { 
    
    $filename = $_POST['thefilename'];
    $destination = 'uploads/' . $filename;
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $file = $_FILES['thefile']['tmp_name'];
    $size = $_FILES['thefile']['size'];

    if (!in_array($extension, ['txt', 'zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['thefile']['size'] > 1000000) {
        echo "File too large!";
    } else {

        if(file_exists($destination)) {
	        $delete  = unlink($destination);
	        // if($delete){
		    //     echo "<br> File Removed";
	        // } else {
	        //     echo "<br> File has not removed";
	        // }
        }

        
        if (move_uploaded_file($file, $destination)) {
            echo "<script>alert('File uploaded successfully');</script>";
        
        } else {
            echo "<script>alert('File upload failed');</script>";
        }
    }

    header("location: /home.php");
}


?>