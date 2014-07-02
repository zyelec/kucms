<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends BaseController{
	public function index(){
		echo "1111";
		$this->display();
	}
	
	public function alist(){
		$article=M('Article');
		$list=$article->order("id desc")->select();
		//dump($list);
		$this->assign('alist',$list);
		$this->display();
	}
	
	public function show(){
		if($_GET['id']){
			$article=D('Article');
			$list=$article->where('id='.$_GET['id'])->relation(true)->find();
			$this->assign('alist',$list);
			$this->display();			
		}

	}
}