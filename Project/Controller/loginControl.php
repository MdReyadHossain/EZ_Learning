<?php
	session_start();
	$username = $password = "";
	$usernameErr = $passwordErr = "";
	$isValid = true;

	if (isset($_SESSION['username'])) {		
		header("location: /Project/View/dashboard.php");
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		if (!isset($_POST['username']) || empty($_POST['username'])) {
			$usernameErr = "User Name is required";
			setcookie('user', $usernameErr, time() + 1, '/');
			$isValid = false;
		}
		else{
			$username = $_POST['username'];
		}

		if (!isset($_POST['password']) || empty($_POST['password'])) {
			$passwordErr = "Password is required";
			setcookie('pass', $passwordErr, time() + 1, '/');
			$isValid = false;
		}
		else{
			$password = $_POST['password'];
		}
	
		if($isValid) {
			define("file", "../Model/data.json");
            $handle = fopen(file, "r");
            $json = NULL;
        
            if(filesize(file) > 0) {
                $fr = fread($handle, filesize(file));
                $json = json_decode($fr);
                fclose($handle);
            }
			for($i = 0; $i < count($json); $i++) {
				if($json[$i]->username == $username and $json[$i]->password == $password) {
					$_SESSION['sl'] = $json[$i]->sl;
	                $_SESSION['name'] = $json[$i]->name;
	                $_SESSION['email'] = $json[$i]->email;
	                $_SESSION['gender'] = $json[$i]->gender;   
	                $_SESSION['dob'] = $json[$i]->dob;  
	                
	                $_SESSION['username'] = $username;
	                $_SESSION['password'] = $password;
	                header("Location: /Project/View/dashboard.php");
	                $isValid = true;
	            }
				else{
					setcookie('msg', "Username or Password incorrect", time() + 1, '/');
					header("Location: /Project/View/login.php");
				}
			}
		}
		else
		{
			header("Location: /Project/View/login.php");
		}
	}
?>