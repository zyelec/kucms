<?php
class PublicAction extends CommonAction{
	Public function header(){
		/*$cat=M('Category');
		$catList=$cat->order('cat_id')->select();
		//dump($catList);
    	$this->assign('catList',$catList);*/
    	$this->display();	
	}
	
	public function footer(){
		$this->display();
	}
}