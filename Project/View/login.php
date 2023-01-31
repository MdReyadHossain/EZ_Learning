<?php 
	session_start();
	if (isset($_SESSION['username'])) {		
		header("location: ../View//dashboard.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>
	<div>
		<?php include '../View/header.php';?>				
	</div>	

	<br>

	<div align="center" style="width:400px">
		<?php
			if (isset($_COOKIE['msg'])) {
			 	echo $_COOKIE['msg'];
			} 
		?>
		<form action="../Controller/loginControl.php" method="post">
			<fieldset>
				<table>
					<tr>
						<td>User Name</td>
						<td>:</td>
						<td><input type="text" name="username"><?php if (isset($_COOKIE['user'])) {echo $_COOKIE['user'];} ?></td>
					</tr>
					<tr>
						<td>Password</td>
						<td>:</td>
						<td><input type="password" name="password"><?php if (isset($_COOKIE['pass'])) {echo $_COOKIE['pass'];} ?></td>
					</tr>		
				</table>
				<hr>
				<input type="submit" name="login" value="login">
			</fieldset>
		</form>		
	</div>

	<br>

	<div align="center">
		<?php include '../View/footer.php';?>
	</div>

</body>
</html>