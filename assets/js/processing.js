$(document).ready(function(){
	loadMonthlyChart();
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


    //button clicked state
    $(document).on("click","button[type=submit]",function() {
        $("button[type=submit]", $(this).parents("form")).removeAttr("clicked");
        $(this).attr("clicked", "true");
    });
});











function displayModalData(thisForm,dataName,dataValue){
	// console.log(thisForm)
	var url=$(thisForm).attr("data-get-action");
	$.ajax({
		url:url,
		data:{name:dataName,value:dataValue},
		method:"post",
		dataType:"json"
	}).done(function(msg){
		if(msg!=""){
			// alert(msg.data[0].customer_name);
			updateForm(thisForm);
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
	});
}

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

function updateDeleteData(thisForm,func) {
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
	}).fail(function(jqXHR, textStatus ){
		alert(jqXHR.statusText+"/"+textStatus);
		$(thisForm).find("button[type='submit'],button[type='button'],input[type='submit']").each(function(index,element){
			$(element).prop('disabled', false);
		});
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
    if(anyItem){
        $.ajax({
            dataType:"json",
            method:"POST",
            url:"DataProcessing/addNewBill",
            data:{billNo:billNo,customerId:customerId,date:date,clothId:clothId,clothLength:clothLength,
                catagoryId:catagoryId,quantity:quantity,paid:paid,deliveryDate:deliveryDate,referrer_id:referrerId,
            	discount:discount}
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
        }).fail(function( jqXHR, textStatus ) {
          alert( "Request failed: " + textStatus );
        });
    }else{
        appendAlert("Sorry no Item added!!","danger",5000)
    }
}

function loadMonthlyChart(){
	$.ajax({
        dataType:"json",
        url:"DataProcessing/getMonthlyDetailsForChartJson"
    }).done(function(msg){
    	var d1_1 = [["Jan", msg.coat.jan],["Feb", msg.coat.feb],["Mar", msg.coat.mar],["Apr", msg.coat.apr],["May", msg.coat.may],["Jun", msg.coat.jun],["Jul", msg.coat.jul],["Aug", msg.coat.aug],["Sep", msg.coat.sep],["Oct", msg.coat.oct],["Nov", msg.coat.nov],["Dec", msg.coat.dec]];
	    var d1_2 = [["Jan", msg.shirt.jan],["Feb", msg.shirt.feb],["Mar", msg.shirt.mar],["Apr", msg.shirt.apr],["May", msg.shirt.may],["Jun", msg.shirt.jun],["Jul", msg.shirt.jul],["Aug", msg.shirt.aug],["Sep", msg.shirt.sep],["Oct", msg.shirt.oct],["Nov", msg.shirt.nov],["Dec", msg.shirt.dec]];
	    var d1_3 = [["Jan", msg.pant.jan],["Feb", msg.pant.feb],["Mar", msg.pant.mar],["Apr", msg.pant.apr],["May", msg.pant.may],["Jun", msg.pant.jun],["Jul", msg.pant.jul],["Aug", msg.pant.aug],["Sep", msg.pant.sep],["Oct", msg.pant.oct],["Nov", msg.pant.nov],["Dec", msg.pant.dec]];
	    var d1_4 = [["Jan", msg.others.jan],["Feb", msg.others.feb],["Mar", msg.others.mar],["Apr", msg.others.apr],["May", msg.others.may],["Jun", msg.others.jun],["Jul", msg.others.jul],["Aug", msg.others.aug],["Sep", msg.others.sep],["Oct", msg.others.oct],["Nov", msg.others.nov],["Dec", msg.others.dec]];

	    $.plot("#line-chart", [{
	        data: d1_1,
	        label: "Coat",
	        color: "#ffce54"
	    },{
	        data: d1_2,
	        label: "Shirt",
	        color: "#3DB9D3"
	    },{
	        data: d1_3,
	        label: "Pant",
	        color: "#df4782"
	    },{
	        data: d1_4,
	        label: "Others",
	        color: "#004782"
	    }], {
	        series: {
	            lines: {
	                show: !0,
	                fill: .01
	            },
	            points: {
	                show: !0,
	                radius: 4
	            }
	        },
	        grid: {
	            borderColor: "#fafafa",
	            borderWidth: 1,
	            hoverable: !0
	        },
	        tooltip: !0,
	        tooltipOpts: {
	            content: "%x : %y",
	            defaultTheme: true
	        },
	        xaxis: {
	            tickColor: "#fafafa",
	            mode: "categories"
	        },
	        yaxis: {
	            tickColor: "#fafafa"
	        },
	        shadowSize: 4
	    });
    }).fail(function( jqXHR, textStatus ) {
      alert( "Request failed: " + textStatus );
    });

	
}

