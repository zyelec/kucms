<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>top</title>
<link href="/kucms/Public/admin/css/base.css" rel="stylesheet" type="text/css">

<style>
body { padding:0px; margin:0px; }
#tpa {
	color: #009933;
	margin:0px;
	padding:0px;
	float:right;
	padding-right:10px;
}

#tpa dd {
	margin:0px;
	padding:0px;
	float:left;
	margin-right:2px;
}

#tpa dd.ditem {
	margin-right:8px;
}

#tpa dd.img {
  padding-top:6px;
}

div.item
{
  text-align:center;
	background:url(/kucms/Public/admin/images/frame/topitembg.gif) 0px 3px no-repeat;
	width:82px;
	height:26px;
	line-height:28px;
}

.itemsel {
  width:80px;
  text-align:center;
  background:#226411;
	border-left:1px solid #c5f097;
	border-right:1px solid #c5f097;
	border-top:1px solid #c5f097;
	height:26px;
	line-height:28px;
}

*html .itemsel {
	height:26px;
	line-height:26px;
}

a:link,a:visited {
 text-decoration: underline;
}

.item a:link{
	font-size: 12px;
	color: #ffffff;
	text-decoration: none;
	font-weight: bold;
}

.item a:hover {
	color: #ffffff;
	font-weight: bold;
	border-bottom:2px solid #E9FC65;
}

.item a:visited {
	font-size: 12px;
	color: black;
	text-decoration: none;
	font-weight: bold;
}

.item a:active {
	color: blue;
	backgroud-color:red;
	border-bottom:2px solid #E9FC65;
}

.rmain {
  padding-left:10px;
  /* background:url(/kucms/Public/admin/images/frame/toprightbg.gif) no-repeat; */
}
</style>
</head>
<body bgColor='#ffffff'>
<table width="100%" border="0" cellpadding="0" cellspacing="0" background="/kucms/Public/admin/images/frame/topbg.gif">
  <tr>
    <td width='20%' height="60"><img src="/kucms/Public/admin/images/frame/logo.gif" /></td>
    <td width='80%' align="right" valign="bottom">
    	<table width="750" border="0" cellspacing="0" cellpadding="0">
      <tr>
      <td align="right" height="26" style="padding-right:10px;line-height:26px;">
        	您好：<span class="username"><?php echo (session('username')); ?></span>，欢迎使用内容管理系统！
        	[<a href="/kucms/index.php" target="_blank">网站主页</a>]
        	[<a href="" target="_blank">修改密码</a>]
        	[<a href="/kucms/index.php/Login/logout" target="_top">注销退出</a>]&nbsp;
      </td>
      </tr>
      <tr>
        <td align="right" height="34" class="rmain">
		<dl id="tpa">
		<dd><div class='item'><a href="main.html" target="main">后台主页</a></div></dd>
		<dd><div class='item'><a href="/kucms/index.php/Admin/Public/menu/channel/1" target="menu">主菜单</a></div></dd>
		<dd><div class='item'><a href="/kucms/index.php/Admin/Public/menu/channel/2" target="menu">内容管理</a></div></dd>
		<dd><div class='item'><a href="/kucms/index.php/Admin/Public/menu/channel/3"  target="menu">产品管理</a></div></dd>
		<dd><div class='item'><a href="/kucms/index.php/Admin/Public/menu/channel/4"  target="menu">新闻管理</a></div></dd>
		<dd><div class='item'><a href="menu.html" target="menu">HTML更新</a></div></dd>
		<dd><div class='item'><a href="/kucms/index.php/Admin/Public/menu/channel/5" target="menu">系统设置</a></div></dd>
		
		</dl>
		</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>