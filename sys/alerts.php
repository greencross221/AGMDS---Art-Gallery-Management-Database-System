<?php 
	if (isset($_SESSION['success'])) {
 ?>
		<div class="alert alert-success alert-dismissible rounded-0">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo $_SESSION['success']; ?>
		</div>
<?php 
	} elseif (isset($_SESSION['error'])) {
 ?>
		<div class="alert alert-danger alert-dismissible rounded-0">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo $_SESSION['error']; ?>
		</div>
<?php 
	}

	unset($_SESSION['success']);
	unset($_SESSION['error']);
 ?>