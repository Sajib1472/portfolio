<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <div class="sidebar">
      <h1>Admin Panel</h1>
      <ul>
        <li><a href="#About">About</a></li>
        <li><a href="#Project">Project</a></li>
        <li><a href="#Contact">Contact</a></li>
      </ul>
    </div>
    <section class="section" id="About">
        <div class="top-header">
            <h1>About</h1>
        </div>
            <div class="form-control" style="text-align: center">
                <div class="text-area">
                    <form action="update_intro.php" method="POST">
                        <textarea placeholder="Enter introduction" name="intro"></textarea>
                        <input type="submit" class="btn" name="submit" value="Update">
                    </form>
                </div>
            </div>
            <div>
                <h3>Frontend Language</h3>
            </div>
            <div>
            <?php
                $connection = mysqli_connect('localhost', 'root', '', 'portfolio_db');
                if (!$connection) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $show_query = "SELECT * FROM skill_table2";
                $show = mysqli_query($connection, $show_query);
                $count =  mysqli_num_rows($show);
                if ($count > 0) {
            ?>
                <table>
                    <thead>
                        <tr>
                            <th>skills</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
            <?php

                while ($row = mysqli_fetch_assoc($show)) {
                    $id =  $row["ID"];
                    $skill =  $row["frontend"];
                    if (!empty($skill)) {
            ?>
                    <tbody>
                        <tr>
                            <!-- <td><?php echo $id;?></td> -->
                            <td><?php echo $skill;?></td>
                            <td><a href="edit.php?ID=<?php echo $id?>">Update</a> || <a href="delete.php?ID=<?php echo $id?>">Delete</a></td>
                        </tr>
                    </tbody>
            <?php
                    }
                }
            ?>
                </table>
            <?php
                } else {
                    echo "No data in database.";
                }
            ?>
            </div>
            <div>
                <h3>Backend Language</h3>
            </div>
            <div>
            <?php
                $connection = mysqli_connect('localhost', 'root', '', 'portfolio_db');
                if (!$connection) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $show_query = "SELECT * FROM skill_table2";
                $show = mysqli_query($connection, $show_query);
                $count =  mysqli_num_rows($show);
                if ($count > 0) {
            ?>
                <table>
                    <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>skills</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
            <?php
                while ($row = mysqli_fetch_assoc($show)) {
                    $id =  $row["ID"];
                    $skill =  $row["backend"];
                    if (!empty($skill)) {
            ?>
                    <tbody>
                        <tr>
                            <!-- <td><?php echo $id;?></td> -->
                            <td><?php echo $skill;?></td>
                            <td><a href="edit.php?ID=<?php echo $id?>">Update</a> || <a href="delete.php?ID=<?php echo $id?>">Delete</a></td>
                        </tr>
                    </tbody>
            <?php
                    }
                }
            ?>
                </table>
            <?php
                } else {
                    echo "No data in database.";
                }
            ?>
            </div>
            <div>
                <h3>Database Language</h3>
            </div>
            <div>
            <?php
                $connection = mysqli_connect('localhost', 'root', '', 'portfolio_db');
                if (!$connection) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $show_query = "SELECT * FROM skill_table2";
                $show = mysqli_query($connection, $show_query);
                $count =  mysqli_num_rows($show);
                if ($count > 0) {
            ?>
                <table>
                    <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>skills</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
            <?php
                while ($row = mysqli_fetch_assoc($show)) {
                    $id =  $row["ID"];
                    $skill =  $row["database_language"];
                    if (!empty($skill)) {
            ?>
                    <tbody>
                        <tr>
                            <!-- <td><?php echo $id;?></td> -->
                            <td><?php echo $skill;?></td>
                            <td><a href="edit.php?ID=<?php echo $id?>">Update</a> || <a href="delete.php?ID=<?php echo $id?>">Delete</a></td>
                        </tr>
                    </tbody>
            <?php
                    }
                }
            ?>
                </table>
            <?php
                } else {
                    echo "No data in database.";
                }
            // mysqli_close($connection);

            if (isset($_GET['message'])) {
                $message = htmlspecialchars($_GET['message']);
                echo "<script>alert('$message');</script>";
            }
            ?>
            </div>
            <div class="form-control">
                <div>
                    <h3>Skills</h3>
                </div>
                <form action="insert.php" method="POST">
                    <input type="text" style="width: 300px; height: 40px;" name="frontend" placeholder="Frontend">
                    <input type="text" style="width: 300px; height: 40px;" name="backend" placeholder="Backend">
                    <input type="text" style="width: 300px; height: 40px;" name="database" placeholder="Database">
                    <input type="submit" class="btn" name="submit" value="Insert">
                </form>
            </div>
        <div class="top-header" id="Project">
            <h1>Project</h1>
        </div>
        <div>
                <h3>Project Name</h3>
            </div>
            <div>
            <?php

                $connection = mysqli_connect('localhost', 'root', '', 'portfolio_db');

                if (!$connection) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $show_query = "SELECT * FROM project_table";
                $show = mysqli_query($connection, $show_query);
                $count =  mysqli_num_rows($show);

                if ($count > 0) {
            ?>
                <table>
                    <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>Type</th>
                            <th>Name</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <?php

                        while ($row = mysqli_fetch_assoc($show)) {
    
                            $id =  $row["ID"];
                            $title = $row["title"];
                            $name =  $row["name"];
                            if (!empty($skill)) {
                    ?>
                    <tbody>
                        <tr>
                            <!-- <td><?php echo $id;?></td> -->
                            <td><?php echo $title;?></td>
                            <td><?php echo $name;?></td>
                            <td><a href="update_project.php?ID=<?php echo $id?>">Update</a> || <a href="delete_project.php?ID=<?php echo $id?>">Delete</a></td>
                        </tr>
                    </tbody>
            <?php
                        }
                    }
            ?>
                </table>
            <?php
            } else {
                echo "No data in database.";
            }
            ?>
            </div>
        <div class="form-control">
            <div>
                <h3>Insert new project</h3>
            </div>
            <form action="insert_project.php" method="POST">
                <input type="text" style="width: 300px; height: 40px;" name="title" placeholder="Type of project">
                <input type="text" style="width: 300px; height: 40px;" name="name" placeholder="Name of project">
                <input type="submit" class="btn" name="submit" value="Insert">
            </form>
        </div>
        <div class="top-header" id="Contact">
            <h1>Contact</h1>
        </div>
        <!-- <div>
                <h3>Project Name</h3>
            </div> -->
            <div>
            <?php

                $connection = mysqli_connect('localhost', 'root', '', 'portfolio_db');

                if (!$connection) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $show_query = "SELECT * FROM contact_table";
                $show = mysqli_query($connection, $show_query);
                $count =  mysqli_num_rows($show);

                if ($count > 0) {
            ?>
                <table>
                    <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <?php

                        while ($row = mysqli_fetch_assoc($show)) {
    
                            $id =  $row["ID"];
                            $name =  $row["name"];
                            $email = $row["email"];
                            $message = $row["message"];
                            if (!empty($name)) {
                    ?>
                    <tbody>
                        <tr>
                            <!-- <td><?php echo $id;?></td> -->
                            <td><?php echo $name;?></td>
                            <td><?php echo $email;?></td>
                            <td><?php echo $message;?></td>
                            <td><a href="delete_contact.php?ID=<?php echo $id?>">Delete</a></td>
                        </tr>
                    </tbody>
            <?php
                        }
                    }
            ?>
                </table>
            <?php
            } else {
                echo "No data in database.";
            }
            ?>
            </div>
        <a href="login.php" class="btn">Logout</a>
    </section>
    <?php
        mysqli_close($connection);
    ?>
  </div>
</body>
</html>
