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

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Student</title>
	<script src="../View/js/registration.js"></script>
</head>
<body>
	<div>
		<?php include '../View/teacherpanel.php';?>				
	</div>

	<br>

	<div>
		<fieldset>
				<div>
					<table>
						<tr>
							<td style="width:300px;">
								<label><b>Account</b></label> 
								<hr> <br>
								<ul>
									<li><a href="/Project/View/dashboard.php">Dashboard</a></li>
									<li><a href="/Project/View/classmetarial.php">Class Metarial</a></li>
									<li><a href="/Project/View/viewprofile.php">View Profile</a></li>
									<li><a href="/Project/View/query.php">Query</a></li>
									<li><a href="/Project/View/editprofile.php">Edit Profile</a></li>
									<li><a href="/Project/View/changepassword.php">Change Password</a></li>
									<li><a href="/Project/View/Logout.php">Logout</a></li>
								</ul>
							</td>

							<td>
								<fieldset style="width:300px; height:300px;">
									<legend><h2>Class One</h2></legend>
									<table>
										<tr>
											<ul>
												<li><a href="/Project/View/studentlist.php">Student List</a></li>
												<li><a href="/Project/View/notice.php">Notice</a></li>
											</ul>
										</tr>										
									</table> <br>
								</fieldset>
							</td>

							<td>
								<form action="/Project/Controller/addstudentControl.php" target="_self" method="post" onsubmit="return validstudent(this)" novalidate>
						            <fieldset style="width: 30em;">
						                <legend><h3>Add Student</h3></legend>
						                <?php
						                    if(isset($_COOKIE['msg'])) {
						                        echo $_COOKIE['msg'];
						                    }
						                ?>
						                <table>
						                    <tr>
						                        <td>
						                            <label for="fname">First Name </label>
						                        </td>
						                        <td>:</td>
						                        <td>
						                            <input type="text" name="firstname" id="fname"> <span id="fnameErr">*</span>
						                        </td>
						                    </tr>
						                    <tr>
						                        <td>
						                            <label for="lname">Last Name </label>
						                        </td>
						                        <td>:</td>
						                        <td>
						                            <input type="text" name="lastname" id="lname"> <span id="lnameErr">*</span>
						                        </td>
						                    </tr>
						                    <tr>
						                        <td>
						                            <label for="gen">Gender </label>
						                        </td>
						                        <td>:</td>
						                        <td>
						                            <input type="radio" name="gender" value="male" id="male"> <label for="male">Male</label> 
						                            <input type="radio" name="gender" value="female" id="female"> <label for="female">Female</label>
						                            <input type="radio" name="gender" value="other" id="other"> <label for="other">Others</label>
						                            <span id="genderErr">*</span>
						                        </td>
						                    </tr>
						                    <tr>
						                        <td>
						                            <label for="dob">Date of Birth </label>
						                        </td>
						                        <td>:</td>
						                        <td>
						                            <input type="date" name="dob" id="dob"> <span id="dobErr">*<?php if(isset($_COOKIE['dob'])) {echo $_COOKIE['dob'];} ?></span>
						                        </td>
						                    </tr>
						                    <tr>
						                        <td>
						                            <label for="rel">Religion </label>
						                        </td>
						                        <td>:</td>
						                        <td>
						                            <select name="religion" id="rel"> 
						                                <option value="none">None</option>
						                                <option value="islam">Islam</option>
						                                <option value="hindu">Hindu</option>
						                                <option value="christian">Christian</option>
						                                <option value="other">Other</option>
						                            </select> <span id="relErr">*<?php if(isset($_COOKIE['rel'])) {echo $_COOKIE['rel'];} ?></span>
						                        </td>
						                    </tr>
						                    <tr>
						                        <td>
						                            <label for="preadd">Present Address </label> 
						                        </td>
						                        <td>:</td>
						                        <td>
						                            <textarea name="preaddress" id="preadd" placeholder="Enter address.."></textarea> <span id="preErr">*</span>
						                        </td>
						                    </tr>
						                    <tr>
						                        <td>
						                            <label for="paradd">Permanent Address </label>
						                        </td>
						                        <td>:</td>
						                        <td>
						                            <textarea name="paraddress" id="paradd" placeholder="Enter address.."></textarea>
						                        </td>
						                    </tr>
						                    <tr>
						                        <td>
						                            <label for="phone">Phone No. </label>
						                        </td>
						                        <td>:</td>
						                        <td>
						                            <input type="tel" name="phone" id="phone">
						                        </td>
						                    </tr>
						                    <tr>
						                        <td>
						                            <label for="email">Email </label> 
						                        </td>
						                        <td>:</td>
						                        <td>
						                            <input type="email" name="email" id="email"> <span id="emailErr">*<?php if(isset($_COOKIE['email'])) {echo $_COOKIE['email'];} ?></span>
						                        </td>
						                    </tr>
						                </table>
						                <br>
						                <h3>Credential</h3>
						                <table> 
						                    <tr>
						                        <td>
						                            <label for="user">Username </label> 
						                        </td>
						                        <td>:</td>
						                        <td>
						                            <input type="text" name="username" id="user"> <span id="userErr">*<?php if(isset($_COOKIE['user'])) {echo $_COOKIE['user'];} ?></span>
						                        </td>
						                    </tr>
						                    <tr>
						                        <td>
						                            <label for="pass">Password </label> 
						                        </td>
						                        <td>:</td>
						                        <td>
						                            <input type="password" name="password" id="pass"> <span id="passErr">*<?php if(isset($_COOKIE['pass'])) {echo $_COOKIE['pass'];} ?></span>
						                        </td>
						                    </tr>
						                    <tr>
						                        <td>
						                            <label for="conpass">Confirm Password </label> 
						                        </td>
						                        <td>:</td>
						                        <td>
						                            <input type="password" name="conpassword" id="conpass"> <span id="conpassErr">*</span>
						                        </td>
						                    </tr>
						                </table>
						                <br>
						                <input type='submit' name='submit' value='Submit'> <input type='reset' name='reset' value='Clear'>
						            </fieldset>
						            <br>
					        	</form>

							</td>
						</tr>
					</table>
				</div>
		</fieldset>
	</div>

	<br>

	<div align="center">
		<?php include '../View/footer.php'?>
	</div>
</body>
</html>