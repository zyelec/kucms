<?php
//公共配置项
$config=require './config.inc.php';

//项目配项
$arr= array(
	//'配置项'=>'配置值'
);

//合并配置项
return array_merge($config,$arr);
?>
