<?php

$user_data=$this->DataModel->getUsers();
 ?>
<div class="grid-container">
	<div class="container">
		<div class="form-group">
			<input type="search" class="form-control" name="search" placeholder="Search" data-action="grid_search" data-search-id="user_data">
		</div>
	</div>
	<div class="row" id="user_data">
	<?php
		foreach ($user_data as $user) {
			echo '<a class="col-md-4 col-lg-3 btn btn-default grid-btn"data-btn-type="task-result" data-view="#userViewModal">';
			echo '<i data-send="true" data-name="id">'.$user->user_id.'</i>';
			echo '<span>'.$user->user_name.'</span>';
			echo '</a>';
		}
	?>
	</div>
</div>
