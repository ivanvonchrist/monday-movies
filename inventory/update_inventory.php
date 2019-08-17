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
        $editId = $mysqli->real_escape_string($_REQUEST['edit']);

        // sql query
        $sql = "SELECT * FROM inventory WHERE itemID='$editId'";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
                // output the data in each row
                while($row = $result->fetch_assoc()) {
                 echo 
                        "<form action=\"updated_inventory.php\" method=\"post\"><br>
                        <label>Item ID</label><br><input type=\"text\" value=\"{$row["itemID"]}\" name=\"vitemid\"><br>
                        <label>Item Title</label><br><input type=\"text\" value=\"{$row["itemTitle"]}\" name=\"vitemtitle\"><br>
                        <label>Genre</label><br><input type=\"text\" value=\"{$row["genre"]}\" name=\"vgenre\"><br>
                        <label>Year Released</label><br><input type=\"text\" value=\"{$row["yearReleased"]}\" name=\"vyearreleased\"><br>
                        <label>Language</label><br><input type=\"text\" value=\"{$row["language"]}\" name=\"vlanguage\"><br>
                        <label>Stock</label><br><input type=\"text\" value=\"{$row["stock"]}\" name=\"vstock\"><br>
                        <label>Buy Cost Each</label><br><input type=\"text\" value=\"{$row["buyCostEach"]}\" name=\"vbuycosteach\"><br>
                        <label>Buy Cost Total</label><br><input type=\"text\" value=\"{$row["buyCostTotal"]}\" name=\"vbuycosttotal\"><br>
                        <label>Rental Cost</label><br><input type=\"text\" value=\"{$row["rentalCost"]}\" name=\"vrentalcost\"><br>
                        <label>Number of Rentals</label><br><input type=\"text\" value=\"{$row["numOfRentals"]}\" name=\"vnumofrentals\"><br>
                        <label>ROI Total</label><br><input type=\"text\" value=\"{$row["roiTotal"]}\" name=\"vroitotal\"><br>
                        <label>ROI Profit</label><br><input type=\"text\" value=\"{$row["roiProfit"]}\" name=\"vroiprofit\"><br>
                        <label>ROI Percent</label><br><input type=\"text\" value=\"{$row["roiPercent"]}\" name=\"vroipercent\"><br>
                        <label>Value Per Rental</label><br><input type=\"text\" value=\"{$row["valuePerRental"]}\" name=\"vvalueperrental\"><br>".
                        "<input type=\"submit\" value=\"Submit\">";
                } echo "</form>";
        } else {
            echo "<p>ERROR: Could not execute $sql. " . $mysqli->error . "</p>";
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