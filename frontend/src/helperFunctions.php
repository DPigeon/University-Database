<?php

	function printSqlResult($sqlResult) {
		$rowCountFromSqlResult = mysqli_num_rows($sqlResult);
		
		if($rowCountFromSqlResult > 0) { // if not empty set
		
			if($rowCountFromSqlResult > 0) {
				$counter = 1;
				$firstRow = "";
				echo "<table border=1>";
			
				while( $row = mysqli_fetch_assoc($sqlResult) ) {
					
					echo "<tr>";
					foreach( $row as $columnValue => $datumForThatColumn ) {
						
						if( $counter == 1 ) {
							echo "<th>$columnValue</th>";
							$firstRow = $firstRow . "<td>$datumForThatColumn</td>";
						}
						else {
							echo "<td>$datumForThatColumn</td>";
						}
					}
					if($counter == 1) {
						echo "</tr>";
						echo "<tr>";
						echo $firstRow;
						echo "</tr>";
					}
					echo "</tr>";
					$counter = $counter + 1;
				}
				
				echo "</table>";
			}
		}
		else { // if empty set
			echo "Empty set";
		}
	}
?>
