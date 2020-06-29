<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		// register
		if (isset($_POST['registerArtist'])) {
			$birthdate = $_POST['birthdate'];
			$password = $_POST['password'];
			$contact = $_POST['contact'];
			$email = $_POST['email'];
			$name = $_POST['name'];
			fregisterartist($name, $contact, $birthdate, $email, $password);
		} elseif (isset($_POST['registerCustomer'])) {
			$password = $_POST['password'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$name = $_POST['name'];
			fregistercustomer($name, $address, $email, $password);
		}

		// login
		elseif (isset($_POST['loginAccount'])) {
			$password = $_POST['password'];
			$email = $_POST['email'];
			floginaccount($email, $password);
		}

		// artwork
		elseif (isset($_POST['postArtwork'])) {
			$artistID = $_SESSION['loggedon']['ID'];
			$artStyle = $_POST['artStyle'];
			$title = $_POST['title'];
			$price = $_POST['price'];
			$file = $_FILES['file'];
			fpostartwork($artistID, $title, $artStyle, $price, $file);
		} elseif (isset($_POST['editArtwork'])) {
			$artworkID = $_POST['artworkID'];
			$artStyle = $_POST['artStyle'];
			$title = $_POST['title'];
			$price = $_POST['price'];
			feditartwork($artworkID, $title, $artStyle, $price);
		} elseif (isset($_POST['deleteArtwork'])) {
			$artworkID = $_POST['artworkID'];
			$file = $_POST['file'];
			fdeleteartwork($artworkID, $file);
		} elseif (isset($_POST['purchaseart'])) {
			$customerID = $_SESSION['loggedon']['ID'];
			$artworkID = $_POST['artworkID'];
			$artistID = $_POST['artistID'];
			$price = $_POST['price'];
			fpurchaseart($artworkID, $customerID, $price, $artistID);
		}
		
	}
 ?>
