<?php namespace server;
class Text{
	public function reply($content){
			$keywords= Db::table('keyword')->orderBy('rank','DESC')->get();
			$replyContent='';
			foreach($keywords as $v){
				switch($v['type']){
					case 1:
						//完全匹配
						if($v['keyword']==$content){
							$replyContent=$v['content'];
							break 2;
						}
						break;
					case 2:
						//模糊匹配 如： 电话多少啊
						if(mb_strstr($content, $v['keyword'])){
							$replyContent=$v['content'];
							break 2;
						}
						break;
				}
			}
			return $replyContent;
	}
}
