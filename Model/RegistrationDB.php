<?php 
    require_once '../Controller/RegistrationAction.php';
    // data insertion
    $server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $dbname = "ezlearning";
    $ezl = new mysqli($server, $db_user, $db_pass, $dbname);

    if ($ezl->connect_error) {
        die("Data base Connection failed: " . $ezl->connect_error);
    }
    
    $sql = "INSERT INTO student(FirstName, LastName, Gender, DateOfBirth, Religion, PresentAddress, PermanentAddress, PhoneNo, Email, Username, Password) VALUES ('$firstname', '$lastname', '$gender', '$dob', '$religion', '$preaddress', '$paraddress', $phone, '$email', '$username', '$password')";

    if($ezl->query($sql)) {
        header("location: /ProjectEZ/View/login.php");
        setcookie('msg', '<b>✅ Registration Successful</b>', time() + 1, '/');
    }
    else {
        echo "Error: " . $sql . "<br>" . $ezl->error;
    }

    $ezl->close();
?>