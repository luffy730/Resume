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
			  <th width="30">货品id</th>
			  <th>颜色</th>
			  <th>尺码</th>
			  <th>库存</th>
			  <th>货号</th>
			  <th width="200">操作</th>
			</tr>
			<tr>
				<?php foreach ($attr as $v){?>
				<td><?php echo $v['gid']?></td>
				<td><?php echo $v['gpvalue']?></td>
				<td><?php echo $v['gpvalue']?></td>
				<td><?php echo $v['stock']?></td>
				<td><?php echo $v['gcode']?></td>
				<td>
					<a href="" class="btn btn-sm btn-warning">编辑</a>
					<a href="" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			<?php }?>
		</table>
		<table class="table table-hover">
			<tr>
				<td>添加货品：</td>
				<td>
					<select name="gpvalue">
						<option value="">-请选择-</option>
						<?php sp($attr['gpvalue']) ?>
						<?php foreach ($attr['gpvalue'] as $v){?>
						<option value="<?php echo $v?>"><?php echo $v?></option>
						<?php }?>
					</select>
				</td>
				<td>
					<select name="">
						<option value="">-请选择-</option>
					</select>
				</td>
				<td><input type="text" name="" id="" /></td>
				<td><input type="text" name="" id="" /></td>
			</tr>
		</table>
	</body>
</html>
