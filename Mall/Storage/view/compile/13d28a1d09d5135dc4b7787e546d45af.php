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
			  <th width="30">pid</th>
			  <th>pname</th>
			  <th>ptype</th>
			  <th>value</th>
			  <th width="200">操作</th>
			</tr>
			<?php foreach ($data as $v){?>
			<tr >
				<td><?php echo $v['pid']?></td>
				<td><?php echo $v['pname']?></td>
				<td>
					<?php if($v['ptype']){?>
                
							规格
					<?php }else{?>
							属性				
					
               <?php }?>
				</td>
				<td><?php echo $v['value']?></td>
				<td ">
					<a href="<?php echo U('Property/edit',array('tid'=>$_GET['tid'],'id'=>$v['pid']))?>" class="btn btn-sm btn-warning">编辑</a>
					<a href="javascript:if(confirm('确定删除吗？'))location.href='<?php echo U('Property/del',array('pid'=>$v['pid']))?>'" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			<?php }?>
			<tr>
				<td>
					<a href="<?php echo U('Property/add',array('tid'=>$_GET['tid']))?>" class="btn btn-sm btn-info">添加属性</a>
				</td>
			</tr>
		</table>
		

	</body>
</html>
