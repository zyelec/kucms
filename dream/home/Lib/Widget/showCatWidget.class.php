<?php 
class showCatWidget extends Widget{
	public function cat(){
		$cat=M('Category');
		$condition['module']="Produce";
		$cat_list=$cat->where($condition)->select();
		return $cat_list;
		
	}
}	
