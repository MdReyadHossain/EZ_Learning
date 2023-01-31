<?php
	$name = $email = $username = $phone = $password = $confirmpassword = $gender = $dob = "";
	$nameErr = $emailErr = $phoneErr = $usernameErr = $passwordErr = $confirmpasswordErr = $genderErr = $dobErr = $message = "";
	$isValid = true;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		

		#----- Name Verification -----#
		if(!isset($_POST['name']) || empty($_POST['name'])){
			$nameErr = "❗Name is required";
			$isValid = false;
		}
		else{
			$name = $_POST['name'];
		}

		#----- PhoneNo Verification -----#
		if(!isset($_POST['phone']) || empty($_POST['phone'])){
			$phoneErr = "❗Contact no is required";
			$isValid = false;
		}
		else{
			$phone = $_POST['phone'];
		}

		#----- Email Verification -----#
		if (!isset($_POST['email']) || empty($_POST["email"])) {
			$emailErr = "❗Email is required";
			$isValid = false;
		}
		else{
			$email = $_POST["email"];
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "❗Invalid email format";
				$isValid = false;
			}
		}

		#----- User Name Verification -----#
		if (empty($_POST['username'])) {
			$usernameErr = "❗User Name is required";
			$isValid = false;
		}
		else
			$username = $_POST['username'];

		#----- Password Verification -----#
		if (!isset($_POST['password']) || empty($_POST['password'])) {
			$passwordErr = "❗Password is required";
			$isValid = false;
		}
		else{
			$password = $_POST['password'];

			if(strlen($password) < 8){
				$passwordErr = "❗Password must contain at least 8 characters";
				$isValid = false;
			}
		}

		#----- Confirm Password Verification -----#
		if (!isset($_POST['confirmpassword']) || empty($_POST['confirmpassword'])) {
			$confirmpasswordErr = "❗Confirm password is required";
			$isValid = false;
		}
		else{
			$confirmpassword = $_POST['confirmpassword'];

			if ($password !== $confirmpassword) {
				$confirmpasswordErr = "❗Password is not match";
				$isValid = false;
			}
		}

		#----- Gender Verification -----#
		if (!isset($_POST['gender']) || empty($_POST['gender'])) {
			$genderErr = "❗Gender is required";
			$isValid = false;
		}
		else{
			$gender = $_POST['gender'];
		}

		#----- Date of Birth Verification -----#
		$dob = $_POST['dob'];
		$year = date("Y") - intval($dob);
		if (!isset($_POST['dob']) || empty($_POST['dob'])) {
			$dobErr = "❗Date of Birth is required";
			$isValid = false;
		}
		else if ($year < 18) {
            $isValid = false;
            $dobErr = "❌You are not old enough, Must be 18 or older";
        }


	#----- Data storing-----#
		if($isValid){
			define("file", '../../ProjectEZ/Model/tempTeacher.json');
            $handle = fopen(file, "r");
            $json = NULL;

            if(filesize(file) > 0) {
                $fr = fread($handle, filesize(file));
                $json = json_decode($fr);
                fclose($handle);
            }
            
            $handle = fopen(file, "w");
            if($json == NULL){
                $sl = 1;
                $data = array(array("sl" => $sl,
                                    "name" => $name,
                                    "gender" => $gender,
                                    "dob" => $dob,
                                    "phone" => $phone,
                                    "email" => $email,
                                    "username" => $username,
                                    "password" => $password));
                $data = json_encode($data);
            }
            else {
                $sl = $json[count($json)-1]->sl;
                $json[] = array("sl" => $sl + 1,
                                "name" => $name,
                                "gender" => $gender,
                                "dob" => $dob,
                                "phone" => $phone,
                                "email" => $email,
                                "username" => $username,
                                "password" => $password);
                $data = json_encode($json);
            }
            fwrite($handle, $data);
            fclose($handle);
            setcookie('msg', '<b>✅ Registration Successful. <br>Please Wait for Approval</b>', time() + 1, '/');
            header('location: /Project/View/registration.php');
		}
		else {
			if($nameErr != NULL)
				setcookie('name', $nameErr, time() + 1, '/');
			if($emailErr != NULL)
				setcookie('email', $emailErr, time() + 1, '/');
			if($phoneErr != NULL)
				setcookie('phone', $phoneErr, time() + 1, '/');
			if($usernameErr != NULL)
				setcookie('user', $usernameErr, time() + 1, '/');
			if($passwordErr != NULL)
				setcookie('pass', $passwordErr, time() + 1, '/');
			if($confirmpasswordErr != NULL)
				setcookie('conpass', $confirmpasswordErr, time() + 1, '/');
			if($genderErr != NULL)
				setcookie('gender', $genderErr, time() + 1, '/');
			if($dobErr != NULL)
				setcookie('dob', $dobErr, time() + 1, '/');
			header('location: /Project/View/registration.php');
		}
	}
?>