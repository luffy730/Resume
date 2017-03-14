<header>
   <h1><a href="/">夏の花世界</a></h1>
  <!--<p>冥冥中一种花香扑鼻,令人陶醉于心的静谧,不禁回忆,我们相遇的那一季正是盛夏之花烂漫时...</p>-->
</header>
<!--nav begin-->
	<?php  
	//导航条
	$cateModel= new \Common\Model\Cate;
	$cateData=$cateModel->where("pid=0")->orderBy('csort','ASC')->get();	
	?>
<div id="nav">
  <ul>
  	
    <li <?php if('List'=='Index'){?>
                class="_active"
               <?php }?>><a href="index.html" >首页</a></li>
    <?php foreach ($cateData as $v){?>
    	<li <?php if(Q('get.cid',0,'intval')==$v['cid']){?>
                class="_active"
               <?php }?>><a href="l_<?php echo $v['cid']?>.html"><?php echo $v['cname']?></a></li>
    <?php }?>
   
  </ul>
</div>



















