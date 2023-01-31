<?php 
	session_start();
	require '../Model/TeacherDB.php';
	$query = $queryErr = "";
	$isValid = true;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		#----- Query input Varificaion -----#

		if (empty($_POST["query"])) {
			$queryErr = "❗Input is required";
			$isValid = false;
		}
		else{
			$query = $_POST["query"];
		}

		if($isValid) {
			$name = $_SESSION['name'];
			$solve = 'no';

			query($name, $query, $solve);
			echo "✅Successfully Query Submitted!";
		}
		else {
            if($queryErr != NULL)
                setcookie('msg', '<b>' . $queryErr . '</b>', time() + 1, '/');

            header("location: /Project/View/query.php");
        }
	}
 ?>