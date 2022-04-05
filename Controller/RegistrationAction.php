<?php 
    session_start();
    $firstname = $lastname = $gender = $dob = $religion = $preaddress = $paraddress = $phone = $email = $website = $username = $password = $conpassword = "";
    
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

        $firstname = test($_POST["firstname"]);
        $lastname = test($_POST["lastname"]);
        $dob = test($_POST["dob"]);
        $religion = test($_POST["religion"]);
        $preaddress = test($_POST["preaddress"]);
        $paraddress = test($_POST["paraddress"]);
        $phone = test($_POST["phone"]);
        $email = test($_POST["email"]);
        $username = test($_POST["username"]);
        $password = test($_POST["password"]);
        $conpassword = test($_POST["conpassword"]);
        $year = date("Y") - intval($dob);

        if(empty($firstname)) {
            $isValid = false;
            $isEmpty = true;
        }

        if(empty($lastname)) {
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

        else if ($year < 5) {
            $isValid = false;
            $dobErr = "<br>❌You are not old enough, Must be 5 or older";
        }
        if($religion == "none") {
            $isValid = false;
            $religionErr = "<br>❌Please select your religion";
        }

        if(empty($preaddress)) {
            $isValid = false;
            $isEmpty = true;
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
            // data insertion
            $server = "localhost";
            $db_user = "root";
            $db_pass = "";
            $dbname = "ezlearning";
            $ezl = new mysqli($server, $db_user, $db_pass, $dbname);

            if ($ezl->connect_error) {
                die("Data base Connection failed: " . $ezl->connect_error);
            }
            
            $sql = "INSERT INTO student(FirstName, LastName, Gender, DateOfBirth, Religion, PresentAddress, PermanentAddress, PhoneNo, Email, Username, Password) VALUES ('$firstname', '$lastname', '$gender', '$dob', '$religion', '$preaddress', '$paraddress', '$phone', '$email', '$username', '$password')";

            if($ezl->query($sql)) {
                header("location: /ProjectEZ/View/login.php");
                setcookie('msg', '<b>✅ Registration Successful</b>', time() + 1, '/');
            }
            else {
                echo "Error: " . $sql . "<br>" . $ezl->error;
            }

            $ezl->close();
        }

        else if ($isEmpty) {
            setcookie('msg', '<b>❌Required input missing</b><br>', time() + 1, '/');
            header("location: /ProjectEZ/View/Registration.php");
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
            header("location: /ProjectEZ/View/Registration.php");
        }
    }
?>