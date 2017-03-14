//个人中心收货地址异步*************************************************************************
$(function(){
	$('.edit').click(function(){
	var _this= this;
	var rid=$(this).parents('.address').attr('rid');
		$.ajax({
			//请求方式
			type:'post',
			//请求地址
			url:'index.php?c=MyOrder&a=rid',
			//发送数据
			data:{'rid':rid},
			//指定服务器返回数据类型
			dataType:'json',
			success:function(phpData){
				console.log(phpData);
				$('.receiver').val(phpData.consignee);
				$('.full').val(phpData.FullAddress);
				$('.phone').val(phpData.rphone);
				$('.tel-after').val(phpData.rfixphone);
				$('.pr').val(phpData.province);
				$('.ci').val(phpData.city);
				$('.ar').val(phpData.area);
				area.selected(phpData.province,phpData.city,phpData.area);
				$('.rid').val(phpData.rid);
//				var str= '';
//				str +='<div class="addr-item clearfix"><label class="block-title">';
//				str +='收货人：<em>*</em></label><div class="form-part">';
//				str +='<input type="text" name="" class="receiver" value="'+phpData.consignee+'"></div></div>';
//				str +='<div class="addr-item clearfix" style="z-index:3;"><label class="block-title">';
//				str +='所在地区：<em>*</em></label><div class="form-part">';
//				str +='<div class="select-block"><input type="text" value="请选择省" readonly="readonly">';
//				str +='<label for="" class="arrow-icon"></label></div>';
//				str +='<div class="select-block city-select">';		
//				str +='<input type="text" value="请选择城市" readonly="readonly">';			
//				str +='<label for="" class="arrow-icon"></label></div></div></div>';			
//				str +='<div class="addr-item clearfix jiedao">
//						<label class="block-title">
//							街道地址：
//							<em>*</em>
//						</label>
//						<div class="form-part">
//							<textarea name="" rows="" cols=""></textarea>
//						</div>
//					</div>';
//				str +='<div class="addr-item clearfix">
//						<label class="block-title">
//							邮政编码：
//							<em>*</em>
//						</label>
//						<div class="form-part">
//							<input type="text">
//						</div>
//					</div>';
//				str +='<div class="addr-item clearfix">
//						<label class="block-title" for="">固定电话：</label>
//						<div class="form-part">
//							<input class="tel-pre" type="text">
//							<em class="short-line"></em>
//							<input class="tel-after" type="text">
//							<span class="normal-tip">例如：010-84852254-123（分机号可以忽略）</span>
//						</div>
//					</div>';
//				str +='<div class="addr-item clearfix">
//						<label class="block-title">
//							手机号：
//							<em>*</em>
//						</label>
//						<div class="form-part">
//							<input type="text">
//						</div>
//					</div>';
//				str +='<div class="addr-item clearfix">
//						<label class="block-title">
//							电子邮件：
//							<em>*</em>
//						</label>
//						<div class="form-part">
//							<input type="text">
//						</div>
//					</div>';
				
			}
		})
		$('.sub').click(function(){
			var consignee=$('.receiver').val();
			var province=$('.pr').val();
			var city=$('.ci').val();
			var area=$('.ar').val();
			var FullAddress=$('.full').val();
			var rfixphone=$('.tel-after').val();
			var rphone=$('.phone').val();
			var rid=$('.rid').val();
			var action=$('.action').val();
			$.ajax({
				//请求方式
				type:'post',
				//请求地址
				url:'./index.php?c=MyOrder&a=edit',
				//发送数据
				data:{	'consignee':consignee,
						'province':province,
						'city':city,
						'area':area,
						'FullAddress':FullAddress,
						'rfixphone':rfixphone,
						'rphone':rphone,
						'rid':rid,
						'action':action,
				},
				//指定服务器返回数据类型
				dataType:'json',
				success:function(php){
					console.log(php);
					$("tr[rid="+php.rid+"]").find('.name').html(php.consignee);
					$("tr[rid="+php.rid+"]").find('.address-detail').html(php.FullAddress);
					$("tr[rid="+php.rid+"]").find('.tel').html(php.rphone);
					$("tr[rid="+php.rid+"]").find('.one').html('<span>'+php.province+'</span> <span>'+php.city+'</span>');
					
				}
				
			})
		
	});
		
		
	})
	//城市联动******************************************************
	//初始化方法
			area.init('area');
			//修改的时候默认被选中效果
			area.selected('黑龙江','哈尔滨','道里区');
	//城市联动******************************************************
		//异步删除*********************************************************
		$(".del").click(function(){
			var _this= $(this);
			var rid=$(this).parents('.address').attr('rid');
			$.ajax({
				//请求方式
				type:'post',
				//请求地址
				url:'index.php?c=order&a=dele',
				//发送数据
				data:{'rid':rid},
				
			});
			$(this).parents('.address').remove();
		})
		//异步删除*********************************************************
			
})
//个人中心收货地址异步*************************************************************************