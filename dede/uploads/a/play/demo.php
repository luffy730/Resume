<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
	*{margin:0;padding:0;}
	a{text-decoration: none;}
	#fa{
		margin:0 auto;
		width: 1200px;
		
	}
	.son{
		width:80px;
		height:80px;
		opacity: 0.3;
		transition:2s;
		float: left;
		line-height: 80px;
		text-align: center;
	}
	.son1:hover{background: #adeae;
		width:200px;
		height:200px;
		border-radius: 50%;
	}

	.son1{background: #addeae;
		left: 80px;}
	.son8{
		display:none;
		left:0;top:80px;
		background: #edadaa;
		width:80px;
		height:80px;
	}
	</style>
	 <script type="text/javascript" src='./jquery-1.9.1.js'></script>
	 <script type="text/javascript">
	 	$(function(){
	 		$('.son').hover(function(){
	 			$(this).find('.hidden').stop().slideDown('slow');
	 		},function(){
	 		$(this).find('.hidden').stop().slideUp('slow');
	 		})
	 	})
	 </script>
</head>
<body>
	<div id="fa">
		<marquee style="color:red;font-size:15px;">这是基础版本的</marquee>
		<?php foreach($data as $k => $v) { ?>
			<div class="son son1">
				<a href=""><?php echo $v['top']; ?></a>
				<?php foreach ($v['son'] as $k => $v) {?>
				<div class="son8 hidden">
					<a href=""><?php echo $v ?></a>
				</div>
					<?php }  ?>
			</div>		
		<?php }  ?>
	</div>
</body>
</html>