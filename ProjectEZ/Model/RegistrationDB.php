<?php
    require 'Connect.php';

    function insert_student($firstname, $lastname, $gender, $dob, $religion, $preaddress, $paraddress, $phone, $email, $username, $password) {
        $ezl = connect();

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
    
    function insert_teacher($name, $gender, $dob, $phone, $email, $username, $password) {
        $ezl = connect();

        $sql = "INSERT INTO teacher(Name, Gender, DateOfBirth, Email, Contact, Username, Password) VALUES ('$name', '$gender', '$dob', '$email', '$phone', '$username', '$password')";

        if($ezl->query($sql)) {
            header("location: /ProjectEZ/View/Teacher.php");
            setcookie('msg', '<b>✅ Registration Successful</b>', time() + 1, '/');
        }
        else {
            echo "Error: " . $sql . "<br>" . $ezl->error;
        }

        $ezl->close();
        header("location: /ProjectEZ/View/Teacher.php");
    }
?>