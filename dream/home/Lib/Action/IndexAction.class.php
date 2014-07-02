<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction {
    public function index(){
    	
    	//包含文件不能包含方法，需在当前文件内赋值
		//$cat=M('Category');
		//$catList=$cat->order('id')->select();
		//dump($catList);
		$article=M('Article');
		$article_list=$article->order('id')->limit('10')->select();
		
		$rotate=M('Rotate');
		$rlist=$rotate->order('sort desc,id desc')->select();
		
		$produce=M('Produce');
		$plist=$produce->where('is_show=1')->field('id,name,img')->select();
		//dump($plist);
		
		$this->assign('rlist',$rlist);
		$this->assign('article_list',$article_list);
		$this->assign('plist',$plist);
    	$this->display();	
    
    }
 	
    //验证码
    public function verify(){
    	import('ORG.Util.Image');
    	Image::buildImageVerify();
    }

}