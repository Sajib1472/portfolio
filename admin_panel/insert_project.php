<?php
if(isset($_POST['submit'])) {
    $u_title = $_POST['title']; 
    $u_name = $_POST['name'];

    $connection = mysqli_connect('localhost', 'root', '', 'portfolio_db');

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $insert_query = "INSERT INTO project_table (title, name) ";
    $insert_query .= "VALUES ('$u_title', '$u_name')";
    
    $insert = mysqli_query($connection, $insert_query);

    if ($insert) {
        header("location: admin.php");
    } else {
        die("Error: " . mysqli_error($connection));
    }

    mysqli_close($connection);
}
?>