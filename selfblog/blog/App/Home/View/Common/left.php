  <div class="l_box">
    <div class="about_me">
      <h2>关于我</h2>
      <ul>
        <img src="./Public/Home/images/girl.jpg">
        <p>网名：luffy| onePice</p>
        <p>Email:380156124@qq.com</p>
        <p>职业：高级程序员</p>
      </ul>
    </div>
    <?php 
    //实例化分类模型
    $cateModel=new \Common\Model\Cate;
	//获得所有分类数据
	$cateData=$cateModel->get();
	//文章模型
	$arcModel=new \Common\Model\Arc;
		foreach ($cateData as $k=>$v)
		{
			$cateData[$k]['count']=$arcModel->where("category_cid={$v['cid']}")->count();
		}
     ?>
    <div class="about_he">
      <h2>分类</h2>
      <ul>
    		<li class="cat">
        {{foreach from="$cateData" value="$v"}}
    		{{if value="$v['count']"}}
    		<a href="l_{{$v['cid']}}.html">{{$v['cname']}} ({{$v['count']}})</a>	
    		{{else}}
    		<a href="l_{{$v['cid']}}.html">{{$v['cname']}}</a>
    		{{endif}}
     	{{endforeach}}
		</li>
       </ul>
    </div>
    <div class="about_he">
    	<?php 
    	//实例化标签模型
    	$tagModel=new \Common\Model\Tag;
		$tagData=$tagModel->get();
    	 ?>
    	<h2>标签云</h2>
    	<ul class="texts">
    		<p>
    		<li class="tat">
    	{{foreach from="$tagData" value="$v"}}
    			<a href="li_{{$v['tid']}}.html">{{$v['tname']}}</a>
    	{{endforeach}}
    		</p>
    		</li>
    	</ul>
    </div>
    <div class="newslist">
    	<?php 
    	//实例化文章模型
    	$arcModel=new \Common\Model\Arc;
		$arcData=$arcModel->get();
    	 ?>
      <h2>最新日志</h2>
      <ul>
      	{{foreach from="$arcData" value="$v"}}
        	<li><a href="t_{{$v['aid']}}.html">{{$v['title']}}</a></li>
       	{{endforeach}}
      </ul>
    </div>
    <div class="viny">
      <ul>
        <dl>
          <dt class="art"><img src="./Public/Home/images/artwork.png" alt="ר��"></dt>
          <dd class="icon-song"><span></span>南方姑娘</dd>
          <dd class="icon-artist"><span></span>歌手：赵雷</dd>
          <dd class="icon-album"><span></span>专辑《赵小雷》</dd>
          <dd class="music">
            <audio src="./Public/Home/images/nf.mp3" controls></audio>
          </dd>
          <!--Ҳ�������loop���� ��Ƶ���ص�ĩβʱ�������²���-->
        </dl>
      </ul>
    </div>
  </div>