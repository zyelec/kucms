<?php
class ProduceModel extends RelationModel{
	protected $_map=array(
		'content'=>'info',
	);
	
	protected $_link=array(
		'category'=>array(
			'mapping_type'=>BELONGS_TO,
			'mapping_name'=>'category',
			'class_name'=>'category',
			'foreign_key'=>'pid',	
			'as_fields'=>'catname',
		),	
	);
}