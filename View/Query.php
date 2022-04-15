<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectEZ/View/login.php");
    }

    $ezl = new mysqli("localhost", "root", "", "ezlearning");
    if ($ezl->connect_error) {
        die("Data base Connection failed: " . $ezl->connect_error);
    }

    $sql = "SELECT * FROM query";
    $result = $ezl->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query</title>
</head>
<body>
    <?php include('../View/Adminbar.php') ?>

    <fieldset style="width: 60%; height: 450px; float: left; overflow: scroll;">
        <legend><b>Query</b></legend>
        <table border="1" align="center">
            <br>
            <tbody>
                <tr>
                    <th>Teacher ID</th>
                    <th>Teacher Name</th>
                    <th>Query</th>
                    <th>Action</th>
                </tr>
                <?php 
                    if ($result->num_rows > 0) {
                        while ($data = $result->fetch_assoc()) {
                            echo "<tr>";
                                echo "<td> 101-" . $data['ID'] . "</td>";
                                echo "<td>" . $data['Name'] . "</td>";
                                echo "<td>" . $data['Query'] . "</td>";
                                if ($data['Solve'] == 'no') {
                                    echo "<td>" . "<a href='/ProjectEZ/View/QueryDone.php?id=" . $data['ID'] . "'>Done</a></td>";
                                }
                                else {
                                    echo "<td>✅Solved</td>";
                                }
                            echo "</tr>";
                        }
                    }
                    else {
                        echo "<tr>";
                                echo "<td>--</td>";
                                echo "<td>--</td>";
                                echo "<td>--</td>";
                                echo "<td>--</td>";
                            echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <br>
    </fieldset>
    <br>
    <fieldset style="width: 98%;">
        <?php 
            include '../View/Footer.php'; 
        ?>
    </fieldset>
</body>
</html>