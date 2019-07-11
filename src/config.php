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
$sql = "SELECT * FROM test";
$result = $conn->query($sql);

if($result->num_rows > 0){
	
//Update this when you want to display different table information from the database.
//This is also where HTML and Javascript might come in use.

	echo "Hey, it works! ";
		echo "<table><tr><th>Attribute 1</th><th>Attribute 2</th></tr>";
		while($row = $result->fetch_assoc()) {
		echo "<tr><td>".$row["att1"]."</td><td>".$row["att2"]."</td></tr>";
		}
		echo "</table>";
}

$conn->close();
?>