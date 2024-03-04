<?php
$connection = mysqli_connect('localhost', 'root', '', 'portfolio_db');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$select_query = "SELECT * FROM user_table LIMIT 1";
$result = mysqli_query($connection, $select_query);

if (!$result) {
    die("Error retrieving data: " . mysqli_error($connection));
}

$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {

    $updated_value1 = $_POST['intro'];

    $update_query = "UPDATE user_table SET column4='$updated_value1' LIMIT 1";
    $update_result = mysqli_query($connection, $update_query);

    if ($update_result) {
        echo "Row updated successfully!";
    } else {
        echo "Error updating row: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>
