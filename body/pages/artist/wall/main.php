<div class="card rounded-0">
	<div class="card-header rounded-0">Your Wall</div>
	<div class="card-body">
		<div class="row mb-3">
			<div class="col">
				<button type="button" class="btn btn-warning btn-sm text-light rounded-0 float-right" data-toggle="modal" data-target="#add"><span class="oi oi-plus"></span></button>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<?php include 'main_view.php'; ?>
			</div>
		</div>
	</div>
</div>
<?php 
	include 'main_add.php';
	include 'main_edit.php';
 ?>
