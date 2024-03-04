<?php

$connection = mysqli_connect('localhost', 'root', '', 'portfolio_db');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$del_id =  $_REQUEST['ID'];

$delete_query = "DELETE FROM contact_table where ID=$del_id";

$delete =  mysqli_query($connection, $delete_query);

if ($delete) {
    header("location: admin.php");
} else {
    echo "Error deleting data: " . mysqli_error($connection);
}

mysqli_close($connection);

?>