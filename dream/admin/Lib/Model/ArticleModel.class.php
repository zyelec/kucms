<?php
class ArticleModel extends RelationModel{
	protected $_link=array(
		'Category'=>array(
			'mapping_type'=>BELONGS_TO,
			'class_name'=>'category',
			'mapping_name'=>'category',
			'foreign_key'=>'cid',
			'as_fields'=>'catname',
			
		)
	);
}