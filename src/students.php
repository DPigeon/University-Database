<?php
// Connection information
$servername = "krc353.encs.concordia.ca";
$username = "krc353_1";
$password = "cncrd353";
$database = "krc353_1";

// Connection
$conn = new mysqli($servername, $username, $password, $database);

// Verify connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//Query
$sql = "SELECT * FROM Student";
$result = $conn->query($sql);

if($result->num_rows > 0){
	echo "<table>
			<tr>
				<th>Student ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Credits</th>
				<th>GPA</th>
			</tr>";
	while($row = $result->fetch_assoc()) {
		echo "<tr>
				<td>".$row["STID"]."</td>
				<td>".$row["FirstName"]."</td>
				<td>".$row["LastName"]."</td>
				<td>".$row["Credit"]."</td>
				<td>".$row["GPA"]."</td>
			</tr>";
	}
	echo "</table>";
}

$conn->close();
?>