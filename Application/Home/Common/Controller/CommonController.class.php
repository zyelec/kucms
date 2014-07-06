<?php
namespace Common\Controller;
use Think\Controller;
class CommonController extends Controller{
	public function _initialize(){
		echo "1111";
	    /*$category=D('Category');
        $clist=$category->where('isshow=1')->relation(true)->select();
        dump($clist);
        $module=M('Module')->where('id='.$clist['id'])->find();
        $this->assign('clist',$clist);*/
    }
}