<?php
    session_start();
    if (isset($_GET['id'])) {		
        $id = $_GET['id'];

        $ezl = new mysqli("localhost", "root", "", "ezlearning");
        if ($ezl->connect_error) {
            die("Data base Connection failed: " . $ezl->connect_error);
        }

        $sql = "SELECT * FROM query";
        $result = $ezl->query($sql);

        while ($data = $result->fetch_assoc()) {
            if (+$id == $data['ID']) {
                $sql1 = "UPDATE query SET Solve='yes' WHERE ID = $id";
                $result1 = $ezl->query($sql1);
            }
        }
        header('location: ../View/Query.php');
    }
    else {
        die("Invalid Request");
    }   
    echo "<h3>✅Query Solved</h3>";
?>