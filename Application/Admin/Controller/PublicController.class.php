<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller{
	public function main(){
		$this->display();
	} 
	
	public function menu(){
		$module=M('Module');
		$data=$module->order('id')->select();
		$this->assign("mlist",$data);
		$this->display();
	}
	
	public function top(){
		$this->display();
	}
	
}