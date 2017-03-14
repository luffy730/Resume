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
		<table class="table table-hover">
			<tr class="active">
			  <th width="30">bid</th>
			  <th>品牌名</th>
			  <th>logo</th>
			  <th>是否热门</th>
			  <th width="200">操作</th>
			</tr>
			{{foreach from="$data" value="$v"}}
			<tr>
				<td>{{$v['bid']}}</td>
				<td>{{$v['bname']}}</td>
				<td><img src="{{$v['logo']}}" style="width:80px;height: 40px;"/></td>
				<td>
						{{if value="$v['is_hot'] eq 1"}}
						<?php echo ('是'); ?>
						{{else}}
						<?php echo ''; ?>
						{{endif}}
				</td>
				<td>
					<a href="{{U('Band/edit',array('bid'=>$v['bid']))}}" class="btn btn-sm btn-warning">编辑</a>
					<a href="javascript:if(confirm('确定删除吗？'))location.href='{{U('Band/del',array('bid'=>$v['bid']))}}'" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			{{endforeach}}
		</table>
	</body>
</html>
