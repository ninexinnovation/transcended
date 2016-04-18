
		<div class="container-fluid">
			<form class="form-inline text-center" id="issueBill" style="margin-top:20px;margin-bottom: 20px">
					<label style="font-size: 20px;vertical-align: middle;">Search : </label>
					<div class="form-group">
							<input type="number" class="form-control" id="viewBillNo" name="billNo" placeholder="Bill No"/>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="viewname" name="name" placeholder="Customer Name" />
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="viewphone" name="name" placeholder="Customer Phone Number" />
					</div>
					<div class="form-group">
						<input type="text" id="viewdate" class="form-control" placeholder="Date">
					</div>
            </form>

			<div class="table-responsive">
			    <table class="table table-bordered table-hover" id="viewBills">
			        <thead>
				        <tr>
				            <th>S.N</th>
				            <th>Order Date</th>
				            <th>Bill Number</th>
				            <th>Customer Name </th>
				            <th>Phone Number</th>
				            <th>Action</th>
				        </tr>
				    </thead>
				    <tbody>
				       
			        </tbody>
			    </table>
			</div>
		</div>

<script type="text/javascript">
	//customized report
    viewBills=$('#viewBills').DataTable({
        // "deferRender": true,
        "ajax":"DataProcessing/getAllViewBillJson",
        "columns":[
        	{"data":"sn"},
        	{"data":"order_date"},
            {"data":"bill_no"},
            {"data":"customer_name"},
            {"data":"phone_no"},
            {"data":"action"}
        ]
    });
    viewBills.on( 'order.dt search.dt', function () {
	    viewBills.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
	        cell.innerHTML = i+1;
	    } );
	} ).draw();
	viewBills.on( 'order.dt search.dt', function () {
	    viewBills.column(5, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
	        cell.innerHTML = "<button class='btn btn-primary' data-toggle='modal' data-target='#billViewModal' onClick='viewBill(this)'>View</button>";
	    } );
	} ).draw();


	$('#viewBillNo').on( 'keyup change', function () {
        if ( viewBills.column(2).search() !== this.value ) {
            viewBills.column(2).search( this.value )
                .draw();
        }
    } );

    $('#viewname').on( 'keyup change', function () {
        if ( viewBills.column(3).search() !== this.value ) {
            viewBills.column(3).search( this.value )
                .draw();
        }
    } );

    $('#viewphone').on( 'keyup change', function () {
        if ( viewBills.column(4).search() !== this.value ) {
            viewBills.column(4).search( this.value )
                .draw();
        }
    } );

    $('#viewdate').on( 'keyup change', function () {
        if ( viewBills.column(1).search() !== this.value ) {
            viewBills.column(1).search( this.value )
                .draw();
        }
    } );

</script>
		