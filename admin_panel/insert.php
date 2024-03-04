<?php
if(isset($_POST['submit'])) {
    $u_frontend = $_POST['frontend']; 
    $u_backend = $_POST['backend'];
    $u_database = $_POST['database'];

    $connection = mysqli_connect('localhost', 'root', '', 'portfolio_db');

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $insert_query = "INSERT INTO skill_table2 (frontend, backend, database_language) ";
    $insert_query .= "VALUES ('$u_frontend', '$u_backend', '$u_database')";
    
    $insert = mysqli_query($connection, $insert_query);

    if ($insert) {
        header("location: admin.php");
    } else {
        die("Error: " . mysqli_error($connection));
    }

    mysqli_close($connection);
}
?>
