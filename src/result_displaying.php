<?php
	include_once('sqlConfig.php');
	
	$supervisorSSN = htmlspecialchars($_POST['supervisorSSN']);
	
	if( isset($_POST['query_i']) ) {
		
	}
	if( isset($_POST['query_ii']) ) {
		
	}
	if( isset($_POST['query_iii']) ) {
		
	}
	if( isset($_POST['query_iv']) ) {
		
	}
	if( isset($_POST['query_v']) ) {
		
	}
	if( isset($_POST['query_vi']) ) {
		
	}
	if( isset($_POST['query_vii']) ) {
		
	}
	if( isset($_POST['query_viii']) ) {
		
	}
	if( isset($_POST['query_ix']) ) {
		
	}
	if( isset($_POST['query_x']) ) {
		
	}
	if( isset($_POST['query_xi']) ) {
		
	}
	if( isset($_POST['query_xii']) ) {
		
	}
	if( isset($_POST['query_xiii']) ) {
		
	}
	if( isset($_POST['query_xiv']) ) {
		
		/*$sqlSyntax = "SELECT Supervisor.SupervisorID, Supervisor.FirstName, Supervisor.LastName
						FROM Graduate GS
							INNER JOIN Student S ON GS.SSN = S.SSN
							INNER JOIN Supervises ON Supervises.GSSN = GS.SSN
							INNER JOIN Supervisor ON Supervises.SSSN = Supervisor.SSN
						WHERE Supervisor.SSN = " . $givenSSN . ";";
	
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
		printSqlResult($sqlResult);*/
		
		$sqlSyntax = "SELECT Supervisor.SupervisorID, Supervisor.FirstName, Supervisor.LastName
						FROM Graduate GS
							INNER JOIN Student S ON GS.SSN = S.SSN
							INNER JOIN Supervises ON Supervises.GSSN = GS.SSN
							INNER JOIN Supervisor ON Supervises.SSSN = Supervisor.SSN
						WHERE Supervisor.SSN = " . $supervisorSSN . ";";
	
		$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
		printSqlResult($sqlResult);
	}
	if( isset($_POST['query_xv']) ) {
		
	}
	if( isset($_POST['query_xvi']) ) {
		
	}
	if( isset($_POST['query_xvii']) ) {
		
	}
	if( isset($_POST['query_xviii']) ) {
		
	}
	if( isset($_POST['query_xix']) ) {
		
	}
	if( isset($_POST['query_xx']) ) {
		
	}
	if( isset($_POST['query_xxi']) ) {
		
	}
	if( isset($_POST['query_xxii']) ) {
		
	}
	
	// <testCase>
	echo "Test case (REMOVE LATER):<br>";
	$sqlSyntax = "Select * from Student";
	$sqlResult = mysqli_query($mysqlConnection, $sqlSyntax);
	printSqlResult($sqlResult);
	// </testCase>
		
	function printSqlResult($sqlResult) {
		if( $sqlResult == false ) {
			echo "Empty set<br>";
		}
		else { // if not empty set
			$rowCountFromSqlResult = mysqli_num_rows($sqlResult);
		
			if($rowCountFromSqlResult > 0) {
				$headingCounter = 1;
				$dataCounter = 1;
				$didFirstRow = false;
				echo "<table border=1>";
				while( $row = mysqli_fetch_assoc($sqlResult) ) {
					foreach($row as $columnValue => $datumForThatColumn) {
						
						if( $headingCounter <= count($row) ) {
							
							if($headingCounter == 1) {
								echo "<tr>";
							}
							
							echo "<th>" . $columnValue . "</th>";
							$firstRowArray[$headingCounter-1] = $datumForThatColumn;
							
							if( $headingCounter == count($row) ) {
								echo "</tr>";
							}
							
							$headingCounter = $headingCounter + 1;
						}
						else {
							$subsequentRow[$dataCounter-1] = $datumForThatColumn;
							
							$dataCounter = $dataCounter + 1;
						}
					}
					if( $didFirstRow == false ) {
						echo "<tr>";
						for($i = 0; $i < count($firstRowArray); $i = $i + 1) {
							
							echo "<td>" . $firstRowArray[$i] . "</td>";
						}
						
						echo "</tr>";
						
						$didFirstRow = true;
					}
					else {
						
						echo "<tr>";
						for($i = 0; $i < count($subsequentRow); $i = $i + 1) {
							
							echo "<td>" . $subsequentRow[$i] . "</td>";
						}
						
						echo "</tr>";
					}
				}
				echo "</table>";
			}
		}
	}
?>
