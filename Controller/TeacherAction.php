<?php
    session_start();
    require '../Model/RegistrationDB.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form submit</title>
    </head>
    <body>
        <?php 
            $name = $gender = $dob = $phone = $email = $username = $password = $conpassword = "";
            
            $dobErr = $emailErr = $usernameErr = $passwordErr = $religionErr = "";

            $isValid = true;
            $isChecked = $isEmpty = false;

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $isChecked = true;
                function test($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                $name = test($_POST["name"]);
                $dob = test($_POST["dob"]);
                $phone = test($_POST["phone"]);
                $email = test($_POST["email"]);
                $username = test($_POST["username"]);
                $password = test($_POST["password"]);
                $conpassword = test($_POST["conpassword"]);
                $year = date("Y") - intval($dob);

                if(empty($name)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                if(empty($_POST["gender"])) {
                    $isValid = false;
                    $isEmpty = true;
                }
                else
                    $gender = $_POST["gender"];

                if(empty($dob)) {
                    $isValid = false;
                }

                else if ($year < 18) {
                    $isValid = false;
                    $dobErr = "<br>*You are not old enough, Must be 18 or older";
                }

                if(empty($email)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $isValid = false;
                    $emailErr = "<br>*Invalid email format";
                }

                if(empty($username)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                if(strlen($username) > 8) {
                    $isValid = false;
                    $usernameErr = "<br>❌Username up to 8 characters long";
                }

                if(empty($password)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                else if(strlen($password) < 8) {
                    $isValid = false;
                    $passwordErr = "<br>❌Password must be at least 8 characters long";
                }

                if(empty($conpassword)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                if($password != $conpassword) {
                    $isValid = false;
                    $passwordErr = "<br>❌Password not matched";
                }
                
                if($isValid and $isChecked){
                    insert_teacher($name, $gender, $dob, $phone, $email, $username, $password);
                }

                else if ($isEmpty) {
                    setcookie('msg', '<b>❗Required input missing</b><br>', time() + 1, '/');
                    header("location: /ProjectEZ/View/TeacherForm.php");
                }
    
                else {
                    if($dobErr != NULL)
                        setcookie('dob', $dobErr, time() + 1, '/');
                    if($emailErr != NULL)
                        setcookie('email', $emailErr, time() + 1, '/');
                    if($religionErr != NULL)
                        setcookie('rel', $religionErr, time() + 1, '/');
                    if($usernameErr != NULL)
                        setcookie('user', $usernameErr, time() + 1, '/');
                    if($passwordErr != NULL)
                        setcookie('pass', $passwordErr, time() + 1, '/');
                    header("location: /ProjectEZ/View/TeacherForm.php");
                }
            }
        ?>
    </body>
</html>