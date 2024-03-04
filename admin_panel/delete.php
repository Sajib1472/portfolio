<?php

$connection = mysqli_connect('localhost', 'root', '', 'portfolio_db');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$del_id =  $_REQUEST['ID'];

$delete_query = "DELETE FROM skill_table2 where ID=$del_id";

$delete =  mysqli_query($connection, $delete_query);

if ($delete) {
    header("location: admin.php?message=Data%20deleted%20successfully");
} else {
    echo "Error deleting data: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
