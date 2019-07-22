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
$sql = "SELECT * FROM Instructor";
$result = $conn->query($sql);

if($result->num_rows > 0){
	echo "<table>
          <tr>
            <th>Instructor ID</th>
            <th>Instructor Name</th>
          </tr>";
	while($row = $result->fetch_assoc()) {
		echo "<tr>
            <td>".$row["IID"]."</td> 
            <td>".$row["Name"]."</td>
          </tr>";
	}
	echo "</table>";
}

$conn->close();
?>