<?php
namespace Home\Controller;
use Think\Controller;
class CategoryController extends BaseController{
	public function index(){
		if(isset($_GET['id'])){
			$clist=M('Category')->where('id='.$_GET['id'])->find();
			//获取模块
			$module=M('Module')->where('id='.$clist['moduleid'])->find();
			//dump($module);
			//获取内容
			//0 内容页
			//1 列表页
			if($clist['template']==0){
				$list=M($module['name'])->where('id='.$clist['id'])->find();
				//dump($list);
				$this->assign('list',$list);
				$this->display($module['name'].":show");
			}else{
				$list=M($module['name'])->where('cid='.$clist['id'])->select();
				//dump($list);
				$this->module=$module['name'];
				$this->assign('list',$list);
				$this->display($module['name'].":index");
			}
		}else{
			$this->redirect('__APP__');
		}
	}
	
	
	public function show(){
		if(!empty($_GET['module']) && !empty($_GET['id'])){
			$module=trim($_GET['module']);
			$id=trim($_GET['id']);
			$list=M($module)->where('id='.$id)->find();
			$this->assign('list',$list);
			$this->display($module.':show');
		}
	}
}