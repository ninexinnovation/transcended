
	<div class="container">
		 <form action="DataProcessing/addCustomer" method="post" onsubmit="AddData(this);return false">

			<div class="form-group">
			    <label for="CusId">Customer ID</label>
			    <input type="number" class="form-control" id="CusId" name="CusId" placeholder="Enter Clerk ID" data-update="DataProcessing/getLatestcustomerId" data-send="false" disabled required>
  			</div>

		  	<div class="form-group">
			    <label for="CusName">Customer Name</label>
			    <input type="text" class="form-control" id="CusName" name="CusName" placeholder="Enter Clerk Name" required>
		 	 </div>
   
		   	<div class="form-group">
			    <label for="CusAddress">Customer Address</label>
			    <input type="text" class="form-control" id="CusAddress" name="CusAddress" placeholder="Enter Clerk Name" required>
		  	</div>
		  	<div class="form-group">
			    <label for="CusPhone">Customer Phone number</label>
			    <input type="text" class="form-control" id="CusPhone" name="CusPhone" placeholder="Enter Clerk Name" required>
		  	</div>
  			<button type="submit" class="btn btn-success">Submit</button>
  		</form>

	</div>

