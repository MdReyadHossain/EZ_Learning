<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
	<script src="../View/js/registration.js"></script>
</head>
<body>
	<fieldset>
        <?php include('../View/header.php'); ?>
        <div style="float: right;">
            <a href="/ProjectEZ/View/login.php">Login</a> | <a href="/ProjectEZ/Home.php">Home</a>
        </div>
    </fieldset>

	<br>

	<div align="center" style="width:600px; margin-left:auto; margin-right: auto;">
		<fieldset>
			<form method="post" action="/Project/Controller/registrationControl.php" onsubmit="return validregistration(this)">
				<p><h2>Registration</h2></p>
				<?php 
					if(isset($_COOKIE['msg']))
						echo $_COOKIE['msg'];
				?>
				<table>
					<tr>
						<td>Name</td>
						<td>:</td>
						<td><input type="text" name="name"><span id="nameErr"><?php if(isset($_COOKIE['name'])){echo $_COOKIE['name'];} ?></span></td>
					</tr>

					<tr>
						<td>Contact No</td>
						<td>:</td>
						<td><input type="text" name="phone"><span id="phoneErr"><?php if(isset($_COOKIE['phone'])){echo $_COOKIE['phone'];} ?></span></td>
					</tr>

					<tr>
						<td>E-mail</td>
						<td>:</td>
						<td><input type="text" name="email"><span id="emailErr"><?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];} ?></span></td>
					</tr>

					<tr>
						<td>Username</td>
						<td>:</td>
						<td><input type="text" name="username"><span id="userErr"><?php if(isset($_COOKIE['user'])){echo $_COOKIE['user'];} ?></span></td>
					</tr>

					<tr>
						<td>Password</td>
						<td>:</td>
						<td><input type="text" name="password"><span id="passErr"><?php if(isset($_COOKIE['pass'])){echo $_COOKIE['pass'];} ?></span></td>
					</tr>

					<tr>
						<td>Confirm Password</td>
						<td>:</td>
						<td><input type="text" name="confirmpassword"><span id="conpassErr"><?php if(isset($_COOKIE['conpass'])){echo $_COOKIE['conpass'];} ?></span></td>
					</tr>

					<tr>
						<td>Gender</td>
						<td>:</td>
						<td>
							<input type="radio" name="gender" value="Male" id="Male"> Male
							<input type="radio" name="gender" value="Female" id="Female">Female
							<input type="radio" name="gender" value="Other" id="Other">Other
							<span id="genderErr"><?php if(isset($_COOKIE['gender'])){echo $_COOKIE['gender'];} ?></span>
						</td>
					</tr>
					<tr>
						<td>Date of Birth</td>
						<td>:</td>
						<td><input type="date" name="dob"><span id="dobErr"><?php if(isset($_COOKIE['dob'])){echo $_COOKIE['dob'];} ?></span></td>
					</tr>
				</table> <br>

				<input type="submit" name="Submit" value="Submit">

			</form>			
		</fieldset>
	</div>

	<br>

	<div align="center">
		<?php include '../View/footer.php';?>
	</div>
	
</body>
</html>