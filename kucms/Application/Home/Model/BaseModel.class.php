<?php
namespace Home\Model;
use Think\Model\ViewModel;
class BaseModel extends ViewModel{
	public $viewfields=array(
		"Module"=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'module',
			'foreign_key'=>'moduleid',
			'mapping_name'=>'module',
			'as_fields'=>'name',
			),	
		);



}