<?php
require_once('../init.php');
$db=new Db;
$bills=new Bills;
?>
<div class="sales" data-content="sales-main" style="display:block">
	<div class="row">
		<div class="col-md-3 col-sm-6">
			<a href="#!sales/newBill">
				<div class="panel panel-primary text-center no-boder bg-color-red">
	                <div class="panel-body">
	                    <i class="fa fa-plus-square-o fa-5x"></i>
	                    <h3>New Bill</h3>
	                </div>
	                <div class="panel-footer back-footer-red">
	                   
	                </div>
	            </div>
            </a>
		</div>
		<!-- <div class="col-md-3 col-sm-6">
			<a href="#!sales/viewBill">
				<div class="panel panel-primary text-center no-boder bg-color-green">
	                <div class="panel-body">
	                    <i class="fa fa-file-o fa-5x"></i>
	                    <h3>View Bill</h3>
	                </div>
	                <div class="panel-footer back-footer-green">
	                   
	                </div>
	            </div>
            </a>
		</div> -->
	</div>
</div>
<div class="sales" data-content="sales-newBill" style="display:none">
	<div class="panel panel-primary">
		<div class="panel-heading">
			Issue a Bill
		</div>
		<div class="panel-body">
			<form class="form-horizontal" id="issueBill" onsubmit="addNewBill();return false;">
				<div class="row">
					<div class="col-md-7">
						<div class="form-group">
							<label for="billNo" class="col-md-3 control-label">Bill No. :</label>
							<div class="col-md-3">
								<input type="number" class="form-control" id="billNo" name="billNo" placeholder="Bill No" value="<?php echo $bills->getLastBillNo()+1; ?>" />
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
	</div>
</div>
<div class="sales" data-content="sales-viewBill" style="display:none">
	view
</div>

