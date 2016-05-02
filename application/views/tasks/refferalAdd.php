<div class="container">
	<form action="DataProcessing/addRefferal" method="post" onsubmit="AddData(this);return false">
		
		<div class="panel-body">
				<div class="form-group">
				    <label for="name">Reffer ID</label>
				    <input type="number" class="form-control" id="ClId" placeholder="Enter Reffer ID" disabled required>
	  			</div>

			  	<div class="form-group">
				    <label for="name">Reffer By</label>
				    <input type="text" class="form-control" id="ClName" placeholder="Enter Reffer by" required>
			 	 </div>
	   
			   	<div class="form-group">
				    <label for="name">Reffer to</label>
				    <input type="text" class="form-control" id="ClName" placeholder="Enter Reffer To" required>
			  	</div>
			  	<div class="form-group">
				    <label for="name">Royalty</label>
				    <input type="text" class="form-control" id="ClName" placeholder="Royalty" required>
			  	</div>
	  			<button type="submit" class="btn btn-success">Submit</button>

		</div>
	</form>
</div>
