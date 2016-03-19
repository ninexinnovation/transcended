
		
	<div class="container">
		 <form action="DataProcessing/addWorker" method="post" onsubmit="AddData(this);return false">
			<div class="form-group">
			    <label for="wrId">Worker ID</label>
			    <input type="number" class="form-control" id="wrId" placeholder="Enter Worker ID"  data-update="DataProcessing/getLatestWorkerId" data-send="false" disabled required>
  			</div>

		  	<div class="form-group">
			    <label for="wrName">Worker Name</label>
			    <input type="text" class="form-control" id="wrName" placeholder="Enter Worker Name" name="workerName" required>
		 	 </div>
   
		   
  			<button type="submit" class="btn btn-success">Submit</button>
		</form>	
	</div>
