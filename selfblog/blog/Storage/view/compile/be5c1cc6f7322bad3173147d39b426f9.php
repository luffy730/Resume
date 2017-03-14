<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
	    <!-- Loading Bootstrap -->
	    <link href="./Public/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
	    <!-- Loading Flat UI -->
	    <link href="./Public/Admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
	    <link href="./Public/Admin/Flat/docs/assets/css/demo.css" rel="stylesheet">
	    <link rel="shortcut icon" href="./Public/Admin/Flat/img/favicon.ico">
	    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	    <!--[if lt IE 9]>
	      <script src="dist/js/vendor/html5shiv.js"></script>
	      <script src="dist/js/vendor/respond.min.js"></script>
	    <![endif]-->
	    <script src="Public/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
	    <script type="text/javascript">
	    	$(function(){
	    		$('#close_img').click(function(){
	    		//显示上传表单
	    		$('#img_box').html('<input id="exampleInputEmail1" type="file" name="logo">');	
	    		})
	    	})
	    </script>
	</head>
	<body>
		<form action="" method="post" enctype="multipart/form-data">
			

		<div class="alert alert-success">编辑友链</div>
		<div class="form-group">
			<label for="exampleInputEmail1">名称</label>
			<input id="exampleInputEmail1" class="form-control" type="text"   name="lname" value="<?php echo $oldData['lname']?>">
		</div>
		
		<div class="form-group">
			<label for="exampleInputEmail1">logo</label>
			<div id="img_box">
				<!--如果这个链接有logo-->
				<?php if($oldData['logo']){?>
                
					<img src="<?php echo $oldData['logo']?>" style="width:200px;height:200px;" id="img"/>
					<a id="close_img" href="javascript:;" >×</a>
					<input type="hidden" name="logo" value="<?php echo $oldData['logo']?>" />
				<?php }else{?>
				<!--没有logo显示上传表单-->
				<input type="file" id="exampleInputEmail1" name="logo"/>
				
               <?php }?>
			</div>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">url地址</label>
			<input id="exampleInputEmail1" class="form-control" type="text"   name="url" value="<?php echo $oldData['url']?>">
		</div>
		
		<div class="form-group">
			<label for="exampleInputEmail1">排序</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入分类排序"   name="sort" value="<?php echo $oldData['sort']?>">
		</div>
		
	
		<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		<input type="hidden" name="lid" value="<?php echo $_GET['lid']?>" />
		</form>
	</body>
</html>
