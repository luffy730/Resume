//我的订单js效果***********************************************************
$(function(){
	$('.pay-btn').click(function(){
		var _this =$(this);
		var orid=$(this).parents('.cell7').attr('orid');
		var orderNumber=$(this).parents('.cell7').attr('orderNumber');
		var consignee=$(this).parents('.cell7').attr('consignee');
		var recieveAddress=$(this).parents('.cell7').attr('recieveAddress');
		var riseTime=$(this).parents('.cell7').attr('riseTime');
		var remark=$(this).parents('.cell7').attr('remark');
		var clid=$(this).parents('.cell7').attr('clid');
		var orderStatus=$(this).parents('.cell7').attr('orderStatus');
		var priceAggregate=$(this).parents('.cell7').attr('priceAggregate');
		 swal("Good!", "付款成功", "success");
		$.ajax({
			url:'./index.php?m=Home&c=myorder&a=last',
			type:'post',
			data:{
			'orid':orid,
			'orderStatus':orderStatus,
			'orderNumber':orderNumber,
			'consignee':consignee,
			'recieveAddress':recieveAddress,
			'riseTime':riseTime,
			'clid':clid,
			'remark':remark,
			'priceAggregate':priceAggregate
			},
			dataType:'json',
			success:function(phpData){
				console.log(phpData);
				$('.red').html('已付款，代发货');
			}
		})
	})
	$('.order-cancel').click(function(){
		var _this =$(this);
		var orid=$(this).parents('.cancel-order').attr('orid');
		var orderNumber=$(this).parents('.cancel-order').attr('orderNumber');
		var consignee=$(this).parents('.cancel-order').attr('consignee');
		var recieveAddress=$(this).parents('.cancel-order').attr('recieveAddress');
		var riseTime=$(this).parents('.cancel-order').attr('riseTime');
		var remark=$(this).parents('.cancel-order').attr('remark');
		var clid=$(this).parents('.cancel-order').attr('clid');
		var orderStatus=$(this).parents('.cancel-order').attr('orderStatus');
		var priceAggregate=$(this).parents('.cancel-order').attr('priceAggregate');
		 swal("Good!", "订单已取消", "success");
		$.ajax({
			url:'./index.php?m=Home&c=myorder&a=cancel',
			type:'post',
			data:{
			'orid':orid,
			'orderStatus':orderStatus,
			'orderNumber':orderNumber,
			'consignee':consignee,
			'recieveAddress':recieveAddress,
			'riseTime':riseTime,
			'clid':clid,
			'remark':remark,
			'priceAggregate':priceAggregate
			},
			dataType:'json',
			success:function(phpData){
				console.log(phpData);
				_this.parents('.addition').next('.order-table').find('.red').html('订单已失效');
			}
		})
	})
})
//我的订单js效果***********************************************************
