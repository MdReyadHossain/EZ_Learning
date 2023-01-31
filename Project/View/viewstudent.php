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
					                            <label for="id">ID </label>
					                        </td>
					                        <td>:</td>
					                        <td><?php echo $id; ?>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                            <label for="name">Name </label>
					                        </td>
					                        <td>:</td>
					                        <td><?php echo $fname . $lname; ?>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                            <label for="dob">Date of Birth </label>
					                        </td>
					                        <td>:</td>
					                        <td><?php echo $dob; ?>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                            <label for="rel">Religion </label>
					                        </td>
					                        <td>:</td>
					                        <td>
					                            <?php echo $rel; ?>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                            <label for="phone">Phone No. </label>
					                        </td>
					                        <td>:</td>
					                        <td><?php echo $phone; ?>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                            <label for="email">Email </label> 
					                        </td>
					                        <td>:</td>
					                        <td><?php echo $email; ?>
					                        </td>
					                    </tr>
					                </table>
					                <br>
					            </fieldset>
						        <br>
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