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
	</head>
	<body>
		<form action="" method="post">
		<div class="alert alert-success">修改密码</div>
		<div class="form-group">
			<label for="exampleInputEmail1">原密码</label>
			<input id="exampleInputEmail1" class="form-control" type="password" placeholder=""    name="oldPassword">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">新密码</label>
			<input id="exampleInputEmail1" class="form-control" type="password" placeholder=""    name="newPassword">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">确认密码</label>
			<input id="exampleInputEmail1" class="form-control" type="password" placeholder=""    name="confirmPassword">
		</div>
		<button class="btn btn-primary btn-block" type="submit"> 修改 </button>
		</form>
		
	</body>
</html>
