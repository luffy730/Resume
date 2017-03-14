<footer class="foot">
<p>
	<?php 
	//网站配置模型
	$webModel= new \Admin\Model\WebSet;
	$webData=$webModel->limit(1,1)->get();
	 ?>
	 <?php foreach ($webData as $v){?>
	 <a href=""><?php echo $v['name']?></a>
	 <a href=""><?php echo $v['title']?></a>
	 <a href=""><?php echo $v['value']?></a>
	 <?php }?>
</p>
  
</footer>