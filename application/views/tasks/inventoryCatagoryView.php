<?php

$inventoryCatagory_data=$this->DataModel->getInventoryItemCatagoryId();
 ?>
<div class="grid-container">
	<div class="container">
		<div class="form-group">
			<input type="search" class="form-control" name="search" placeholder="Search" data-action="grid_search" data-search-id="inventoryCatagory_data">
		</div>
	</div>
	<div class="row" id="inventoryCatagory_data">
	<?php
		foreach ($inventoryCatagory_data as $inventoryCatagory) {
			echo '<a class="col-md-4 col-lg-3 btn btn-default grid-btn" data-btn-type="task-result" data-view="#inventoryCatagoryViewModalLabel">';
			echo '<i data-send="true" data-name="id">'.$inventoryCatagory->catagory_id.'</i>';
		
			echo '<span>'.$inventoryCatagory->catagory_name.'</span>';
			echo '<span>'.$inventoryCatagory->stiching_charge.'</span>';
			echo '</a>';
		}
	?>
	</div>
</div>
