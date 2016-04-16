<div class="menu main">
	<!-- data-btn-type="sub"
			>>> sub => Sub Menu
			>>> task => Task which opens in window.
	 	data-view="billing" 
			>>> billing => Name of file, either sub menu or task

		Note: 	if type="sub" then
					view file must be in "Menu/subMenu/" folder.
				if type="task" then
					view file nust be in "tasks/" folder.
	 -->
	<a class="btn btn-warning menu-btn" data-btn-type="sub" data-view="billing">
		<i class="fa fa-credit-card"></i>
		<span>Billing</span>
	</a>
	<a class="btn btn-info menu-btn" data-btn-type="sub" data-view="inventory">
		<i class="fa fa-clipboard"></i>
		<span>Inventory</span>
	</a>
	<a class="btn btn-success menu-btn" data-btn-type="sub" data-view="customer">
		<i class="fa fa-users"></i>
		<span>Customer</span>
	</a>

	<!-- break line -->
	<span class="clearfix"></span>

	<a class="btn btn-danger menu-btn" data-btn-type="task" data-view="production">
		<i class="fa fa-list"></i>
		<span>Production</span>
	</a>
	<a class="btn btn-warning menu-btn" data-btn-type="task" data-view="taskAssigned">
		<i class="fa fa-tasks"></i>
		<span>Task Assigned</span>
	</a>
	<a class="btn btn-info menu-btn" data-btn-type="sub" data-view="worker">
		<i class="fa fa-user-plus"></i>
		<span>Worker</span>
	</a>
	

	<span class="clearfix"></span>
	
	<a class="btn btn-info menu-btn" data-btn-type="task" data-view="referral">
		<i class="fa fa-tags"></i>
		<span>Referrals</span>
	</a>
	<a class="btn btn-danger menu-btn" data-btn-type="sub" data-view="user">
		<i class="fa fa-user"></i>
		<span>User</span>
	</a>
	<a class="btn btn-default menu-btn" data-btn-type="sub" data-view="reportGeneration">
		<i class="fa fa-clone"></i>
		<span>Report Generation</span>
	</a>
</div>
