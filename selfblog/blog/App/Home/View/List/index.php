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
		<audio controls="controls" loop="loop" autoplay="autoplay">
			<source src="./Public/Home/music/3.mp3" />
			<source src="./Public/Home/music/3.ogg" />
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
		<li style="text-align: center;">
			<h2>{{$name}}:{{$value}}</h2>
			<p>共 {{$count}} 篇文章</p>
		</li>
		{{foreach from="$data" value="$v"}}
    <li> <a href="/"><img src="{{$v['thumb']}}"></a>
      <h3><a href="t_{{$v['aid']}}.html">{{$v['title']}}</a></h3>
      {{foreach from="$v['tag']" value="$value"}}
      	<a href="li_{{$value['tid']}}.html">{{$value['tname']}}</a>、
      {{endforeach}}
      <p>{{$v['digest']}}</p>
      <span>
								作者：
								{{$v['author']}}
								</span>
								•
								<!--pubdate表⽰示发布⽇日期-->
								<time pubdate="pubdate" datetime="">{{date('Y-m-d H:i:s',$v['sendtime'])}}</time>
								•
								分类：
								<a href="">{{$v['cname']}}</a>
    </li>
    {{endforeach}}
  </div>
</article>
{{include file='../Common/foot'}}
</body>
</html>
