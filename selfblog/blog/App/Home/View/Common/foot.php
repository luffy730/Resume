<footer class="foot">
<p>
	<?php 
	//网站配置模型
	$webModel= new \Admin\Model\WebSet;
	$webData=$webModel->limit(1,1)->get();
	 ?>
	 {{foreach from="$webData" value="$v"}}
	 <a href="">{{$v['name']}}</a>
	 <a href="">{{$v['title']}}</a>
	 <a href="">{{$v['value']}}</a>
	 {{endforeach}}
</p>
  
</footer>