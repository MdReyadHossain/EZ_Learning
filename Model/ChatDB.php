<?php
	require 'Connect.php';

    function insert_chat($name, $chat, $time) {
        $ezl = connect();

        $sql = "INSERT INTO chat(User, Chat, Time) VALUES ('$name', '$chat', '$time')";

        if($ezl->query($sql)) {
            $ezl->close();
        }
        else {
            echo "Error: " . $sql . "<br>" . $ezl->error;
            die;
        }
    }
?>