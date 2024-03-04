<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link rel="stylesheet" href="form.css">
</head>

<body>
<?php

$connection = mysqli_connect('localhost', 'root', '', 'portfolio_db');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_REQUEST['ID'])) {
    $edit_id = $_REQUEST['ID'];
    $edit_query =  "SELECT * FROM skill_table2 where ID = $edit_id";
?>

    <div class="container">
        <h2>Update Form</h2>

        <form action="edit.php" method="POST">
            <input type="text" name="frontend" placeholder="Frontend">
            <input type="text" name="backend" placeholder="Backend">
            <input type="text" name="database" placeholder="Database">
            <input type="submit" name="submit" value="Update">
            <input type="hidden" name="hidden_id" value="<?php echo $edit_id?>">
        </form>
    </div>
    <?php
        }
    mysqli_close($connection);
    ?>

</body>

<?php

$connection = mysqli_connect('localhost', 'root', '', 'portfolio_db');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["submit"])) {

    $u_frontend = $_REQUEST['frontend']; 
    $u_backend = $_POST['backend'];
    $u_database = $_POST['database'];
    $u_id = $_POST['hidden_id'];

    $update_query = "UPDATE skill_table2 SET frontend='$u_frontend', backend='$u_backend', database_language='$u_database' WHERE ID='$u_id'";
    $update = mysqli_query($connection, $update_query);
    if($update){
        header("location: admin.php?message=Data%20updated%20successfully");
        exit;
    } else {
        echo "Error updating data: " . mysqli_error($connection);
    }
}

?>

</html>