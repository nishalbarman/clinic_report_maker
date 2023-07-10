<?php include 'header.php';

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    
    exit;
}

// if(!(htmlspecialchars($_SESSION["username"]) === "Nishal")) {
//     echo "<script>alert('Action not allowed');</script>";
//     exit;
// }




?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="robots" content="noindex">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Healthkind Lab | Repot Maker</title>
    <style>

.login h1 {
  	text-align: center;
  	color: #5b6574;
  	font-size: 24px;
  	padding: 20px 0 20px 0;
  	border-bottom: 1px solid #dee0e4;
}

.login button {
  	width: 100%;
  	padding: 15px;
 	margin-top: 20px;
  	background-color: #04AA6D;
      /* #3274d6; */
  	border: 0;
  	cursor: pointer;
  	font-weight: bold;
  	color: #ffffff;
  	transition: background-color 0.2s;
    margin: 0px auto;
    border-radius: 4px;
}


.login button:hover {
	background-color: #0a8f5e;
     /* #08a169; */
    /* #2868c7; */
  	transition: background-color 0.2s;
}


select {
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

.title {
   font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
   font-weight: bold;
   text-align: center;
   font-size: 20px;
   color: green;
}


    </style>
    <script>
    function getSelect(sel) {
        var text = sel.options[sel.selectedIndex].text;
        alert(text);
        if(text == "CBC Report") {
            window.location = "http://healthkind.is-great.net/create/cbc_insert.php";
        } else if(text == "Blood Sugar") {
            window.location = "http://healthkind.is-great.net/create/sugar_insert.php";
        } else if(text == "IGE Report") {
            window.location = "http://healthkind.is-great.net/create/ige_insert.php";
        } else if(text == "Blood Report") {
            window.location = "http://healthkind.is-great.net/create/re_insert.php";
        } else if(text == "Urine Report") {
            window.location = "http://healthkind.is-great.net/create/urinere_insert.php";
        } else if(text == "Thyroid Report") {
            window.location = "http://healthkind.is-great.net/create/ths_insert.php";
        } else if(text == "HbA1c Report") {
            window.location = "http://healthkind.is-great.net/create/hba1c_insert.php";
        } else if(text == "Culture & Sensitivity") {
            window.location = "http://healthkind.is-great.net/create/csrep_insert.php";
        } else if(text == "HIV Report") {
            window.location = "http://healthkind.is-great.net/create/hiv_insert.php";
        } else if(text == "LFT Report") {
            window.location = "http://healthkind.is-great.net/create/lft_insert.php";
        } else if(text == "Haemoglobin Report") {
            window.location = "http://healthkind.is-great.net/create/haemo_insert.php";
        } else if(text == "CRP Report") {
            window.location = "http://healthkind.is-great.net/create/crp_insert.php";
        } else if(text == "Stool Report") {
            window.location = "http://healthkind.is-great.net/create/stool_insert.php";
        } else if(text == "Abs Report") {
            window.location = "http://healthkind.is-great.net/create/abs_insert.php";
        } else if(text == "ABO and Rh Grouping") {
            window.location = "http://healthkind.is-great.net/create/aborh_insert.php";
        } else if(text == "HCV Report") {
            window.location = "http://healthkind.is-great.net/create/hcv_insert.php";
        } else if(text == "Serum Electrolyte") {
            window.location = "http://healthkind.is-great.net/create/electro_insert.php";
        } else if(text == "RFT Report") {
            window.location = "http://healthkind.is-great.net/create/rft_insert.php";
        } else if(text == "Others") {
            window.location = "http://healthkind.is-great.net/create/others_insert.php";
        } else if(text == "Lipid Profile") {
            window.location = "http://healthkind.is-great.net/create/lipid_insert.php";
        } else if(text == "VDRL Report") {
            window.location = "http://healthkind.is-great.net/create/vdrl_insert.php";
        }
        
    }
</script>
  </head>
  <body>
      <style>
        body{ font: 15px sans-serif; text-align: center; }
    </style>
    <br>
    <center>
        <label class="title">Report Creator</label>
    </center>
    <div class="login">
        <form action="" method="post" enctype="multipart/form-data" >
            <label for="fname">Select Report</label>
            <select id="ddlViewBy" onChange="getSelect(this)" name="selection">
                <option >Select Report</option>
                <option value="cbc">CBC Report</option>
                <option value="sugar">Blood Sugar</option>
                <option value="ige">IGE Report</option>
                <option value="ige">Blood Report</option>
                <option value="Urine RE">Urine Report</option>
                <option value="Urine RE">Thyroid Report</option>
                <option value="HbA1c">HbA1c Report</option>
                <option value="HbA1c">Culture & Sensitivity</option>
                <option value="HbA1c">HIV Report</option>
                <option value="HbA1c">LFT Report</option>
                <option value="HbA1c">Haemoglobin Report</option>
                <option value="HbA1c">CRP Report</option>
                <option value="HbA1c">Stool Report</option>
                <option value="HbA1c">Abs Report</option>
                <option value="HbA1c">ABO and Rh Grouping</option>
                <option value="HbA1c">HCV Report</option>
                <option value="HbA1c">Serum Electrolyte</option>
                <option value="HbA1c">RFT Report</option>
                <option value="HbA1c">Others</option>
                <option value="HANSBD">Lipid Profile</option>
                
            </select>
            <br/>
            <br>
        </form>
        </div>
      <br>
    </div>
  </body>
</html>