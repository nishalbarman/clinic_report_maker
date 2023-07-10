<?php include 'header.php';
include 'config.php';

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    
    exit;
}

if(!(htmlspecialchars($_SESSION["username"]) === "Nishal")) {
    echo "<script>alert('Action not allowed');</script>";
    exit;
}

// Create connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM pdf";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $token = $row["token"];
  }
} else {
  echo "0 results";
}

if(isset($_POST['submit'])) {
    $token = $_POST['token'];
    $sql = "UPDATE `pdf` SET `token`= '".$token."' WHERE 1=1";
    if($conn->query($sql)) {
        echo "<script>alert('Success');</script>";
    } else {
        echo "<script>alert('Failed');</script>";
    }
}

if(isset($_POST['maintenance'])) {
    $value = $_POST['sel'];
    $sql1 = "UPDATE `maintenance` SET `maintenance`= '".$value."' WHERE 1=1";
    if($conn->query($sql1)) {
        echo "<script>alert('Success');</script>";
    } else {
        echo "<script>alert('Failed');</script>";
    }
}

$sqls = "select `maintenance` from `maintenance` WHERE 1=1";
$resultss = $conn->query($sqls);
if ($resultss->num_rows > 0) {
  // output data of each row
  while($rows = $resultss->fetch_assoc()) {
    $m = $rows["maintenance"];
  }
}

// <br>
//                 <label>Toogle Maintenance</label>
//                 <br>
//                 <select name="maintenance">
//                     <option value="true">In Maintenance</option>
//                     <option value="false">Not In Maintenance</option>
//                 </select>
$conn->close();
?>

<html>

<head>
    <title>Blood frp value intitialize</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

        body  {
            margin-bottom: 3rem;
        }

        .header {
            text-align: center;
            color: #5b6574;
            font-size: 30px;
            font-weight: bold;
        }

        .form form input[type="submit"] {
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




        .login form input[type="submit"]:hover {
            background-color: #0a8f5e;
            /* #08a169; */
            /* #2868c7; */
            transition: background-color 0.2s;
        }

        input {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form {
            border-radius: 5px;
            background-color: #f2f2f2;
            border: 1px solid #555;
            width: 80%;
            margin: 25px auto;
            padding: 30px;
            border: 1px solid #555;
            margin-bottom: 10px;
        }

        .addpatient {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: bold;
            text-align: center;
            font-size: 20px;
            color: green;
        }

        /* input[type="date"]::-webkit-calendar-picker-indicator {
			background: transparent;
			bottom: 0;
			color: transparent;
			cursor: pointer;
			height: auto;
			left: 0;
			position: absolute;
			right: 0;
			top: 0;
			width: auto;
		} */



        .styled-checkbox {
  position: absolute; // take it out of document flow
  opacity: 0; // hide it

  & + label {
    position: relative;
    cursor: pointer;
    padding: 0;
  }

  // Box.
  & + label:before {
    content: '';
    margin-right: 10px;
    display: inline-block;
    vertical-align: text-top;
    width: 20px;
    height: 20px;
    background: white;
  }

  // Box hover
  &:hover + label:before {
    background: #f35429;
  }
  
  // Box focus
  &:focus + label:before {
    box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.12);
  }

  // Box checked
  &:checked + label:before {
    background: #f35429;
  }
  
  // Disabled state label.
  &:disabled + label {
    color: #b8b8b8;
    cursor: auto;
  }

  // Disabled box.
  &:disabled + label:before {
    box-shadow: none;
    background: #ddd;
  }

  // Checkmark. Could be replaced with an image
  &:checked + label:after {
    content: '';
    position: absolute;
    left: 5px;
    top: 9px;
    background: white;
    width: 2px;
    height: 2px;
    box-shadow: 
      2px 0 0 white,
      4px 0 0 white,
      4px -2px 0 white,
      4px -4px 0 white,
      4px -6px 0 white,
      4px -8px 0 white;
    transform: rotate(45deg);
  }
}

.unstyled {
  margin: 0;
  padding: 0;
  list-style-type: none;
}

li {
  margin: 20px 0;
}
.styled-checkbox {
  position: absolute; // take it out of document flow
  opacity: 0; // hide it

  & + label {
    position: relative;
    cursor: pointer;
    padding: 0;
  }

  // Box.
  & + label:before {
    content: '';
    margin-right: 10px;
    display: inline-block;
    vertical-align: text-top;
    width: 20px;
    height: 20px;
    background: white;
  }

  // Box hover
  &:hover + label:before {
    background: #f35429;
  }
  
  // Box focus
  &:focus + label:before {
    box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.12);
  }

  // Box checked
  &:checked + label:before {
    background: #f35429;
  }
  
  // Disabled state label.
  &:disabled + label {
    color: #b8b8b8;
    cursor: auto;
  }

  // Disabled box.
  &:disabled + label:before {
    box-shadow: none;
    background: #ddd;
  }

  // Checkmark. Could be replaced with an image
  &:checked + label:after {
    content: '';
    position: absolute;
    left: 5px;
    top: 9px;
    background: white;
    width: 2px;
    height: 2px;
    box-shadow: 
      2px 0 0 white,
      4px 0 0 white,
      4px -2px 0 white,
      4px -4px 0 white,
      4px -6px 0 white,
      4px -8px 0 white;
    transform: rotate(45deg);
  }
}

.unstyled {
  margin: 0;
  padding: 0;
  list-style-type: none;
}

li {
  margin: 20px 0;
}

.centered {
  width: 300px;
  margin-left: 20px;
}

    </style>
    <script>
    function checkMan() {
        var st = "<?php echo $m; ?>";
        if(st == "true") {
            document.getElementById("status").innerHTML = "Under Maintenance";
        } else {
            document.getElementById("status").innerHTML = "Not in Maintenance";
        }
    }
        
    </script>

    
</head>

<body onload="checkMan()">
    <div class="content">
        <center>
            <br>
            <label class="header">Setting Update<label>
        </center>
        <div class="form">
            <form action="" method="POST" name="payuForm">
                <h3>Token Number</h3>
                <input type="text" placeholder="<?php echo $token; ?>" value="<?php echo $token; ?>" name="token" /><br><br>
                <input type="submit" name="submit" />
            </form>
            <form action="" method="POST">
                <h3>Toogle Maintenance</h3>
                <h3 style="color: red;">Current status: <span id="status"></span></h3>
                <select name="sel">
                    <option value="true">In Maintenance</option>
                    <option value="false">Not In Maintenance</option>
                </select>
                <br><br>
                <input type="submit" name="maintenance" />
            </form>
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
    </div>
    </div>
</body>

</html>