<?php
class ProduceAction extends CommonAction{
	public function index(){
		//header("Content-type:text/html;charset=utf-8");
		$cat=M('Category');
		$condition['module']="Produce";
		$cat_list=$cat->where($condition)->select();
		$produce=M('Produce');
		$cid=$_GET['cid'];
		if($cid){			
			$produce_list=$produce->where('pid='.$cid)->order('id')->limit('10')->select();
		}else{			
			$produce_list=$produce->order('id')->limit('10')->select();
		}

		//dump($cat_list);
		$this->assign('plist',$produce_list);
		$this->assign('pcat',$cat_list);
		$this->display();
	}	
	
	//分类列表


	public function show(){
		$this->assign('pcat',$cat_list);
		if(!empty($_GET['id'])){
			$produce=M('Produce');
			$produce_list=$produce->where('id='.$_GET['id'])->find();
			//dump($article_list);
			$this->assign('show',$produce_list);
			$this->display();
		
		}else{
			$this->redirct('index');
		}
	}
}
