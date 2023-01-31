<?php
    session_start();
    if(!isset($_COOKIE['rem'])) {
        header('location: /ProjectEZ/Controller/Logout.php');
    }
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
    <script src="../View/js/admin.js"></script>
    <title>Update Profile</title>
</head>
<body>
    <?php include('../View/Adminbar.php') ?>

    <form action="/ProjectEZ/Controller/ChangepassAction.php" target="_self" method="post" onsubmit="return validchngpass(this)" novalidate>
        <fieldset style="width: 40%;">
            <legend><b>Change Password</b></legend>
            <br>
            <?php
                if(isset($_COOKIE['msg'])) {
                    echo $_COOKIE['msg'];
                }
            ?>
            <span id="passErr"></span>
            <table>
                <tr>
                    <td>
                        <label for="curpass">Current Password </label>
                    </td>
                    <td>:</td>
                    <td>
                        <input type="password" name="currentpass" id="curpass" onkeyup="validpass(this.value)"><span id="msg"></span><br>
                        <span id="currErr"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="newpass">New Password </label>
                    </td>
                    <td>:</td>
                    <td>
                        <input type="password" name="newpassword" id="newpass"><br>
                        <span id="newErr"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="repass">Retype Password </label>
                    </td>
                    <td>:</td>
                    <td>
                        <input type="password" name="repassword" id="repass"><br>
                        <span id="reErr"></span>
                    </td>
                </tr>
            </table>
            <br>
        </fieldset>
        <br>
        <input type='submit' name='submit' value='Update'>
        <br>
    </form>

    <fieldset style="width: 98%;">
        <?php include '../View/Footer.php'; ?>
    </fieldset>

    <script>
        function validpass(pass) {
            if (pass == "") { 
                document.getElementById("msg").innerHTML = "";
                return;
            }
            else {
                let xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                    document.getElementById("msg").innerHTML = this.responseText;
                }
                xhttp.open("POST", "../Controller/CheckpassAction.php");
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("pass=" + pass);
            }
        }
    </script>
</body>
</html>