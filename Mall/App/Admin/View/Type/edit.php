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
		<form onsubmit="return hd_submit(this,'{{U('edit')}}','{{U('index')}}')">
			

		<div class="alert alert-success">编辑类型</div>
		<div class="form-group">
			<label for="exampleInputEmail1">类型</label>
			<textarea name="tname" rows="5" cols=""  class="form-control" placeholder="请输入类型按照|分开">{{$oldData['tname']}}</textarea>
		</div>
		<input type="hidden" name="tid" value="{{$_GET['tid']}}" />
		<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>
