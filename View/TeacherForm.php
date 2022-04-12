<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration</title>
        <style> 
            legend {
                font-weight: bold; 
                font-size: large;
            }
            .error {
                color: red;
            }
        </style>
    </head> 
    <body>
        <?php include('../View/Adminbar.php') ?>

        <form action="/ProjectEZ/Controller/TeacherAction.php" target="_self" method="post" novalidate>
            <fieldset style="width: auto; height: 100%; float: left;">
                <legend><b>Teacher Form</b></legend>
                <?php
                    if(isset($_COOKIE['msg'])) {
                        echo $_COOKIE['msg'];
                    }
                ?>
                <table>
                    <tr>
                        <td>
                            <label for="name">Name </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="name" id="name"> <span class="error">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="gen">Gender </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="radio" name="gender" value="Male" id="male"> <label for="male">Male</label> 
                            <input type="radio" name="gender" value="Memale" id="female"> <label for="female">Female</label>
                            <input type="radio" name="gender" value="Other" id="other"> <label for="other">Others</label>
                            <span class="error">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="dob">Date of Birth </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="date" name="dob" id="dob"> <span class="error">*<?php if(isset($_COOKIE['dob'])) {echo $_COOKIE['dob'];} ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="phone">Contact No. </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="tel" name="phone" id="phone">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">Email </label> 
                        </td>
                        <td>:</td>
                        <td>
                            <input type="email" name="email" id="email"> <span class="error">*<?php if(isset($_COOKIE['email'])) {echo $_COOKIE['email'];} ?></span>
                        </td>
                    </tr>
                </table>
                <br>
                <h3>Credential</h3>
                <table> 
                    <tr>
                        <td>
                            <label for="user">Username </label> 
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="username" id="user"> <span class="error">*<?php if(isset($_COOKIE['user'])) {echo $_COOKIE['user'];} ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pass">Password </label> 
                        </td>
                        <td>:</td>
                        <td>
                            <input type="password" name="password" id="pass"> <span class="error">*<?php if(isset($_COOKIE['pass'])) {echo $_COOKIE['pass'];} ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="conpass">Confirm Password </label> 
                        </td>
                        <td>:</td>
                        <td>
                            <input type="password" name="conpassword" id="conpass"> <span class="error">*</span>
                        </td>
                    </tr>
                </table>
                <br>
                <input type='submit' name='submit' value='Submit'> <input type='reset' name='reset' value='Clear'>
            </fieldset>
            <br>
        </form>
        <fieldset style="width: 98%;">
            <?php 
                include '../View/Footer.php'; 
            ?>
        </fieldset>
    </body>
</html>