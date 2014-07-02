<?php
class ConfigAction extends CommonAction{
	public function index(){
		$config=M('Config');
		$list=$config->select();
		//dump($list);
		$this->assign('clist',$list);
		$this->display();
	}
	
    public function doSite(){
    	$config=M('Config');
    	foreach($_POST as $key=>$value){
    		$data['value']=$value; 
    		$condition['varname']=$key;    					
    		$res=$config->where($condition)->data($data)->save();	
    		//dump($res);

    	}
    	if(isset($res)){
    	    $this->success('更新成功','index');
    	}else{
    		$this->error('更新失败','index');
    		
    	}

    }
}