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
				<?php foreach ($lastArr as $v){?>
			  <label for="exampleInputEmail1"><?php echo $v['pname']?></label>
				<td>
					<select name="grouppid[]" class="select">
						<option value="">-请选择-</option>
						<?php foreach ($v['value'] as $k2=>$v2){?>
							<option value="<?php echo $k2?>"<?php if($oldData['grouppid']==$v2){?>
                selected="true"
               <?php }?> ><?php echo $v2?></option>
						<?php }?>
					</select>
				</td>
				<input type="hidden" name="goods_gid" id="goods_gid" value="<?php echo $v['goods_gid']?>" />
				<?php }?>
			</div>
		<div class="form-group">
			<label for="exampleInputEmail1">库存</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder=""  name="dstock" value="<?php echo $oldData['dstock']?>">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">货号</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder=""  name="dcode" value="<?php echo $oldData['dcode']?>">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">货品名称</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder=""  name="glname" value="<?php echo $oldData['glname']?>">
		</div>
		<input type="hidden" name="did" value="<?php echo $_GET['did']?>"/>
		<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>
