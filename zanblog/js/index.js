$(function(){
	$(".menubtn").click(function(){
		$(".menu").toggle("slow");
	})
	
	$(".navs li").click(function(){
		var i = $(this).index();
		$(this).find(".navs-tag").addClass("active");
		$(this).siblings().find(".navs-tag").removeClass("active")
		$(".tab-pane").eq(i).fadeIn("slow").siblings().css({display:"none"});	
	})

})

window.onload = function(){
	var timer = null;
	var oUl = document.getElementsByClassName("slides")[0];
	var oLi = oUl.getElementsByTagName("li");
	var oDiv = document.getElementsByClassName("flex-viewport")[0];
	var iHeight = oLi[0].offsetHeight;
	var num = 0;
	oDiv.style.height = iHeight+"px";
	oUl.style.height = iHeight*oLi.length+"px";
	timer =  setInterval(function(){
		num++;
		if(num==4){
			oUl.style.top = 0;
			num=1;
		}
		startMove(oUl,{top:-iHeight*num});
	},1500)
	window.onresize = function(){
		clearInterval(timer);
		iHeight = oLi[0].offsetHeight;
		oDiv.style.height = iHeight+"px";
		timer =  setInterval(function(){
			num++;
			if(num==4){
				oUl.style.top = 0;
				num=1;
			}
			startMove(oUl,{top:-iHeight*num});
		},1500)
	}
}