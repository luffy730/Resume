 <?php 
 	//实例化文章表
 	$arcModel=new \Common\Model\Arc;
	//实例化标签模型
	$tagModel=new \Common\Model\Tag;
	//获得所有数据
	$arcData=$arcModel->join('category','cid','=','category_cid')->orderBy('sendtime','DESC')->limit(5)->get();
	$result = array();
	foreach($arcData as $k=>$v){
		$result = $tagModel->getTag($arcData);
	}
	$arcData = $result;
	
  ?>
 
 <div class="r_box">
  	{{foreach from="$arcData" value="$v"}}
  	
    <li> <a href="/"><img src="{{$v['thumb']}}"></a>
      <h3><a href="t_{{$v['aid']}}.html">{{$v['title']}}</a></h3>
      <div>
      	作者：{{$v['author']}}
      	发布时间：{{date('Y-m-d H:i:s',$v['sendtime'])}}
      	分类：<a href="l_{{$v['cid']}}.html">{{$v['cname']}}</a>
      	<br />
      	{{$v['digest']}}
      	<br />
      	{{foreach from="$v['tag']" value="$vo"}}
      	<a href="">{{$vo['tname']}}</a>、
      	
      	{{endforeach}}
      </div>
     
    </li>
    {{endforeach}}
   
  </div>