<?php 
    require 'Connect.php';

    function update($phone, $email, $address) {
        $ezl = connect();
        $sql = "UPDATE admin SET Contact='$phone', Email='$email', Address='$address' WHERE InstituteName='EZ Learning'";

        $_SESSION['phone'] = $phone;
        $_SESSION['email'] = $email;
        $_SESSION['address'] = $address;

        $qry = $ezl->query($sql);
        $ezl->close();
    }

    function chng_password($password) {
        $ezl = connect();
        $sql = "UPDATE admin SET Password='$password'";
        $qry = $ezl->query($sql);

        $ezl->close();
    }
    
    function news($news, $date) {
        $ezl = connect();
        $sql = "INSERT INTO news (Date, News) VALUES ('$date', '$news')";
        $result = $ezl->query($sql);

        $ezl->close();
        
        setcookie('msg', '<b>✅Query Uploaded</b>', time() + 1, '/');
        header("location: /Project/View/query.php");
    }

    function delete($id) {
        $ezl = connect();
        $sql = "DELETE FROM news WHERE ID=$id";
        $qry = $ezl->query($sql);
    }

    function deletequery($id) {
        $ezl = connect();
        $sql = "DELETE FROM query WHERE ID=$id";
        $qry = $ezl->query($sql);
    }
?>