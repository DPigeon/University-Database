<?php $title = 'Student'; ?>
<?php $currentPage = 'student'; ?>
<?php include('config.php'); ?>
<?php include('head.php'); ?>
<?php include('navbar.php'); ?>

<?php
//Query
$studentId = $_GET["id"];
$sql = "SELECT * 
        FROM Student S
        WHERE S.STID = $studentId";
$result = $conn->query($sql);

if($result->num_rows > 0){
	echo "<div class='table-responsive'>
			<table class='table table-bordered table-sm'>
				<tr>
					<th scope='col'>First Name</th>
					<th scope='col'>Last Name</th>
					<th scope='col'>Email</th>
					<th scope='col'>Credits</th>
					<th scope='col'>GPA</th>
				</tr>";
	while($row = $result->fetch_assoc()) {
			echo "<tr>
					<td scope='row'>".$row["FirstName"]."</td>
					<td scope='row'>".$row["LastName"]."</td>
					<td scope='row'>".$row["Email"]."</td>
					<td scope='row'>".$row["Credit"]."</td>
					<td scope='row'>".$row["GPA"]."</td>
				</tr>";
	}
	echo "</table>
	</div>";
}

$conn->close();
?>

<?php include('footer.php'); ?>