<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Customer Records | Monday Movies Database</title>
<link rel="stylesheet" href="../css/style.css">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
</head>
    
<body>
    <div class="container">
        <div class="top">
            Monday Movies Database
        </div>
        <h1>Customer Records</h1>
        <table>
            <tr>
                <th>Customer ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th>Street Number</th>
                <th>Street Name</th>
                <th>Street Type</th>
                <th>Suburb</th>
                <th>State</th>
                <th>Post Code</th>
                <th>Country</th>
                <th>Phone Number</th>
                <th>License Number</th>
                <th>Credit Check</th>
                <th>Active Account</th>
                <th>Amount Owing</th>
            </tr>
            <?php
            $mysqli = new mysqli("localhost", "joyforge_root", "cheekypass!", "joyforge_mondaymovies");

            // check the connection
            if($mysqli === false){
                die("ERROR: Could not connect. " . $mysqli->connect_error);
            }

            // sql query
            $sql = "SELECT * FROM customer";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
                // output the data in each row
                while($row = $result->fetch_assoc()) {
                    echo 
                        "<tr>".
                        "<td>".$row["customerID"]."</td>".
                        "<td>".$row["customerFirstName"]."</td>".
                        "<td>".$row["customerLastName"]."</td>".
                        "<td>".$row["dateOfBirth"]."</td>".
                        "<td>".$row["streetNum"]."</td>".
                        "<td>".$row["streetName"]."</td>".
                        "<td>".$row["streetType"]."</td>".
                        "<td>".$row["suburb"]."</td>".
                        "<td>".$row["state"]."</td>".
                        "<td>".$row["postcode"]."</td>".
                        "<td>".$row["country"]."</td>".
                        "<td>".$row["phoneNumber"]."</td>".
                        "<td>".$row["licenseNumber"]."</td>";
                    if ($row["creditCheck"] == "-1") {
                        echo "<td><input type=\"checkbox\" checked disabled></td>";
                    } else {
                        echo "<td><input type=\"checkbox\" disabled></td>";
                    }
                    if ($row["active"] == "-1") {
                        echo "<td><input type=\"checkbox\" checked disabled></td>";
                    } else {
                        echo "<td><input type=\"checkbox\" disabled></td>";
                    }
                    echo
                        "<td>$".$row["amountOwing"]."</td>".
                        "</tr>";
                } echo "</table>";
            } else {
                echo "</table><p>No results could be found.</p>";
            }
            
            $mysqli->close();
            ?>
        <form class="littleform" action="update_customer.php" method="post">
            <h1>Update a Customer Record</h1><br>
            <label for="editCustomer">Customer ID:</label><br>
            <input type="text" name="edit" id="editId"><br>
            <input type="submit" value="Submit">
        </form>
        <form class="littleform" action="delete_customer.php" method="post">
            <h1><span style="color: red;">Delete a Customer Record</span></h1><br>
            <label for="deleteCustomer">Customer ID:</label><br>
            <input type="text" name="delete" id="deleteId"><br>
            <input type="submit" value="Submit">
        </form>
        <div class="bottom">
            <a href="customer_records.php">View Customer Records</a><br>
            <a href="../inventory/inventory_records.php">View Inventory Records</a><br>
            <a href="../rentals/rentals_records.php">View Rentals Records</a>
        </div>
    </div>
</body>
</html>