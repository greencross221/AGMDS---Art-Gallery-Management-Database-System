<div class="card rounded-0">
	<div class="card-header rounded-0">
		<div class="dropdown">
			<span class="dropdown-toggle rounded-0" data-toggle="dropdown">
				<?php 
					if (isset($_GET['r'])) {
						$r = $_GET['r'];

						if ($r == 'customer') {
							echo 'Customer';
						} elseif ($r == 'artist') {
							echo 'Artist';
						}

					} else {
						echo 'Account Type';
					}
				 ?>
			</span>
			<div class="dropdown-menu rounded-0">
				<a class="dropdown-item" href="index.php?p=register&r=artist">Artist</a>
				<a class="dropdown-item" href="index.php?p=register&r=customer">Customer</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<?php 
			if (isset($_GET['r'])) {
				$r = $_GET['r'];

				if ($r == 'customer') {
					include 'body/pages/register/main_customer.php';
				} elseif ($r == 'artist') {
					include 'body/pages/register/main_artist.php';
				} else {
					header('Location: index.php?p=register');
				}

			} else {
				echo 'Please select an account type.';
			}
		 ?>
	</div>
</div>
