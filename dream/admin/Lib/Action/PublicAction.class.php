<?php
 //分桢显示
 class PublicAction extends CommonAction{
 	function top(){
 		$this->display();
 	}
 	
	 function menu(){
	 		$module=M("Module");
	 		$list=$module->order('id')->select();
	 		$this->assign('Mlist',$list);
	 		$this->display();
	 	}
	 	
	 function main(){
 		$this->display();
 	}
 	
	 function footer(){
	 		$this->display();
	 	}
 }