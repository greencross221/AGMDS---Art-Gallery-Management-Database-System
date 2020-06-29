<?php 
	$customerID = $_SESSION['loggedon']['ID'];
	$sql = "SELECT * FROM vcustomertosaleschecker WHERE customerID = $customerID";
	$res = $conn->query($sql);
	if ($res->num_rows > 0) {
 ?>
<div class="gallery">
	<?php 
		while ($data = $res->fetch_assoc()) {
	 ?>
			<img src="<?php echo $data['file']; ?>" class="img-fluid mb-3" data-toggle="modal" data-target="#modal" <?php echo 'onclick="viewcustomerwall(' . "'" . $data['artworkID'] . "'" . "," . "'" . $data['customerID'] . "'" . "," . "'" . $data['dateSold'] . "'" . "," . "'" . $data['customerName'] . "'" . "," . "'" . $data['address'] . "'" . "," . "'" . $data['moneySpent'] . "'" . "," . "'" . $data['artistID'] . "'" . "," . "'" . $data['artistName'] . "'" . "," . "'" . $data['title'] . "'" . "," . "'" . $data['artStyle'] . "'" . "," . "'" . $data['date'] . "'" . "," . "'" . number_format($data['price'], 2) . "'" . "," . "'" . $data['file'] . "'" . ')"'; ?>>
	<?php 
		}
	} else {
		echo "No artworks.";
	}
	 ?>
</div>
