$(document).ready(function(){
          	var dashStock=$('#dashStock').DataTable({
          		"searching":false,
				"ajax":"DataProcessing/getDashboardStockJson",
				"columns":[
					{"data":"shadeNo"},
					{"data":"catagory"},
					{"data":"quantity"},
					],
				"sorting":false
          	});
	loading(false);
	$(document).on("change","select",function(){
		if($(this).attr("data-model")!=null){
			if($(this).find("option:selected").attr("data-value")=="add"){
				var modelId=$(this).attr("data-model");
				$(modelId).modal('show');
				$(this).val("");
			}	
		}
			
	});
	$(document).on("change","#billItemAddModal #shadeNo",function(){
		if($(this).val()!=0){
			var dataName=[];
	    	var dataValue=[];
	    	dataName.push("id");
	    	dataValue.push($(this).val());
			$.ajax({
				url:"DataProcessing/getItemByIdJson",
				data:{name:dataName,value:dataValue},
				method:"post",
				dataType:"json"
			}).done(function(msg){
				if(msg!=""){
					// alert(msg.data[0].customer_name);
					$("#billItemAddModal #clothCost").val(msg.data[0].selling_price);
				}else{
					appendAlert("Unable to get data","danger",5000);
				}
			});
		}else{
			$("#billItemAddModal #clothCost").val("");
		}
	});
	$(document).on("change","#billItemAddModal #catagory",function(){
		if($(this).val()!=0){
			var dataName=[];
	    	var dataValue=[];
	    	dataName.push("id");
	    	dataValue.push($(this).val());
			$.ajax({
				url:"DataProcessing/getCatagoryByIdJson",
				data:{name:dataName,value:dataValue},
				method:"post",
				dataType:"json"
			}).done(function(msg){
				if(msg!=""){
					// alert(msg.data[0].customer_name);
					$("#billItemAddModal #wage").val(msg.data[0].stiching_charge);
				}else{
					appendAlert("Unable to get data","danger",5000);
				}
			});
		}else{
			$("#billItemAddModal #wage").val("");
		}
	});
	$(document).on( 'keyup','#issueBill #paid', function (e) {
		var subTotal=$("#issueBill #subTotal").val();
		var discount=$("#issueBill #discount").val();
		var paid=$("#issueBill #paid").val();
        if(paid!="")
            $("#issueBill #total").val(""+eval(subTotal+"-"+paid+"-"+discount));
        else
            $("#issueBill #total").val(subTotal);
	});
	$(document).on( 'keyup','#issueBill #discount', function (e) {
		var subTotal=$("#issueBill #subTotal").val();
		var discount=$("#issueBill #discount").val();
		var paid=$("#issueBill #paid").val();
        if(paid!="")
            $("#issueBill #total").val(""+eval(subTotal+"-"+paid+"-"+discount));
        else
            $("#issueBill #total").val(subTotal);
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

    //Referrer table
	addReferrer_table=$('#addReferrer-table').DataTable({
        // "deferRender": true,
        "ajax":"DataProcessing/getAllCustomerJson",
        "columns":[
            {"data":"customer_id"},
            {"data":"customer_name"},
            {"data":"address"},
            {"data":"phone_no"}
        ]
    });
    addReferrer_table.columns([0]).visible(false);
    $('#AddReferrerModal').on('shown.bs.modal', function () {
        $('#addReferrer-table').DataTable().ajax.reload(null,false);
    }); 
    $('#addReferrer-table tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            addReferrer_table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );

    $('#btnAddReferrer').on( 'click', function () {
        var rowData=addReferrer_table.row(".selected").data();
        if(rowData!=undefined){
            $("#issueBill #referrer_id").val(rowData.customer_id);
            $("#issueBill #referrer").val(rowData.customer_name);
            $('#AddReferrerModal').modal('hide')
        }
    });

    $('#addReferrer-table tbody').on( 'dblclick', 'tr', function (e) {
        var rowData = addReferrer_table.row(this).data();
        if(rowData!=undefined){
            $("#issueBill #referrer_id").val(rowData.customer_id);
            $("#issueBill #referrer").val(rowData.customer_name);
            $('#AddReferrerModal').modal('hide')
        }
    } );





    //task result modal desplay
    $(document).on("click","[data-btn-type='task-result']",function(){
    	var modalId=$(this).attr("data-view");
    	$(modalId).modal("show");
    	var dataName=[];
    	var dataValue=[];
    	$(this).find("[data-send='true']").each(function(index,element){
    		dataName.push($(this).attr("data-name"));
    		dataValue.push($(this).text());
    	});
    	// console.log(dataName);
    	// console.log(dataValue);
    	displayModalData($(modalId).find("form"),dataName,dataValue);
    });
    $(document).on("click","#changePassword",function(){
    	var modalId="#userViewModal";
    	$(modalId).modal("show");
    	var dataName=[];
    	var dataValue=[];
    	// $(this).find("[data-send='true']").each(function(index,element){
    		dataName.push("id");
    		dataValue.push($(this).attr("data-id"));
    	// });
    	// console.log(dataName);
    	// console.log(dataValue);
    	displayModalData($(modalId).find("form"),dataName,dataValue);
    });


    //button clicked state
    $(document).on("click","button[type=submit]",function() {
        $("button[type=submit]", $(this).parents("form")).removeAttr("clicked");
        $(this).attr("clicked", "true");
    });






    $('#measurementModal input').on("change",function(){
    	$(this).closest('form').find('input[name="add"]').val("true");
    });

    //to clear hidden input
    $(document).on("click","input[type='reset'],button[type='reset']",function(){
    	$(this).closest('form').find("input[type='hidden']").val("");
    });

    

});



var newStatus=false;
function loading(status){
	newStatus=status;
	setTimeout(function(){
		if(newStatus){
			$('#loading').show();
		}else{
			$('#loading').hide();
		}
	}, 200);
}









function displayModalData(thisForm,dataName,dataValue){
	// console.log(thisForm)
	loading(true);
	var url=$(thisForm).attr("data-get-action");
	$.ajax({
		url:url,
		data:{name:dataName,value:dataValue},
		method:"post",
		dataType:"json"
	}).done(function(msg){
		if(msg!=""){
			// alert(msg.data[0].customer_name);
			// updateForm(thisForm);
			$(thisForm).find("input, select").each(function(index,element){
				var type=$(element).attr("type");
				switch(type){
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
						var name=$(element).attr("name");
						$(element).val(msg.data[0][name]);
						break;
				}
			});
		}else{
			appendAlert("Unable to get data","danger",5000);
		}
		loading(false);
		if(msg.data.tasks!=undefined){
			var tableData="";
			for(var i=0;i<msg.data.tasks.length;i++){
				tableData+="<tr><td>"+(i+1)+"</td><td>"+msg.data.tasks[i].bill_no+"</td><td>"+msg.data.tasks[i].catagory_name+"</td></tr>";
			}
			if(tableData!=""){
				$(thisForm).find("tbody").html(tableData);
			}else{
				$(thisForm).find("tbody").html("<tr><td colspan='3' align='center'><h4>No Task Allocated</h4></td></tr>");
			}
		}
	});
}

function AddData(thisForm,func) {
	// console.log($(thisDiv));
	loading(true);
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
		loading(false);
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

function updateDeleteData(thisForm,func) {
	loading(true);
	// console.log($(thisDiv));
	var dataName=[];
	var dataValue=[];
	var clickedButton;
	$(thisForm).find("input, select, button").each(function(index,element){
		// console.log(element);
		if($(element).attr("data-send")!="false"){
			switch($(element).attr("type")){
				case "file":

					break;
				case "radio","checkbox":

					break;
				case "submit":
				case "button":
					if($(element).attr("clicked")!=null){
						clickedButton=$(element).attr("name");
					}
					$(element).prop('disabled', true);
					break;
				default:
					// console.log(element);
					dataName.push($(element).attr("name"));
					dataValue.push($(element).val());
					break;
			}
		}
	});
	dataName.push("button");
	dataValue.push(clickedButton);
	// console.log(dataName);
	// $(thisForm).find("button[type='submit'],button[type='button']").each(function(index,element){
	// 	$(element).prop('disabled', true);
	// });

	var method=$(thisForm).attr("method");
	var url=$(thisForm).attr("action");
	$.ajax({
		url:url,
		data:{name:dataName,value:dataValue},
		method:method,
		dataType:"json"
	}).done(function(msg){
		if(msg.success=="true"){
			for(i=0;i<msg.message.length;i++){
				appendAlert(msg.message[i],msg.messageType,5000);
			}
			resetForm(thisForm);
		}else{
			for(i=0;i<msg.message.length;i++){
				appendAlert(msg.message[i],"danger",5000);
			}
		}
		$(thisForm).find("button[type='submit'],button[type='button'],input[type='submit']").each(function(index,element){
			$(element).prop('disabled', false);
		});
		loading(false);
	}).fail(function(jqXHR, textStatus ){
		alert(jqXHR.statusText+"/"+textStatus);
		$(thisForm).find("button[type='submit'],button[type='button'],input[type='submit']").each(function(index,element){
			$(element).prop('disabled', false);
		});
		loading(false);
	});
	
	if($(thisForm).closest(".modal").length!=0){
		var id=$(thisForm).closest(".modal").attr("id");
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



function addBillItem(){
	var shadeNo=$("#billItemAddModal #shadeNo").val();
	var cost=$("#billItemAddModal #clothCost").val();
	var catagory=$("#billItemAddModal #catagory").val();
	if(cost=="" & shadeNo!="0"){
		appendAlert("Cost can't be Empty","danger",3000);
		return false;
	}
	var length=$("#billItemAddModal #length").val();
	if(length=="" & shadeNo!="0"){
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
	if(shadeNo!="0"){
		var id=shadeNo;
		var clothName=$("#billItemAddModal #clothDetails").val();
		var total=eval((length+"*"+cost)+"+"+wage);
		var details="("+length+" X "+cost+") + "+wage+" = "+total+" X "+quantity;
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
		"details_cloth_catagory_id":catagory,
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
	$("#billItemAddModal #catagory").val("");
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
	var catagory=$("#billItemEditModal #catagory").val();
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
		"details_cloth_catagory_id":catagory,
		"details_wage":wage,
		"quantity":quantity,
		"details":details,
		"amount":amount
	}).draw();
	$("#billItemEditModal #shadeNo").val(0);
	$("#billItemEditModal #billClothIdAdd").val("");
	$("#billItemEditModal #clothCost").val("");
	$("#billItemEditModal #length").val("");
	$("#billItemEditModal #catagory").val("");
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
	$("#billItemEditModal #catagory").val("");
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
    $("#issueBill input#discount").val(0);
    $("#issueBill input#paid").val(0);
    $("#issueBill input#total").val("");
    $("#issueBill input#deliveryDate").val("");
    $("#issueBill textarea#remarks").val("");
    $("#issueBill input#referrer_id").val("");
    $("#issueBill input#referrer").val("");
    clearBillItemData();
}
function addNewBill(){
    var billNo=$("#issueBill input#billNo").val();
    var customerId=$("#issueBill input#customer_id").val();
    var referrerId=$("#issueBill input#referrer_id").val();
    var date=$("#issueBill input#date").val();
    var discount=$("#issueBill input#discount").val();
    var clothId=[];
    var clothCost=[];
    var clothLength=[];
    var catagoryId=[];
    var wage=[];
    var quantity=[];
    var anyItem=false;
    billItem_table.rows().every(function ( rowIdx, tableLoop, rowLoop ) {
        var rowData = this.data();
        clothId[rowIdx]=rowData.details_cloth_id;
        clothLength[rowIdx]=rowData.details_cloth_length;
        catagoryId[rowIdx]=rowData.details_cloth_catagory_id;
        quantity[rowIdx]=rowData.quantity;
        anyItem=true;
    });
    var paid=$("#issueBill input#paid").val();
    var deliveryDate=$("#issueBill input#deliveryDate").val();

    var measurementUpName=[];
    var measurementUpValue=[];
   	var anyMeasurement=false;
   	$("#measurementModal #upper").find('input').each(function(){
   		if($(this).closest('form').find('input[name="add"]').val()=="true"){
	   		if($(this).val()!=''){
	   			measurementUpName.push($(this).attr('name'));
	   			measurementUpValue.push($(this).val());
	   			anyMeasurement=true;
	   		}else if($(this).prop('required') && $(this).val()==''){
	   			measurementUpName=[];
	   			measurementUpValue=[];
	   			anyMeasurement=false;
	   		}
	   	}
   	});

   	var measurementLowName=[];
    var measurementLowValue=[];



   	$("#measurementModal #lower").find('input').each(function(){
   		if($(this).closest('form').find('input[name="add"]').val()=="true"){
	   		if($(this).val()!=''){
	   			measurementLowName.push($(this).attr('name'));
	   			measurementLowValue.push($(this).val());
	   			anyMeasurement=true;
	   		}else if($(this).prop('required') && $(this).val()==''){
	   			measurementLowName=[];
	   			measurementLowValue=[];
	   			anyMeasurement=false;
	   		}
   		}
   	});

   	console.log(measurementLowValue);
   	console.log(measurementUpValue);
   	loading(true);
    if(anyItem && anyMeasurement){
        $.ajax({
            dataType:"json",
            method:"POST",
            url:"DataProcessing/addNewBill",
            data:{billNo:billNo,customerId:customerId,date:date,clothId:clothId,clothLength:clothLength,
                catagoryId:catagoryId,quantity:quantity,paid:paid,deliveryDate:deliveryDate,referrer_id:referrerId,
            	discount:discount,measurementUpName:measurementUpName,measurementUpValue:measurementUpValue,
            	measurementLowName:measurementLowName,measurementLowValue:measurementLowValue}
        }).done(function(msg){
            if(msg!=true){
                console.log(msg);
        		for(var i=0;i<msg.error.length;i++){
        			appendAlert(msg.error[i],"danger",5000);
        		}
            }else{
                appendAlert("Successfully Added a Bill","success",5000);
                clearBillData();
                updateForm($("#issueBill"));
            }
            loading(false);
        }).fail(function( jqXHR, textStatus ) {
          alert( "Request failed: " + textStatus );
          loading(false);
        });
    }else if(!anyItem){
        appendAlert("Sorry no Item added!!","danger",5000);
        loading(false);
    }else if(!anyMeasurement){
    	appendAlert("Please add all required Measurement data","danger",5000);
    	loading(false);
    }
}


function viewBill(thisEl){
	var billNo=viewBills.row($(thisEl).closest("tr")).data()["bill_no"];
	var modal=$("#billViewModal");
	$.ajax({
		url:"DataProcessing/getBillByIdJson",
		dataType:"json",
		method:"post",
		data:{billNo:billNo}
	}).done(function(msg){
		console.log(msg);
		if(msg!=null){
			$("#billViewModal #billNo").val(msg.data[0].bill_no);
			$("#billViewModal #name").val(msg.data[0].customer_name);
			$("#billViewModal #address").val(msg.data[0].address);
			$("#billViewModal #dateView").val(msg.data[0].f_current_date);
			$("#billViewModal #phone").val(msg.data[0].phone_no);
			$("#billViewModal #deliveryDateView").val(msg.data[0].f_delivery_date);
			$("#billViewModal #referrer").val(msg.data[0].ref);
			$("#billViewModal #discount").val(msg.data[0].discount);
			$("#billViewModal #paid").val(msg.data[0].advance);
			var items=msg.data[0].items;
			var workers=msg.data[0].workers;
			var itemEl="";
			var subTotal=0;
			for(var i=0;i<items.length;i++){
				itemEl+="<tr data-item-id="+items[i]["bill_item_id"]+"><td>"+(i+1)+"</td><td>"+items[i]["details"];
				itemEl+="<label style='float:right'>Select worker : <select>";
				itemEl+="<option value='' class=''>Choose Workers</option>"
				for(var j=0;j<workers.length;j++){
					itemEl+="<option value='"+workers[j]["worker_id"]+"'>"+workers[j]["worker_name"]+"</option>";
				}
				itemEl+="</select></label>";
				itemEl+="</td><td>"+items[i]["total"]+"</td></tr>";
				subTotal+=items[i]['total'];
			}
			$("#billViewModal table tbody").html(itemEl);
			$("#billViewModal #subTotal").val(subTotal);
			$("#billViewModal #total").val(subTotal-msg.data[0].discount-msg.data[0].advance);

		}
	});
}
