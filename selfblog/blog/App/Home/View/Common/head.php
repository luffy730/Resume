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
  	
    <li {{if value="'CONTROLLER' eq 'Index'"}}class="_active"{{endif}}><a href="index.html" >首页</a></li>
    {{foreach from="$cateData" value="$v"}}
    	<li {{if value="Q('get.cid',0,'intval') eq $v['cid']"}}class="_active"{{endif}}><a href="l_{{$v['cid']}}.html">{{$v['cname']}}</a></li>
    {{endforeach}}
   
  </ul>
</div>



















