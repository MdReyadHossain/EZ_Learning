<?php
    session_start();
    if(isset($_SESSION['username'])) {
        if($_SESSION['username'] == 'admin')
            header("Location: /ProjectEZ/View/Admin.php");
        else 
        header("Location: /Project/View/dashboard.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signin</title>
        <style>
            fieldset {
                width: 500px;
            }
        </style>
    </head>
    <body>
        <fieldset style="width: 98%;">
            <?php include('../View/Header.php'); ?>
            <div style="float: right;">
                <a href="/ProjectEZ/View/login.php">Login</a> | <a href="/ProjectEZ/Home.php">Home</a>
            </div>
        </fieldset>

        <form action="/ProjectEZ/Controller/LoginAction.php" target="_self" method="POST" onsubmit="return validlogin(this)">  
            <fieldset style="width: 500px; margin-left: auto; margin-right: auto;">
                <legend><h3>SignIn</h3></legend>
                <?php
                    if (isset($_COOKIE['msg'])) {
                        echo $_COOKIE['msg'];
                    }
                ?>
                <span id="msg"></span>
               <table>
                    <tr>
                        <td>
                            <label for="user">Username </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="user" id="user">
                            <span id="userErr" style="color: red;"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pass">Password </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="password" name="pass" id="pass">
                            <span id="passErr" style="color: red;"></span>
                        </td>
                    </tr>
                </table> 
                <br>
                <input type="checkbox" name="remember" id="rem"><label for="rem">Remember me</label>
                <br><br>
                <input type="submit" name="login" value="Login">
                <a href="/ProjectEZ/View/registration.php">Need to registration?</a>
            </fieldset>
        </form>

        <br>
        
        <fieldset style="width: 98%;">
            <?php include '../View/Footer.php'; ?>
        </fieldset>
        <script>
            function validlogin(login) {
            let userErr = document.getElementById("userErr");
            let passErr = document.getElementById("passErr");

            userErr.innerHTML = "";
            passErr.innerHTML = "";

            let user = login.user.value;
            let pass = login.pass.value;

            let isvalid = true;
            let isEmpty = false;
            if(user === "") {
                userErr.innerHTML = "❗Username should not empty!";
                isvalid = false;
                isEmpty = true;
            }
            if(pass === "") {
                passErr.innerHTML = "❗Password should not empty!";
                isvalid = false;
                isEmpty = true;
            }
            return isvalid;
        }
        </script>
    </body>
</html>