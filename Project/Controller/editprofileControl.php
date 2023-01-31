<?php
	session_start();
	require '../Model/TeacherDB.php';
	$id = $name = $email = $username = $gender = $dob = $phone = "";
	$nameErr = $emailErr = $genderErr = $dobErr =$phoneErr = $message = "";
	$isValid = true;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$dob = $_POST['dob'];
		$id = $_POST['id'];

		#----- Name Verification -----#
		if(empty($_POST['name'])){
			$nameErr = "Name is required";
			$isValid = false;
		}

		#----- Email Verification -----#
		if (empty($_POST["email"])) {
			$emailErr = "Email is required";
			$isValid = false;
		}

		else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $isValid = false;
            $emailErr = "<br>❌Invalid email format";
        }

		#----- Gender Verification -----#
		if (empty($_POST['gender'])) {
			$genderErr = "Gender is required";
			$isValid = false;
		}
		else{
			$gender = $_POST['gender'];
		}

		#----- Contact Verification -----#
		if(!isset($_POST['phone']) || empty($_POST['phone'])){
			$phoneErr = "❗Contact no is required";
			$isValid = false;
		}
		else{
			$phone = $_POST['phone'];
		}

		#----- Date of Birth Verification -----#
		if (empty($_POST['dob'])) {
			$dobErr = "Date of Birth is required";
			$isValid = false;
		}

		if ($isValid){
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['gender'] = $gender;  
            $_SESSION['dob'] = $dob;
            $_SESSION['phone'] = $phone;
			edit($id, $name, $gender, $dob, $phone, $email);
		}
		else {
			if($nameErr != NULL)
				setcookie('name', $nameErr, time() + 1, '/');
			if($emailErr != NULL)
				setcookie('email', $emailErr, time() + 1, '/');
			if($genderErr != NULL)
				setcookie('gender', $genderErr, time() + 1, '/');
			if($dobErr != NULL)
				setcookie('dob', $dobErr, time() + 1, '/');
			if($phoneErr != NULL)
				setcookie('phone', $phoneErr, time() + 1, '/');
			header('location: /Project/View/editprofile.php');
		}	
	}
?>