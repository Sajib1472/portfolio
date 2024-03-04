<?php
if(isset($_POST['submit'])) {

    $connection = mysqli_connect('localhost', 'root', '', 'portfolio_db');

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $username = $_POST['username'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $insert_query = "INSERT INTO contact_table (name, email, message) VALUES ('$username', '$email', '$message')";

    if (mysqli_query($connection, $insert_query)) {
        echo "Data inserted successfully!";
        header("location: index.php");
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>
