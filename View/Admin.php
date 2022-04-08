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
                width: 10%;
                margin-top: 0;
                margin-left: 100%;
                margin-right: 0;
            }
        </style>
    </head>
    <body>
        <?php include('../View/Adminbar.php') ?>

        <fieldset style="width: 40%; height: 100%; float: left;">
            <legend><b>Profile</b></legend>
            
            <br>
            <table>
                <tr>
                    <td>
                        <label for="fname">Institute Name </label>
                    </td>
                    <td>:</td>
                    <td>
                        <?php echo $_SESSION['name']; ?>
                    </td>
                    <td rowspan="4">
                        <div class='edit'>
                            <a href="/ProjectEZ/View/Update.php">EDIT</a>
                        </div>
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