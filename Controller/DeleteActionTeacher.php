<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectEZ/View/login.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Delete Action</title>
</head>
<body>
    <?php include('../View/Adminbar.php'); ?>
    <fieldset style="width: 50%; height: 450px;">
        <legend><b>Teachers</b></legend>
        <?php
            if (isset($_GET['id'])) {		
                $id = $_GET['id'];

                $ezl = new mysqli("localhost", "root", "", "ezlearning");
                if ($ezl->connect_error) {
                    die("Data base Connection failed: " . $ezl->connect_error);
                }

                $sql = "DELETE FROM teacher WHERE id=$id";
                $qry = $ezl->query($sql);

                header('location: ../View/Teacher.php');
            }
            else {
                die("Invalid Request");
            }   
            echo "✅Teacher Removed<br>";
        ?>
        <a href="/ProjectEZ/View/Teacher.php">Go Back</a>
    </fieldset>
    
    <fieldset style="width: 98%;">
        <?php include '../View/Footer.php'; ?>
    </fieldset>
</body>
</html>