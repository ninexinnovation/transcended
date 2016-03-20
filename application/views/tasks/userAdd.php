>
	<div class="container">

		 <form action="DataProcessing/addUser" method="post" onsubmit="AddData(this);return false">

			<div class="form-group">
			    <label for="UsId">User ID</label>
			    <input type="number" class="form-control" id="UsId" name="UsId" placeholder="Enter User ID" data-update="DataProcessing/getLatestuserId" data-send="false" disabled required>
  			</div>

		  	<div class="form-group">
			    <label for="UsFName">First Name</label>
			    <input type="text" class="form-control" id="UsFName" name="UsFName" placeholder="Enter User First Name" required>
		 	 </div>
   
		   	<div class="form-group">
			    <label for="UsLName">Last Name</label>
			    <input type="text" class="form-control" id="UsLName" name="UsLName" placeholder="Enter User Last Name" required>
		  	</div>

		  	<div class="form-group">
			    <label for="UsUName">User Name</label>
			    <input type="text" class="form-control" id="UsUName" name="UsUName" placeholder="Enter UserName" required>
		  	</div>

		  	<div class="form-group">
			    <label for="UsPass">Password </label>
			    <input type="text" class="form-control" id="UsPass" name="UsPass" placeholder="Enter Password" required>
		  	</div>

		  	

		  	<!-- <div class="form-group">
			    <label for="UsType">User Type </label>
			   
		    		<select class="form-control" id="UsType" name="UsType" required>
						  <option value="">Choose User Type</option>
						  
						
					</select>
		  	 </label>
		  	 
		  	</div> -->
  			<button type="submit" class="btn btn-success">Submit</button>

	</form>
</div>
