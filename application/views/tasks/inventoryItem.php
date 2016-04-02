<div class="container">
	<form method="post" action="DataProcessing/addItem" onsubmit="AddData(this);return false">

		<div class="form-group">
		    <label for="itemId">Item ID</label>
		    <input type="number" class="form-control" id="itemId" data-send="false" data-update="DataProcessing/getLatestInventoryId" name="itemId" placeholder="Enter Item ID" disabled required>
		</div>

	  	<div class="form-group">
		    <label for="companyName">Company Name</label>
			    <select class="form-control" id="companyName" name="companyName" placeholder="Enter COmpany Name" data-update="DataProcessing/getCompanies" data-model="#addCompanyInventory" required>
		 				<option value="">Choose Company</option>
		 				<option> </option>
				</select>

	 	</div>

	   	<div class="form-group">
		    <label for="catagory">Category</label>
	    		<select class="form-control" id="Category" name="Category" data-update="DataProcessing/getItemCatagories" required>
					  	<option value="">Choose Item Type</option>
				</select>
	  	 	</label>
	  	</div>

	  	<div class="form-group">
		    <label for="addedDate">Added Date</label>
		    <input type="date" class="form-control" id="addedDate" name="addedDate" placeholder="Enter Added Date" required>
	  	</div>

	  	<div class="form-group">
		    <label for="sellingPrice">Selling Price</label>
		    <input type="text" class="form-control" id="sellingPrice" name="sellingPrice" placeholder="Enter Selling Price" required>
	  	</div>

		<button type="submit" class="btn btn-success">Submit</button>
	</form>
	
</div>
