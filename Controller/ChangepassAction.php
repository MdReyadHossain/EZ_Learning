<?php 
    session_start();
    require '../Model/AdminDB.php';

    $ezl = new mysqli("localhost", "root", "", "ezlearning");
    if ($ezl->connect_error) {
        die("Data base Connection failed: " . $ezl->connect_error);
    }

    $sql = "SELECT * FROM admin";
    $qry = $ezl->query($sql);
    $data = $qry->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Change Passowrd</title>
    </head>
    <body>
        <?php 
            $curpass = $password = $conpassword = "";
            
            $passwordErr = "";

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

                $curpass = test($_POST["currentpass"]);
                $password = test($_POST["newpassword"]);
                $conpassword = test($_POST["repassword"]);


                if(empty($curpass)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                if(empty($password)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                else if(strlen($password) < 8) {
                    $isValid = false;
                    $passwordErr = "❗Password must be at least 8 characters long";
                }

                if(empty($conpassword)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                if($password != $conpassword) {
                    $isValid = false;
                    $passwordErr = "❌Password not matched";
                }

                if($curpass != $data['Password']) {
                    $isValid = false;
                    $passwordErr = "❌Password not matched";
                }

                
                if($isValid and $isChecked){
                    setcookie('msg', '<b>✅Password Changed</b><br>', time() + 1, '/');
                    header("location: /ProjectEZ/View/ChangePass.php");

                    chng_password($password);
                }

                else if($isEmpty) {
                    setcookie('msg', '<b>❗Input missing</b><br>', time() + 1, '/');
                    header("location: /ProjectEZ/View/ChangePass.php");
                }

                else {
                    if($passwordErr != NULL)
                        setcookie('msg', '<b>' . $passwordErr . '</b>', time() + 1, '/');
                    header("location: /ProjectEZ/View/ChangePass.php");
                }
            }
        ?>
    </body>
</html>