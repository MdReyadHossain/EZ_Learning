<?php 
    session_start();

    require '../Model/StudentDB.php';
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
            $id = $fname = $lname = $religion = $dob = $phone = $email = "";
            
            $dobErr = $emailErr = "";

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
                $fname = test($_POST["firstname"]);
                $lname = test($_POST["lastname"]);
                $dob = test($_POST["dob"]);
                $religion = test($_POST["religion"]);
                $phone = test($_POST["phone"]);
                $email = test($_POST["email"]);
                $year = date("Y") - intval($dob);

                if(empty($fname)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                if(empty($lname)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                if(empty($dob)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                else if ($year < 5) {
                    $isValid = false;
                    $dobErr = "<br>❌Must be 5 or older";
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

                if($isValid and $isChecked){
                    edit($id, $fname, $lname, $religion, $dob, $phone, $email, $username);
                }

                else if ($isEmpty) {
                    setcookie('msg', '<b>❗Required input missing</b><br>', time() + 1, '/');
                    header("location: /Project/View/editstudent.php?id=$id");
                }
    
                else {
                    if($dobErr != NULL)
                        setcookie('dob', $dobErr, time() + 1, '/');
                    if($emailErr != NULL)
                        setcookie('email', $emailErr, time() + 1, '/');
                    if($usernameErr != NULL)
                        setcookie('user', $usernameErr, time() + 1, '/');
                    header("location: /Project/View/editstudent.php?id=$id");
                }
            }
        ?>
    </body>
</html>