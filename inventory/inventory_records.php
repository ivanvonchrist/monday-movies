<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Inventory Records | Monday Movies Database</title>
<link rel="stylesheet" href="../css/style.css">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
</head>
    
<body>
    <div class="container">
        <div class="top">
            Monday Movies Database
        </div>
        <h1>Inventory Records</h1>
        <table>
            <tr>
                <th>Item ID</th>
                <th>Item Title</th>
                <th>Genre</th>
                <th>Year Released</th>
                <th>Language</th>
                <th>Stock</th>
                <th>Buy Cost Each</th>
                <th>Buy Cost Total</th>
                <th>Rental Cost</th>
                <th>Number of Rentals</th>
                <th>ROI Total</th>
                <th>ROI Percent</th>
                <th>Value Per Rental</th>
            </tr>
            <?php
            $mysqli = new mysqli("localhost", "joyforge_root", "cheekypass!", "joyforge_mondaymovies");

            // check the connection
            if($mysqli === false){
                die("ERROR: Could not connect. " . $mysqli->connect_error);
            }

            // sql query
            $sql = "SELECT * FROM inventory";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
                // output the data in each row
                while($row = $result->fetch_assoc()) {
                    echo 
                        "<tr>".
                        "<td>".$row["itemID"]."</td>".
                        "<td>".$row["itemTitle"]."</td>".
                        "<td>".$row["genre"]."</td>".
                        "<td>".$row["yearReleased"]."</td>".
                        "<td>".$row["language"]."</td>".
                        "<td>".$row["stock"]."</td>".
                        "<td>$".$row["buyCostEach"]."</td>".
                        "<td>$".$row["buyCostTotal"]."</td>".
                        "<td>$".$row["rentalCost"]."</td>".
                        "<td>".$row["numOfRentals"]."</td>".
                        "<td>$".$row["roiTotal"]."</td>".
                        "<td>$".$row["roiProfit"]."</td>".
                        "<td>".$row["roiPercent"]."%</td>";
                        "<td>".$row["valuePerRental"]."%</td></tr>";
                } echo "</table>";
            } else {
                echo "</table><p>No results could be found.</p>";
            }
            
            $mysqli->close();
            ?>
        <form class="littleform" action="update_inventory.php" method="post">
            <h1>Update an Inventory Record</h1><br>
            <label for="editInventory">Item ID:</label><br>
            <input type="text" name="edit" id="editId"><br>
            <input type="submit" value="Submit">
        </form>
        <form class="littleform" action="delete_inventory.php" method="post">
            <h1><span style="color: red;">Delete an Item Record</span></h1><br>
            <label for="deleteInventory">Item ID:</label><br>
            <input type="text" name="delete" id="deleteId"><br>
            <input type="submit" value="Submit">
        </form>
        <div class="bottom">
            <a href="../customer/customer_records.php">View Customer Records</a><br>
            <a href="inventory_records.php">View Inventory Records</a><br>
            <a href="../rentals/rentals_records.php">View Rentals Records</a>
        </div>
    </div>
</body>
</html>