<?php

$customer_data=$this->DataModel->getRefferal();
 ?>
<div class="grid-container">
	<div class="container">
		<div class="form-group">
			<input type="search" class="form-control" name="search" placeholder="Search" data-action="grid_search" data-search-id="customer_data">
		</div>
	</div>
	<div class="row" id="refferal_data">
	<?php
		foreach ($refferal_data as $reffer_details) {
			echo '<a class="col-md-4 col-lg-3 btn btn-default grid-btn" data-btn-type="task-result" data-view="#customerViewModal">';
			echo '<i data-send="true" data-name="id">'.$reffer_details->reffer_by.'</i>';
			echo '<span>'.$reffer_details->reffer_to.'</span>';
			echo '</a>';
		}
	?>
	</div>
</div>

