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
        <h1>Update Rental Record</h1>
        <?php
        $mysqli = new mysqli("localhost", "joyforge_root", "cheekypass!", "joyforge_mondaymovies");

        // check the connection
        if($mysqli === false){
            die("ERROR: Could not connect. " . $mysqli->connect_error);
        }

        // escape user inputs
        $updateId = $mysqli->real_escape_string($_REQUEST['vtransactionid']);
        $varcust = $mysqli->real_escape_string($_REQUEST['vcustomerid']);
        $varitem = $mysqli->real_escape_string($_REQUEST['vitemid']);
        $vardateof = $mysqli->real_escape_string($_REQUEST['vdateofrent']);
        $vardaysof = $mysqli->real_escape_string($_REQUEST['vdaysofrent']);
        $varamount = $mysqli->real_escape_string($_REQUEST['vtransaction']);
        $varfeesperday = $mysqli->real_escape_string($_REQUEST['voverdueperday']);
        $vardateret = $mysqli->real_escape_string($_REQUEST['vdatereturned']);
        $varoverduedate = $mysqli->real_escape_string($_REQUEST['voverduedate']);
        $vardaysoverdue = $mysqli->real_escape_string($_REQUEST['vdaysoverdue']);
        $varfollow = $mysqli->real_escape_string($_REQUEST['vfollowup']);
        $varfinal = $mysqli->real_escape_string($_REQUEST['vfinal']);
        $varoverduetotal = $mysqli->real_escape_string($_REQUEST['vfees']);
        
        // check the credit and active boxes
        
        if (isset($_POST['paid'])) {
            $varpaid = -1;
        } else {
            $varpaid = 0;
        }

        // sql query
        $sql = "UPDATE currentrentals SET customerID='$varcust', itemID='$varitem', dateOfRental='$vardateof', daysOfRental='$vardaysof', transactionAmount='$varamount', hasPaid='$varpaid', overdueFeesPerDay='$varfeesperday', dateReturned='$vardateret', overdueDate='$varoverduedate', daysOverdue='$vardaysoverdue', followupDate='$varfollow', finalDueDate='$varfinal', overdueFeeTotal='$varoverduetotal' WHERE transactionID='$updateId'";

        if($mysqli->query($sql) === true){
            echo
                "<p>Record was successfully updated.</p>";
        } else {
            echo "ERROR: Could not execute $sql. " . $mysqli->error;
        }

        // close the connection
        $mysqli->close();
        ?>
        <p><a href="rentals_records.php">Back to Rental Records</a></p>
        <div class="bottom">
            <a href="../customer/customer_records.php">View Customer Records</a><br>
            <a href="../inventory/inventory_records.php">View Inventory Records</a><br>
            <a href="rentals_records.php">View Rentals Records</a>
        </div>
    </div>
</body>
</html>