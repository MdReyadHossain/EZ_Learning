<?php
	require '../Model/StudentDB.php';

	if(isset($_GET['student'])) {
		$name = $_GET['student'];
		$result = get($name);
	}

	if ($result->num_rows > 0) {
		echo "<table border='1'>";
		echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Subject</th>";
        echo "<th>Edit</th>";
		while ($data = $result->fetch_assoc()) {
			$id = $data['ID'];
            echo "</tr>";
	        echo "<tr>";
            echo "<td>" . $data['ID'] . "</td>";
            echo "<td><a href='viewstudent.php?id=". $id ."'>" . $data['FirstName'] . " " . $data['LastName'] . "</a></td>";
            echo "<td>Web Technology</td>";
            echo "<td>" . "<a href='/Project/View/editstudent.php?id=" . $data['ID'] . "'>Edit</a></td>";
            echo "</tr>";
	    }
	    echo "</table>";
	}
	else {
		echo "No record(s) found";
	}
?>
