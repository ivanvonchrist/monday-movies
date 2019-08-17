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
        $editId = $mysqli->real_escape_string($_REQUEST['edit']);

        // sql query
        $sql = "SELECT * FROM currentrentals WHERE transactionID='$editId'";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
                // output the data in each row
                while($row = $result->fetch_assoc()) {
                 echo 
                        "<form action=\"updated_rentals.php\" method=\"post\"><br>
                        <label>Transaction ID</label><br><input type=\"text\" value=\"{$row["transactionID"]}\" name=\"vtransactionid\"><br>
                        <label>Customer ID</label><br><input type=\"text\" value=\"{$row["customerID"]}\" name=\"vcustomerid\"><br>
                        <label>Item ID</label><br><input type=\"text\" value=\"{$row["itemID"]}\" name=\"vitemid\"><br>
                        <label>Date of Rental</label><br><input type=\"text\" value=\"{$row["dateOfRental"]}\" name=\"vdateofrent\"><br>
                        <label>Days of Rental</label><br><input type=\"text\" value=\"{$row["daysOfRental"]}\" name=\"vdaysofrent\"><br>
                        <label>Transaction Amont</label><br><input type=\"text\" value=\"{$row["transactionAmount"]}\" name=\"vtransaction\"><br>";
                    if ($row["hasPaid"] == "-1") {
                        echo "<label>Has Paid</label><br><input type=\"checkbox\" checked name=\"paid\"><br>";
                    } else {
                        echo "<label>Has Paid</label><br><input type=\"checkbox\" name=\"paid\"><br>";
                    }
                    echo
                        "<label>Overdue Fees Per Day</label><br><input type=\"text\" value=\"{$row["overdueFeesPerDay"]}\" name=\"voverdueperday\"><br>".
                        "<label>Date Returned</label><br><input type=\"text\" value=\"{$row["dateReturned"]}\" name=\"vdatereturned\"><br>".
                        "<label>Overdue Date</label><br><input type=\"text\" value=\"{$row["overdueDate"]}\" name=\"voverduedate\"><br>".
                        "<label>Days Overdue</label><br><input type=\"text\" value=\"{$row["daysOverdue"]}\" name=\"vdaysoverdue\"><br>".
                        "<label>Follow Up Date</label><br><input type=\"text\" value=\"{$row["followupDate"]}\" name=\"vfollowup\"><br>".
                        "<label>Final Due Date</label><br><input type=\"text\" value=\"{$row["finalDueDate"]}\" name=\"vfinal\"><br>".
                        "<label>Overdue Fee Total</label><br><input type=\"text\" value=\"{$row["overdueFeeTotal"]}\" name=\"vfees\"><br>".
                        "<input type=\"submit\" value=\"Submit\">";
                } echo "</form>";
        } else {
            echo "<p>ERROR: Could not execute $sql. " . $mysqli->error . "</p>";
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