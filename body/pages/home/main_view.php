<?php 
	if (isset($_SESSION['loggedon'])) {
		$type = $_SESSION['loggedon']['type'];
	}
	if (isset($_GET['s'])) {
		$artStyle = $_GET['s'];
		$sql = "SELECT * FROM vartisttoartworkchecker WHERE status = 0 AND artStyle = '$artStyle'";
		$res = $conn->query($sql);
	} elseif (isset($_GET['a'])) {
		$artistID = $_GET['a'];
		$sql = "SELECT * FROM vartisttoartworkchecker WHERE status = 0 AND artistID = '$artistID'";
		$res = $conn->query($sql);
	} else {
		$sql = "SELECT * FROM vartisttoartworkchecker WHERE status = 0";
		$res = $conn->query($sql);
	}
	if ($res->num_rows > 0) {
 ?>
<div class="gallery">
	<?php 
		while ($data = $res->fetch_assoc()) {
	 ?>
			<img src="<?php echo $data['file']; ?>" class="img-fluid mb-3" data-toggle="modal" data-target="#modal" <?php echo 'onclick="viewhome(' . "'" . $data['artistID'] . "'" . "," . "'" . $data['name'] . "'" . "," .  "'" . $data['artworkID'] . "'" . "," . "'" . $data['title'] . "'" . "," . "'" . $data['artStyle'] . "'" . "," . "'" . $data['date'] . "'" . "," . "'" . number_format($data['price'],2) . "'" . "," . "'" . $data['file'] . "'" . ')"'; ?>>
	<?php 
		}
	} else {
		echo "No artworks.";
	}
	 ?>
</div>
