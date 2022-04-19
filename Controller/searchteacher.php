<?php
	require '../Model/TeacherDB.php';

	if(isset($_GET['teacher'])) {
		$name = $_GET['teacher'];
		$result = get($name);
	}

	if ($result->num_rows > 0) {
		echo "<table border='1' align='center'>";
		echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Date of Birth</th>";
        echo "<th>Email</th>";
        echo "<th>Contact No</th>";
        echo "<th>Username</th>";
        echo "<th>Action</th>";
		while ($data = $result->fetch_assoc()) {
            echo "</tr>";
	        echo "<tr>";
            echo "<td>101-" . $data['ID'] . "</td>";
            echo "<td>" . $data['Name'] . "</td>";
            echo "<td>" . $data['DateOfBirth'] . "</td>";
            echo "<td>" . $data['Email'] . "</td>";
            echo "<td>" . $data['Contact'] . "</td>";
            echo "<td>" . $data['Username'] . "</td>";
            echo "<td><a href='/ProjectEZ/View/EditTeacher.php?id=" . $data['ID'] ."'>Edit</a></td>"; 
            echo "<td><a href='/ProjectEZ/Controller/DeleteActionTeacher.php?id=" . $data['ID'] ."'>Delete</a></td>";
            echo "</tr>";
	    }
	    echo "</table>";
	}
	else {
		echo "No record(s) found";
	}
?>