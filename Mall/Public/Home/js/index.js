$(function(){
	//顶部hover效果********************************************************
	$(".zc-my-center").hover(function(){

		$(".zc-my-center-bd").stop().fadeIn();
		
	},function(){
		$(".zc-my-center-bd").fadeOut();
	})
	
	$(".zc-mobile").hover(function(){

		$(".zc-mobile-bd").stop().fadeIn();
		
	},function(){
		$(".zc-mobile-bd").fadeOut();
	})
	
	$(".lianxikefu").hover(function(){
		$(".zc-service-tel").stop().fadeIn();
		
	},function(){
		$(".zc-service-tel").fadeOut();
	})
	
	//顶部hover效果********************************************************
	//二级菜单*************************************************************
	$(".menu-nav-container li").hover(function(){
		$(this).find('.catCon').fadeIn();
	},function(){
		$(this).find('.catCon').fadeOut();
	})
	//二级菜单*************************************************************
	//首页轮播图********************************************************
	//1.鼠标移入显示左右按钮，定时器停止，
	//鼠标移出按钮消失，重启定时器
	$('.focus-inner').hover(function(){
		$('#click').fadeIn('slow');
		clearInterval(timer);
	},function(){
	$("#click").stop().fadeOut("slow");
        timer = setInterval(run,2000);
	});
	//2.自动轮播
	var num=0;
	//函数体
	function run(){
		num++;
		//回流
		if(num==6){
			num=0;
		}
		//让当前图片显示，兄弟图片消失
		  $(".focus-inner img").eq(num).fadeIn().siblings("img").stop().fadeOut();
        $("#ul li").eq(num).css({background:"#A6E1EC"}).siblings().css({background:"#E02D2D"});
	}
	//定时器
	timer=setInterval(run,2000);
	
	//3.手动li切换
	$("#ul li").mouseover(function(){
		//获得小Li的序号
		num=$(this).index();
		//让当前图片显示，兄弟图片消失
		  $(".focus-inner img").eq(num).fadeIn().siblings("img").stop().fadeOut();
        $("#ul li").eq(num).css({background:"#A6E1EC"}).siblings().css({background:"#E02D2D"});
	});
	
	//4.左右切换轮播
	var c=0;
	$("#click .left").click(function(){
		c=1;
		num--;
		//判断
		if(num<0){
			num=5;
		}
		  $(".focus-inner img").eq(num).fadeIn().siblings("img").stop().fadeOut();
        $("#ul li").eq(num).css({background:"#A6E1EC"}).siblings().css({background:"#E02D2D"});
	});
	$("#click .right").click(function(){
			num++;
			if(num>5)
			{
				num=0;
			}
			 $(".focus-inner img").eq(num).fadeIn().siblings("img").stop().fadeOut();
        $("#ul li").eq(num).css({background:"#A6E1EC"}).siblings().css({background:"#E02D2D"});
	});
	//首页轮播图********************************************************
	//精品团购阴影效果********************************************************
	$(".z-tuan-list img").hover(function(){
		move(this,0,10);
	},function(){
		move(this,10,0);
	});
	function move(obj,mc,iTarget){
		clearInterval(obj.timer);
		var iType = mc===0?true:false;
		obj.timer=setInterval(function(){
			if(iType){
				mc++;
			}else{
				mc--;
			}
			$(obj).css({boxShadow:"0 0 "+mc+"px black"});
			if(mc==iTarget){
				clearInterval(obj.timer);
			}
		},10);
	}
	//精品团购阴影效果********************************************************
	//特色购焦点图效果********************************************************
	$("#special li").mouseover(function(){
		//给所有元素绑定事件
		//当前元素不透明，其他兄弟元素半透明
		$(this).css({opacity:1}).siblings().css({opacity:0.5});
	});
	
	$("#special").mouseout(function(){
		$("#special li").css({opacity:1});
	});
	//要修改的效果
//	$('.brand ul li').hover(function(){
//		$(this).find('img').animate({'margin-top':'-280px'},200);
//	},function(){
//		$(this).find('img').animate({'margin-top':'0px'},200);
//	});
	//特色购焦点图效果********************************************************
	
	//1楼轮播图效果********************************************************
	// 1.自动切换
    var shu = 0;
    $('.box1').each(function(i,elm){
    	// 定时器
    	elm.shu = 0;
	    elm.ti = setInterval(rn,1000);
	   $(elm).hover(function(){
       	clearInterval(elm.ti);
       },function(){
       		elm.ti = setInterval(rn,1000);
       });
       $(elm).find(".ul1 div").mouseover(function(){
     	// 或得序号
     	  // 获得left值
     	  elm.shu = $(this).index();
     	  elm.le = elm.shu * -419; 
     	  // 设置动画
     	  $(elm).find(".all1").stop().animate({left:elm.le+"px"},500);
     	  $(elm).find(".ul1 div").eq(elm.shu).css({background:"#B61B1F"}).siblings().css({background:"#3E3E3E"});
     });
       function rn(){
	   		  elm.shu++;
	   		// 回流判断
		       if(elm.shu==4){
		       	    $(elm).find('.all1').css({left:"0px"});
		       	   elm.shu = 1;
		       }
		       // 获得left值
		       var le = elm.shu * -419;
		       // 设置动画
		       $(elm).find('.all1').stop().animate({left:le+"px"},500);
		       // 小li的判断
		       if(elm.shu == 3){
		       	  $(elm).find(".ul1 div").eq(0).css({background:"#B61B1F"}).siblings().css({background:"#3E3E3E"});
		       }else{
		       	  $(elm).find(".ul1 div").eq(elm.shu).css({background:"#B61B1F"}).siblings().css({background:"#3E3E3E"});
		       }
		       
	   }
    });
	

     $('#bt2').click(function(){
     	rn();
     })
     $('#bt1').click(function(){
     	shu--;
     	if(shu<0)
     	{
     		$(".all1").css({left:"-1257px"});
     		shu=3;
     	}
     	var le =(-shu)*419;
       // 设置动画
       $(".all1").stop().animate({left:le+"px"},500);
       // 小li的判断
       if(shu == 4){
       	  $(".ul1 div").eq(0).css({background:"#B61B1F"}).siblings().css({background:"#3E3E3E"});
       }else{
       	  $(".ul1 div").eq(shu).css({background:"#B61B1F"}).siblings().css({background:"#3E3E3E"});
       }
     })

	//1楼轮播图效果********************************************************
	//1.晃动效果********************************************************
	$(".picture").hover(function(){
		//设置动画改编top值
		$(this).animate({top:"58px"},500);
	},function(){
		$(this).animate({top:"70px"},500);
	})
	//1.晃动效果********************************************************

	//内容页效果******************************************************************
	//内容页放大镜tab切换效果********************************************************
		$(".lit").click(function(){
			var imgs = $(this).attr('imgs');
			imgs = imgs.split(',');
			$('.mid-img').attr('src',imgs[0]);
			$('.big-img').attr('src',imgs[1]);
		})
	//内容页规格选中效果********************************************************
	//内容页放大镜tab切换效果******************************************************************
})

	//内容页放大镜效果******************************************************************
	window.onload=function(){
	// 1.抓取元素
	var left = document.getElementsByClassName('left')[0];
	var right = document.getElementsByClassName('right')[0];
	var box = document.getElementsByClassName("box")[0];
	var img = document.getElementsByClassName("img")[0];
	var cover = document.getElementsByClassName("cover")[0];
	cover.style.zIndex = '9';
	// 2.绑定事件
    cover.onmousemove=function(e){

         // 小块显示,右侧 图显示
         box.style.display = "block";
         right.style.display = "block";
         // 获得鼠标坐标位置
         var ev = e || window.event;
         var l = ev.offsetX || ev.layerX;
         var t = ev.offsetY || ev.layerY;
         document.title = l +"|"+ t;
         // 获得小色块的位置
         var left = l - 100;
         var top = t - 100;
         // 色块范围的判断
         if(left>200){
         	left = 200;
         }
         if(left<0){
         	left = 0;
         }
         if(top>200){
         	top = 200;
         }
         if(top<0){
         	top = 0;
         }
         // 把值赋给小色块
         box.style.left = left + "px";
         box.style.top = top + "px";
         // 设置大图片的值
         img.style.left = left * -2 + "px";
         img.style.top = top * -2 + "px";



    }
    cover.onmouseout=function(){
    	 // 小块和右侧图消失
         box.style.display = "none";
         right.style.display = "none";
    }
}
	
	//内容页放大镜效果******************************************************************
	//内容页购物车加减效果******************************************************************
	$(function(){
		$("#count .plus").click(function(){
			var number=parseInt($('.zs-goods-number').val())+1;
			if(number>2){
				number=2;
			}
			$('.zs-goods-number').val(number);
			
		});
		$('.subtract').click(function(){
			var number=parseInt($('.zs-goods-number').val())-1;
			if(number<1){
				number=1;
			}
			$('.zs-goods-number').val(number);
		})
	})
	
	//内容页购物车加减效果******************************************************************
	$(function(){
		//绑定事件给加入购物车
		$('.cartIn').click(function(){
			//获取商品id
			var id=$(".zs-commodity-title ").attr('id');
			//获取商品名称
			var name=$(".zs-commodity-title").attr('name');
			//获取商品商城价格
			var price=$(".mprice").attr('price');
			//获得加入购物车的数量
			var num=$(".zs-goods-number").attr('value');
			//获得商品列表图
			var list=$(".mid-img").attr('src');
			//获得组合属性id
			var groupId = [];
			$(".active").each(function(){
				groupId.push($(this).attr('gpid'));
				
			});
			var sIds = groupId.join(',');
			$.ajax({
				//请求地址
				url:'./index.php?c=cart&a=cartIn',
				//请求地址
				type:'post',
				//发送数据
				data:{'id':id,
					'name':name,
					'price':price,
					'num':num,
					'sIds':sIds,
					'list':list,
				},
				//指定php返回数据类型
				dataType:'json',
				//数据库的响应
				success:function(phpData){
					var num=0;
					var totall=0;
					$.each(phpData,function(k,v){
						 num+=v.num;
						 totall+=v.total;
					})
					$('#zs-cart-number').html(num);
					$('#em').html(num);
					$('#zs-total-price').html(totall);
				}
			})
		})
	})
















