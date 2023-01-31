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
        $remember = test($_POST["remember"]);

        if(empty($username)) 
            $isEmpty = true;

        if(empty($password))
            $isEmpty = true;

        if(!$isEmpty) {  
            if($remember == "") {
                setcookie('rem', 'remember', time() + 5, '/');
            }
            else {
                setcookie('rem', 'remember', 0, '/');
            }
            
            $server = "localhost";
            $db_user = "root";
            $db_pass = "";
            $dbname = "ezlearning";
            $ezl = new mysqli($server, $db_user, $db_pass, $dbname);

            if ($ezl->connect_error) {
                die("Data base Connection failed: " . $ezl->connect_error);
            }

            $sql1 = "SELECT * FROM admin";
            $sql2 = "SELECT * FROM teacher";
            $row1 = $ezl->query($sql1);
            $row2 = $ezl->query($sql2);
            $admin = $row1->fetch_assoc();
                        
            if($admin['Username'] == $username and $admin['Password'] == $password) {
                $_SESSION['name'] = $admin['InstituteName'];
                $_SESSION['email'] = $admin['Email'];
                $_SESSION['phone'] = $admin['Contact'];
                $_SESSION['address'] = $admin['Address'];
                
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                header("Location: /ProjectEZ/View/Dashboard.php");
                $isValid = true;
            }
            else if($row2->num_rows > 0) {
                while($teacher = $row2->fetch_assoc()) {
                    if($teacher['Username'] == $username and $teacher['Password'] == $password) {
                        $_SESSION['id'] = $teacher['ID'];
                        $_SESSION['name'] = $teacher['Name'];
                        $_SESSION['email'] = $teacher['Email'];
                        $_SESSION['gender'] = $teacher['Gender'];  
                        $_SESSION['dob'] = $teacher['DateOfBirth'];
                        $_SESSION['phone'] = $teacher['Contact'];

                        $_SESSION['username'] = $username;
                        $_SESSION['password'] = $password;

                        header("Location: /Project/View/dashboard.php");
                        $isValid = true;
                    }
                }
            }
            if(!$isValid) {
                header("Location: /ProjectEZ/View/login.php");
                setcookie('msg', "❌Username or Password incorrect<br><br>", time() + 1, "/");
            }

            $ezl->close();
        }
        else {
            header("Location: /ProjectEZ/View/login.php");
            setcookie('msg', '❌Please input  Username and Password<br><br>', time() + 1, "/");
        }
    }
?>