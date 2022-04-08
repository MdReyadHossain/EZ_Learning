<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectEZ/View/login.php");
    }

    $ezl = new mysqli("localhost", "root", "", "ezlearning");
    if ($ezl->connect_error) {
        die("Data base Connection failed: " . $ezl->connect_error);
    }

    $sql = "SELECT * FROM teacher";
    $qry = $ezl->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers</title>
</head>
<body>
    <?php include('../View/Adminbar.php') ?>
    <fieldset style="width: 55%; height: 450px; overflow: scroll;">
        <legend><b>Teachers</b></legend>
        <h3 align="center">Teachers Information</h3>
        <table border="1" align="center">
            <tbody>
                <tr>
                    <th>Teacher ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>Username</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php 
                    if ($qry->num_rows > 0) {
                        while ($data = $qry->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td> 101-" . $id = $data['ID'] . "</td>";
                            echo "<td>" . $data['Name'] . "</td>";
                            echo "<td>" . $data['Gender'] . "</td>";
                            echo "<td>" . $data['DateOfBirth'] . "</td>";
                            echo "<td>" . $data['Email'] . "</td>";
                            echo "<td>" . $data['Contact'] . "</td>";
                            echo "<td>" . $data['Username'] . "</td>";
                            echo "<td>" . "<a href='/ProjectEZ/View/EditTeacher.php?id=$id'>Edit</a></td>";
                            echo "<td>" . "<a href='/ProjectEZ/Controller/DeleteActionTeacher.php'>Delete</a></td>";
                        }
                    }
                    $ezl->close();
                ?>
            </tbody>
        </table>
        <a href="/Project/View/registration.php"><p style="text-align: center;">Add a Teacher</p></a>
    </fieldset>
    <br>
    <fieldset style="width: 98%;">
        <?php include '../View/Footer.php'; ?>
    </fieldset>
</body>
</html>