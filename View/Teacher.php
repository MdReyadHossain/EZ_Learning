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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers</title>
</head>
<body>
    <?php include('../View/Adminbar.php') ?>
    
    <fieldset style="width: 60%; height: 450px; overflow: scroll;">
        <legend><b>Teachers</b></legend>
        <h3 align="center">Teachers Information</h3>
        <div align='right'>
            <form action="../Controller/searchteacher.php" method="get" onsubmit="teacher(this); return false;">
                🔎<input type="text" id="search" name="Search" placeholder="Search Teacher">
                <input type="submit" name="submit" value="Search">
            </form>
        </div>
        <br>

        <div id="records" align="center">
            <table border="1" align="center">
                <tbody>
                    <tr>
                        <th>Teacher ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Username</th>
                        <th colspan="2">Action</th>
                    </tr>
                    <?php 
                        if ($qry->num_rows > 0) {
                            while ($data = $qry->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td> 101-" . $data['ID'] . "</td>";
                                echo "<td><a href='AdminChat.php?id=" . $data['ID'] . "'>" . $data['Name'] . "</a></td>";
                                echo "<td>" . $data['Gender'] . "</td>";
                                echo "<td>" . $data['DateOfBirth'] . "</td>";
                                echo "<td>" . $data['Email'] . "</td>";
                                echo "<td>" . $data['Contact'] . "</td>";
                                echo "<td>" . $data['Username'] . "</td>";
                                echo "<td><a href='/ProjectEZ/View/EditTeacher.php?id=" . $data['ID'] ."'>Edit</a></td>";  
                                echo "<td><a href='/ProjectEZ/Controller/DeleteActionTeacher.php?id=" . $data['ID'] ."'>Delete</a></td>";
                                echo "</tr>";
                            }
                        }
                        else {
                            echo "<tr>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "</tr>";
                        }
                        $ezl->close();
                    ?>
                </tbody>
            </table>
        </div>
        <p style="text-align: center;"><a href="../View/TeacherForm.php">Add a Teacher</a> | <a href="/ProjectEZ/View/TeacherReq.php">Teacher Requests</a></p>
    </fieldset>
    <br>
    <fieldset style="width: 98%;">
        <?php include '../View/Footer.php'; ?>
    </fieldset>

    <script>
        function teacher(stdnt) {
            let search = stdnt.search.value;
			let resulturl = stdnt.action;

			if(search !== "") {
				let xhttp = new XMLHttpRequest();
				xhttp.onload = function(){
					document.getElementById('records').innerHTML = this.responseText;
				}

				xhttp.open("GET", resulturl + "?teacher=" + search);
				xhttp.send();
			}
            else {
                alert('Empty Search!');
            }
        }
    </script>
</body>
</html>