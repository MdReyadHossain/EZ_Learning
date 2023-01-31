<?php
	$adminchat = "";
	require '../Model/ChatDB.php';

	$ezl = new mysqli("localhost", "root", "", "ezlearning");
    if ($ezl->connect_error) {
        die("Data base Connection failed: " . $ezl->connect_error);
    }

	$sql = "SELECT * FROM chat";
    $qry = $ezl->query($sql);

    $isValid = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	if (empty($_POST["adminchat"])) {
			$isValid = false;
		}
		else{
			$adminchat = $_POST["adminchat"];
			$name = $_POST["name"];
			$time = date("Y-m-d h:i:s");
		}

		if($isValid) {
			insert_chat($name, $adminchat, $time);
	    }
    }
?>