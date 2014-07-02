<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class ProduceModel extends RelationModel{
	protected $_map=array(
			'content'=>'info',

		);
	protected $_link=array(
		'Category'=>array(
				'mapping_type'=>self::BELONGS_TO,
				'class_name'=>'Category',
				'mapping_name'=>'category',
				'foreign_key'=>'cid',
				//'conditon'=>'cid=id'
				'as_fields'=>'cname',
		),
		
	);

	Protected $_auto=array(
		array('path','tclm',3,'callback'),
	);
	
	function tclm(){
		if(isset($_POST['pid'])){
			$pid=$_POST['pid'];
		}else{
			$pid=0;
		}
		if($pid==0){
			$data=0;
		}else{
			$list=$this->where('id='.$pid)->find;
			$data=$list['path'].'-'.$list['id'];
		}
	}
}