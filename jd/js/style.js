// JavaScript Document
// 大轮播图	
$(function(){
		var num=0;
		var timer=0;
		function run(){
			num++;
			if(num>=6)
			{
				num=0;
			}
			$('#content_center ul li').css({background:'#ccc'});
			$('#content_center img').css({display:'none'});
			$('#content_center ul li').eq(num).css({background:'yellow'});
			$('#content_center img').eq(num).css({display:'block'});
		}
		timer=setInterval(run,1000);
		$('#content_center').mouseover(function(){
			clearInterval(timer);
		});
		$('#content_center').mouseout(function(){
			timer = setInterval(run,1000);
		});
		
		$('#content_center ul li').mouseover(function(){
		var num=$(this).index();
		$('#content_center img').css({display:'none'});
		$('#content_center ul li').css({background:'#ccc'});
		$('#content_center img').eq(num).css({display:'block'});
		$('#content_center ul li').eq(num).css({background:'yellow'});

		});
		$('#btn1').click(function(){
			run();
		});
		$('#btn').click(function(){
			num--;
			if(num<=-1)
			{
				num=5;
			}
			$('#content_center ul li').css({background:'#ccc'});
			$('#content_center img').css({display:'none'});
			$('#content_center ul li').eq(num).css({background:'yellow'});
			$('#content_center img').eq(num).css({display:'block'});

		})
		// 大轮播结束
	
		// 二级菜单Hover效果
		$('#b2').hover(function(){
			$('#c2').css({display:"block"});
		},function(){
			$('#c2').css({display:'none'});
		})
		$('#c2').hover(function(){
			$('#c2').css({display:"block"});
		},function(){
			$('#c2').css({display:'none'});
		});

		$('#b3').hover(function(){
			$('#c3').css({display:"block"});
		},function(){
			$('#c3').css({display:'none'});
		})
		$('#c3').hover(function(){
			$('#c3').css({display:"block"});
		},function(){
			$('#c3').css({display:'none'});
		});

		$('#b4').hover(function(){
			$('#c4').css({display:"block"});
		},function(){
			$('#c4').css({display:'none'});
		})
		$('#c4').hover(function(){
			$('#c4').css({display:"block"});
		},function(){
			$('#c4').css({display:'none'});
		});

		$('#b5').hover(function(){
			$('#c5').css({display:"block"});
		},function(){
			$('#c5').css({display:'none'});
		})
		$('#c5').hover(function(){
			$('#c5').css({display:"block"});
		},function(){
			$('#c5').css({display:'none'});
		});

		$('#b6').hover(function(){
			$('#c6').css({display:"block"});
		},function(){
			$('#c6').css({display:'none'});
		})
		$('#c6').hover(function(){
			$('#c6').css({display:"block"});
		},function(){
			$('#c6').css({display:'none'});
		});

		$('#b7').hover(function(){
			$('#c7').css({display:"block"});
		},function(){
			$('#c7').css({display:'none'});
		})
		$('#c7').hover(function(){
			$('#c7').css({display:"block"});
		},function(){
			$('#c7').css({display:'none'});
		});

		$('#b8').hover(function(){
			$('#c8').css({display:"block"});
		},function(){
			$('#c8').css({display:'none'});
		})
		$('#c5').hover(function(){
			$('#c8').css({display:"block"});
		},function(){
			$('#c8').css({display:'none'});
		});

		$('#b9').hover(function(){
			$('#c9').css({display:"block"});
		},function(){
			$('#c9').css({display:'none'});
		})
		$('#c9').hover(function(){
			$('#c9').css({display:"block"});
		},function(){
			$('#c9').css({display:'none'});
		});

		$('#b10').hover(function(){
			$('#c10').css({display:"block"});
		},function(){
			$('#c10').css({display:'none'});
		})
		$('#c10').hover(function(){
			$('#c10').css({display:"block"});
		},function(){
			$('#c10').css({display:'none'});
		});

		$('#b11').hover(function(){
			$('#c11').css({display:"block"});
		},function(){
			$('#c11').css({display:'none'});
		})
		$('#c11').hover(function(){
			$('#c11').css({display:"block"});
		},function(){
			$('#c11').css({display:'none'});
		});

		$('#b12').hover(function(){
			$('#c12').css({display:"block"});
		},function(){
			$('#c12').css({display:'none'});
		})
		$('#c12').hover(function(){
			$('#c12').css({display:"block"});
		},function(){
			$('#c12').css({display:'none'});
		});

		$('#b13').hover(function(){
			$('#c13').css({display:"block"});
		},function(){
			$('#c13').css({display:'none'});
		})
		$('#c13').hover(function(){
			$('#c13').css({display:"block"});
		},function(){
			$('#c13').css({display:'none'});
		});

		$('#b14').hover(function(){
			$('#c14').css({display:"block"});
		},function(){
			$('#c14').css({display:'none'});
		})
		$('#c14').hover(function(){
			$('#c14').css({display:"block"});
		},function(){
			$('#c14').css({display:'none'});
		});

		$('#b15').hover(function(){
			$('#c15').css({display:"block"});
		},function(){
			$('#c15').css({display:'none'});
		})
		$('#c15').hover(function(){
			$('#c15').css({display:"block"});
		},function(){
			$('#c15').css({display:'none'});
		});
		// 耳机菜单HOver结束

		// 京东品质图片移动效果

		$(".brandstreetTop").hover(function(){
			$('.bradtTr').animate({right:'30px',opacity:"0"},1000);
		},function(){
			$('.bradtTr').stop().animate({right:'0px',opacity:'1'},1000);
		});
		// 京东品质图片移动效果结束

		// 1楼Tab切换开始
		$('#gehu1').hover(function(){
			$('#top_son').css({display:'block'});
			$('.bottom_son').css({display:'block'});
		},function(){
			$('#top_son').css({display:'none'});
			$('.bottom_son').css({display:'none'});
		})
		// 1楼Tab切换结束
		// 小轮播开始
		var ch=0;
		$('#box').hover(function(){
			$('.click').stop().fadeIn();
		},function(){
			$('.click').fadeOut();
		});
		

		$('#Btn2').click(function(){
			ch++;
			if(ch==5)
			{
				$('.all').css({left:'0px'});
				ch=1;
			}
			var l=ch*-1000;
			$('.all').stop().animate({left:l+'px'});
		});
		$('#Btn1').click(function(){
			ch--;
			if(ch<0){
				$('.all').css({left:-4000+'px'});
				ch=3;
			}
			// document.title=ch;
			var r=-ch*1000;
			$('.all').stop().animate({left:r+'px'});
		});
		// 小轮播结束

		// 左边下拉效果
		$('#elevator li').hover(function(){
			var num=0
			 $(this).css({opacity:1}).siblings().css({opacity:0.5});
		},function(){
			$("#elevator ").css({opacity:1});
		});
		$(window).scroll(function(){
			var t=$(window).scrollTop();
			// document.title=t;
			if(t>1000){
				$('#elevator').fadeIn('fast');
			}else{
				$('#elevator').fadeOut('fast');
			}
		});
		$("#elevator li").each(function(i,elm){
			$(elm).mouseover(function(event) {
				var aAs = this.getElementsByTagName('a');
				aAs[0].style.display = 'none';
				aAs[1].style.display = 'block';
			});
			$(elm).mouseout(function(event) {
				var aAs = this.getElementsByTagName('a');
				aAs[0].style.display = 'block';
				aAs[1].style.display = 'none';
			});
		});
		
		// 左边下拉效果结束
		

		// 右边小图标效果
		$('.rightHAllSon ').hover(function(){
			$(this).find('.rightHAllSonHide').stop().animate({'right':'35px'}).css({background:"#c81623",display:'block'});
			
		},function(){
			$(this).find('.rightHAllSonHide').stop().animate({'right':'-95px'}).css({background:'#7A6E6E'});
		})
		// 右边小图标效果结束
		// 2楼Tab切换开始

		$('.topSon').mouseover(function(){
			var ss=$(this).index('.topSon');
			// document.title=ss;
			$(".cosmeticsfootRight").hide();
			$(".cosmeticsfootRight").eq(ss).stop().fadeIn('fast');
			$('.topSon').eq(ss).css({borderColor:'#c81623'});
			
			$('.topSon').mouseout(function(){
				$('.topSon').eq(ss).css({borderColor:'transparent'});
			});

		});
		// 2楼Tab切换结束
		// 3楼Tab切换
		$('.fourT').mouseover(function(){
			var ll=$(this).index('.fourT');
			document.title=ll;
			$('.fourB').hide();
			$('.fourB').eq(ll).css({display:'block'});
			$('.fourT').eq(ll).css({borderColor:'#c81623'});

			$('.fourT').mouseout(function(){
				$('.fourT').eq(ll).css({borderColor:'transparent'});
			});
		});
		
		// 3楼Tab切换
		// 4楼Tab切换
		$('.fiveT').mouseover(function(){
			var aa=$(this).index('.fiveT');
			// document.title=aa;
			$('.fiveB').hide();
			$('.fiveB').eq(aa).css({display:'block'});
			$('.fiveT').eq(aa).css({borderColor:'#c81623'});

			$('.fiveT').mouseout(function(){
				$('.fiveT').eq(aa).css({borderColor:'transparent'});
			});
		});
		// 4楼Tab切换结束
		// 5楼Tab切换结束
		$('.sixT').mouseover(function(){
			var ee=$(this).index('.sixT');
			// document.title=aa;
			$('.sixB').hide();
			$('.sixB').eq(ee).fadeIn('fast');
			$('.sixT').eq(ee).css({borderColor:'#c81623'});

			$('.sixT').mouseout(function(){
				$('.sixT').eq(ee).css({borderColor:'transparent'});
			});
		});
		// 5楼Tab切换结束
		// 1楼轮播图

		$('.floorTwo').hover(function(){
		$('.an').fadeIn('fast');
		clearInterval(time);
	},function(){
		$('.an').fadeOut('fast');
		time=setInterval(pao,1000);
	});
		var e=0;
		function pao(){
			e++;
			if(e==4){
				e=0;
			}
		
			$('.floorTwo img').eq(e).css({display:'block'}).siblings('img').css({display:'none'});
				$('#list li').eq(e).css({background:'#B861BF'}).siblings().css({background:"#3e3e3e"});
		}
		time=setInterval(pao,1000);
		$('#list li').mouseover(function() {
			e=$(this).index();
			$('.floorTwo img').eq(e).css({display:'block'}).siblings('img').css({display:'none'});
				$('#list li').eq(e).css({background:'#B861BF'}).siblings().css({background:"#3e3e3e"});
		});
		var w=0;
		$('#an1 ').click(function(){
			// if(w==1){
			// 	return;
			// }
			// setTimeout(function(){
			// 	w=0;
			// },1000);
			// w=1;
			e--;
			if(e<0)
			{
				e=3;
			}
			$('.floorTwo img').eq(e).css({display:'block'}).siblings('img').css({display:'none'});
				$('#list li').eq(e).css({background:'#B861BF'}).siblings().css({background:"#3e3e3e"});
		});
		$('#an2').click(function(){
			e++;
			if(e>4)
			{
				e=0;
			}
			$('.floorTwo img').eq(e).css({display:'block'}).siblings('img').css({display:'none'});
				$('#list li').eq(e).css({background:'#B861BF'}).siblings().css({background:"#3e3e3e"});
		})
		// 1楼轮播图结束
		// 2楼轮播图结束
			$('.slider').hover(function(){
		clearInterval(tim);
		$('.Bniu').fadeIn();
	},function(){
		tim=setInterval(go,1000);
		$('.Bniu').fadeOut();
	});
	var i=0;
	function go()
	{
		i++;
		if(i>=4)
		{
			i=0;
		}
		$('.sliderTop img').eq(i).css({display:'block'}).siblings('img').css({display:'none'});
		$('.sliderFoot img').eq(i).css({display:'block'}).siblings('img').css({display:'none'});
		$('#lie li').eq(i).css({background:'red'}).siblings().css({background:'#ccc'});
	}
	tim=setInterval(go,1000);

		$('#lie li').mouseover(function(){
			i=$(this).index();
			$('.sliderTop img').eq(i).css({display:'block'}).siblings('img').css({display:'none'});
			$('.sliderFoot img').eq(i).css({display:'block'}).siblings('img').css({display:'none'});
			$('#lie li').eq(i).css({background:'red'}).siblings().css({background:"#ccc"});
		});
		var i=0;
		$('#niu1').click(function(){
			i--;
			if(i<0)
			{
				i=3;
			}
			$('.sliderTop img').eq(i).css({display:'block'}).siblings('img').css({display:"none"});
			$('.sliderFoot img').eq(i).css({display:'block'}).siblings('img').css({display:"none"});
			$('#lie li').eq(i).css({background:'red'}).siblings('').css({background:'#ccc'});
		});
		$('#niu2').click(function(){
			i++;
			if(i==4){
				i=0;
			}
			$('.sliderTop img').eq(i).css({display:'block'},500).siblings('img').css({display:"none"});
			$('.sliderFoot img').eq(i).css({display:'block'}).siblings('img').css({display:"none"});
			$('#lie li').eq(i).css({background:'red'}).siblings('').css({background:'#ccc'});
		})
		// 2楼轮播图结束
		// 3楼轮播图结束
		$('#haoteshu').hover(function(){
		$('.aan').fadeIn('slow');
		clearInterval(jian);
	},function(){
		$('.aan').fadeOut('slow');
		jian=setInterval(zou,1000);
	})
	var h=0;
	function zou(){
		h++;
		if(h==4)
		{
			h=0;
		}
		$('#haoteshu img').eq(h).stop().fadeIn('fast').siblings('img').stop().fadeOut('fast');
		$('.quanbu div').eq(h).css({background:'#3e3e3e'}).siblings().css({background:'#ccc'});
	}
	jian=setInterval(zou,1000);

	$('.quanbu div').mouseover(function(){
		var h=$(this).index();
		$('#haoteshu img').eq(h).fadeIn().siblings('img').fadeOut();
		$('.quanbu div').eq(h).css({background:'#3e3e3e'}).siblings('').css({background:'#ccc'});
	});
		var h=0;
		$('#aan1').click(function(){
			h--;
			if(h<0)
			{
				h=3;
			}
			$('#haoteshu img').eq(h).fadeIn().siblings('img').fadeOut();
			$('.quanbu div').eq(h).css({background:'#3e3e3e'}).siblings().css({background:'#ccc'});
		})
		$('#aan2').click(function(){
			h++;
			if(h==4)
			{
				h=0;
			}
			$('#haoteshu img').eq(h).fadeIn().siblings('img').fadeOut();
			$('.quanbu div').eq(h).css({background:'#3e3e3e'}).siblings().css({background:'#ccc'});
		})
		// 3楼轮播图结束
		// 4楼轮播图
		// 1.自动切换
    var shu = 0;
	// 函数体
    function rn(){
       shu++;
       // 回流判断
       if(shu==5){
       	   $(".all1").css({left:"0px"});
       	   shu = 1;
       }
       // 获得left值
       var le = shu * -439;
       // 设置动画
       $(".all1").stop().animate({left:le+"px"},500);
       // 小li的判断
       if(shu == 5){
       	  $(".ul1 div").eq(0).css({background:"#B61B1F"}).siblings().css({background:"#3E3E3E"});
       }else{
       	  $(".ul1 div").eq(shu).css({background:"#B61B1F"}).siblings().css({background:"#3E3E3E"});
       }

    }
	// 定时器
	ti = setInterval(rn,1000);

    //2. 鼠标移入停止定时器
    $(".box1").hover(function(){
        clearInterval(ti);
        $('.bt').fadeIn();
    },function(){
	    ti = setInterval(rn,1000);
	      $('.bt').fadeOut();
    });

    //3. 手动切换
     $(".ul1 div").mouseover(function(){
     	// 或得序号
     	  shu = $(this).index();
     	  // 获得left值
     	  var le = shu * -439; 
     	  // 设置动画
     	  $(".all1").stop().animate({left:le+"px"},500);
     	  $(".ul1 div").eq(shu).css({background:"#B61B1F"}).siblings().css({background:"#3E3E3E"});
     });

     $('#bt2').click(function(){
     	rn();
     })
     $('#bt1').click(function(){
     	shu--;
     	if(shu<0)
     	{
     		$(".all1").css({left:"-1740px"});
     		shu=3;
     	}
     	var le =(-shu)*439;
       // 设置动画
       $(".all1").stop().animate({left:le+"px"},500);
       // 小li的判断
       if(shu == 5){
       	  $(".ul1 div").eq(0).css({background:"#B61B1F"}).siblings().css({background:"#3E3E3E"});
       }else{
       	  $(".ul1 div").eq(shu).css({background:"#B61B1F"}).siblings().css({background:"#3E3E3E"});
       }
     })
		// 4楼轮播图结束
		// 5楼轮播图
		// 1.自动切换
    var lia = 0;
	// 函数体
    function lai(){
       lia++;
       // 回流判断
       if(lia==5){
       	   $(".all2").css({left:"0px"});
       	   lia = 1;
       }
       // 获得left值
       var lle = lia * -435;
       // 设置动画
       $(".all2").stop().animate({left:lle+"px"},500);
       // 小li的判断
       if(lia == 5){
       	  $(".ul2 div").eq(0).css({background:"#B61B1F"}).siblings().css({background:"#3E3E3E"});
       }else{
       	  $(".ul2 div").eq(lia).css({background:"#B61B1F"}).siblings().css({background:"#3E3E3E"});
       }

    }
	// 定时器
	to = setInterval(lai,1000);

    //2. 鼠标移入停止定时器
    $(".box2").hover(function(){
        clearInterval(to);
        $('.bit').fadeIn();
    },function(){
	    to = setInterval(run1,1000);
	      $('.bit').fadeOut();
    });

    //3. 手动切换
     $(".ul2 div").mouseover(function(){
     	// 或得序号
     	  lia = $(this).index();
     	  // 获得left值
     	  var lle = lia * -435; 
     	  // 设置动画
     	  $(".all2").stop().animate({left:lle+"px"},500);
     	  $(".ul2 div").eq(lia).css({background:"#B61B1F"}).siblings().css({background:"#3E3E3E"});
     });

     $('#bit2').click(function(){
     	lai();
     })
     $('#bit1').click(function(){
     	lia--;
     	if(lia<0)
     	{
     		$(".all2").css({left:"-1740px"});
     		lia=3;
     	}
     	var lle =(-lia)*435;
       // 设置动画
       $(".all2").stop().animate({left:lle+"px"},500);
       // 小li的判断
       if(lia == 4){
       	  $(".ul2 div").eq(0).css({background:"#B61B1F"}).siblings().css({background:"#3E3E3E"});
       }else{
       	  $(".ul2 div").eq(lia).css({background:"#B61B1F"}).siblings().css({background:"#3E3E3E"});
       }
     })
		// 4楼轮播图结束


		//猜你喜欢切换效果
		var ui=0;
		$('#guessAll .guessC').click(function(){
			ui++;
			if(ui==4)
			{
				ui=0;
			}
			$('.gusfr').eq(ui).css({display:'block'}).siblings('.gusfr').css({display:'none'});
		});
		//猜你喜欢切换效果
		//京东品质
		$('.marjorLeft').mouseover(function(){
			var yu=
			$('.marjorLeft img').css({opacity:'0.5'}).siblings('img').css({opacity:'1'});
		})
		// 京东品质

	});

