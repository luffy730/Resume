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
	    <link rel="shortcut icon" href="./Public/Admin/Flat/img/favicon.ico">
	    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	    <!--[if lt IE 9]>
	      <script src="dist/js/vendor/html5shiv.js"></script>
	      <script src="dist/js/vendor/respond.min.js"></script>
	    <![endif]-->
	      <script src="./Public/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
    		
	      
	    <script src="./Public/hdjs/hdjs.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="Public/uploadify/jquery.uploadify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Public/uploadify/uploadify.css">
    	<script type="text/javascript">
  			var session = {'<?php echo session_name();?>':'<?php echo session_id();?>'};
    	</script>
    	<script src="./Public/Admin/js/index.js" type="text/javascript" ></script>
	    <link rel="stylesheet" type="text/css" href="./Public/hdjs/hdjs.css"/>
	    <!--载入百度编辑器所需js文件-->
	    	<script type="text/javascript" charset="utf-8" src="Public/Admin/ueditor1_4_3/ueditor.config.js"></script>
    		<script type="text/javascript" charset="utf-8" src="Public/Admin/ueditor1_4_3/ueditor.all.min.js"> </script>
    		<script type="text/javascript" charset="utf-8" src="Public/Admin/ueditor1_4_3/lang/zh-cn/zh-cn.js"></script>
			<script type="text/javascript">
			
				$(function(){
					//下拉菜单改变事件
					$('select[name=category_cid]').change(function(){
						//当前被选中的元素，找到属性tid
				    	var tid=$(this).find("option:checked").attr('tid');
				    	//发送异步
				    	$.ajax({
				    		//请求地址
				    		url:"<?php echo U('Goods/change')?>",
				    		//请求方式
				    		type:"post",
				    		//发送的数据
				    		data:{tid:tid},
				    		//规定php返回的数据类型
				    		dataType:'json',
				    		//得到服务器的响应
				    		success:function(phpData){
				    			var strhtml ="";
				    			var strshtml="";
				    			$.each(phpData,function(k,v){
				    				console.log(phpData);
				    				if(v.ptype=='0'){
				    					str="<tr><td>"+v.pname+"</td><td><select name='attr["+v.pid+"]'><option value='0'>请选择</option>"	;
				    					$.each(v.value,function(kk,vv){
				    						str +="<option value='"+vv+"'>"+vv+"</option>";
				    					});
				    					str +="</select></td></tr>";
				    					strhtml += str;
				    				}else{
				    					strs = '<tr>';
				    					strs += '<td>'+v.pname+'</td>';
				    					strs += '<td><select name="spec['+v['pid']+'][value][]">';
				    					strs += '<option value="0">请选择</option>';
				    					$.each(v.value,function(kk,vv){
				    						strs += '<option value="'+vv+'">'+vv+'</option>';
				    					})
				    					strs +='</select></td>';
				    					strs += '<td>附加价格</td>';
				    					strs += '<td><input type="text"  name="spec['+v['pid']+'][price][]" id="" /></td>';
				    					strs += '<td><a class="btn btn-primary" onclick="addSpec(this)">添加规格</a></td>';
				    					strs += '</tr>';
				    					strshtml +=strs;
				    				}
				    			});
				    			$('#bbb').html(strhtml);
				    			$('#ccc').html(strshtml);
				    		}
				    	})
				   });
				})
				//添加节点，克隆
				function addSpec(obj){
					var oTr = $(obj).parents('tr').eq(0);
					var newElm = oTr.clone();
					newElm.find('.btn-primary').html('删除规格').attr('onclick','delSpec(this)','.btn-warning');
					oTr.after(newElm.get(0));
				}
				//删除节点
				function delSpec(obj){
					$(obj).parents('tr').eq(0).remove();
				}
				
			</script>
	     
	</head>
			

	<body>
		<form method="post" action=""  enctype="multipart/form-data" class="from">
		<div class="alert alert-success">添加商品</div>
		<table class="table table-hover">
			<a class="btn btn-info">基本信息</a>
			<tr class="active">
				<td>
					<div></div>
					<div class=""></div>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>所属分类</td>
				<td><select id="k" name="category_cid">
					<option value="">-请选择-</option>
					<?php foreach ($cate as $v){?>
						<option value="<?php echo $v['cid']?>" tid= "<?php echo $v['type_tid']?>" class="fa"><?php echo $v['_name']?></option>
					<?php }?>
				</select></td>
			</tr>
			<tr>
				<td>所属品牌</td>
				<td><select name="band_bid">
					<option value="">-请选择-</option>
					<?php foreach ($band as $va){?>
						<option value="<?php echo $va['bid']?>"><?php echo $va['bname']?></option>
					<?php }?>
				</select></td>	
			</tr>
			<tr>
				<td>商品名称</td>
				<td><input type="text" name="gname" id="" /></td>	
			</tr>
			<tr>
				<td>单位</td>
				<td><input type="text" name="gunit" id="" /></td>	
			</tr>
			<tr>
				<td>市场价</td>
				<td><input type="text" name="cprice" id="" /></td>	
			</tr>
			<tr>
				<td>商城价</td>
				<td><input type="text" name="mprice" id="" /></td>	
			</tr>
			<tr>
				<td>点击次数</td>
				<td><input type="text" name="click" id="" /></td>	
			</tr>
			
		</table>
		<div class="alert alert-success">
		<table class="table table-hover" id="bbb">
			<a href="" class="btn btn-info">商品属性</a>
			
			<!--<?php foreach ($data as $v){?>
			<tr class="active">

				<td><?php echo $v['pname']?></td>
				<td><select name="attr[<?php echo $v['pid']?>]">
					<option value="">-请选择-</option>
					<?php foreach ($v['value'] as $value){?>
					<option value="<?php echo $value?>"><?php echo $value?></option>
					<?php }?>
				</select></td>
			</tr>
			<?php }?>-->
		</table>
		<table class="table table-hover" id="ccc">
			<a href="" class="btn btn-info">商品规格</a>
			<!--<tr>
				<td>颜色</td>
				<td><input type="text" name="" id="" /></td>
				<td>附加价格</td>
				<td><input type="text" name="" id="" /></td>
				<td><a class="btn btn-primary">添加规格</a></td>
			</tr>
			<tr>
				<td>尺码</td>
				<td>
					<select name="">
						<option value="">-请选择-</option>
					</select>
				</td>
				<td>附加价格</td>
				<td><input type="text" name="" id="" /></td>
				<td><a class="btn btn-primary">添加规格</a></td>
			</tr>-->
		</table>
		</div>
		<table class="table table-hover">
			<a href=""class="btn btn-warning">列表图册</a>
			<tr>
				<td>
					上传图片
				</td>
				<td>
					<input class="btn btn-primary" id="f" type="file" multiple="true" name="listpic">
			<div id="uploadList">
		        <ul>
					
		        </ul>
   			 </div>
					
				</td>
				</tr>
		</table>
		<table class="table table-hover">
			<a href="" class="btn btn-warning">商品图册</a>
			<tr>
				<td>上传图片</td>
				<td>
 				   <input class="btn btn-primary" id="g" type="file" multiple="true" name="gallery[]">
 				   	<div id="uploadList1">
				        <ul>
							
				        </ul>
		   			 </div>
				</td>
				</tr>
		</table>
		<table class="table table-hover">
			<a href="" class="btn btn-info">商品详细</a>
			<tr>
				<td>
					<!--调用百度编辑器-->
			<script id="editor" type="text/plain" style="width:100%;height:500px;" name="detail"></script>
			<script>
		        var ue = UE.getEditor('editor');
		    </script>
				</td>
		</tr>
		</table>
		<table class="table table-hover">
			<a href="" class="btn btn-info">售后服务</a>
			<tr>
				<td>
					<!--调用百度编辑器-->
			<script id="editor1" type="text/plain" style="width:100%;height:500px;" name="service"></script>
			<script>
		        var ue = UE.getEditor('editor1');
		    </script>
				</td>
			</tr>
		</table>
		<input class="btn btn-primary" type="submit" value="提交" style="width: 100%;"/>
	</form>
		
		
	</body>
</html>
	