$(document).ready(function(){
	$(document).on("keyup","input[data-action='grid_search']",function(){
		var query=$(this).val();
		var row=$("#"+$(this).attr("data-search-id"));
		if(query!=""){
			
			$(row).find("span").each(function(index,element){
				// var found=$(this).filter(function() { 
				// 	return ($(this).text().toLowerCase().indexOf(query.toLowerCase()) > -1) 
				// });
				// found.closest("a").hide();
				// if(found.length!=0){
				// 	found.closest("a").show();
				// }else{
					
				// }
				if($(this).text().toLowerCase().indexOf(query.toLowerCase()) > -1){
					$(this).closest("a").fadeIn(500);
				}else{
					$(this).closest("a").fadeOut(500);
				}

				// if($(element+":contains('"+query+"')")){
				// 	alert(index);
				// }
			});
		}else{
			$(row).find("a").each(function(index,element){
				$(this).fadeIn(500);
			});
		}
	});
});