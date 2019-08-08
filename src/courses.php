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
          <th scope='col'>Course Name</th>
          <th scope='col'>Manage</th>
          </tr>";
	while($row = $result->fetch_assoc()) {
		echo "<tr>
    <td scope='row'>".$row["CName"]."</td>
    <td scope='row'><button class='btn-success'>Edit</button> <button class='btn-danger'>Delete</button></td>
          </tr>";
	}
	echo "</table>
	</div>";
}

$conn->close();
?>

<?php include('footer.php'); ?>