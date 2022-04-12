<?php 
    session_start();
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
            $id = $name = $gender = $dob = $phone = $email = $username = "";
            
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

                $id = test($_POST["id"]);
                $name = test($_POST["name"]);
                $dob = test($_POST["dob"]);
                $phone = test($_POST["phone"]);
                $email = test($_POST["email"]);
                $username = test($_POST["username"]);
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
                    $isEmpty = true;
                }

                else if ($year < 18) {
                    $isValid = false;
                    $dobErr = "<br>❌You are not old enough, Must be 18 or older";
                }
                if($religion == "none") {
                    $isValid = false;
                    $religionErr = "<br>❗Please select your religion";
                }

                if(empty($email)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $isValid = false;
                    $emailErr = "<br>❌Invalid email format";
                }

                if(empty($username)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                if(strlen($username) > 8) {
                    $isValid = false;
                    $usernameErr = "<br>❗Username up to 8 characters long";
                }

                if($isValid and $isChecked){
                    // data insertion
                    $ezl = new mysqli("localhost", "root", "", "ezlearning");

                    if ($ezl->connect_error) {
                        die("Data base Connection failed: " . $ezl->connect_error);
                    }

                    $sql = "UPDATE teacher SET Name='$name', Email='$email', Gender='$gender', DateOfBirth='$dob', Contact='$phone', Username='$username' WHERE ID=$id";
                    $qry = $ezl->query($sql);

                    header("location: /ProjectEZ/View/Teacher.php");
                }

                else if ($isEmpty) {
                    setcookie('msg', '<b>❗Required input missing</b><br>', time() + 1, '/');
                    header("location: /ProjectEZ/View/EditTeacher.php?id=$id");
                }
    
                else {
                    if($dobErr != NULL)
                        setcookie('dob', $dobErr, time() + 1, '/');
                    if($emailErr != NULL)
                        setcookie('email', $emailErr, time() + 1, '/');
                    if($usernameErr != NULL)
                        setcookie('user', $usernameErr, time() + 1, '/');
                    header("location: /ProjectEZ/View/EditTeacher.php?id=$id");
                }
            }
        ?>
    </body>
</html>