<?php 
    require 'Connect.php';
    
    function delete($id) {
        $ezl = connect();
        $sql = "DELETE FROM student WHERE ID=$id";
        $qry = $ezl->query($sql);

        header('location: ../View/Student.php');
    }
    
    function get($firstname) {
        $conn = connect(); 

        $sql = "SELECT * FROM student Where FirstName LIKE ?";
        $stmt = $conn->prepare($sql);
        $fname = $firstname;
        $fname = "%" . $fname . "%";
        $stmt->bind_param("s", $fname);

        $stmt->execute();
        $result = $stmt->get_result();

        $stmt->close();
        $conn->close();

        return $result;
    }
?>