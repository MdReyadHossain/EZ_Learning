<?php
    session_start();
    if(!isset($_COOKIE['rem'])) {
        header('location: /ProjectEZ/Controller/Logout.php');
    }
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectEZ/View/login.php");
    }

    $ezl = new mysqli("localhost", "root", "", "ezlearning");
    if ($ezl->connect_error) {
        die("Data base Connection failed: " . $ezl->connect_error);
    }

    $sql = "SELECT * FROM teacher";
    $qry = $ezl->query($sql);

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        while ($data = $qry->fetch_assoc()) {
            if (+$id == $data['ID']) {
                $name = $data['Name'];
            }
        }
    }
    $sql = "SELECT * FROM chat";
    $qry = $ezl->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <title>Teachers</title>
</head>
<body>
    <?php include('../View/Adminbar.php') ?>
    
    <fieldset style="width: 50%; height: 400px; ">
        <legend><b><?php echo $name; ?></b></legend>
        <div id="msg" style="height: 90%; overflow: auto; display:flex; flex-direction:column-reverse;">
            <table style="margin-top: 100%;" border="0px" width="100%">
                <tbody>
                    <?php
                        while ($data = $qry->fetch_assoc()) {
                            if($data['User'] == 'teacher'){
                                echo "<tr>";
                                echo "<td>";
                                echo "<div>" . $data['Chat'] . "</div>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            else {
                                echo "<tr>";
                                echo "<td>";
                                echo "<div align = 'right' border='1px solid black'>" . $data['Chat'] . "</div>";
                                echo "</td>";
                                echo "</tr>";   
                            }
                        }
                    ?>
                    <!-- <tr>
                        <td><div id="msg" align = 'right'></div></td>
                    </tr> -->
                </tbody>
            </table>
        </div>
        <div align="center" style="margin-top: 5px;">
            <form action="../Controller/AdminChatAction.php" onsubmit="validchat(this); return false;" method="POST">
                <input type="text" name="name" value="admin" hidden>
                <input style="width: 80%;" type="text" name="adminchat" placeholder="Type here..." autocomplete="off">
                <input type="submit" name="chatsubmit" value="Send">
            </form>
        </div>        
    </fieldset>
    <br>
    <fieldset style="width: 98%;">
        <?php include '../View/Footer.php'; ?>
    </fieldset>

    <script>
        function validchat(valid) {
            let adminchat = valid.adminchat.value;
            let name = valid.name.value;

            let isvalid = true;

            if(adminchat == "") {
                isvalid = false;
            }

            if(isvalid) {
                const actionURL = valid.action;
                const actionMethod = valid.method;

                let xhttp = new XMLHttpRequest();
                document.getElementById('msg').innerHTML = "";

                xhttp.onload = function() {
                    document.getElementById('msg').innerHTML = this.responseText;
                }
                xhttp.open(actionMethod, actionURL);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("adminchat=" + adminchat + "&name=" + name);            
            }
            
        }
        $(document).ready(function(){
            setInterval(function(){
                $('#msg').load("../Controller/ChatFetch.php");
            });
        });
    </script>
</body>
</html>