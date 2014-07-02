<?php
namespace Admin\Controller;
use Think\Controller;
class ConfigController extends Controller{
	public function index(){
		if(IS_POST){
			$config=M('Config');
			if($config->create()){
				if($config->add()){
					$this->success('添加成功',U('index'));
				}else{
					$this->error('添加失败',U('index'));
				}
			}else{
				$this->error($config->getError());
			}
		}else{
			$config=M('Config');
			$data=$config->select();
			$this->assign('clist',$data);
			$this->display();
		}
		
	}
}