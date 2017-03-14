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
	    <style type="text/css">
	    	td a{float:left;margin-left:5px;}
	    </style>
	</head>
	<body>
		<table class="table table-hover">
			<tr class="active">
			  <th width="30">tid</th>
			  <th>属性名</th>
			  <th width="200">操作</th>
			</tr>
			{{foreach from="$data" value="$v"}}
			<tr >
				<td>{{$v['tid']}}</td>
				<td>{{$v['tname']}}</td>
				<td style="width: 250px; ">
					<a href="{{U('Property/index',array('tid'=>$v['tid']))}}" class="btn btn-sm btn-info">属性列表</a>
					<a href="{{U('Type/edit',array('tid'=>$v['tid']))}}" class="btn btn-sm btn-warning">编辑</a>
					<a href="javascript:if(confirm('确定删除吗？'))location.href='{{U('Type/del',array('tid'=>$v['tid']))}}'" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			{{endforeach}}
		</table>
	</body>
</html>
