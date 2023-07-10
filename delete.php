<?php include_once 'config.php';

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

    $id = $_GET['serial'];
    $sql = "DELETE FROM `files` WHERE `files`.`id` = $id";
    $sql2 = "ALTER TABLE `files` AUTO_INCREMENT = $id";

// print_r($sql);

    if (mysqli_query($link, $sql)) {
       $str = "Record deleted successfully";
    } 
    else {
        $str = "Error deleting record: " . mysqli_error($conn);
    }

    if (mysqli_query($link, $sql2)) {
        $str = $str + "<br> Increament reset successfully";
    } else {
        $str = $str + "<br> Increament reset unsuccessfull: " . mysqli_error($conn);;
    }

    // $file_name = $_GET['file']; // file name from front end
    $filepath = 'uploads/' . $_GET['file'];

    if(file_exists($filepath)) {
	    $delete  = unlink($filepath);
	    if($delete){
		    $str = $str + "<br> File Removed";
            date_default_timezone_set("Asia/Calcutta");
            $date =  'Deleted ('.$date = date('d/m/Y h:i:s a', time()).')';
            $sql = "UPDATE `payments` SET `pdf_onserver` = '$date' WHERE serial = '$id'";
            $res = mysqli_query($link, $sql);

            header("location: /home.php");
	    }else{
	        $str = $str + "<br>Report has not been deleted, try again..";
            echo $str;
	    }
    }

    

    

 //redirect here
// include 'data.php';
// header("location: home.php");

?>