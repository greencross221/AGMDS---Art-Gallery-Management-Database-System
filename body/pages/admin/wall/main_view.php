<?php 
	$sql = "SELECT * FROM vtotalsales";
	$res = $conn->query($sql);
	if ($res->num_rows > 0) {
 ?>

 	<table class="table">
 		<thead>
 			<th>Month</th>
 			<th>Name</th>
 			<th>Sales</th>
 		</thead>
 		<tbody>
 			<?php 
 				while ($data = $res->fetch_assoc()) {
 			 ?>

 			<tr>
 				<td>
 					<?php 
	 					$month = $data['month'];
	 					if ($month == 1) {
	 						echo "January";
	 					} elseif ($month == 2) {
	 						echo "February";
	 					} elseif ($month == 3) {
	 						echo "March";
	 					} elseif ($month == 4) {
	 						echo "April";
	 					} elseif ($month == 5) {
	 						echo "May";
	 					} elseif ($month == 6) {
	 						echo "June";
	 					} elseif ($month == 7) {
	 						echo "July";
	 					} elseif ($month == 8) {
	 						echo "August";
	 					} elseif ($month == 9) {
	 						echo "September";
	 					} elseif ($month == 10) {
	 						echo "October";
	 					} elseif ($month == 11) {
	 						echo "November";
	 					} elseif ($month == 12) {
	 						echo "December";
	 					}
 					 ?>
 				</td>
 				<td><?php echo $data['name']; ?></td>
 				<td><?php echo "$" . number_format($data['totalSales'], 2); ?></td>
 			</tr>
 			
 			<?php 
 				}
 			 ?>
 		</tbody>
 	</table>

<?php 
	} else {
		echo "No sales.";
	}
 ?>