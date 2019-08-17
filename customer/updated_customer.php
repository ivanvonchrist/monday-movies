<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Update Record | Monday Movies Database</title>
<link rel="stylesheet" href="../css/style.css">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="top">
            Monday Movies Database
        </div>
        <h1>Update Customer Record</h1>
        <?php
        $mysqli = new mysqli("localhost", "joyforge_root", "cheekypass!", "joyforge_mondaymovies");

        // check the connection
        if($mysqli === false){
            die("ERROR: Could not connect. " . $mysqli->connect_error);
        }

        // escape user inputs
        $updateId = $mysqli->real_escape_string($_REQUEST['vcustomerid']);
        $varcustomerfn = $mysqli->real_escape_string($_REQUEST['vcustomerfirstname']);
        $varcustomerln = $mysqli->real_escape_string($_REQUEST['vcustomerlastname']);
        $vardateofbirth = $mysqli->real_escape_string($_REQUEST['vdateofbirth']);
        $varstreetnum = $mysqli->real_escape_string($_REQUEST['vstreetnum']);
        $varstreetname = $mysqli->real_escape_string($_REQUEST['vstreetname']);
        $varstreettype = $mysqli->real_escape_string($_REQUEST['vstreettype']);
        $varsuburb = $mysqli->real_escape_string($_REQUEST['vsuburb']);
        $varstate = $mysqli->real_escape_string($_REQUEST['vstate']);
        $varpostcode = $mysqli->real_escape_string($_REQUEST['vpostcode']);
        $varcountry = $mysqli->real_escape_string($_REQUEST['vcountry']);
        $varphonenumber = $mysqli->real_escape_string($_REQUEST['vphonenumber']);
        $varlicensenumber = $mysqli->real_escape_string($_REQUEST['vlicensenumber']);
        $varamountowing = $mysqli->real_escape_string($_REQUEST['vamountowing']);
        
        // check the credit and active boxes
        
        if (isset($_POST['credit'])) {
            $varcreditcheck = -1;
        } else {
            $varcreditcheck = 0;
        }
        
        if (isset($_POST['active'])) {
            $varactive = -1;
        } else {
            $varactive = 0;
        }

        // sql query
        $sql = "UPDATE customer SET customerFirstName='$varcustomerfn', customerLastName='$varcustomerln', dateOfBirth='$vardateofbirth', streetNum='$varstreetnum', streetName='$varstreetname', streetType='$varstreettype', suburb='$varsuburb', state='$varstate', postcode='$varpostcode', country='$varcountry', phoneNumber='$varphonenumber', licenseNumber='$varlicensenumber', creditCheck='$varcreditcheck', active='$varactive', amountOwing='$varamountowing' WHERE customerID='$updateId'";

        if($mysqli->query($sql) === true){
            echo
                "<p>Record was successfully updated.</p>";
        } else {
            echo "ERROR: Could not execute $sql. " . $mysqli->error;
        }

        // close the connection
        $mysqli->close();
        ?>
        <p><a href="customer_records.php">Back to Customer Records</a></p>
        <div class="bottom">
            <a href="customer_records.php">View Customer Records</a><br>
            <a href="../inventory/inventory_records.php">View Inventory Records</a><br>
            <a href="../rentals/rentals_records.php">View Rentals Records</a>
        </div>
    </div>
</body>
</html>