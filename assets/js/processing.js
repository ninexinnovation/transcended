$(document).ready(function(){
	$(document).on("change","select",function(){
		if($(this).attr("data-model")!=null){
			if($(this).find("option:selected").attr("data-value")=="add"){
				var modelId=$(this).attr("data-model");
				$(modelId).modal('show');
				$(this).val("");
			}	
		}
			
	});

	//customer table
	addCustomer_table=$('#addCustomer-table').DataTable({
        // "deferRender": true,
        "ajax":"DataProcessing/getAllCustomerJson",
        "columns":[
            {"data":"customer_id"},
            {"data":"customer_name"},
            {"data":"address"},
            {"data":"phone_no"}
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
            $("#issueBill #customer_id").val(rowData.customer_id);
            $("#issueBill #name").val(rowData.customer_name);
            $("#issueBill #address").val(rowData.address);
            $("#issueBill #phone").val(rowData.phone_no);
            $('#AddCustomerModal').modal('hide')
        }
    });

    $('#addCustomer-table tbody').on( 'dblclick', 'tr', function (e) {
        var rowData = addCustomer_table.row(this).data();
        if(rowData!=undefined){
            $("#issueBill #customer_id").val(rowData.customer_id);
            $("#issueBill #name").val(rowData.customer_name);
            $("#issueBill #address").val(rowData.address);
            $("#issueBill #phone").val(rowData.phone_no);
            $('#AddCustomerModal').modal('hide')
        }
    } );

});
function AddData(thisForm,func) {
	// console.log($(thisDiv));
	var dataname=[];
	var datavalue=[];
	$(thisForm).find("input, select").each(function(index,element){
		// console.log(element);
		if($(element).attr("data-send")!="false"){
			switch($(element).attr("type")){
				case "file":

					break;
				case "radio","checkbox":

					break;
				case "submit":
				case "button":
				case "reset":
					$(element).prop('disabled', true);
					break;
				default:
					console.log(element);
					dataname.push($(element).attr("name"));
					datavalue.push($(element).val());
					break;
			}
		}
	});
	$(thisForm).find("button[type='submit']").each(function(index,element){
		$(element).prop('disabled', true);
	});

	// console.log(dataname);
	var method=$(thisForm).attr("method");
	var url=$(thisForm).attr("action");
	$.ajax({
		url:url,
		data:{name:dataname,value:datavalue},
		method:method,
		dataType:"json"
	}).done(function(msg){
		if(msg.success=="true"){
			for(i=0;i<msg.message.length;i++){
				appendAlert(msg.message[i],msg.messageType,5000);
			}
			
			resetForm(thisForm);
			updateForm($(thisForm));
			// updateForm($(thisForm));
		}else{
			for(i=0;i<msg.message.length;i++){
				appendAlert(msg.message[i],"danger",5000);
			}
		}
	});
	$(thisForm).find("button[type='submit'],input[type='submit']").each(function(index,element){
		$(element).prop('disabled', false);
	});
	if($(thisForm).closest(".modal").length!=0){
		var id=$(thisForm).closest(".modal").attr("id");
		$(document).find("[data-model='#"+id+"']").each(function(index,element){
			updateForm(element.closest("form"));
		});
		// console.log($("#"+id));
		$("#"+id).modal('hide');
	}
}
function resetForm(form){
	// var form=this;
	$(form).find("input,select").each(function(index,element){
		switch($(element).attr("type")){
			case "file":

				break;
			case "radio","checkbox":

				break;
			case "submit":
			case "button":
			case "reset":
				break;
			default:
				$(element).val("");
				break;
		}
		if($(this).attr("autofocus")){
			$(this).focus();
		}
		
	});
	// $(form+" > input[autofocus='']").focus();
}

function updateForm(form){
	//update input box
	$(form).find("input, select").each(function(index,element){
		if($(element).attr("data-update")){
			// console.log($(this));
			var thisEl=$(this);
			var url=$(this).attr("data-update");
			$.get({
				url:url
			}).done(function(msg){
				if(thisEl.prop("tagName").toLowerCase()=="input"){
					thisEl.val(msg);
				}else if(thisEl.prop("tagName").toLowerCase()=="select"){
					thisEl.html(msg);
				}

			});
		}
	});
}