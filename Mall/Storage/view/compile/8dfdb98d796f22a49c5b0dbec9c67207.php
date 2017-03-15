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
			  <th width="30">orid</th>
			  <th>订单号</th>
			  <th>收货人</th>
			  <th>收货地址</th>
			  <th>价格总计</th>
			  <th>成成时间</th>
			  <th>备注</th>
			  <th>订单状态</th>
			  <th width="200">操作</th>
			</tr>
			<?php foreach ($data as $v){?>
			<tr>
				<td><?php echo $v['orid']?></td>
				<td><?php echo $v['orderNumber']?></td>
				<td><?php echo $v['consignee']?></td>
				<td><?php echo $v['recieveAddress']?></td>
				<td><?php echo $v['priceAggregate']?></td>
				<td><?php echo date('Y-m-d H:i:s',$v['riseTime'])?></td>
				<td><?php echo $v['remark']?></td>
				<td>
					<?php if($v['orderStatus']==0){?>
                
					<?php  echo('未付款，待付款')?>
					<?php }else if($v['orderStatus']==1){?>
					<?php echo('已付款，待发货') ?>
					<?php }else if($v['orderStatus']==2){?>
					<?php echo('已发货，待收货')  ?>
					<?php }else if($v['orderStatus']==3){?>
					<?php echo('已收货，待评价') ?>
					
               <?php }?>
				</td>
				<td>
					<a href="<?php echo U('Order/send',array('orid'=>$v['orid']))?>" class="btn btn-sm btn-warning">发货</a>
					<a href="<?php echo U('Order/edit',array('orid'=>$v['orid']))?>" class="btn btn-sm btn-info">编辑</a>
					<a href="javascript:if(confirm('确定删除吗？'))location.href='<?php echo U('Order/del',array('orid'=>$v['orid']))?>'" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			<?php }?>
		</table>
	</body>
</html>
