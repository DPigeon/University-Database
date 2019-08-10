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
            <th scope='col'>Instructor ID</th>
            <th scope='col'>Instructor Name</th>
          </tr>";
	while($row = $result->fetch_assoc()) {
		echo "<tr>
            <td scope='row'>".$row["IID"]."</td> 
            <td scope='row'>".$row["Name"]."</td>
          </tr>";
	}
  echo "</table>
  </div>";
}

$conn->close();
?>

<?php include('footer.php'); ?>