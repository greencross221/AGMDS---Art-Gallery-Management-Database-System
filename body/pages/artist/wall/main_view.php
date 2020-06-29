<?php 
	$artistID = $_SESSION['loggedon']['ID'];
	$sql = "SELECT * FROM vartisttoartworkchecker WHERE artistID = '$artistID'";
	$res = $conn->query($sql);
	if ($res->num_rows > 0) {
 ?>
<div class="gallery">
	<?php 
		while ($data = $res->fetch_assoc()) {
	 ?>
			<img src="<?php echo $data['file']; ?>" class="img-fluid mb-3" data-toggle="modal" data-target="#edit" <?php echo 'onclick="viewartistwall(' . "'" . $data['artworkID'] . "'" . "," . "'" . $data['title'] . "'" . "," . "'" . $data['artStyle'] . "'" . "," . "'" . $data['price'] . "'" . "," . "'" . $data['file'] . "'" . "," . "'" . $data['status'] . "'" . ')"'; ?>>
	<?php 
		}
	} else {
		echo "No artworks.";
	}
	 ?>
</div>
