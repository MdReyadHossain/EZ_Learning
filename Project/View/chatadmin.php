<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<title>
		Class metarial
	</title>
</head>
<body>

	<?php 
		session_start();
		if(!isset($_COOKIE['rem'])) {
	        header('location: /Project/View/logout.php');
	    }
		if (isset($_SESSION['username'])) {		

		} else {
			header("location: /Project/View/login.php");
		}
		
		$ezl = new mysqli("localhost", "root", "", "ezlearning");
	    if ($ezl->connect_error) {
	        die("Data base Connection failed: " . $ezl->connect_error);
	    }

		$sql = "SELECT * FROM chat";
	    $qry = $ezl->query($sql);
 	?>

	<div>
		<?php include '../View/teacherpanel.php';?>				
	</div>

	<br>

	<div>
		<fieldset>
				<table>
					<tr>
						<td style="width:300px;">
							<label><b>Account</b></label> 
							<hr> <br>
							<ul>
								<li><a href="/Project/View/dashboard.php">Dashboard</a></li>
								<li><a href="/Project/View/classmetarial.php">Class Metarial</a></li>
								<li><a href="/Project/View/query.php">Query</a></li>
								<li><a href="/Project/View/viewprofile.php">View Profile</a></li>
								<li><a href="/Project/View/editprofile.php">Edit Profile</a></li>
								<li><a href="/Project/View/changepassword.php">Change Password</a></li>
								<li><a href="/Project/View/Logout.php">Logout</a></li>
							</ul>
						</td>

						<td>
							<fieldset style="width: 30em; height: 450px; ">
						        <legend><b>Admin</b></legend>
						        <div id="msg" style="height: 90%; overflow: auto; display:flex; flex-direction:column-reverse;">
						            <table style="" border="0px" width="100%">
						                <tbody>
						                    <?php
						                        while ($data = $qry->fetch_assoc()) {
						                            if($data['User'] == 'admin'){
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
						                </tbody>
						            </table>
						        </div>
						        <div align="center" style="margin-top: 5px;">
						            <form action="../Controller/chatadminControl.php" onsubmit="validchat(this); return false;" method="POST">
						                <input type="text" name="name" value="teacher" hidden>
						                <input style="width: 80%;" type="text" name="chat" placeholder="Type here..." autocomplete="off">
						                <input type="submit" name="chatsubmit" value="Send">
						            </form>
						        </div>        
						    </fieldset>
						</td>
					</tr>
				</table>
		</fieldset>
	</div>

	<br>

	<div align="center">
		<?php include '../View/footer.php'?>
	</div>

	<script>
		function validchat(valid) {
            let chat = valid.chat.value;
            let name = valid.name.value;

            let isvalid = true;

            if(chat == "") {
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
                xhttp.send("chat=" + chat + "&name=" + name);
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