<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
 	?>

	<div>
		<?php include '../View/teacherpanel.php';?>				
	</div>

	<br>

	<div>
		<fieldset>
			<form>
				<div>
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
								<fieldset style="width:200px;">
									<legend><h2>Class Metarial</h2></legend>
									<table>

									 	<tr>
											<td><a href="/Project/View/class01.php">Class 01</a></td>
										</tr>

										<tr>
											<td><a href="/Project/View/class01.php">Class 02</a></td>
										</tr>

										<tr>
											<td><a href="/Project/View/class01.php">Class 03</a></td>
										</tr>

										<tr>
											<td><a href="/Project/View/class01.php">Class 04</a></td>
										</tr>

										<tr>
											<td><a href="/Project/View/class01.php">Class 05</a></td>
										</tr>

										
									</table> <br><hr>
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
		<?php include '../View/footer.php'?>
	</div>
</body>
</html>