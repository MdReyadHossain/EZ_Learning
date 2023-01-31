<?php
	$chat = "";
	require '../Model/TeacherDB.php';

	$ezl = new mysqli("localhost", "root", "", "ezlearning");
    if ($ezl->connect_error) {
        die("Data base Connection failed: " . $ezl->connect_error);
    }

	$sql = "SELECT * FROM chat";
    $qry = $ezl->query($sql);

    $isValid = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	if (empty($_POST["chat"])) {
			$isValid = false;
		}
		else{
			$chat = $_POST["chat"];
			$name = $_POST["name"];
			$time = date("Y-m-d h:i:s");
		}

		if($isValid) {
			insert_chat($name, $chat, $time);
	    }
    }
?>