<?php
    session_start();
    require '../Model/AdminDB.php';
    
    if (isset($_GET['id'])) {		
        $id = $_GET['id'];

        deletequery($id);
        header('location: ../View/Query.php');
    }
    else {
        die("Invalid Request");
    }   
    echo "<h3>✅Query Solved</h3>";
?>