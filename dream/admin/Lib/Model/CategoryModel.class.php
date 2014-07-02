<?php
class CategoryModel extends RelationModel{
	//字段映射
	protected $_map=array(
		'category_name'=>'catname',
		'parent_category'=>'parentid',
		'category_sort'=>'listorder',
		'parent_dir'=>'parentdir',
		'is_show'=>'isshow',

	);
	

}