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
			
		<div class="alert alert-success">站点信息</div>
		<table class="table table-hover">
			<tr>
				<th colspan="100" style="text-align: center;">站点信息</th>
			</tr>
			<tr class="active">
			  <th>名称</th>
			  <th>值</th>
			  <th>标题</th>
			  <th>描述</th>
			</tr>
			<?php foreach ($data as $v){?>
			<?php if($v['type_id']==1){?>
                
			<tr>
				<td><?php echo $v['name']?></td>
				<td>
					<input type="text" name="<?php echo $v['name']?>" id="" value="<?php echo $v['value']?>" class="form-control"/>
				</td>
				<td><?php echo $v['title']?></td>
			</tr>
			
               <?php }?>
			<?php }?>
		</table>
		<table class="table table-hover">
			<tr>
				<th colspan="100" style="text-align: center;">验证码配置</th>
			</tr>
			<tr class="active">
			  <th>名称</th>
			  <th>值</th>
			  <th>标题</th>
			</tr>
			<?php foreach ($data as $v){?>
			<?php if($v['type_id']==2){?>
                
			<tr>
				<td><?php echo $v['name']?></td>
				<td>
					<input type="text" name="<?php echo $v['name']?>" id="" value="<?php echo $v['value']?>" class="form-control"/>
				</td>
				<td><?php echo $v['title']?></td>
			</tr>
			
               <?php }?>
			<?php }?>
		</table>
		<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>

	</body>
</html>
