<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class ArticleModel extends RelationModel{
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
}

