<?php
class ArticleAction extends CommonAction{
	public function index(){
		//header("Content-type:text/html;charset=utf-8");
		$article=M('Article');
		$article_list=$article->order('id')->field('id,title')->limit('10')->select();
		$this->assign('alist',$article_list);
		$this->display();
	}	
	

	public function show(){
		//上一篇下一篇
		//$after=$this->dao->where("catid=$data[catid] and id<$id")->order('id desc')->find();
		//$front=$this->dao->where("catid=$data[catid] and id>$id")->order('id asc')->find();
		if(!empty($_GET['id'])){
			$article=M('Article');
			$list=$article->where('id='.$_GET['id'])->find();
			$where['cid']=array(eq,$list['cid']);
			$where['id']=array(lt,$_GET['id']);
			$after=$article->where($where)->order('id desc')->find();
			//dump($after);
			$front=$article;
			$this->assign('show',$list);
			$this->assign('after',$after);
			$this->assign('front',$front);
			$this->display();
		
		}else{
			$this->redirct('index');
		}
	}
}
