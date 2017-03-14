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
			<form action="" method="post">
		<div class="alert alert-success">编辑货品</div>
			
			<div class="form-group">
				{{foreach from="$lastArr" value="$v"}}
			  <label for="exampleInputEmail1">{{$v['pname']}}</label>
				<td>
					<select name="grouppid[]" class="select">
						<option value="">-请选择-</option>
						{{foreach from="$v['value']" key="$k2" value="$v2"}}
							<option value="{{$k2}}"{{if value="$oldData['grouppid'] eq $v2"}}selected="true"{{endif}} >{{$v2}}</option>
						{{endforeach}}
					</select>
				</td>
				<input type="hidden" name="goods_gid" id="goods_gid" value="{{$v['goods_gid']}}" />
				{{endforeach}}
			</div>
		<div class="form-group">
			<label for="exampleInputEmail1">库存</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder=""  name="dstock" value="{{$oldData['dstock']}}">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">货号</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder=""  name="dcode" value="{{$oldData['dcode']}}">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">货品名称</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder=""  name="glname" value="{{$oldData['glname']}}">
		</div>
		<input type="hidden" name="did" value="{{$_GET['did']}}"/>
		<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>
