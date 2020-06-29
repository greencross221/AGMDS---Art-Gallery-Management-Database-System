<?php include '../sys/helpers.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>TEST PAGE</title>
</head>
<body>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="email" name="email">
		<button type="submit">submit</button>
	</form>
</body>
</html>
<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$email = $_POST['email'];
		$sql = "CALL pemailavailabilitychecker('$email')";
		$res = $conn->query($sql);
		if ($res->num_rows > 0) {
			echo "C:";
		} else {
			echo ":C";
		}
	}
 ?>
