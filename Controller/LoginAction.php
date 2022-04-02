<?php
    session_start();
    $username = $password = "";
    $isEmpty = $isValid = false;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        function test($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $username = test($_POST["user"]);
        $password = test($_POST["pass"]);

        if(empty($username))
            $isEmpty = true;
            
        if(empty($password))
            $isEmpty = true;

        if(!$isEmpty) {    
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
            
            if($data['Username'] == $username and $data['Password'] == $password) {
                $_SESSION['name'] = $data['Institutename'];
                $_SESSION['email'] = $data['Email'];
                $_SESSION['phone'] = $data['Contact'];  
                $_SESSION['preaddress'] = $data['Address'];  
                
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                header("Location: /ProjectEZ/View/Dashboard.php");
                $isValid = true;
            }
            else {
                header("Location: /ProjectEZ/View/login.php");
                setcookie('msg', "*Username or Password incorrect<br><br>", time() + 1, "/");
            }

            $ezl->close();
        }
        else {
            header("Location: /ProjectEZ/View/login.php");
            setcookie('msg', '*Please input  Username and Password<br><br>', time() + 1, "/");
        }
    }
?>