<?php 
	include 'sys/helpers.php';
	ob_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Art Gallery Management Database System</title>
	<?php 
		echo css('bootstrap.min');
		echo css('custom');
		echo js('jquery.min');
		echo js('popper.min');
		echo js('bootstrap.min');
		echo js('custom');
		echo ico('open-iconic-bootstrap');
	 ?>
</head>
<body>
	<?php 
		include 'body/navbar.php';
		include 'sys/alerts.php';
	 ?>
	<main class="py-4">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-8">
					<?php 
						if (isset($_GET['p'])) {
							$p = $_GET['p'];

							// register & login
							if ($p == 'register' && !isset($_SESSION['loggedon'])) {
								include 'body/pages/register/main.php';
							} elseif ($p == 'login' && !isset($_SESSION['loggedon'])) {
								include 'body/pages/login/main.php';
							}

							// loggedon
							elseif ($p == 'wall' && isset($_SESSION['loggedon'])) {
	
								// artist
								if ($_SESSION['loggedon']['type'] == 'artist') {
									include 'body/pages/artist/wall/main.php';
								}

								// customer
								elseif ($_SESSION['loggedon']['type'] == 'customer') {
									include 'body/pages/customer/wall/main.php';
								}

								// admin
								elseif ($_SESSION['loggedon']['type'] == 'admin') {
									include 'body/pages/admin/wall/main.php';
								}

							}

							else {
								header('Location: index.php');
								on_enf_fluch();
							}
							
						} elseif (isset($_GET['a']) || isset($_GET['s']) || !isset($_GET['a']) || !isset($_GET['s'])) {
							include 'body/pages/home/main.php';
						}
					 ?>
				</div>
			</div>
		</div>
	</main>
</body>
</html>
<?php include 'sys/functions.php'; ?>
