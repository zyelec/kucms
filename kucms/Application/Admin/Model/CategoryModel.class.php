<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class CategoryModel extends RelationModel{
	protected $_link=array(
		"Module"=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'module',
			'foreign_key'=>'moduleid',
			'mapping_name'=>'module',
			'as_fields'=>'name,title',
			),	
		);

	protected $_map=array(
		'category_name' => 'cname',
		'parent_category' => 'fid',
		'parent_dir' => 'catdir',
		'category_sort' => 'sort',
		'is_show' => 'isshow',
	);

	Protected $_auto=array(
		array('path','tclm',3,'callback'),
	);
	
	function tclm(){
		if(isset($_POST['parent_category'])){
			$fid=$_POST['parent_category'];
		}else{
			$fid==0;
		}
		
		if($fid==0){
			return 0;
		}else{
			$re=$this->where("id=$fid")->find();
			//dump($re);
			$val=$re['path'].'-'.$re['id'];
			return $val;
		}
	}


}