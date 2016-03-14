<div class="sales" data-content="sales-newBill" >
	<div class="panel panel-primary">
		
		<div class="panel-body">
			<form class="form-horizontal" id="issueBill" onsubmit="addNewBill();return false;">
				<div class="row">
					<div class="col-md-7">
						<div class="form-group">
							<label for="billNo" class="col-md-3 control-label">Bill No. :</label>
							<div class="col-md-3">
								<input type="number" class="form-control" id="billNo" name="billNo" placeholder="Bill No" value="<?php //echo $bills->getLastBillNo()+1; ?>" />
							</div>
						</div>
                        <input type="hidden" class="form-control" id="customer_id" name="customer_id"/>
						<div class="form-group">
							<label for="name" class="col-md-3 control-label">Name :</label>
							<div class="col-md-6">
                                <div class="input-group">
								    <input type="text" class="form-control" id="name" name="name" placeholder="Customer Name" />
                                </div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="col-md-3 control-label">Phone Number :</label>
							<div class="col-md-6">
                                <div class="input-group">
								    <input type="text" class="form-control" id="name" name="name" placeholder="Customer Name" />
                                </div>
							</div>
						</div>
					<!-- </div>
				</div> -->
				
					</div>
					<div class="col-md-5">
						<div class="form-group">      
							<label for="date" class="col-md-5 control-label">Date :</label>
							<div class="col-md-5">
								<input type="text" id="date" class="form-control" value="<?php echo date("m/d/Y") ?>" placeholder="Current Date"> 
							</div>
						
						</div>

					</div>
					<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#billItemAddModal">
                            Search Item
                        </button>
				</div>

<br/>
<br/>
<hr/>







						<div class="table-responsive">
							    <table class="table table-striped">
							        <thead>
							        <tr>
							        	<th>Order Date</th> 
							            <th>S.N</th>
							            <th>Bill Number</th>
							            <th>no. of Coat</th>
							            <th> No. of arrived Coat</th>
							            <th>no. of Pants</th>
							            <th>no. of arrived Pants</th>
							            <th>no. of Shirts</th>
							            <th>no. of arrived Shirts</th>
							            <th>Customer Name </th>
							            <th>Phone Number</th>
							            <th>Remarks</th>
							            


							        </tr>

							       <tr>
										<th>2016/03/14</th>
							            <th>001</th>
							            <th>4123</th>
							            <th>2</th>
							            <th>1</th>
							            <th>1</th>
							            <th>2</th>
							            <th>0</th>
							            <th>0</th>
							            <th>Rumesh Udash</th> 
							            <th> 9849274099 </th>
							            <th> None </th>

								   </tr>
							                
							        </thead>

							    </table>
						</div>
			</div>
	</div>
</div>
