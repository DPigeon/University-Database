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
$sql = "SELECT * FROM Course";
$result = $conn->query($sql);

if($result->num_rows > 0){
	echo "<table>
          <tr>
            <th>Course ID</th>
            <th>Course Name</th>
          </tr>";
	while($row = $result->fetch_assoc()) {
		echo "<tr>
            <td>".$row["CID"]."</td>
            <td>".$row["CName"]."</td>
          </tr>";
	}
	echo "</table>";
}

$conn->close();
?>