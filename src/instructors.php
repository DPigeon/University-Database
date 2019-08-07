<?php $title = 'Instructors'; ?>
<?php $currentPage = 'instructors'; ?>
<?php include('config.php'); ?>
<?php include('head.php'); ?>
<?php include('navbar.php'); ?>

<?php
//Query
$sql = "SELECT * FROM Instructor";
$result = $conn->query($sql);

if($result->num_rows > 0){
	echo "<div class='table-responsive'>
          <table class='table table-bordered table-sm'>
          <tr>
            <th scope='col'>First Name</th>
            <th scope='col'>Last Name</th>
            <th scope='col'>Email</th>
            <th scope='col'>Phone</th>
          </tr>";
	while($row = $result->fetch_assoc()) {
		echo "<tr>
            <td scope='row'>".$row["FirstName"]."</td>
            <td scope='row'>".$row["LastName"]."</td>
            <td scope='row'>".$row["Email"]."</td>
            <td scope='row'>".$row["Phone"]."</td>
          </tr>";
	}
  echo "</table>
  </div>";
}

$conn->close();
?>

<?php include('footer.php'); ?>