<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
		<script src="./Public/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
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
			  <?php foreach ($newattr as $v){?>
			  <th><?php echo $v[0]['pname']?></th>
			  <?php }?>
			  <th>库存</th>
			  <th>货号</th>
			  <th>货品名称</th>
			  <th width="200">操作</th>
			</tr>
			<?php foreach ($data as $v){?>
			<tr>
				<td><?php echo $v['did']?></td>
					<?php foreach ($newattr as $va){?>
				<td>
						<?php $group=explode(',', $v['grouppid']) ?>
						<?php foreach ($va as $vb){?>
							<?php if(in_array($vb['gpid'],$group)){?>
                
								<?php echo $vb['gpvalue']?>
							
               <?php }?>
						<?php }?>	
				</td>
					<?php }?>
				<td><?php echo $v['dcode']?></td>
				<td><?php echo $v['dstock']?></td>
				<td><?php echo $v['glname']?></td>
				<td>
					<a href="<?php echo U('edit',array('did'=>$v['did'],'goods_gid'=>Q('get.gid')))?>" class="btn btn-sm btn-warning">编辑</a>
					<a href="javascript:if(confirm('确定删除吗？'))location.href='<?php echo U('del',array('did'=>$v['did']))?>';" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			<?php }?>
		</table>
		<form action="<?php echo U('add')?>" method="post">
		<table class="table table-hover">
			<tr>
				<td>添加货品：</td>
				<?php foreach ($newattr as $v){?>
				<td>
					<select name="grouppid[]" class="select">
						<option value="">-请选择-</option>
						<?php foreach ($v as $value){?>
							<option value="<?php echo $value['gpid']?>"><?php echo $value['gpvalue']?></option>
						<?php }?>
					</select>
				</td>
				<?php }?>
				<td><input type="text" name="dcode" id="" /></td>
				<td><input type="text" name="dstock" id="" /></td>
				<td><input type="text" name="glname"/></td>
			</tr>
		</table>
			<input type="hidden" name="goods_gid" value="<?php echo $_GET['gid']?>" />
			<input type="submit" value="保存添加" class="btn btn-info" />
		</form>
	</body>
	<script type="text/javascript">
//		异步检测货品是否已经添加
		$(function(){
			//下拉菜单给它一个change时间
		$(".select").change(function(){
			var option=true;
			$(".select").each(function(){
				//判断如果值为空，返回假
				if(!$(this).val()){
					index=false;
					return false;
				}
			});
			if(option){
				//获取到选中的值
				var a=$(".select").eq(0).val();
				var b=$(".select").eq(1).val();
				var c= a +','+ b;
				//发送异步
				$.ajax({
					//访问方法
					type:'post',
					//访问地址
					url:"<?php echo U('GoodsList/change')?>",
					//发送数据
					data:{o:c,gid:"<?php echo Q('get.gid')?>"},
					//服务器的响应
					success:function(phpData){
						//如果返回的数据为1，代表此货品已经添加过，提示
						if(phpData==1){
							alert('此货品已经存在');
							//把下拉菜单返回到请选择状态
							$(".select").attr('value','');
						}
					}
				});
			}
		})
		})
		
	</script>
</html>
