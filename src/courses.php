<?php $title = 'Courses'; ?>
<?php $currentPage = 'courses'; ?>
<?php include('config.php'); ?>
<?php include('head.php'); ?>
<?php include('navbar.php'); ?>

<?php
//Query
$sql = "SELECT * FROM Course";
$result = $conn->query($sql);

if($result->num_rows > 0){
	echo "<div class='table-responsive'>
          <table class='table table-bordered table-sm'>
          <tr>
          <th scope='col'>First Name</th>
          <th scope='col'>Last Name</th>
          <th scope='col'>Email</th>
          <th scope='col'>Phone</th>
          <th scope='col'>GPA</th>
          <th scope='col'>Credit</th>
          </tr>";
	while($row = $result->fetch_assoc()) {
		echo "<tr>
    <td scope='row'>".$row["FirstName"]."</td>
    <td scope='row'>".$row["LastName"]."</td>
    <td scope='row'>".$row["Email"]."</td>
    <td scope='row'>".$row["Phone"]."</td>
    <td scope='row'>".$row["GPA"]."</td>
    <td scope='row'>".$row["Credit"]."</td>
          </tr>";
	}
	echo "</table>
	</div>";
}

$conn->close();
?>

<?php include('footer.php'); ?>