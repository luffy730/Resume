//订单页 地址异步效果************************************************************************
$(function(){
	area.init('addarea');
			//修改的时候默认被选中效果
			area.selected('河北','石家庄','新华区');
			area.init('editarea');
	$(".add").submit(function(){
//		var d = $(this).serialize();
		var consignee=$('#deliverName').val();
		var province=$('#addarea1').val();
		var city=$('#addarea2').val();
		var area=$('#addarea3').val();
		var FullAddress=$('#deliverAddress').val();
		var rphone=$('#deliverMobile').val();
		var rfixphone=$('#deliverPhone').val();
		var order_orid=$('.orId').val();
		var _this = this;
		var html = '';
		var act = $("#action").val();
		if(act=='edit'){
			var consignee=$('.recinput').val();
			var FullAddress=$('.addinput').val();
			var province=$('#editarea1').val();
			var city=$('#editarea2').val();
			var area=$('#editarea3').val();
			var rphone=$('.mo').val();
			var rfixphone=$('.ph').val();
			var rid=$('.ride').val();
			var action = $("#action").val();
			$.ajax({
				//请求地址
				url:'index.php?c=order&a=magic',
				//请求方式
				type:'post',
				//发送数据
				data:{
					'consignee':consignee,
					'FullAddress':FullAddress,
					'province':province,
					'city':city,
					'area':area,
					'rphone':rphone,
					'rfixphone':rfixphone,
					'rid':rid,
					'action':action
				},
				//指定服务器返回数据类型
				dataType:'json',
				success:function(phpData){
					console.log(phpData);
					// if(!.nick){
						$(".address-"+phpData.rid).find('.address').html('<span>'+phpData.FullAddress+'</span><span>'+phpData.rphone+'</span>');
					$(".address-"+phpData.rid).find('.namer').html(phpData.consignee);
					
					// }
					// $('.newdress').html('<span>'+phpData.FullAddress+'</span><span>'+phpData.rphone+'</span>');
					// $('.nick').html('phpData.consignee');
					
				}
			})
			
			return;
		}
		//发异步
		$.ajax({
			//请求方式
			type:"post",
			//请求地址
			url:"./index.php?c=order&a=add",
			//发送数据
			data:{  'consignee':consignee,
					'FullAddress':FullAddress,
					'province':province,
					'city':city,
					'area':area,
					'rphone':rphone,
					'rfixphone':rfixphone,
					'order_orid':order_orid,
					},
			//指定服务器返回的类型
			dataType:'json',
			success:function(phpData){
				console.log(phpData);
				//创建一个新的节点
				var cc=document.createElement('li');
				//声明一个空字符串用来保存重组的字符串，否则会被最后一条覆盖只剩一条
				var li = '';
				li +='<li class="current delete address-'+phpData.rid+'" id="list_733038" addliid="'+phpData.rid+'"><label>';
				li +='<input autocomplete="off" id="addressId_733038" truename="" provinceid="2" cityid="494" address="水电费水电费是" mobile="15678909876" tel="" isdefault="1" name="addressId" type="radio" value="733038">';
				li +='<span><strong>[默认]<em class="namer nick">'+phpData.consignee+'</em><strong class="address newdress">'+phpData.province+' '+phpData.city+' '+phpData.area+' '+phpData.FullAddress+' '+phpData.rphone+'</strong></span>  </label>';
				li +='<div class="operate" style="display: block; float: right;">';
				li +='<a class="edit" onclick="edit.call(this)" href="javascript:void(0)">编辑</a> ';
				li +=' <a class="delete" href="javascript:void(0)">删除</a>';
				li +='</div></li>';
                  $('.address-list').append(li); 
                  //异步删除
                  $(".delete").click(function(){
                  	var rid=$(this).parents('.current').attr('addliid');
                  	$.ajax({
                  		//请求方式
                  		type:'post',
                  		//请求地址
                  		url:'./index.php?c=order&a=dele',
                  		//发送数据
                  		data:{'rid':rid},
                  		//指定数据库返回的数据类型
                  		dataType:'json',
                  	});
                  	$(this).parents('.current').remove();
                  	
		})
                //编辑
                $('.edit').click(function(){
              
                	var _this= $(this);
			var rid=$(this).parents('.current').attr('addliid');
			$("#action").val('edit');

			$.ajax({
				//请求方式
				type:'post',
				//请求地址
				url:'./index.php?c=order&a=change',
				//发送数据
				data:{'rid':rid},
				//指定服务器返回数据类型
				dataType:'json',
				//服务器的响应
				success:function(phpData){
					$('.recinput').val(phpData.consignee);
					$('.addinput').val(phpData.FullAddress);
					$('.mo').val(phpData.rphone);
					$('.ph').val(phpData.rfixphone);
					$('.ride').val(phpData.rid);
					addarea.selected(phpData.province,phpData.city,phpData.area);
				
					// $(".address-"+phpData.rid).find('.address').html('<span>'+phpData.FullAddress+'</span><span>'+phpData.rphone+'</span>');
					// $(".address-"+phpData.rid).find('.namer').html(phpData.consignee);
				
					
				}
			})
		$('.editBox').fadeIn('fast');

                })
			}
		});
	})
		
	//城市联动效果************************************************************************
	//初始化方法
			// area.init('area');
			// //修改的时候默认被选中效果
			// area.selected('河北','石家庄','新华区');
			
	//城市联动效果************************************************************************
	$('.del').click(function(){
		var _this= this;
		var rid=$(this).parents('.current').attr('addliid');
		$.ajax({
			//请求方式
			type:"post",
			//请求地址
			url:"./index.php?c=order&a=dele",
			//发送数据
			data:{'rid':rid},
		});
		$(this).parents('.current').remove();
		
	})
	//异步编辑
		$(".edi").click(function(){

			var _this= $(this);
			var rid=$(this).parents('.current').attr('addliid');
			$("#action").val('edit');
			$.ajax({
				//请求方式
				type:'post',
				//请求地址
				url:'./index.php?c=order&a=change',
				//发送数据
				data:{'rid':rid},
				//指定服务器返回数据类型
				dataType:'json',
				//服务器的响应
				success:function(phpData){
					$('.recinput').val(phpData.consignee);
					$('.addinput').val(phpData.FullAddress);
					$('.mo').val(phpData.rphone);
					$('.ph').val(phpData.rfixphone);
					$('.ride').val(phpData.rid);
					area.selected(phpData.province,phpData.city,phpData.area);
					
				}
			})
			$('.editBox').fadeIn('fast');
			$('.addbox').fadeOut('fast');

		});
	$('.savebtn').click(function(){
		$('.addbox').fadeOut('fast');
		$('.editBox').fadeOut('fast');
	})
})
//订单页 地址异步效果************************************************************************

$(function(){

	//添加地址隐藏显示效果
	$('.add_address').click(function(){
		$('.addbox').fadeIn('fast');
		$('.add').get(0).reset(); 
		$("#action").val('add');
		$('.editBox').fadeOut('fast');
		
	})
	//添加地址隐藏显示效果
	
})
