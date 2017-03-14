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
	</head>
	<body>
		<form onsubmit="return hd_submit(this,'{{U('add')}}','{{U('index',array('tid'=>$_GET['tid']))}}')">
			

		<div class="alert alert-success">添加属性</div>
		<div class="form-group">
			<label for="exampleInputEmail1">属性名称</label>
			<input name="pname" rows="5" cols=""  class="form-control" placeholder="请输入类型按照|分开">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">属性类别</label>
			<br />
			<label for="exampleInputEmail1">属性</label>
			<input type="radio"name="ptype" id="" value="0" />
			<label for="exampleInputEmail1">规格</label>
			<input type="radio"name="ptype" id="" value="1" />
			
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">属性值</label>
			<textarea name="value" rows="5" cols=""  class="form-control" placeholder="请输入类型按照|分开"></textarea>
		</div>
		<input type="hidden" name="type_tid" value="{{$_GET['tid']}}" />
		<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>
