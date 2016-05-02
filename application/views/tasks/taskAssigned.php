<?php

$worker_data=$this->DataModel->getWorkers();
 ?>
<div class="grid-container">
	<div class="container">
		<div class="form-group">
			<input type="search" class="form-control" name="search" placeholder="Search" data-action="grid_search" data-search-id="worker_data">
		</div>
	</div>
	<div class="row" id="worker_data">
	<?php
		foreach ($worker_data as $worker) {
			echo '<a class="col-md-4 col-lg-3 btn btn-default grid-btn" data-btn-type="task-result" data-view="#taskViewModal">';
			echo '<i data-send="true" data-name="id">'.$worker->worker_id.'</i>';
			echo '<span>'.$worker->worker_name.'</span>';
			echo '</a>';
		}
	?>
	<!-- this is for worker view -->
	</div>
</div>