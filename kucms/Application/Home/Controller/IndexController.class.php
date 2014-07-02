<?php
// 前台首页
namespace Home\Controller;
//use Common\Controller\CommonController;
class IndexController extends  BaseController{
    public function index(){
		//新闻列表
        $article=M('Article');
        $alist=$article->order('id desc')->select();
        $this->assign('alist',$alist);

        //产品分类
        $category=M('Category');
        $pcate=$category->where('moduleid=3')->select();
        $this->assign('pcate',$pcate);
        //产品列表
        $produce=M('Produce');
        $plist=$produce->order('id asc')->limit(10)->select();
        $this->assign('plist',$plist);
        
        
        //dump($plist);
        $this->display();
    }

    

}