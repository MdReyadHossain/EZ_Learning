<?php
    session_start(); 
    if(!isset($_SESSION['username'])) {
        header("Location: /Project/View/dashboard.php");
    }

    require '../Model/StudentDB.php';
    
    if (isset($_GET['id'])) {		
        $id = $_GET['id'];

        delete($id);
    }
    else {
        die("Invalid Request");
    }
    echo "✅Student Removed<br>";
?>