<?php 
    $server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $dbname = "ezlearning";
    $ezl = new mysqli($server, $db_user, $db_pass, $dbname);

    if ($ezl->connect_error) {
        die("Data base Connection failed: " . $ezl->connect_error);
    }

    $sql = "SELECT * FROM admin";
    $result = $ezl->query($sql);
    $data = $result->fetch_assoc();

    if($data['Username'] == $_POST["user"] and $data['Password'] == $_POST["pass"]) {
        $_SESSION['name'] = $data['InstituteName'];
        $_SESSION['email'] = $data['Email'];
        $_SESSION['phone'] = $data['Contact'];
        $_SESSION['preaddress'] = $data['Address'];
        
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        header("Location: /ProjectEZ/View/Dashboard.php");
    }
    else {
        header("Location: /ProjectEZ/View/login.php");
        setcookie('msg', "❌Username or Password incorrect<br><br>", time() + 1, "/");
    }

    $ezl->close();
?>