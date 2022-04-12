<?php
    session_start();
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
        <title>Edit Teacher Profile</title>
    </head>
    <body>
        <?php
            $id = $name = $gender = $dob = $phone = $email = $username = "";
            if (isset($_GET['id'])) {		
                $id = $_GET['id'];
                if($qry->num_rows > 0) {
                    while ($data = $qry->fetch_assoc()) {
                        if (+$id == $data['ID']) {
                            $name = $data['Name'];
                            $gender = $data['Gender'];
                            $dob = $data['DateOfBirth'];
                            $phone = $data['Contact'];
                            $email = $data['Email'];
                            $username = $data['Username'];
                        }
                    }
                }
            }
            else {
                die("Invalid Request");
            }
        ?>

        <?php include('../View/Adminbar.php') ?>
        <fieldset style="width: 40%; height: auto;">
            <legend><b>Teachers Profile</b></legend>
            <br>
            <form action="/ProjectEZ/Controller/EditTeacherAction.php" method="POST">
                <?php 
                    if(isset($_COOKIE['msg'])){
                        echo $_COOKIE['msg'];
                    }
                ?>
                <input type="number" name="id" value="<?php echo $id; ?>" hidden>
                <table>
                    <tr>
                        <td>
                            <label for="name">Name </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="name" id="name" value="<?php echo $name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="gen">Gender </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input <?php if($gender == 'Male') {echo 'checked="checked"';} ?> type="radio" name="gender" value="Male" id="male"> <label for="male">Male</label> 
                            <input <?php if($gender == 'Female') {echo 'checked="checked"';} ?> type="radio" name="gender" value="Female" id="female"> <label for="female">Female</label>
                            <input <?php if($gender == 'Other') {echo 'checked="checked"';} ?> type="radio" name="gender" value="Other" id="other"> <label for="other">Others</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="dob">Date of Birth </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="date" name="dob" id="dob" value="<?php echo $dob; ?>">
                            <?php if(isset($_COOKIE['dob'])){echo $_COOKIE['dob'];} ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="phone">Phone No. </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="tel" name="phone" id="phone" value="<?php echo $phone; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">Email </label> 
                        </td>
                        <td>:</td>
                        <td>
                            <input type="email" name="email" id="email" value="<?php echo $email; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="user">Username </label> 
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="username" id="user" value="<?php echo $username; ?>">
                        </td>
                    </tr>
                </table>
                <br>
                <input type='submit' name='submit' value='Update'>
            </form>
        </fieldset>
        <br>
        <fieldset style="width: 98%;">
            <?php include '../View/Footer.php'; ?>
        </fieldset>
    </body>
</html>