$(document).ready(function(){
	loadPrevTask(function(data){
		if(data!="null"){
			var length=data.name.length;
			var title_bar_items=$(".task-bar .task-bar-items");
			for(i=length-1;i>=0;i--){
				var name=data.name[i];
				var title=data.title[i]
				loadTask($("body"),name,title,function(n,t){
					title_bar_items.prepend("<span class='task-bar-item' data-containerId="+n+">"+t+"</span>");
					$("[data-containerId='"+n+"']").trigger("click");
					
				});
				// alert(name);
			}
		}
	});
	// MENU 
	$(".menu-container-back").on("click",function(){
		toggleMenu();
	});

	$(document).on("click",".task-bar-item",function(){
		var titleBarItem=$(this);
		if($(this).attr("id")=="menu-item"){
			// var menu=$(this);
			if($(".menu-container .menu-contents").find(".menu.main")['length']==0){
				loadMenu($(".menu-container .menu-contents"),function(){
					toggleMenu();
				});
			}else{
				toggleMenu();
			}
		}else if($(this).attr("id")=="menu-btn"){
			
		}else{
			$("#menu-item").removeClass("active");
			$(".menu-container").hide(100);
			$(".menu-container-back").fadeOut(100);
			resetMenu();
			hideShowTask(titleBarItem); // title bar task has been hide
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
				loadTask($("body"),title,text,function(t,txt){
					title_bar_items.prepend("<span class='task-bar-item' data-containerId="+t+">"+txt+"</span>");
					$("[data-containerId='"+t+"']").trigger("click");
					addPrevTask(t,txt);
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
	// $(document).on("DOMSubtreeModified","#taskbar",function(){
	// 	$("#taskbar").isOverflowHeight();
	// });
});
function loadPrevTask(func){
	$.ajax({
		url:"TaskViews/getPrevTask",
		dataType:"json"
	}).done(function(data){
		func(data);
	});
}
function addPrevTask(name,title){
	$.ajax({
		url:"TaskViews/addTask/"+name+"?title="+title+"",
	}).done(function(){
		// func();
	});
}
function deletePrevTask(name){
	$.ajax({
		url:"TaskViews/removeTask/"+name,
	}).done(function(){
		// func();
	});
}
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
	deletePrevTask(itemId);
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
		updateForm(div.find("form"));
		func(title,text);
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

/* NOTIFICATION ALERT HANDLER */
var timeouttime=0;
function appendAlert(message,alertType,timeout){
    var alertTypes=["success","info","warning","danger"];
    if(alertTypes.indexOf(alertType)!=-1){

        var alertId=eval($("#alertNo").attr('data-number')+"+1");

        $("#alertNo").attr('data-number',alertId);

        var data="<div data-id='alert"+alertId+"' class='alert alert-"+alertType+" alert-dismissible in fade' role='alert'>";
        data+="<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        data+=message+"</div>";

        $("#page-notification").append(data);

        timeouttime+=1000;
        // console.log(timeouttime);

        setTimeout(function(){
            $("[data-id=alert"+alertId+"]").alert('close');
            timeouttime-=1000;
        },eval(timeouttime+"+"+timeout));

    }
}
