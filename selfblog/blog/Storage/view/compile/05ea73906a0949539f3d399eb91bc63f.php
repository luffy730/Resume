 <?php 
 	//实例化文章表
 	$arcModel=new \Common\Model\Arc;
	//实例化标签模型
	$tagModel=new \Common\Model\Tag;
	//获得所有数据
	$arcData=$arcModel->join('category','cid','=','category_cid')->orderBy('sendtime','DESC')->limit(5)->get();
 
  ?>
 
 <div class="r_box">
  	<?php foreach ($arcData as $v){?>
    <li> <a href="/"><img src="<?php echo $v['thumb']?>"></a>
      <h3><a href="t_<?php echo $v['aid']?>.html"><?php echo $v['title']?></a></h3>
      <div>
      	作者：<?php echo $v['author']?>
      	发布时间：<?php echo date('Y-m-d H:i:s',$v['sendtime'])?>
      	分类：<a href="l_<?php echo $v['cid']?>.html"><?php echo $v['cname']?></a>
      	<br />
      	<?php echo $v['digest']?>
      </div>
     
    </li>
    <?php }?>
   
  </div>