<div class="modal" id="modal">
	<div class="modal-dialog">
		<div class="modal-content rounded-0 border-0">
			<div class="modal-header">
				<h4 class="modal-title" id="vtitle"></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
				<sub>Created By: <a href="#" id="vartistID"><span id="vname"></span></a> on <span id="vdate"></span> for $<span id="vprice"></span></sub>
				<img src="body/pages/artist/wall/artwork_placeholder" id="vdisplayart" width="100%" class="border p-1 mb-1">
				<sub class="text-right d-block mb-3">Artstyle: <a href="#" id="vartStyleLink"><span id="vartStyle"></span></a></sub>
			</div>

			<?php 
				if (isset($_SESSION['loggedon']) && $type == 'customer') {
			 ?>
					<div class="modal-footer">
						<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<input type="hidden" name="artworkID" id="partworkID">
							<input type="hidden" name="artistID" id="partistID">
							<input type="hidden" name="price" id="pprice">
							<button type="submit" class="btn btn-sm btn-primary rounded-0" name="purchaseart">BUY</button>
						</form>
					</div>
			<?php 
				}
			 ?>

		</div>
	</div>
</div>
