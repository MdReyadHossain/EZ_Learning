<?php 
    require 'Connect.php';
    
    function delete($id) {
        $ezl = connect();
        $sql = "DELETE FROM student WHERE ID=$id";
        $qry = $ezl->query($sql);

        header('location: ../View/Student.php');
    }
?>