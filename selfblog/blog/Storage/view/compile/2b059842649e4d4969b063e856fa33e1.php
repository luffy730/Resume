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
	    <!--载入百度编辑器所需js文件-->
	    	<script type="text/javascript" charset="utf-8" src="Public/Admin/ueditor1_4_3/ueditor.config.js"></script>
    		<script type="text/javascript" charset="utf-8" src="Public/Admin/ueditor1_4_3/ueditor.all.min.js"> </script>
    		<script type="text/javascript" charset="utf-8" src="Public/Admin/ueditor1_4_3/lang/zh-cn/zh-cn.js"></script>
    		<script src="Public/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
    		<script type="text/javascript">
    			$(function(){
    				$('#close_img').click(function(){
    					//显示上传表单
    					$('#img_box').html('<input  type="file" name="thumb" id="exampleInputEmail1"/>');
    				})
    			})
    		</script>
	</head>
	<body>
		<form action="" method="post" enctype="multipart/form-data">
			

		<div class="alert alert-success">编辑文章</div>
		<div class="form-group">
			<label for="exampleInputEmail1">文章标题</label>
			<input id="exampleInputEmail1" class="form-control" type="text"    name="title" value="<?php echo $oldData['title']?>">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">作者</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder=""   name="author" value="<?php echo $oldData['author']?>">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">所属分类</label>
			<select name="category_cid" class="form-control">
				<option value="">请选择</option>
				<?php foreach ($cateData as $v){?>
				<option value="<?php echo $v['cid']?>" <?php if($oldData['category_cid']==$v['cid']){?>
                 selected 
               <?php }?>><?php echo $v['_name']?></option>
				<?php }?>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">缩略图</label>
		<!--如果这篇文章有图片-->
		<div id="img_box">
		<!--如果这篇文章有图片-->
		<?php if($oldData['thumb']){?>
                
				<img src="<?php echo $oldData['thumb']?>" style="width: 250px;height: auto;" id="img"/>
				<a href="javascript:;" id="close_img">×</a>
				<input type="hidden" name="thumb" value="<?php echo $oldData['thumb']?>"/>
			<?php }else{?>
				<!--没有图片显示上传表单-->
				<input id="exampleInputEmail1" type="file" name="thumb">
			
               <?php }?>
		</div>
		</div>
		
		
		<div id="">
			<label for="">文章标签</label>
			<br />
			<?php foreach ($tagData as $k=>$v){?>
			<label class="checkbox checkbox-inline" for="checkbox<?php echo $k?>">
								<input id="checkbox<?php echo $k?>" class="custom-checkbox" type="checkbox" data-toggle="checkbox" value="<?php echo $v['tid']?>" name="tid[]" <?php if(in_array($v['tid'],$tids)){?>
                checked
               <?php }?>>
				<span class="icons">
				<span class="icon-unchecked"></span>
				<span class="icon-checked"></span>
				</span>
				<?php echo $v['tname']?>
			</label>
			<?php }?>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">文章摘要</label>
			<textarea name="digest" rows="5" cols=""  class="form-control" placeholder="请输入文章关键字"><?php echo $oldData['digest']?></textarea>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">文章关键字</label>
			<textarea name="keywords" rows="5" cols=""  class="form-control" placeholder="请输入文章关键字"><?php echo $oldData['keywords']?></textarea>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">文章描述</label>
			<textarea name="des" rows="5" cols=""  class="form-control" placeholder="请输入文章描述"><?php echo $oldData['des']?></textarea>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">文章正文</label>
			<!--调用百度编辑器-->
			<script id="editor" type="text/plain" style="width:100%;height:500px;" name="content"><?php echo $oldData['content']?></script>
			<script>
		        var ue = UE.getEditor('editor');
		    </script>
		</div>
		<input type="hidden" name="aid" value="<?php echo $_GET['aid']?>" />
		<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>
