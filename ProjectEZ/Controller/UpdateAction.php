<?php
    require '../Model/AdminDB.php';
    echo "<h2>Update Profile</h2>";
    session_start();
    $name = $email = $address = $phone = "";

    $nameErr = $addressErr = $phoneErr = $emailErr = $usernameErr = $passwordErr = "";

    $isValid = true;
    $isChecked = $isEmpty = false;

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $isChecked = true;
        function test($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $name = test($_POST["name"]);
        $address = test($_POST["address"]);
        $phone = test($_POST["phone"]);
        $email = test($_POST["email"]);

        if(empty($name)) {
            $isValid = false;
            $isEmpty = true;
        }

        if(empty($phone)) {
            $isValid = false;
            $isEmpty = true;
        }
        elseif(!is_numeric($phone)) {
            $isValid = false;
            $phoneErr = "<b>❌Invalid Contact Number</b>";
        }

        if(empty($address)) {
            $isValid = false;
            $isEmpty = true;
        }

        if(empty($email)) {
            $isValid = false;
            $isEmpty = true;
        }

        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $isValid = false;
            $emailErr = "<b>❌Invalid email format</b>";
        }

    }
    if($isValid and $isChecked){
        header('location: /ProjectEZ/View/Admin.php');

        //update data
        update($phone, $email, $address);
    }

    else if($isEmpty) {
        setcookie('err', "<b>❌Required input should not empty</b>", time() + 1, "/");
        header("location: /ProjectEZ/View/Update.php");
    }

    else {
        if($emailErr != NULL)
            setcookie('emailErr', $emailErr, time() + 1, "/");
        if($phoneErr != NULL)
            setcookie('phoneErr', $phoneErr, time() + 1, "/");
        header("location: /ProjectEZ/View/Update.php");
    }
?>