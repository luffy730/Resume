$(function(){
//	//内容页规格选中效果********************************************************
//	
	$('.cur').click(function(){
		var selectIds = [];
		$(this).addClass('active');
		$(this).siblings('.cur').removeClass('active');
		$(this).find('span').css({borderColor:"#c00"});
		$(this).siblings('.cur').find('span').css({borderColor:'#e6e6e6'});
		$(this).find('span').find('i').css({display:'block'});
		$(this).siblings('.cur').find('span').find('i').css({display:'none'});
		$(".active").each(function(){
			selectIds.push($(this).attr('gpid'));
		});
		$('.korea').val(selectIds);
		$(".glname").hide();
		var tmp = [];
		$(".glname").each(function(){
			var name = $(this).attr('groupid');
			var arr = name.split(',');

			
			if(isSame(arr,selectIds)){
				$(this).show();
				return;
			}
		});
		$.post(addPriceUrl,{'combine':selectIds.join(',')},function(re){
			
			var oldPrice = $(".zs-price em");
			var old = parseFloat(oldPrice.attr('price'));
			var re = parseFloat(re);
			if(re>0)oldPrice.html(re+old+'.00');
		})
	})
//	//内容页规格选中效果********************************************************
})
function isSame(arr1,arr2){
	if(arr1.length!=arr2.length)return false;
	var tmp = [];
	for(var i=0;i<arr1.length;i++){
		for(var j=0;j<arr2.length;j++){
			if(arr1[i]==arr2[j]){
				tmp.push(i);
			}
		}
	}
	return (tmp.length==arr1.length && tmp.length==arr2.length);
}
//	//内容页规格选中效果********************************************************
//	//内容页加入购物车效果********************************************************
	$(function(){
		$('.cartIn').click(function(){
			$('.zs-layer-box').fadeIn('fast');
		})
		$('.shopstill').click(function(){
			$('.zs-layer-box').fadeOut('fast');
		})
	})
//	//内容页加入购物车效果********************************************************

