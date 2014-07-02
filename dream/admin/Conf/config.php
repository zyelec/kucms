<?php
//载入公共配置
$config=require './config.inc.php';

//本项目配置
$admin= array(
	//'配置项'=>'配置值'
);

//合并配置项
return array_merge($config,$admin);
?>
