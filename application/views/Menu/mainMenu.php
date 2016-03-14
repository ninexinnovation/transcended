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
		<i class="fa fa-picture-o"></i>
		<span>Billing</span>
	</a>
	<a class="btn btn-info menu-btn" data-btn-type="sub" data-view="inventory">
		<i class="fa fa-picture-o"></i>
		<span>Inventory</span>
	</a>
	<a class="btn btn-success menu-btn" data-btn-type="sub" data-view="customer">
		<i class="fa fa-picture-o"></i>
		<span>Customer</span>
	</a>

	<!-- break line -->
	<span class="clearfix"></span>

	<a class="btn btn-danger menu-btn" data-btn-type="task" data-view="production">
		<i class="fa fa-picture-o"></i>
		<span>Production</span>
	</a>
	<a class="btn btn-warning menu-btn" data-btn-type="task" data-view="taskAssigned">
		<i class="fa fa-picture-o"></i>
		<span>Task Assigned</span>
	</a>
	<a class="btn btn-info menu-btn" data-btn-type="sub" data-view="worker">
		<i class="fa fa-picture-o"></i>
		<span>Worker</span>
	</a>
	

	<span class="clearfix"></span>
	
	<a class="btn btn-info menu-btn" data-btn-type="task" data-view="referral">
		<i class="fa fa-picture-o"></i>
		<span>Referrals</span>
	</a>
	<a class="btn btn-danger menu-btn" data-btn-type="sub" data-view="user">
		<i class="fa fa-user"></i>
		<span>User</span>
	</a>
	<a class="btn btn-default menu-btn" data-btn-type="sub" data-view="setting">
		<i class="fa fa-cog"></i>
		<span>Settings</span>
	</a>
</div>