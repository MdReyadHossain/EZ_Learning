<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectEZ/View/login.php");
    }

    require '../Model/AdminDB.php';
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
        <legend><b>News and Events</b></legend>
        <?php
            define("file", "../Model/news.json");
            if (isset($_GET['id'])) {		
                $id = $_GET['id'];  

                delete($id);    
                header('location: ../View/NnEdata.php');
            }
            else {
                die("Invalid Request");
            }   
            echo "<h3>✅Notice Removed</h3><br>";
        ?>
        <a href="/ProjectEZ/View/NnEdata.php">Go Back</a>
    </fieldset>
    

    <fieldset style="width: 98%;">
        <?php include '../View/Footer.php'; ?>
    </fieldset>
</body>
</html>