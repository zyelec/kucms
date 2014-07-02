<?php
class CommonAction extends Action{
	public function _initialize(){
		$cat=M('Category');
		$catList=$cat->order('id')->select();
		
		$config=M('Config');
		$conList=$config->field('varname,value')->select();
		foreach($conList as $key => $r){			
			$this->assign($r['varname'],$r['value']);			
		}
		$this->assign('catList',$catList);


	}
}