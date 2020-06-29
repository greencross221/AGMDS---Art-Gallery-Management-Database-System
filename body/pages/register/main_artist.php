<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<div class="form-group row">
		<label for="name" class="col-4 col-form-label text-right">Name</label>
		<div class="col-6">
			<input type="text" name="name" id="name" class="form-control rounded-0" required autofocus>
		</div>
	</div>

	<div class="form-group row">
		<label for="contact" class="col-4 col-form-label text-right">Contact</label>
		<div class="col-6">
			<input type="tel" name="contact" id="contact" class="form-control rounded-0" pattern="[0]{1}[9]{1}[0-9]{2}-[0-9]{3}-[0-9]{4}" placeholder="09XX-XXX-XXXX" required>
		</div>
	</div>

	<div class="form-group row">
		<label for="birthdate" class="col-4 col-form-label text-right">Birthdate</label>
		<div class="col-6">
			<input type="date" name="birthdate" id="birthdate" class="form-control rounded-0" required>
		</div>
	</div>

	<div class="form-group row">
		<label for="email" class="col-4 col-form-label text-right">Email</label>
		<div class="col-6">
			<input type="email" name="email" id="email" class="form-control rounded-0" placeholder="@email.com" required>
		</div>
	</div>
	
	<div class="form-group row">
		<label for="password" class="col-4 col-form-label text-right">Password</label>
		<div class="col-6">
			<input type="password" name="password" id="password" class="form-control rounded-0" minlength="8" placeholder="minimum of 8 characters" required>
		</div>
	</div>
	
	<div class="form-group row mb-0">
		<div class="col-8 offset-4">
			<button type="submit" class="btn btn-primary rounded-0" name="registerArtist">Register</button>
		</div>
	</div>
</form>
