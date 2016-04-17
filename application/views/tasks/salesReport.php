
		
		<div class="container-fluid">
			<form class="form-horizontal" id="issueBill" onsubmit="addNewBill();return false;">
				<div class="row">
					<div class="col-md-7">
						<div class="form-group">
							<label for="billNo" class="col-md-3 control-label">Start Date :</label>
							<div class="col-md-3">
								<input type="date" class="form-control" id="billNo" name="billNo" placeholder="From" value="<?php //echo $bills->getLastBillNo()+1; ?>" />
							</div>
						</div>
                        <input type="hidden" class="form-control" id="customer_id" name="customer_id"/>
						<div class="form-group">
							<label for="name" class="col-md-3 control-label">End Date :</label>
							<div class="col-md-6">
                                <div class="input-group">
								    <input type="date" class="form-control" id="name" name="name" placeholder="Till date" />
                                </div>
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
							        	
							            <th>S.N</th>							           
							            <th>Bill Number</th>
							            <th>Date </th>
							            <th>Total Amount(Rs.)</th>
							            
							            


							        </tr>

							       <tr>
							       		<th>001</th>
															            
							            <th>4123</th>
							            <th>2016/03/14</th>		
							            
							            <th> 4500 </th>
							            

								   </tr>
							                
							        </thead>

							    </table>
						</div>
			</div>