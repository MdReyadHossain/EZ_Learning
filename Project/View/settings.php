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

    $sql = "SELECT * FROM teacher";
    $qry = $ezl->query($sql);
    while($data = $qry->fetch_assoc()) {
    	if($data['ID'] == $_SESSION['id']) {
    		$username = $data['Username'];
    	}
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Settings</title>
</head>
<body>
	<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
</head>
<body>
	<div>
		<?php include '../View/teacherpanel.php';?>				
	</div>	

	<br>

	<div>
		<fieldset>
			<form action="/Project/Controller/settingsControl.php" method="POST" onsubmit="validusername(this); return false;">
				<div>
					<table>
						<tr>
							<td style="width: 300px;">
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
								<fieldset>
									<legend><h2>Change Username</h2></legend>
									<span id="msg"></span>
									<table>
										<input type="number" name="id" value="<?php echo $_SESSION['id'] ?>" hidden>
										<tr>
											<td>New Username</td>
											<td>:</td>
											<td><input type="text" name="user"><?php if(isset($_COOKIE['user'])){echo $_COOKIE['user'];} ?><br>
											<span id="userErr" style="color: red;"></span></td> 
										</tr>

										<tr>
											<td>Password</td>
											<td>:</td>
											<td><input type="password" name="pass"> <?php if(isset($_COOKIE['pass'])){echo $_COOKIE['pass'];} ?><br>
											<span id="passErr" style="color: red;"></span></td>
										</tr>
									</table>
									<hr>
									<input type="submit" name="submit" value="Update">
									<a href="/Project/View/changepassword.php">Change Password?</a>
								</fieldset>
							</td>
						</tr>
					</table>
				</div>
			</form>
		</fieldset>
	</div>

	<br>

	<div align="center">
		<?php include '../View/footer.php';?>
	</div>

	<script>
		function validusername(valid) {
			let passErr = document.getElementById("passErr");
			let userErr = document.getElementById("userErr");
		    passErr.innerHTML = "";
		    userErr.innerHTML = "";

		    let user = valid.user.value;
		    let pass = valid.pass.value;
		    let id = valid.id.value;

		    let isvalid = true;

		    if (user == "") {
		        userErr.innerHTML = "❗Should not be empty.";
		        isvalid = false;
		    }

		    if (pass == "") {
		        passErr.innerHTML = "❗Should not be empty.";
		        isvalid = false;
		    }

		    if(isvalid) {
		    	const actionURL = valid.action;
		    	const actionMethod = valid.method;

		    	let xhttp = new XMLHttpRequest();

				xhttp.onload = function() {
					document.getElementById("msg").innerHTML = this.responseText;
				}
				xhttp.open(actionMethod, actionURL);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("user=" + user + "&pass=" + pass + "&id=" + id);
		    }   
		}
	</script>
</body>
</html>
</body>
</html>