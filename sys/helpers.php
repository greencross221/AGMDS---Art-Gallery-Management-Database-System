<?php 
session_start();
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'agmds';
$conn = new mysqli($server, $username, $password, $database);


$EV = [
	"css" => "assets/css/",
	"js" => "assets/js/",
	"ico" => "assets/iconic/font/css/"
];

function css($name) {
	$link = $GLOBALS['EV']['css'] . $name . ".css";
	return "<link rel=\"stylesheet\" type=\"text/css\" href=\"$link\">";
}
function js($name) {
	$link = $GLOBALS['EV']['js'] . $name . ".js";
	return "<script type=\"text/javascript\" src=\"$link\"></script>";
}
function ico($name) {
	$link = $GLOBALS['EV']['ico'] . $name . ".css";
	return "<link rel=\"stylesheet\" type=\"text/css\" href=\"$link\">";
}


function fregisterartist($name, $contact, $birthdate, $email, $password) {
	global $conn;
	$sql = "SELECT * FROM taccounts WHERE email = '$email'";
	$res = $conn->query($sql);
	if ($res->num_rows > 0) {
		$_SESSION['error'] = 'Please use an unregistered email.';
		header('Location: index.php?p=register&r=artist');
		on_enf_fluch();
	} else {
		$sql = "CALL paddartist('$name', '$contact', '$birthdate', '$email', '$password')";
		$conn->query($sql);
		$_SESSION['success'] = 'Successfully registered.';
		header('Location: index.php?p=login');
		on_enf_fluch();
	}
}
function fregistercustomer($name, $address, $email, $password) {
	global $conn;
	$sql = "SELECT * FROM taccounts WHERE email = '$email'";
	$res = $conn->query($sql);
	if ($res->num_rows > 0) {
		$_SESSION['error'] = 'Please use an unregistered email.';
		header('Location: index.php?p=register&r=artist');
		on_enf_fluch();
	} else {
		$sql = "CALL paddcustomer('$name', '$address', '$email', '$password')";
		$conn->query($sql);
		$_SESSION['success'] = 'Successfully registered.';
		header('Location: index.php?p=login');
		on_enf_fluch();
	}
}
function floginaccount($email, $password) {
	global $conn;
	if ($email == 'admin' && $password == 'admin') {
		$data = array('name' => 'admin', 'type' => 'admin');
		$_SESSION['loggedon'] = $data;
		header('Location: index.php');
		on_enf_fluch();

	} else {
		$sql = "SELECT * FROM vaccountidentifier WHERE email = '$email' AND password = '$password'";
		$res = $conn->query($sql);
		if ($res->num_rows > 0) {
			$data = $res->fetch_assoc();
			$_SESSION['loggedon'] = $data;
			header('Location: index.php');
			on_enf_fluch();
		} else {
			$_SESSION['error'] = 'Wrong email or password.';
			header('Location: index.php?p=login');
			on_enf_fluch();
		}
	}
}
function fpostartwork($artistID, $title, $artStyle, $price, $file) {
	global $conn;
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));
	$allowed = array('png', 'jfif', 'pjpeg', 'jpeg', 'pjp', 'jpg');
	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 8000000) {
				$fileNameNew = uniqid('', true) . "." . $fileActualExt;
				$fileDestination = 'uploads/' . $fileNameNew;
				$sql = "INSERT INTO tartwork(artistID, title, artStyle, price, file) VALUES ('$artistID', '$title', '$artStyle', '$price', '$fileDestination')";
				$conn->query($sql);
				move_uploaded_file($fileTmpName, $fileDestination);
				$_SESSION['success'] = 'Successfully uploaded.';
				header('Location: index.php?p=wall');
				on_enf_fluch();
			} else {
				$_SESSION['error'] = 'Your file is too big (8mb or less).';
				header('Location: index.php?p=wall');
				on_enf_fluch();
			}
		} else {
			$_SESSION['error'] = 'There was an error uploading your file.';
			header('Location: index.php?p=wall');
			on_enf_fluch();
		}
	} else {
		$_SESSION['error'] = 'You cannot upload files of this type.';
		header('Location: index.php?p=wall');
		on_enf_fluch();
	}
}
function feditartwork($artworkID, $title, $artStyle, $price) {
	global $conn;
	$sql = "UPDATE tartwork SET title = '$title', artStyle = '$artStyle', price = '$price' WHERE artworkID = '$artworkID'";
	$conn->query($sql);
	$_SESSION['success'] = 'Edit successful.';
	header('Location: index.php?p=wall');
	on_enf_fluch();
}
function fdeleteartwork($artworkID, $file) {
	global $conn;
	unlink($file);
	$sql = "DELETE FROM tartwork WHERE artworkID = '$artworkID'";
	$conn->query($sql);
	$_SESSION['success'] = 'Deletion successful.';
	header('Location: index.php?p=wall');
	on_enf_fluch();
}
function fpurchaseart($artworkID, $customerID, $price, $artistID) {
	global $conn;
	$sql = "INSERT INTO tsales(artistID, artworkID, customerID, price) VALUES ('$artistID', '$artworkID', '$customerID', '$price')";
	$conn->query($sql);
	$sql = "UPDATE tcustomer SET moneySpent = moneySpent + $price WHERE customerID = '$customerID'";
	$conn->query($sql);
	$_SESSION['success'] = 'Transaction successful.';
	header('Location: index.php');
	on_enf_fluch();
}
?>
