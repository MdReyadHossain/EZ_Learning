<?php
    session_start();
    if(!isset($_COOKIE['rem'])) {
        header('location: /ProjectEZ/Controller/Logout.php');
    }
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectEZ/View/login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
</head>
<body>
    <?php include('../View/Adminbar.php') ?>

    <form action="/ProjectEZ/Controller/UpdateAction.php" target="_self" method="post" onsubmit="return validprofile(this)" novalidate>
        <fieldset style="width: 40%;">
            <legend><b>Update Profile</b></legend>
            <br>
            <?php
                if(isset($_COOKIE['err'])) {
                    echo $_COOKIE['err'];
                }
            ?>
            <span id="inputErr" style="color: red;"></span>
            <table>
                <tr>
                    <td>
                        <label for="name">Institute Name </label>
                    </td>
                    <td>:</td>
                    <td>
                        <input type="text" name="name" id="name" value="<?php echo $_SESSION['name']; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Email </label>
                    </td>
                    <td>:</td>
                    <td>
                        <input type="email" name="email" id="email" value="<?php echo $_SESSION['email']; ?>"><?php if(isset($_COOKIE['emailErr'])) {echo $_COOKIE['emailErr'];} ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="phone">Contact No. </label>
                    </td>
                    <td>:</td>
                    <td>
                        <input type="tel" name="phone" id="phone" value="<?php echo $_SESSION['phone']; ?>"><?php if(isset($_COOKIE['phoneErr'])) {echo $_COOKIE['phoneErr'];} ?>
                    </td>
                </tr>
                <tr>
                <td>
                    <label for="add">Present Address </label> 
                </td>
                <td>:</td>
                <td>
                    <textarea name="address" id="add"><?php echo $_SESSION['address']; ?></textarea>
                </td>
            </tr>
            </table>
            <br>
        </fieldset>
        <br>
        <input type='submit' name='submit' value='Update'>
        <br>
    </form>

    <fieldset style="width: 98%;">
        <?php include '../View/Footer.php'; ?>
    </fieldset>
    <script>
        function validprofile(pro) {
            let inputErr = document.getElementById('inputErr');
            inputErr.innerHTML = "";

            let name = pro.name.value;
            let email = pro.email.value;
            let phone = pro.phone.value;
            let address = pro.address.value;
            let isvalid = true;

            if (name == "") {
                inputErr.innerHTML = "❗Input should not be empty.";
                isvalid = false;
            }
            if (email == "") {
                inputErr.innerHTML = "❗Input should not be empty.";
                isvalid = false;
            }
            if (phone == "") {
                inputErr.innerHTML = "❗Input should not be empty.";
                isvalid = false;
            }
            if (address == "") {
                inputErr.innerHTML = "❗Input should not be empty.";
                isvalid = false;
            }

            return isvalid;
        }
    </script>
</body>
</html>