<?php

$customer_data=$this->DataModel->getCustomers();
 ?>
<div class="grid-container">
	<div class="container">
		<div class="form-group">
			<input type="search" class="form-control" name="search" placeholder="Search" data-action="grid_search" data-search-id="customer_data">
		</div>
	</div>
	<div class="row" id="customer_data">
	<?php
		foreach ($customer_data as $customer) {
			echo '<a class="col-md-4 col-lg-3 btn btn-default grid-btn" data-btn-type="task" data-view="billing">';
			echo '<i class="">'.$customer->customer_id.'</i>';
			echo '<span>'.$customer->customer_name.'</span>';
			echo '</a>';
		}
	?>
	</div>
</div>
