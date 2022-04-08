<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectEZ/View/login.php");
    }

    $ezl = new mysqli("localhost", "root", "", "ezlearning");


    if ($ezl->connect_error) {
        die("Data base Connection failed: " . $ezl->connect_error);
    }

    $sql1 = "SELECT * FROM teacher";
    $sql2 = "SELECT * FROM student";

    $qry1 = $ezl->query($sql1);
    $qry2 = $ezl->query($sql2);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wbsite</title>
        <style>
            td {
                width: 25%;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <?php include('../View/Adminbar.php') ?>

        <fieldset style="width: 50%;">
            <legend><b>Dashboard</b></legend>
            <h3 align='center'>EZ Learning</h3>
            <hr>
                <table style="margin-left: auto; margin-right: auto;">
                    <tbody>
                        <tr>
                            <td>Teachers</td>
                            <td>Student</td>
                        </tr>
                        <tr>
                            <td><?php echo $qry1->num_rows; ?></td>
                            <td><?php echo $qry2->num_rows; ?></td>
                        </tr>
                    </tbody>
                </table>
                <table border="1" style="margin-left: auto; margin-right: auto;">
                    <tbody>
                        <tr>
                            <td rowspan="<?php echo $qry1->num_rows + 1; ?>">Teachers</td>
                        </tr>
                        <?php 
                            while($row = $qry1->fetch_assoc()) {
                                echo "<tr><td>" . $row['Name'] . "</tr></td>";
                            }
                            $ezl->close();
                        ?>
                    </tbody>
                </table>
        </fieldset>
        <br>
        <fieldset style="width: 98%;">
            <?php include '../View/Footer.php'; ?>
        </fieldset>
    </body>
</html>