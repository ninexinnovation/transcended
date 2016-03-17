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
	resetForm(thisForm);
	updateForm($(thisForm));
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