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
			  <th width="30">gid</th>
			  <th>商品名称</th>
			  <th>价格</th>
			  <th>库存</th>
			  <th>点击次数</th>
			  <th>上架时间</th>
			  <th width="200">操作</th>
			</tr>
			<?php foreach ($data as $v){?>
			<tr>
				<td><?php echo $v['gid']?></td>
				<td><?php echo $v['gname']?></td>
				<td>
					市场价：<span style="text-decoration: line-through;"><?php echo $v['cprice']?></span>
					<br />
					商城价：<?php echo $v['mprice']?>
				</td>
				<td>
					<?php echo $v['stock']?>	
				</td>
				<td><?php echo $v['click']?></td>
				<td><?php echo date('Y-m-d H:i:s',$v['addtime'])?></td>
				<td width="300">
					<a href="<?php echo U('GoodsList/index',array('gid'=>$v['gid']))?>" class="btn btn-sm btn-info">货品列表</a>
					<a href="<?php echo U('Goods/edit',array('gid'=>$v['gid']))?>" class="btn btn-sm btn-warning">编辑</a>
					<a href="javascript:if(confirm('确定删除吗？'))location.href='<?php echo U('Goods/del',array('gid'=>$v['gid']))?>'" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			<?php }?>
		</table>
	</body>
</html>
