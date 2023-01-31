<!DOCTYPE html>
<html>
<head>
	<title>Header</title>
	<link rel="stylesheet" type="text/css" href="top.css">
</head>
<body>
	<fieldset>

		<img src="/Project/Model/ezlogo.png" height="80px" width="80px" style="margin-left: 10px; margin-top: 10px;">

		<p align="right"><a href="/Project/publichome.php">Logged in as <?php echo $_SESSION['data']['name']?></a> 
		<a href="/Project/View/logout.php">Logout</a></p>
	</div>
	</fieldset>
</body>
</html>