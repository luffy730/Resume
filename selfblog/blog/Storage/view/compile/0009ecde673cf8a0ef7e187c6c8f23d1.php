	<aside class="col-md-4 hidden-sm hidden-xs">
						<div class="_widget">
							<h4>关于自己</h4>
							<div class="_info">
								<p>多年一线开发经验与讲师经验。擅长引导思维，而不是一味灌输，新生代优秀青年讲师的代表...</p>
								<p>
									<i class="glyphicon glyphicon-volume-down"></i>
									目前就职于
									<a href="http://www.houdunwang.com" target="_blank">北京后盾网</a>
								</p>
							</div>
						</div>
						<?php 
						//分类模型
						$cateModel =new \Common\Model\Cate;
						//获得所有的分类数据
						$cateData=$cateModel->get();
						//文章模型
						$arcModel=new \Common\Model\Arc;
						foreach($cateData as $k => $v){
							$cateData[$k]['count']=$arcModel->where("category_cid={$v['cid']}")->count();
						}
						 ?>
						<div class="_widget">
							
							<h4>分类列表</h4>
							<div>
								<?php foreach ($cateData as $v){?>
								<?php if($v['count']){?>
                
								<a href="l_<?php echo $v['cid']?>.html"><?php echo $v['cname']?> (<?php echo $v['count']?>) </a>
								<?php }else{?>
								<a href="l_<?php echo $v['cid']?>.html"><?php echo $v['cname']?></a>
								
               <?php }?>
								<?php }?>
							</div>
						</div>
						<?php 
						//标签模型
						$tagModel=new \Common\Model\Tag;
						$tagData=$tagModel->get();
						
						 ?>
						<div class="_widget">
							<h4>标签云</h4>
							
							<div class="_tag">
								<?php foreach ($tagData as $value){?>
								<a href="li_<?php echo $value['tid']?>.html"><?php echo $value['tname']?></a>
							<?php }?>
								
							</div>

						</div>
						
					</aside>