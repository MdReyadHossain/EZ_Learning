<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectEZ/View/login.php");
    }
    
    $ezl = new mysqli("localhost", "root", "", "ezlearning");
    if ($ezl->connect_error) {
        die("Data base Connection failed: " . $ezl->connect_error);
    }

    $sql = "SELECT * FROM student";
    $result = $ezl->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student</title>
    </head>
    <body>
    <?php include('../View/Adminbar.php') ?>
    <fieldset style="width: 50%; height: 450px; overflow: scroll;">
        <legend><b>Students</b></legend>
        <h3 align="center">Students Information</h3>
        <table border="1" align="center">
            <tbody>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th>Religion</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
                <?php
                    if ($result->num_rows > 0) {
                        while ($data = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td> 10-" . $data['ID'] . "</td>";
                            echo "<td>" . $data['FirstName'] . " " . $data['LastName'] . "</td>";
                            echo "<td>" . $data['DateOfBirth'] . "</td>";
                            echo "<td>" . $data['Religion'] . "</td>";
                            echo "<td>" . $data['Email'] . "</td>";
                            echo "<td>" . $data['PhoneNo'] . "</td>";
                            echo "<td>" . $data['Username'] . "</td>";
                            echo "<td>" . "<a href='/ProjectEZ/Controller/DeleteActionStudent.php?sl='>Delete</a></td></tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
        <a href="/ProjectEZ/View/Registration.php"><p style="text-align: center;">Add a Student</p></a>
    </fieldset>
    <br>
    <fieldset style="width: 98%;">
        <?php include '../View/Footer.php'; ?>
    </fieldset>
    </body>
</html>