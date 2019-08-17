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
        $editId = $mysqli->real_escape_string($_REQUEST['edit']);

        // sql query
        $sql = "SELECT * FROM customer WHERE customerID='$editId'";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
                // output the data in each row
                while($row = $result->fetch_assoc()) {
                 echo 
                        "<form action=\"updated_customer.php\" method=\"post\"><br>
                        <label>Customer ID</label><br><input type=\"text\" value=\"{$row["customerID"]}\" name=\"vcustomerid\"><br>
                        <label>First Name</label><br><input type=\"text\" value=\"{$row["customerFirstName"]}\" name=\"vcustomerfirstname\"><br>
                        <label>Last Name</label><br><input type=\"text\" value=\"{$row["customerLastName"]}\" name=\"vcustomerlastname\"><br>
                        <label>Date of Birth</label><br><input type=\"text\" value=\"{$row["dateOfBirth"]}\" name=\"vdateofbirth\"><br>
                        <label>Street Number</label><br><input type=\"text\" value=\"{$row["streetNum"]}\" name=\"vstreetnum\"><br>
                        <label>Street Name</label><br><input type=\"text\" value=\"{$row["streetName"]}\" name=\"vstreetname\"><br>
                        <label>Street Type</label><br><input type=\"text\" value=\"{$row["streetType"]}\" name=\"vstreettype\"><br>
                        <label>Suburb</label><br><input type=\"text\" value=\"{$row["suburb"]}\" name=\"vsuburb\"><br>
                        <label>State</label><br><input type=\"text\" value=\"{$row["state"]}\" name=\"vstate\"><br>
                        <label>Post Code</label><br><input type=\"text\" value=\"{$row["postcode"]}\" name=\"vpostcode\"><br>
                        <label>Country</label><br><input type=\"text\" value=\"{$row["country"]}\" name=\"vcountry\"><br>
                        <label>Phone Number</label><br><input type=\"text\" value=\"{$row["phoneNumber"]}\" name=\"vphonenumber\"><br>
                        <label>License Number</label><br><input type=\"text\" value=\"{$row["licenseNumber"]}\" name=\"vlicensenumber\"><br>";
                    if ($row["creditCheck"] == "-1") {
                        echo "<label>Credit Check</label><br><input type=\"checkbox\" checked name=\"credit\"><br>";
                    } else {
                        echo "<label>Credit Check</label><br><input type=\"checkbox\" name=\"credit\"><br>";
                    }
                    if ($row["active"] == "-1") {
                        echo "<label>Active Account</label><br><input type=\"checkbox\" checked name=\"active\"><br>";
                    } else {
                        echo "<label>Active Account</label><br><input type=\"checkbox\" name=\"active\"><br>";
                    }
                    echo
                        "<label>Amount Owing</label><br><input type=\"text\" value=\"{$row["amountOwing"]}\" name=\"vamountowing\"><br>".
                        "<input type=\"submit\" value=\"Submit\">";
                } echo "</form>";
        } else {
            echo "<p>ERROR: Could not execute $sql. " . $mysqli->error . "</p>";
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