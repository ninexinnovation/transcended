$(document).ready(function(){

	// MENU 
	$(".menu-container-back").on("click",function(){
		toggleMenu();
	});

	$(document).on("click",".task-bar-item",function(){
		if($(this).attr("id")=="menu-item"){
			// var menu=$(this);
			if($(".menu-container .menu-contents").find(".menu.main")['length']==0){
				loadMenu($(".menu-container .menu-contents"),function(){
					toggleMenu();
				});
			}else{
				toggleMenu();
			}
		}else{
			$("#menu-item").removeClass("active");
			$(".menu-container").hide(100);
			$(".menu-container-back").fadeOut(100);
			resetMenu();
			hideShowTask($(this)); // title bar task has been hide
		}
	});
	
	// title bar close and minimize button
	$(document).on("click",".btn-close",function(){
		var itemId=$(this).closest(".task-container").attr("id");
		closeTask($("[data-containerId='"+itemId+"']"));
	});
	$(document).on("click",".btn-minimize",function(){
		var itemId=$(this).closest(".task-container").attr("id");
		hideShowTask($("[data-containerId='"+itemId+"']"));
	});

	$(".menu-back").on("click",function(){
		slideRight($(".menu-contents").find(".menu").last());
	});

	// Menu load
	$(document).on("click",".menu-btn",function(){
		var btnType=$(this).attr("data-btn-type");
		var title=$(this).attr("data-view");
		var text=$(this).find("span").text();
		if(btnType=="sub"){
			if($(".menu-contents-hidden").find("div[data-id='sub-"+title+"']").length==0){
				loadSubMenu($(".menu-contents-hidden"),title,function(){
					slideLeft($(".menu-contents-hidden div[data-id='sub-"+title+"']"));
				});
			}else{
				slideLeft($(".menu-contents-hidden div[data-id='sub-"+title+"']"));
			}
		}else if(btnType=="task"){
			var title_bar_items=$(".task-bar .task-bar-items");
			if(title_bar_items.find("[data-containerId='"+title+"']").length==0){
				loadTask($("body"),title,text,function(){
					title_bar_items.prepend("<span class='task-bar-item' data-containerId="+title+">"+text+"</span>");
					$("[data-containerId='"+title+"']").trigger("click");
					
				});
			}else{
				if(!$("[data-containerId='"+title+"']").hasClass("active")){
					$("[data-containerId='"+title+"']").trigger("click");
					
				}else{
					toggleMenu();
				}
			}
		}
	});
});
function toggleMenu(){
	$(".menu-container").toggle(100,function(){
		if($(this).is(":visible")){
			$("#menu-item").addClass("active");
		}else{
			$("#menu-item").removeClass("active");
			resetMenu();
		}
	});
	$(".menu-container-back").fadeToggle(100);
}
function hideShowTask(thisItem){
	var currentActive=thisItem.closest("div").find(".active");
	var prevcontainer=$("#"+currentActive.attr("data-containerId"));
	var container=$("#"+thisItem.attr("data-containerId"));

	if(currentActive[0]!=thisItem[0]){
		thisItem.addClass("active");
		if(currentActive.attr("data-containerId")==undefined){
			container.fadeIn(150);
		}else{
			prevcontainer.fadeOut(150,function(){
				container.fadeIn(150);	
			});
		}
	}else{
		prevcontainer.fadeOut(150);
	}
	currentActive.removeClass("active");
}

function closeTask(thisItem){
	var itemId=thisItem.attr("data-containerId");
	thisItem.remove();
	$("#"+itemId).remove();
	// console.log(thisItem);
}

function loadMenu(div,func){
	$.ajax({
		url:"TaskViews/menu"
	}).done(function(data){
		div.html(data)
		func();
	});
}

function loadSubMenu(div, title, func){
	$.ajax({
		url:"TaskViews/submenu/"+title
	}).done(function(data){
		div.append(data);
		func();
	});
}
function loadTask(div,title,text,func){
	$.ajax({
		url:"TaskViews/loadTask/"+title+"?text="+text
	}).done(function(data){
		div.append(data);
		// alert(data);
		func();
	});	
}

function slideLeft(element){
	$(".menu-contents").append(element);
	element.css("opacity","0.5").css("position","absolute").css("top","0px").css("left","500px");
	if(element.attr("data-parent")==""){
		$(".menu.main").animate({opacity: '0.5',left:"-500px"});
		$(element).animate({opacity:'1',left:'0px'});
	}else{
		$("[data-id='sub-"+element.attr("data-parent")+"']").animate({opacity: '0.5',left:"-500px"});
		$(element).animate({opacity:'1',left:'0px'});
	}
	$(".menu-back").css("display","flex");
}
function slideRight(element){
	if(element.attr("data-parent")==""){
		$(".menu.main").animate({opacity: '1',left:"0px"});
		$(element).animate({opacity:'0.5',left:'500px'},function(){
			$(".menu-contents-hidden").append(element);
		});
		$(".menu-back").css("display","none");
	}else{
		$("[data-id='sub-"+element.attr("data-parent")+"']").animate({opacity: '1',left:"0px"});
		$(element).animate({opacity:'0.5',left:'500px'},function(){
			$(".menu-contents-hidden").append(element);
		});
	}
}
function resetMenu(){
	$(".menu.main").css("opacity",'1').css("left","0px");
	$(".menu.sub").each(function(index,element){
		$(".menu-contents-hidden").append(element);
	});
	$(".menu-back").css("display","none");
	// console.log("reset");
}

