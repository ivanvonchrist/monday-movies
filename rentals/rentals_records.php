<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Rental Records | Monday Movies Database</title>
<link rel="stylesheet" href="../css/style.css">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
</head>
    
<body>
    <div class="container">
        <div class="top">
            Monday Movies Database
        </div>
        <h1>Rental Records</h1>
        <table>
            <tr>
                <th>Transaction ID</th>
                <th>Customer ID</th>
                <th>Item ID</th>
                <th>Date of Rental</th>
                <th>Days of Rental</th>
                <th>Transaction Amount</th>
                <th>Has Paid</th>
                <th>Overdue Fees Per Day</th>
                <th>Date Returned</th>
                <th>Overdue Date</th>
                <th>Days Overdue</th>
                <th>Follow Up Date</th>
                <th>Final Due Date</th>
                <th>Overdue Fee Total</th>
            </tr>
            <?php
            $mysqli = new mysqli("localhost", "joyforge_root", "cheekypass!", "joyforge_mondaymovies");

            // check the connection
            if($mysqli === false){
                die("ERROR: Could not connect. " . $mysqli->connect_error);
            }

            // sql query
            $sql = "SELECT * FROM currentrentals";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
                // output the data in each row
                while($row = $result->fetch_assoc()) {
                    echo 
                        "<tr>".
                        "<td>".$row["transactionID"]."</td>".
                        "<td>".$row["customerID"]."</td>".
                        "<td>".$row["itemID"]."</td>".
                        "<td>".$row["dateOfRental"]."</td>".
                        "<td>".$row["daysOfRental"]."</td>".
                        "<td>$".$row["transactionAmount"]."</td>";
                    if ($row["hasPaid"] == "-1") {
                        echo "<td><input type=\"checkbox\" checked disabled></td>";
                    } else {
                        echo "<td><input type=\"checkbox\" disabled></td>";
                    }
                    echo
                        "<td>$".$row["overdueFeesPerDay"]."</td>".
                        "<td>".$row["dateReturned"]."</td>".
                        "<td>".$row["overdueDate"]."</td>".
                        "<td>".$row["daysOverdue"]."</td>".
                        "<td>".$row["followupDate"]."</td>".
                        "<td>".$row["finalDueDate"]."</td>".
                        "<td>$".$row["overdueFeeTotal"]."</td>".
                        "</tr>";
                } echo "</table>";
            } else {
                echo "</table><p>No results could be found.</p>";
            }
            
            $mysqli->close();
            ?>
        <form class="littleform" action="update_rentals.php" method="post">
            <h1>Update a Rental Record</h1><br>
            <label for="editTransaction">Transaction ID:</label><br>
            <input type="text" name="edit" id="editId"><br>
            <input type="submit" value="Submit">
        </form>
        <form class="littleform" action="delete_rentals.php" method="post">
            <h1><span style="color: red;">Delete a Rental Record</span></h1><br>
            <label for="deleteTransaction">Transaction ID:</label><br>
            <input type="text" name="delete" id="deleteId"><br>
            <input type="submit" value="Submit">
        </form>
        <div class="bottom">
            <a href="../customer/customer_records.php">View Customer Records</a><br>
            <a href="../inventory/inventory_records.php">View Inventory Records</a><br>
            <a href="rentals_records.php">View Rentals Records</a>
        </div>
    </div>
</body>
</html>