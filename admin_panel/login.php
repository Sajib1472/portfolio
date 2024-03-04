<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="form.css">
</head>

<?php
session_start();
if (isset($_SESSION['cookiecount'])) {
    $_SESSION['cookiecount'] = $_SESSION['cookiecount'] + 1;
} else {
    $_SESSION['cookiecount'] = 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $connection = mysqli_connect('localhost', 'root', '', 'portfolio_db');

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM user_table WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['username'] = $username; 
        setcookie("username", $username, time() + (86400 * 30), "/");
        header("Location: admin.php");
        exit;
    } else {
        echo "<h2>Invalid username or password.</h2>";
    }

    mysqli_close($connection);
}


?>

<body>

<div class="container">
    <h2>User Login Form</h2>
    <form action="" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="submit" value="Login">
    </form>
</div>

</body>
</html>
