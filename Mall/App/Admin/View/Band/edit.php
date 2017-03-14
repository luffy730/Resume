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
	      <script src="./Public/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
	    <script src="./Public/hdjs/hdjs.min.js" type="text/javascript" charset="utf-8"></script>
	    <link rel="stylesheet" type="text/css" href="./Public/hdjs/hdjs.css"/>
	    <script type="text/javascript">
	    	$(function(){
	    		$('#close_img').click(function(){
	    			//显示上传表单

	    			$('#img_box').html('<input type="file" name="logo" id="exampleInputEmail1"  />');
	    		})
	    	})
	    </script>
	</head>
	<form method="post" action="" enctype="multipart/form-data">		

	<body>
		<div class="alert alert-success">编辑品牌</div>
		<div class="form-group">
			<label for="exampleInputEmail1">品牌</label>
			<input name="bname"  class="form-control" placeholder="请输入标签按照|分开" value="{{$oldData['bname']}}">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">logo</label>
			<!--如果这个品牌有logo-->
			<div id="img_box">
				

			{{if value="$oldData['logo']"}}
			<img src="{{$oldData['logo']}}" style="width:80px;height: 40px;" id="img"/>
			<a href="javascript:;" id="close_img">×</a>
			<input type="hidden" name="logo" value="{{$oldData['logo']}}" />
			{{else}}
			<!--没有图片显示上传表单-->
			<input type="file" name="logo" id="" />
			{{endif}}
			</div>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">是否热门</label>
			<input type="checkbox" value="1" name="is_hot" {{if value="$oldData['is_hot']"}}checked{{endif}}/>
		</div>
		<input type="hidden" name="bid" value="{{$_GET['bid']}}" />
		<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
	</form>
		
	</body>
</html>
