		<div class="container-fluid">
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
                                    <div class="input-group-addon" style="cursor:pointer" data-toggle="modal" data-target="#AddCustomerModal"><span class="fa fa-plus"></span></div>
                                </div>
							</div>
						</div>
						<div class="form-group">
							<label for="address" class="col-md-3 control-label">Address :</label>
							<div class="col-md-6">
								<textarea class="form-control" id="address" name="address" placeholder="Address" />
								</textarea>
							</div>
						</div>
						<button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#billItemAddModal">
                            Add Item
                        </button>
					</div>
					<div class="col-md-5">
						<div class="form-group">      
							<label for="date" class="col-md-5 control-label">Date :</label>
							<div class="col-md-5">
								<input type="text" id="date" class="form-control" value="<?php echo date("m/d/Y") ?>" placeholder="Current Date"> 
							</div>
						</div>

						<script type="text/javascript">
							$('#date').datepicker({
								todayBtn: "linked",                                         
								autoclose: true,
								todayHighlight: true
							});
						</script>

						<div class="form-group">
							<label for="phone" class="col-md-5 control-label">Phone Number :</label>
							<div class="col-md-6">
								<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" />
							</div>
						</div>
						
					</div>
				</div>

				<!-- ITEM TABLE -->

				
				<div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="billItem-table">
                        <thead>
                            <tr>
                                <th>Details cloth id</th>
                                <th>Details cloth cost</th>
                                <th>Details cloth length</th>
                                <th>Details cloth category id</th>
                                <th>Details wage</th>
                                <th>Quantity</th>
                                <th>S.No</th>
                                <th>Details</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
        		</div>
        		<div class="row">
        			<div class="col-md-5">
        				<div class="form-group">      
							<label for="deliveryDate" class="col-md-5 control-label">Delivery Date :</label>
							<div class="col-md-5">
								<input type="text" id="deliveryDate" class="form-control" placeholder="Delivery Date"> 
							</div>
						</div>
                        <div class="form-group">      
                            <label for="remarks" class="col-md-5 control-label">Remarks :</label>
                            <div class="col-md-5">
                                <textarea id="remarks" class="form-control" placeholder="Remarks"></textarea>
                            </div>
                        </div>

						<script type="text/javascript">
							$('#deliveryDate').datepicker({
								todayBtn: "linked",                                         
								autoclose: true,
								todayHighlight: true
							});
						</script>

        			</div>
        			<div class="col-md-7">
        				<div class="form-group">
							<label for="subTotal" class="col-md-5 control-label">Sub-Total :</label>
							<div class="col-md-6">
								<input type="text" class="form-control" id="subTotal" name="subTotal" placeholder="Sub-Total" readonly />
							</div>
						</div>
						<div class="form-group">
							<label for="paid" class="col-md-5 control-label">Paid :</label>
							<div class="col-md-6">
								<input type="text" class="form-control" id="paid" name="paid" value="0" placeholder="Paid" />
							</div>
						</div>
						<div class="form-group">
							<label for="total" class="col-md-5 control-label">Total :</label>
							<div class="col-md-6">
								<input type="text" class="form-control" id="total" name="total" placeholder="Total" readonly />
							</div>
						</div>
        			</div>
        		</div>
                
                <button type="submit" name="save" style="width:150px" class="btn btn-primary">Save</button>
                <button type="Reset" name="Cancel" class="btn btn-default" onclick="clearBillItemData();updateBillNo();">Clear</button>
			</form>
		</div>

		<script type="text/javascript">
	billItem_table=$('#billItem-table').DataTable({
		"paging":false,
		"searching":false,
		"columnDefs": [
		    { "width": "170%","targets":[6,8] }
		  ],
		"columns":[
			{"data":"details_cloth_id"},
			{"data":"details_cloth_cost"},
			{"data":"details_cloth_length"},
			{"data":"details_cloth_category_id"},
			{"data":"details_wage"},
			{"data":"quantity"},
            {"data":"sNo"},
			{"data":"details"},
			{"data":"amount"}
		]
    });
    billItem_table.columns([0,1,2,3,4,5]).visible(false);
    </script>
	
