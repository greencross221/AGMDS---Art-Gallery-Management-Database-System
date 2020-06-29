<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
	<div class="container">
		<a href="index.php" class="navbar-brand"><strong>Art Gallery Management Database System</strong></a>
	</div>
	<ul class="navbar-nav ml-auto">
		<?php 
			// loggedon
			if (isset($_SESSION['loggedon'])) {
		 ?>
				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						<span class="oi oi-person"></span> <?php echo $_SESSION['loggedon']['name']; ?>
						<span class="caret"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right rounded-0" aria-labelledby="navbarDropdown">
					<?php 

						// artist
						if ($_SESSION['loggedon']['type'] == 'artist') {
					 ?>
							<a href="index.php?p=wall" class="dropdown-item">Your Wall</a>
					<?php 

						// customer
						} elseif ($_SESSION['loggedon']['type'] == 'customer') {
					 ?>
							<a href="index.php?p=wall" class="dropdown-item">Purchased Artworks</a>
					<?php 

						// admin
						} elseif ($_SESSION['loggedon']['type'] == 'admin') {
					 ?>
							<a href="index.php?p=wall" class="dropdown-item">Total Sales</a>
					<?php 
						}
					 ?>
					</div>
				</li>
				<a href="body/pages/login/main_logout.php" class="btn btn-warning text-light rounded-0"><span class="oi oi-account-logout"></span></a>
		<?php 
			}

			// loggedoff
			else {
		 ?>
				<li class="nav-item">
					<a class="nav-link" href="index.php?p=login">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link bg-warning text-light" href="index.php?p=register">Register</a>
				</li>
		<?php } ?>
	</ul>
</nav>
