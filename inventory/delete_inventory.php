<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Delete Record | Monday Movies Database</title>
<link rel="stylesheet" href="../css/style.css">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="top">
            Monday Movies Database
        </div>
        <h1>Delete Inventory Record</h1>
        <?php
        $mysqli = new mysqli("localhost", "joyforge_root", "cheekypass!", "joyforge_mondaymovies");

        // check the connection
        if($mysqli === false){
            die("ERROR: Could not connect. " . $mysqli->connect_error);
        }

        // escape user inputs
        $deleteId = $mysqli->real_escape_string($_REQUEST['delete']);

        // sql query
        $sql = "DELETE FROM inventory WHERE itemID='$deleteId'";

        if($mysqli->query($sql) === true){
            echo
                "<p>Record was successfully deleted.</p>";
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