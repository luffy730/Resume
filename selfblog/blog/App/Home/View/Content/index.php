<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>青涩の初夏-情侣博客模板</title>
<meta name="Keywords" content="博客模板,情侣博客模板" >
<meta name="Description" content="情侣博客模板" >
<link href="./Public/Home/css/index.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
</head>
<body>
<!--nav begin-->
		<audio controls="controls" loop="loop" autoplay="autoplay">
			<source src="./Public/Home/music/2.mp3" />
			<source src="./Public/Home/music/2.mp3" />
			您的浏览器不支持audio标签
		</audio>
	{{include file='../Common/head'}}
<!--nav end-->
<div class="blank"></div>
<div class="banner">
  <ul class="boy_girl">
    <li class="girlimg"><a href="/"><span>关于她</span></a></li>
    <li class="boyimg"><a href="/"><span>关于我</span></a></li>
  </ul>
  <ul class="texts">
    <p><img src="./Public/Home/images/t-1.png" alt="人生，是一场盛大的遇见"></p>
    <p><img src="./Public/Home/images/t-2.png" alt="若你懂得，就请珍惜。"></p>
    <p><img src="./Public/Home/images/t-3.png" alt="无论下多久的雨，最后都会有彩虹；无论你多么悲伤，要相信幸福在前方等候"></p>
  </ul>
</div>
<div class="blank"></div>
<div class="memorial_day">
  <div class="time_axis"></div>
  <ul>
    <li class="n1"><a href="/">相遇</a>
      <div class="dateview">2011-06-27</div>
    </li>
    <li class="n2"><a href="/">相识</a>
      <div class="dateview">2011-12-19</div>
    </li>
    <li class="n3"><a href="/">相知</a>
      <div class="dateview">2012-10-01</div>
    </li>
    <li class="n4"><a href="/">相恋</a>
      <div class="dateview">2013-02-14</div>
    </li>
    <li class="n5"><a href="/">相爱</a>
      <div class="dateview">2014-10-05</div>
    </li>
  </ul>
</div>
<div class="blank"></div>
<article>
 {{include file='../Common/left'}}
  <!--l_box end -->
  <div class="r_box">
  	<div class="_head">
								<h1>{{$data['title']}}</h1>
								<span>
								作者：
								<a href="">{{$data['author']}}</a>
								</span>
								•
								<!--pubdate表⽰示发布⽇日期-->
								<time pubdate="pubdate" datetime="{{date('Y-m-d H:i:s',$data['sendtime'])}}">{{date('Y-m-d H:i:s',$data['sendtime'])}}</time>
							</div>
							<div class="_digest">
								{{$data['content']}}
							</div>
							<div class="_footer">
								<i class="glyphicon glyphicon-tags"></i>
								{{foreach from="$data['tag']" value="$v"}}
									<a href="li_{{$v['tid']}}.html">{{$v['tname']}}</a>、
								{{endforeach}}
								<div>
									<a href="#nave">返回顶部</a>
								</div>
							</div>
<!-- 多说评论框 start -->
						<div class="ds-thread" data-thread-key="{{$data['aid']}}" data-title="{{$data['title']}}" data-url="{{U('Content/index',array('aid'=>$data['aid']))}}"></div>
						<!-- 多说评论框 end -->
						<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
						<script type="text/javascript">
						var duoshuoQuery = {short_name:"blogmzy"};
							(function() {
								var ds = document.createElement('script');
								ds.type = 'text/javascript';ds.async = true;
								ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
								ds.charset = 'UTF-8';
								(document.getElementsByTagName('head')[0] 
								 || document.getElementsByTagName('body')[0]).appendChild(ds);
							})();
							</script>
						<!-- 多说公共JS代码 end -->
    
  </div>
</article>
{{include file='../Common/foot'}}
</body>
</html>
