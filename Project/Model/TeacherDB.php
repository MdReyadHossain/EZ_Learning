<?php 
    require 'Connect.php';

    function insert_chat($name, $chat, $time) {
        $ezl = connect();

        $sql = "INSERT INTO chat(User, Chat, Time) VALUES ('$name', '$chat', '$time')";

        if($ezl->query($sql)) {
            $ezl->close();
        }
        else {
            echo "Error: " . $sql . "<br>" . $ezl->error;
            die;
        }
    }
    
    function edit($id, $name, $gender, $dob, $phone, $email) {
        $ezl = connect();
        $sql = "UPDATE teacher SET Name='$name', Email='$email', Gender='$gender', DateOfBirth='$dob', Contact='$phone' WHERE ID=$id";
        $qry = $ezl->query($sql);

        header("location: /Project/View/viewprofile.php");
    }

    function password($id, $newpassword) {
        $ezl = connect();
        $sql = "UPDATE teacher SET Password='$newpassword' WHERE ID='$id'";
        $qry = $ezl->query($sql);

        setcookie('msg', '<b>✅Password Changed</b><br>', time() + 1, '/');
        header("location: /Project/View/changepassword.php");
    }

    function query($name, $query, $solve) {
        $ezl = connect();
        $sql = "INSERT INTO query (Name, Query, Solve) VALUES ('$name', '$query', '$solve')";
        $result = $ezl->query($sql);

        $ezl->close();
        
        // setcookie('msg', '<b>✅Query Uploaded</b>', time() + 1, '/');
        // header("location: /Project/View/query.php");
    }

    function user($user, $id) {
        $ezl = connect();

        $sql = "UPDATE teacher SET Username='$user' WHERE ID='$id'";
        $qry = $ezl->query($sql);
        //header('location: /Project/View/viewprofile.php');
        $ezl->close();
    }

    function delete($id) {
        $ezl = connect();
        $sql = "DELETE FROM teacher WHERE ID=$id";
        $qry = $ezl->query($sql);

        //header('location: ../View/teacher.php');
    }

    function insert_student($firstname, $lastname, $gender, $dob, $religion, $preaddress, $paraddress, $phone, $email, $username, $password) {
        $ezl = connect();

        $sql = "INSERT INTO student(FirstName, LastName, Gender, DateOfBirth, Religion, PresentAddress, PermanentAddress, PhoneNo, Email, Username, Password) VALUES ('$firstname', '$lastname', '$gender', '$dob', '$religion', '$preaddress', '$paraddress', '$phone', '$email', '$username', '$password')";

        if($ezl->query($sql)) {
            header("location: /Project/View/studentlist.php");
            setcookie('msg', '<b>✅ Registration Successful</b>', time() + 1, '/');
        }
        else {
            echo "Error: " . $sql . "<br>" . $ezl->error;
        }

        $ezl->close();
    }
?>