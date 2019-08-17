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
        <h1>Update Inventory Record</h1>
        <?php
        $mysqli = new mysqli("localhost", "joyforge_root", "cheekypass!", "joyforge_mondaymovies");

        // check the connection
        if($mysqli === false){
            die("ERROR: Could not connect. " . $mysqli->connect_error);
        }

        // escape user inputs
        $varitemid = $mysqli->real_escape_string($_REQUEST['vitemid']);
        $varitemtitle = $mysqli->real_escape_string($_REQUEST['vitemtitle']);
        $vargenre = $mysqli->real_escape_string($_REQUEST['vgenre']);
        $varyear = $mysqli->real_escape_string($_REQUEST['vyearreleased']);
        $varlang = $mysqli->real_escape_string($_REQUEST['vlanguage']);
        $varstock = $mysqli->real_escape_string($_REQUEST['vstock']);
        $varbuycostea = $mysqli->real_escape_string($_REQUEST['vbuycosteach']);
        $varbuycosttotal = $mysqli->real_escape_string($_REQUEST['vbuycosttotal']);
        $varrentalcost = $mysqli->real_escape_string($_REQUEST['vrentalcost']);
        $varnumof = $mysqli->real_escape_string($_REQUEST['vnumofrentals']);
        $varroitotal = $mysqli->real_escape_string($_REQUEST['vroitotal']);
        $varroiprofit = $mysqli->real_escape_string($_REQUEST['vroiprofit']);
        $varroipercent = $mysqli->real_escape_string($_REQUEST['vroipercent']);
        $varvalue = $mysqli->real_escape_string($_REQUEST['vvalueperrental']);

        // sql query
        $sql = "UPDATE inventory SET itemTitle='$varitemtitle', genre='$vargenre', yearReleased='$varyear', language='$varlang', stock='$varstock', buyCostEach='$varbuycostea', buyCostTotal='$varbuycosttotal', rentalCost='$varrentalcost', numOfRentals='$varnumof', roiTotal='$varroitotal', roiProfit='$varroiprofit', roiPercent='$varroipercent', valuePerRental='$varvalue' WHERE itemID='$varitemid'";

        if($mysqli->query($sql) === true){
            echo
                "<p>Record was successfully updated.</p>";
        } else {
            echo "ERROR: Could not execute $sql. " . $mysqli->error;
        }

        // close the connection
        $mysqli->close();
        ?>
        <p><a href="inventory_records.php">Back to Inventory Records</a></p>
        <div class="bottom">
            <a href="../customer/customer_records.php">View Customer Records</a><br>
            <a href="inventory_records.php">View Inventory Records</a><br>
            <a href="../rentals/rentals_records.php">View Rentals Records</a>
        </div>
    </div>
</body>
</html>