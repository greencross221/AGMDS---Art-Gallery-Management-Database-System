<div class="card rounded-0">
	<div class="card-header rounded-0">Login</div>
	<div class="card-body">

		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="form-group row">
				<label for="email" class="col-4 col-form-label text-right">Email</label>
				<div class="col-6">
					<input type="text" name="email" id="email" class="form-control rounded-0" required autofocus>
				</div>
			</div>

			<div class="form-group row">
				<label for="password" class="col-4 col-form-label text-right">Password</label>
				<div class="col-6">
					<input type="password" name="password" id="password" class="form-control rounded-0" required>
				</div>
			</div>
			
			<div class="form-group row mb-0">
				<div class="col-8 offset-4">
					<button type="submit" class="btn btn-primary rounded-0" name="loginAccount">Login</button>
				</div>
			</div>
		</form>
	
	</div>
</div>
