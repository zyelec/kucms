<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends BaseController{
	public function header(){
		$this->display();
	}
	
	public function footer(){
		$this->display();
	}
}