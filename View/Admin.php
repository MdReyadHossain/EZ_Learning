<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectEZ/View/login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile</title>
        <style>
            .edit {
                position: absolute;
                top: 0px;
                right: 2%;
            }
        </style>
    </head>
    <body>
        <?php include('../View/Adminbar.php') ?>

        <fieldset style="width: 40%; height: 100%; float: left; position: relative;">
            <legend><b>Profile</b></legend>
            <div class='edit'>
                <a href="/ProjectEZ/View/Update.php">EDIT</a>
            </div>
            <br>
            <table>
                <tr>
                    <td>
                        <label for="name">Institute Name </label>
                    </td>
                    <td>:</td>
                    <td>
                        <?php echo $_SESSION['name']; ?>
                    </td>
                </tr>
                <tr><td></td></tr>
                <tr>
                    <td>
                        <label for="email">Contact NO. </label>
                    </td>
                    <td>:</td>
                    <td>
                        <?php echo $_SESSION['phone']; ?>
                    </td>
                </tr>
                <tr><td></td></tr>
                <tr>
                    <td>
                        <label for="email">Email </label>
                    </td>
                    <td>:</td>
                    <td>
                        <?php echo $_SESSION['email']; ?>
                    </td>
                </tr>
                <tr><td></td></tr>
                <tr>
                    <td>
                        <label for="address">Address </label>
                    </td>
                    <td>:</td>
                    <td>
                        <?php echo $_SESSION['address']; ?>
                    </td>
                </tr>
            </table>
        </fieldset>
        <br>
        
        <fieldset style="width: 98%;">
            <?php include '../View/Footer.php'; ?>
        </fieldset>
    </body>
</html>