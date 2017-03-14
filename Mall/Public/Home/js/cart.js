
	//购物车页面加减效果*********************************************************************
	$(function(){
		$('.plus').click(function(){
			//获得存入购物车自动产生的sid
			//首先要找到当前元素的父级，通过它的父级找到sid的值，不然获得的只有当前这个类的
			var t=$(this).parents().find('.info').eq(0).attr('sid');
			var c=parseInt($('.tr-'+t).find('.text-amount').val())+1;
			$('.tr-'+t).find('.text-amount').val(c);
			var num=$(this).parents().find('.text-amount').get(0).value;
			var oPrice = $('.tr-'+t).find('.s-total');
			oPrice.html('<em>'+(c*oPrice.attr('price'))+'</em>');
			getTotal();
			//发异步
			$.ajax({
				type:"post",
				url:"./index.php?c=cart&a=plus",
				data:{'t':t,'num':num},
				
			});
		})
		$('.minus').click(function(){
			var t=$(this).parents().find('.info').eq(0).attr('sid');
			var c=parseInt($('.tr-'+t).find('.text-amount').val())-1;
			if(c<1){
				c=1
			}
			$('.tr-'+t).find('.text-amount').val(c);
			var num=$(this).parents().find('.text-amount').get(0).value;
			var oPrice=$('.tr-'+t).find('.s-total');
			oPrice.html('<em>'+(c*oPrice.attr('price'))+'</em>');
			getTotal();
			//发异步
			$.ajax({
				type:'post',
				url:'./index.php?c=cart&a=subtract',
				data:{'t':t,'num':num},
			})
		})
	})
	//购物车页购物车加减效果******************************************************************
	function getTotal(){
		var aItem = $('.item');
		var iTotal = 0;
		aItem.each(function(){
			var oCheckBox = $(this).find('input[type="checkbox"]');
			if(oCheckBox.get(0).checked){
				iTotal += parseFloat($(this).find('.s-total em').html());
			}
		});
		$('.total-cart-price').html(iTotal);
	}
	function checkAll(){
		var bChecked = this.checked;
		$("input[type='checkbox']").each(function(){
			this.checked = bChecked;
		});
	}
	$(function(){
			$('.checkit').click(function(){
				getTotal();
			})
			$('.checkAll').click(function(){
				getTotal();
			})
		})