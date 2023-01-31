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

    $sql = "SELECT * FROM student";
    $qry = $ezl->query($sql);
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Edit Student</title>
 	<script src="../View/js/editstudent.js"></script>
 </head>
 <body>
 	<div>
		<?php include '../View/teacherpanel.php';?>
		<?php
            $id = $name = $gender = $dob = $phone = $email = $username = "";
            if (isset($_GET['id'])) {		
                $id = $_GET['id'];

                if($qry->num_rows > 0) {
                    while ($data = $qry->fetch_assoc()) {
                        if (+$id == $data['ID']) {
                            $fname = $data['FirstName'];
                            $lname = $data['LastName'];
                            $gender = $data['Gender'];
                            $rel = $data['Religion'];
                            $dob = $data['DateOfBirth'];
                            $phone = $data['PhoneNo'];
                            $email = $data['Email'];
                        }
                    }
                }
            }
            else {
                die("Invalid Request");
            }
        ?>			
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
								<form action="/Project/Controller/editstudentControl.php" target="_self" method="post" onsubmit="return valideditstudent(this)" novalidate>
						            <fieldset style="width: 30em;">
						                <legend><h3>Add Student</h3></legend>
						                <?php
						                    if(isset($_COOKIE['msg'])) {
						                        echo $_COOKIE['msg'];
						                    }
						                ?>
						                <table>
						                	<input type="number" name="id" value="<?php echo $id; ?>" hidden>
						                    <tr>
						                        <td>
						                            <label for="fname">First Name </label>
						                        </td>
						                        <td>:</td>
						                        <td>
						                            <input type="text" name="firstname" id="fname" value="<?php echo $fname; ?>"> <span id="fnameErr">*</span>
						                        </td>
						                    </tr>
						                    <tr>
						                        <td>
						                            <label for="lname">Last Name </label>
						                        </td>
						                        <td>:</td>
						                        <td>
						                            <input type="text" name="lastname" id="lname" value="<?php echo $lname; ?>"> <span id="lnameErr">*</span>
						                        </td>
						                    </tr>
						                    <tr>
						                        <td>
						                            <label for="dob">Date of Birth </label>
						                        </td>
						                        <td>:</td>
						                        <td>
						                            <input type="date" name="dob" id="dob" value="<?php echo $dob; ?>"> <span id="dobErr">*<?php if(isset($_COOKIE['dob'])) {echo $_COOKIE['dob'];} ?></span>
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
						                                <option <?php if($rel == 'islam'){echo 'selected';}?> value="islam">Islam</option>
						                                <option <?php if($rel == 'hindu'){echo 'selected';}?> value="hindu">Hindu</option>
						                                <option <?php if($rel == 'christian'){echo 'selected';}?> value="christian">Christian</option>
						                                <option <?php if($rel == 'other'){echo 'selected';}?> value="other">Other</option>
						                            </select> <span id="relErr">*<?php if(isset($_COOKIE['rel'])) {echo $_COOKIE['rel'];} ?></span>
						                        </td>
						                    </tr>
						                    <tr>
						                        <td>
						                            <label for="phone">Phone No. </label>
						                        </td>
						                        <td>:</td>
						                        <td>
						                            <input type="tel" name="phone" id="phone" value="<?php echo $phone; ?>">
						                            <span id="phoneErr">*</span>
						                        </td>
						                    </tr>
						                    <tr>
						                        <td>
						                            <label for="email">Email </label> 
						                        </td>
						                        <td>:</td>
						                        <td>
						                            <input type="email" name="email" id="email" value="<?php echo $email; ?>"> <span id="emailErr">*<?php if(isset($_COOKIE['email'])) {echo $_COOKIE['email'];} ?></span>
						                        </td>
						                    </tr>
						                </table>
						                <br>
						                <input type='submit' name='submit' value='Update'>
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