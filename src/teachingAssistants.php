<?php $title = 'Teaching Assistants'; ?>
<?php $currentPage = 'teachingAssistants'; ?>
<?php include('config.php'); ?>
<?php include('head.php'); ?>
<?php include('navbar.php'); ?>

<?php
//Query
$sql = "SELECT S.FirstName, S.LastName, S.Email, S.Credit, S.GPA
		FROM Student S INNER JOIN IsTA TA on TA.STID = S.STID INNER JOIN TeachingAssistant T on T.TAID = TA.TAID
		WHERE S.GPA > 3.2";
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
					<th scope='col'>Manage</th>
				</tr>";
	while($row = $result->fetch_assoc()) {
			echo "<tr>
					<td scope='row'>".$row["FirstName"]."</td>
					<td scope='row'>".$row["LastName"]."</td>
					<td scope='row'>".$row["Email"]."</td>
					<td scope='row'>".$row["Credit"]."</td>
					<td scope='row'>".$row["GPA"]."</td>
					<td scope='row'><button class='btn-success'>Edit</button> <button class='btn-danger'>Delete</button></td>
				</tr>";
	}
	echo "</table>
	</div>";
}

$conn->close();
?>

<?php include('footer.php'); ?>