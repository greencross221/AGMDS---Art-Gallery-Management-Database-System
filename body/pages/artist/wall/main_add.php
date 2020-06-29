<div class="modal" id="add">
	<div class="modal-dialog">
		<div class="modal-content rounded-0 border-0">

			<div class="modal-header">
				<h4 class="modal-title">Add Artwork</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			
			<div class="modal-body">
				<img src="body/pages/artist/wall/artwork_placeholder" id="displayart" width="100%" class="border p-1 mb-2">
				<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
					<div class="custom-file mb-5">
						<input type="file" name="file" id="file" class="custom-file-input" accept="image/x-png, image/jpeg" onchange="uploadart(this)" required>
						<label for="file" class="custom-file-label rounded-0">Choose file...</label>
					</div>

					<div class="form-group row">
						<label for="title" class="col-4 col-form-label text-right">Title</label>
						<div class="col-6">
							<input type="text" name="title" id="title" class="form-control rounded-0" required autofocus>
						</div>
					</div>

					<div class="form-group row">
						<label for="artStyle" class="col-4 col-form-label text-right">Art Style</label>
						<div class="col-6">
							<select name="artStyle" id="artStyle" class="form-control rounded-0" required>
								<option disabled selected value>Select an Option</option>
								<option>Abstract Expressionism</option>
								<option>Art Noveau</option>
								<option>Avant-garde</option>
								<option>Classicism</option>
								<option>Conceptual Art</option>
								<option>Constructivism</option>
								<option>Cubism</option>
								<option>Dadaism</option>
								<option>Expressionism</option>
								<option>Fauvism</option>
								<option>Futurism</option>
								<option>Impressionism</option>
								<option>Installation Art</option>
								<option>Land Art</option>
								<option>Minimalism</option>
								<option>Neo-Impressionism</option>
								<option>Neo-Classicism</option>
								<option>Performance Art</option>
								<option>Pointillism</option>
								<option>Pop Art</option>
								<option>Post Impressionism</option>
								<option>Rococo</option>
								<option>Surrealism</option>
								<option>Supermatism</option>
							</select>
						</div>
					</div>

					<div class="form-group row">
						<label for="price" class="col-4 col-form-label text-right">Price</label>
						<div class="col-6">
							<input type="number" name="price" id="price" class="form-control rounded-0" min="0.01" max="9999999.99" step="0.01" value="1.00" required>
						</div>
					</div>
			
					<div class="form-group row mb-0">
						<div class="col-8 offset-4">
							<button type="submit" class="btn btn-primary rounded-0" name="postArtwork">Post</button>
						</div>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>
