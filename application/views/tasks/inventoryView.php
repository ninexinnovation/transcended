<?php

$inventory_data=$this->DataModel->getInventoryItem();
 ?>
<div class="grid-container">
	<div class="container">
		<div class="form-group">
			<input type="search" class="form-control" name="search" placeholder="Search" data-action="grid_search" data-search-id="inventory_data">
		</div>
	</div>
	<div class="row" id="inventory_data">
	<?php
		foreach ($inventory_data as $inventory) {
			echo '<a class="col-md-4 col-lg-3 btn btn-default grid-btn" data-btn-type="task-result" data-view="#inventoryViewModal">';
			echo '<i data-send="true" data-name="id">'.$inventory->item_code_no.'</i>';
			echo '<span>'.$inventory->company_name.'</span>';
			echo '<span>'.$inventory->catagory_name.'</span>';
		
			echo '<span>'.$inventory->selling_price.'</span>';
			echo '<span>'.$inventory->current_quantity.'</span>';
			echo '</a>';
		}
	?>
	</div>
</div>