<!-- MODAL START -->
<div class="modal fade" id="billItemEditModal" tabindex="-1" role="dialog" aria-labelledby="billItemEditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="billItemEditModalLabel">Edit Bill Item</h4>
            </div>
            <form class="form-horizontal" onsubmit="editBillItem();return false;">
                <div class="modal-body">
                	<input type="hidden" id="tableIndexEdit" name="tableIndexEdit" />
                    <input type="hidden" id="billClothIdAdd" name="billClothIdAdd" />
                    <div class="form-group">
                        <label for="shadeNo" class="col-md-3 control-label">Shade No.:</label>
                        <div class="col-md-9">
                            <select class="form-control" id="shadeNo" name="shadeNo">
                            	<optgroup>
                            		<option value="0">Other</option>
                            	</optgroup>
                            	<optgroup id="optGroupShadeNo">
                            	</optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="clothDetails" class="col-md-3 control-label">Cloth Details :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="clothDetails" name="clothDetails" placeholder="Cloth Details" readonly/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="clothCost" class="col-md-3 control-label">Cloth Cost :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="clothCost" name="clothCost" placeholder="Cost per m" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-md-3 control-label">Category :</label>
                        <div class="col-md-9">
                            <select class="form-control" id="category" name="category">
                            	<optgroup>
                            		<option value="0">Other</option>
                            	</optgroup>
                            	<optgroup id="optGroupCategory">
                            	</optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="length" class="col-md-3 control-label">Length :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="length" name="length" placeholder="Length" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="wage" class="col-md-3 control-label">Wage :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="wage" name="wage" placeholder="Wage" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="col-md-3 control-label">Quantity :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="quantity" name="quantity" value="1" placeholder="Quantity" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onclick="deleteBillItem();">Delete</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="billItemAddModal" tabindex="-1" role="dialog" aria-labelledby="billItemAddModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="billItemAddModalLabel">Add Bill Item</h4>
            </div>
            <form class="form-horizontal" onsubmit="addBillItem();return false;">
                <div class="modal-body">
                    <input type="hidden" id="billClothIdAdd" name="billClothIdAdd" />
                    <div class="form-group">
                        <label for="shadeNo" class="col-md-3 control-label">Shade No.:</label>
                        <div class="col-md-9">
                            <select class="form-control" id="shadeNo" name="shadeNo">
                            	<optgroup>
                            		<option value="0">Other</option>
                            	</optgroup>
                            	<optgroup id="optGroupShadeNo">
                            	</optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="clothDetails" class="col-md-3 control-label">Cloth Details :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="clothDetails" name="clothDetails" placeholder="Cloth Details" readonly/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="clothCost" class="col-md-3 control-label">Cloth Cost :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="clothCost" name="clothCost" placeholder="Cost per m" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="category" class="col-md-3 control-label">Category :</label>
                        <div class="col-md-9">
                            <select class="form-control" id="category" name="category">
                            	<optgroup>
                            		<option value="0">Other</option>
                            	</optgroup>
                            	<optgroup id="optGroupCategory">
                            	</optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="length" class="col-md-3 control-label">Length :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="length" name="length" placeholder="Length" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="wage" class="col-md-3 control-label">Wage :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="wage" name="wage" placeholder="Wage" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="col-md-3 control-label">Quantity :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="quantity" name="quantity" value="1" placeholder="Quantity" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="AddCustomerModal" tabindex="-1" role="dialog" aria-labelledby="AddCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="AddCustomerModalLabel">Add Customer</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="addCustomer-table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Address</th>
                                <th>Phone No.</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="btnAddCustomer">Select</button>
            </div>
        </div>
    </div>
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
   	$('#billItemAddModal').on('shown.bs.modal', function () {
   		$.ajax({
	        dataType:"json",
	        method:"GET",
	        url:"ajax/getAllInventoryJson.php"
	    }).done(function(msg){
	        // console.log(msg);
	        $("#billItemAddModal #optGroupShadeNo").text("");
	        for (var i = 0 ; i <= msg.data.length - 1; i++) {
	        	$("#billItemAddModal #optGroupShadeNo").append("<option value='"+msg.data[i]['cloth_id']+"'>"+msg.data[i]['cloth_shade_no']+"</option>");
	        	// console.log(i);
	        }
	    }).fail(function( jqXHR, textStatus ) {
	      alert( "Request failed: " + textStatus );
	    });

	    $.ajax({
	        dataType:"json",
	        method:"GET",
	        url:"ajax/getAllBillItemCategory.php"
	    }).done(function(msg){
	        // console.log(msg);
	        $("#billItemAddModal #optGroupCategory").text("");
	        for (var i = 0 ; i <= msg.data.length - 1; i++) {
	        	$("#billItemAddModal #optGroupCategory").append("<option value='"+msg.data[i]['0']+"'>"+msg.data[i]['1']+"</option>");
	        	// console.log(i);
	        }
	    }).fail(function( jqXHR, textStatus ) {
	      alert( "Request failed: " + textStatus );
	    });
	    
	    $('#shadeNo').focus();
	});
	$("#billItemAddModal #shadeNo").on("change",function(){
		var id=$(this).val();
		$.ajax({
	        dataType:"json",
	        method:"GET",
	        url:"ajax/getInventoryByIdJson.php",
	        data:{id:id}
	    }).done(function(msg){
	        // console.log(msg);
	        $("#billItemAddModal #billClothIdAdd").val(msg.data['cloth_id']);
        	$("#billItemAddModal #clothDetails").val(msg.data['cloth_details']);
        	$("#billItemAddModal #clothCost").val(msg.data['cloth_cost']);
	    }).fail(function( jqXHR, textStatus ) {
	      alert( "Request failed: " + textStatus );
	    });
	});
	$("#billItemEditModal #shadeNo").on("change",function(){
		var id=$(this).val();
		$.ajax({
	        dataType:"json",
	        method:"GET",
	        url:"ajax/getInventoryByIdJson.php",
	        data:{id:id}
	    }).done(function(msg){
	        // console.log(msg);
	        $("#billItemEditModal #billClothIdAdd").val(msg.data['cloth_id']);
        	$("#billItemEditModal #clothDetails").val(msg.data['cloth_details']);
        	$("#billItemEditModal #clothCost").val(msg.data['cloth_cost']);
	    }).fail(function( jqXHR, textStatus ) {
	      alert( "Request failed: " + textStatus );
	    });
	});

	$('#billItem-table tbody').on( 'dblclick', 'tr', function (e) {
        var rowData = billItem_table.row(this).data();
        var index=billItem_table.row(this).index();
        if(rowData!=undefined){
	        $.ajax({
		        dataType:"json",
		        method:"GET",
		        url:"ajax/getAllInventoryJson.php"
		    }).done(function(msg){
		        console.log(msg);
		        $("#optGroupShadeNo").text("");
		        for (var i = 0 ; i <= msg.data.length - 1; i++) {
		        	$("#billItemEditModal #optGroupShadeNo").append("<option value='"+msg.data[i]['cloth_id']+"'>"+msg.data[i]['cloth_shade_no']+"</option>");
		        	// console.log(i);
		        }

		        $.ajax({
			        dataType:"json",
			        method:"GET",
			        url:"ajax/getAllBillItemCategory.php"
			    }).done(function(msg){
			        // console.log(msg);
			        $("#optGroupCategory").text("");
			        for (var i = 0 ; i <= msg.data.length - 1; i++) {
			        	$("#billItemEditModal #optGroupCategory").append("<option value='"+msg.data[i]['0']+"'>"+msg.data[i]['1']+"</option>");
			        	// console.log(i);
			        }
			        	$("#billItemEditModal #tableIndexEdit").val(index);
				        $("#billItemEditModal #shadeNo").val(rowData.details_cloth_id);
						$("#billItemEditModal #billClothIdAdd").val(rowData.details_cloth_id);
						$("#billItemEditModal #clothCost").val(rowData.details_cloth_cost);
						$("#billItemEditModal #length").val(rowData.details_cloth_length);
						$("#billItemEditModal #category").val(rowData.details_cloth_category_id);
						$("#billItemEditModal #wage").val(rowData.details_wage);
						$("#billItemEditModal #quantity").val(rowData.quantity);
                        $.ajax({
                            dataType:"json",
                            method:"GET",
                            url:"ajax/getInventoryByIdJson.php",
                            data:{id:rowData.details_cloth_id}
                        }).done(function(msg){
                            console.log(msg);
                            $("#billItemEditModal #clothDetails").val(msg.data['cloth_details']);
                        }).fail(function( jqXHR, textStatus ) {
                          alert( "Request failed: " + textStatus );
                        });
                        // console.log(rowData);
				        $("#billItemEditModal").modal('show');
				        
			    }).fail(function( jqXHR, textStatus ) {
			      alert( "Request failed: " + textStatus );
			    });
		    }).fail(function( jqXHR, textStatus ) {
		      alert( "Request failed: " + textStatus );
		    });   
		    $('#shadeNo').focus();
		}
    } );
    $('#billItem-table tbody').on( 'click', 'tr', function (e) {
        if ($(window).width() < 768){
            var rowData = billItem_table.row(this).data();
	        var index=billItem_table.row(this).index();
	        if(rowData!=undefined){
		        $.ajax({
			        dataType:"json",
			        method:"GET",
			        url:"ajax/getAllInventoryJson.php"
			    }).done(function(msg){
			        // console.log(msg);
			        $("#optGroupShadeNo").text("");
			        for (var i = 0 ; i <= msg.data.length - 1; i++) {
			        	$("#billItemEditModal #optGroupShadeNo").append("<option value='"+msg.data[i]['cloth_id']+"'>"+msg.data[i]['cloth_shade_no']+"</option>");
			        	// console.log(i);
			        }

			        $.ajax({
				        dataType:"json",
				        method:"GET",
				        url:"ajax/getAllBillItemCategory.php"
				    }).done(function(msg){
				        // console.log(msg);
				        $("#optGroupCategory").text("");
				        for (var i = 0 ; i <= msg.data.length - 1; i++) {
				        	$("#billItemEditModal #optGroupCategory").append("<option value='"+msg.data[i]['0']+"'>"+msg.data[i]['1']+"</option>");
				        	// console.log(i);
				        }
				        	$("#billItemEditModal #tableIndexEdit").val(index);
					        $("#billItemEditModal #shadeNo").val(rowData.details_cloth_id);
							$("#billItemEditModal #billClothIdAdd").val(rowData.details_cloth_id);
							$("#billItemEditModal #clothCost").val(rowData.details_cloth_cost);
							$("#billItemEditModal #length").val(rowData.details_cloth_length);
							$("#billItemEditModal #category").val(rowData.details_cloth_category_id);
							$("#billItemEditModal #wage").val(rowData.details_wage);
							$("#billItemEditModal #quantity").val(rowData.quantity);
							// $("#billItemEditModal #clothDetails").val();

					        $("#billItemEditModal").modal('show');
					        // console.log(rowData);
				    }).fail(function( jqXHR, textStatus ) {
				      alert( "Request failed: " + textStatus );
				    });
			    }).fail(function( jqXHR, textStatus ) {
			      alert( "Request failed: " + textStatus );
			    });   
			    $('#shadeNo').focus();
			}
	        
        }
    });
	$('#issueBill #paid').on( 'keyup', function (e) {
		var subTotal=$("#issueBill #subTotal").val();
		var paid=$("#issueBill #paid").val();
        if(paid!="")
            $("#issueBill #total").val(""+eval(subTotal+"-"+paid));
        else
            $("#issueBill #total").val(subTotal);
	});
	// $('#issueBill #subTotal').on( 'change', function (e) {
	// 	alert("fasdfasf");
	// 	// var subTotal=$("#issueBill #subTotal").val();
	// 	// var paid=$("#issueBill #paid").val();
	// 	// var total=eval(subTotal+"-"+paid);
	// 	// console.log(subTotal+paid+total);
	// 	// $("#issueBill #total").val(total);
	// });

    var addCustomer_table=$('#addCustomer-table').DataTable({
        // "deferRender": true,
        "ajax":"ajax/getAllCustomerJson.php",
        "columns":[
            {"data":"customer_id"},
            {"data":"fname"},
            {"data":"lname"},
            {"data":"address"},
            {"data":"phone"}
        ]
    });
    addCustomer_table.columns([0]).visible(false);
    $('#AddCustomerModal').on('shown.bs.modal', function () {
        $('#addCustomer-table').DataTable().ajax.reload(null,false);
    }); 
    $('#addCustomer-table tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            addCustomer_table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
    $('#btnAddCustomer').on( 'click', function () {
        var rowData=addCustomer_table.row(".selected").data();
        if(rowData!=undefined){
            $("#customer_id").val(rowData.customer_id);
            $("#name").val(rowData.fname+" "+rowData.lname);
            $("#address").val(rowData.address);
            $("#phone").val(rowData.phone);
            $('#AddCustomerModal').modal('hide')
        }
    });
    $('#addCustomer-table tbody').on( 'dblclick', 'tr', function (e) {
        var rowData = addCustomer_table.row(this).data();
        if(rowData!=undefined){
            $("#customer_id").val(rowData.customer_id);
            $("#name").val(rowData.fname+" "+rowData.lname);
            $("#address").val(rowData.address);
            $("#phone").val(rowData.phone);
            $('#AddCustomerModal').modal('hide')
        }
    } );
    function updateBillNo(){
        $.get("ajax/getLastBillNo.php").done(function(msg){
            $("#billNo").val(eval(msg+"+1"));
        });
    }
	function addBillItem(){
		var shadeNo=$("#billItemAddModal #shadeNo").val();
		var cost=$("#billItemAddModal #clothCost").val();
		var category=$("#billItemAddModal #category").val();
		if(cost=="" & shadeNo!=0){
			appendAlert("Cost can't be Empty","danger",3000);
			return false;
		}
		var length=$("#billItemAddModal #length").val();
		if(length=="" & shadeNo!=0){
			appendAlert("Length can't be Empty","danger",3000);
			return false;
		}
		var wage=$("#billItemAddModal #wage").val();
		if(wage==""){
			appendAlert("Wage can't be Empty","danger",3000);
			return false;
		}
		var quantity=$("#billItemAddModal #quantity").val();
		if(quantity==""){
			appendAlert("Quantity can't be Empty","danger",3000);
			return false;
		}
		if(shadeNo!=0){
			var id=$("#billItemAddModal #billClothIdAdd").val();
			var clothName=$("#billItemAddModal #clothDetails").val();
			var total=eval((length+"*"+cost)+"+"+wage);
			var details=clothName+": ("+length+" X "+cost+") + "+wage+" = "+total+" X "+quantity;
		}else{
			var id=0;
			var clothName="Other";
			var total=wage;
			var details="Other :"+wage+" X "+quantity;
		}

		var amount=total*quantity;
		billItem_table.row.add({
			"details_cloth_id":id,
			"details_cloth_cost":cost,
			"details_cloth_length":length,
			"details_cloth_category_id":category,
			"details_wage":wage,
			"quantity":quantity,
            "sNo":"",
			"details":details,
			"amount":amount
    	}).draw();
    	$("#billItemAddModal #shadeNo").val(0);
		$("#billItemAddModal #billClothIdAdd").val("");
		$("#billItemAddModal #clothCost").val("");
		$("#billItemAddModal #length").val("");
		$("#billItemAddModal #category").val("");
		$("#billItemAddModal #wage").val("");
		$("#billItemAddModal #quantity").val("1");
		$("#billItemAddModal #clothDetails").val("");

		$("#billItemAddModal").modal('hide');
		updateSubTotal();
	}
	function editBillItem(){
		var index=$("#billItemEditModal #tableIndexEdit").val();
		// var sn=billItem_table.page.info().recordsTotal+1;
		var shadeNo=$("#billItemEditModal #shadeNo").val();
		var cost=$("#billItemEditModal #clothCost").val();
		var category=$("#billItemEditModal #category").val();
		if(cost=="" & shadeNo!=0){
			appendAlert("Cost can't be Empty","danger",3000);
			return false;
		}
		var length=$("#billItemEditModal #length").val();
		if(length=="" & shadeNo!=0){
			appendAlert("Length can't be Empty","danger",3000);
			return false;
		}
		var wage=$("#billItemEditModal #wage").val();
		if(wage==""){
			appendAlert("Wage can't be Empty","danger",3000);
			return false;
		}
		var quantity=$("#billItemEditModal #quantity").val();
		if(quantity==""){
			appendAlert("Quantity can't be Empty","danger",3000);
			return false;
		}
		if(shadeNo!=0){
			var id=$("#billItemEditModal #billClothIdAdd").val();
			var clothName=$("#billItemEditModal #clothDetails").val();
			var total=eval((length+"*"+cost)+"+"+wage);
			var details=clothName+": ("+length+" X "+cost+") + "+wage+" = "+total+" X "+quantity;
		}else{
			var id=0;
			var clothName="Other";
			var total=wage;
			var details="Other :"+wage+" X "+quantity;
		}

		var amount=total*quantity;
		billItem_table.row(index).remove();
		billItem_table.row.add({
			"sNo":"",
			"details_cloth_id":id,
			"details_cloth_cost":cost,
			"details_cloth_length":length,
			"details_cloth_category_id":category,
			"details_wage":wage,
			"quantity":quantity,
			"details":details,
			"amount":amount
    	}).draw();
    	$("#billItemEditModal #shadeNo").val(0);
		$("#billItemEditModal #billClothIdAdd").val("");
		$("#billItemEditModal #clothCost").val("");
		$("#billItemEditModal #length").val("");
		$("#billItemEditModal #category").val("");
		$("#billItemEditModal #wage").val("");
		$("#billItemEditModal #quantity").val("1");
		$("#billItemEditModal #clothDetails").val("");

		$("#billItemEditModal").modal('hide');
		updateSubTotal();
	}
	function deleteBillItem(){
		var index=$("#billItemEditModal #tableIndexEdit").val();
		billItem_table.row(index).remove().draw();
    	$("#billItemEditModal #shadeNo").val(0);
		$("#billItemEditModal #billClothIdAdd").val("");
		$("#billItemEditModal #clothCost").val("");
		$("#billItemEditModal #length").val("");
		$("#billItemEditModal #category").val("");
		$("#billItemEditModal #wage").val("");
		$("#billItemEditModal #quantity").val("1");
		$("#billItemEditModal #clothDetails").val("");

		$("#billItemEditModal").modal('hide');
		updateSubTotal();
	}
	function updateSubTotal(){
		var data=billItem_table.rows().data();
		var length=data.length;
		var paid=$("#issueBill #paid").val();
		var subTotal=0;
		for (var i = length - 1; i >= 0; i--) {
			subTotal+=billItem_table.row(i).data().amount;
		};
		// console.log(subTotal);
		$("#issueBill #subTotal").val(subTotal);
		$("#issueBill #total").val(eval(subTotal+"-"+paid));
	}
    function clearBillItemData(){
        billItem_table.clear().draw();
    }
    function clearBillData(){
        $("#issueBill input#customer_id").val("");
        $("#issueBill input#name").val("");
        $("#issueBill textarea#address").val("");
        $("#issueBill input#phone").val("");
        $("#issueBill input#subTotal").val("");
        $("#issueBill input#paid").val(0);
        $("#issueBill input#total").val("");
        $("#issueBill input#deliveryDate").val("");
        $("#issueBill textarea#remarks").val("");
        clearBillItemData();
    }
	billItem_table.on( 'order.dt search.dt', function () {
        billItem_table.column(6, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

</script>
