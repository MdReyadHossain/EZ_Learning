<?php
	session_start();
	require '../Model/TeacherDB.php';
	$id = $user = $pass = "";
	$userErr = $passErr = "";

	$ezl = new mysqli("localhost", "root", "", "ezlearning");

    if ($ezl->connect_error) {
        die("Data base Connection failed: " . $ezl->connect_error);
    }

    $sql = "SELECT * FROM teacher";
    $qry = $ezl->query($sql);

	$isValid = true;
	$isPass = true;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$id = $_POST['id'];
		while($data = $qry->fetch_assoc()) {
	    	if($id == $_SESSION['id']) {
	    		$userpass = $data['Password'];
	    		break;
	    	}
	    }

		#----- User Verification -----#
		if(empty($user)){
			$userErr = "❗Username is required";
			$isValid = false;
		}

		if (empty($pass)) {
			$passErr = "❗Password is required";
			$isValid = false;
		}

		else if ($pass != $userpass) {
			$incrr = "❗Password incorrect";
			$isValid = false;
			$isPass = false;
		}

		if ($isValid){
		    user($user, $id);
		    echo "✅Username changed successfully!";
		}
		else if(!$isValid and !$isPass) {
			echo $incrr;
		}
		else {
			if($userErr != NULL)
				setcookie('user', $userErr, time() + 1, '/');
			if($passErr != NULL)
				setcookie('pass', $passErr, time() + 1, '/');
			//header('location: /Project/View/settings.php');
		}
	}
?>