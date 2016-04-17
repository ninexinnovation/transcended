		<div class="container-fluid">
			<form class="form-inline text-center" id="issueBill" onsubmit="addNewBill();return false;" style="margin-top:20px;margin-bottom: 20px">
					<label style="font-size: 20px;vertical-align: middle;">Search : </label>
					<div class="form-group">
							<input type="number" class="form-control" id="customBillNo" name="billNo" placeholder="Bill No" value="<?php //echo $bills->getLastBillNo()+1; ?>" />
					</div>
					<div class="form-group">
						<input type="text" id="customproduct" class="form-control" value="" placeholder="Product"> 
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="customname" name="name" placeholder="Customer Name" />
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="customphone" name="name" placeholder="Customer Phone Number" />
					</div>
					<div class="form-group">
						<input type="text" id="customdate" class="form-control" value="<?php echo date("m/d/Y") ?>" placeholder="Current Date">
					</div>
            </form>

			<div class="table-responsive">
			    <table class="table table-bordered table-hover" id="customizedReportTable">
			        <thead>
				        <tr>
				            <th>S.N</th>
				            <th>Delivery Date</th> 
				            <th>Bill Number</th>
				            <th>Product</th>
				            <th>Customer Name </th>
				            <th>Phone Number</th>
				        </tr>
				    </thead>
				    <tbody>
				       
			        </tbody>
			    </table>
			</div>
		</div>

<script type="text/javascript">
	//customized report
    customizedReportTable=$('#customizedReportTable').DataTable({
        // "deferRender": true,
        "ajax":"DataProcessing/getAllCustomizedReportJson",
        "columns":[
        	{"data":"sn"},
            {"data":"delivery_date"},
            {"data":"bill_no"},
            {"data":"product_name"},
            {"data":"customer_name"},
            {"data":"phone_no"}
        ]
    });
    customizedReportTable.on( 'order.dt search.dt', function () {
	    customizedReportTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
	        cell.innerHTML = i+1;
	    } );
	} ).draw();

	$('#customBillNo').on( 'keyup change', function () {
        if ( customizedReportTable.column(2).search() !== this.value ) {
            customizedReportTable.column(2).search( this.value )
                .draw();
        }
    } );

    $('#customproduct').on( 'keyup change', function () {
        if ( customizedReportTable.column(3).search() !== this.value ) {
            customizedReportTable.column(3).search( this.value )
                .draw();
        }
    } );

    $('#customname').on( 'keyup change', function () {
        if ( customizedReportTable.column(4).search() !== this.value ) {
            customizedReportTable.column(4).search( this.value )
                .draw();
        }
    } );

    $('#customphone').on( 'keyup change', function () {
        if ( customizedReportTable.column(5).search() !== this.value ) {
            customizedReportTable.column(5).search( this.value )
                .draw();
        }
    } );

    $('#customdate').on( 'keyup change', function () {
        if ( customizedReportTable.column(1).search() !== this.value ) {
            customizedReportTable.column(1).search( this.value )
                .draw();
        }
    } );

</script>