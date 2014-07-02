<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="keywords" content="<?php echo ($seo_keywords); ?>" />
<meta http-equiv="description" content="<?php echo ($seo_description); ?>" />
<title><?php echo ($site_name); ?></title>
<link href="__PUBLIC__/home/css/main.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/home/css/index.css" rel="stylesheet" type="text/css" />

<style type="text/css">
	.suggestionsBox {
		position: absolute;
		top:135px;
		left: 326px;
		margin: 10px 0px 0px 0px;
		width: 221px;
		border: 1px solid #000;	
	}
	
	.suggestionList {
		margin: 0px;
		padding: 0px;
	}
	
	.suggestionList li {
		
		margin: 0px 0px 3px 0px;
		list-style:none;
		padding: 3px;
		cursor: pointer;
	}
	
	.suggestionList li:hover {
		background-color: #659CD8;
	}

	 .newsbox{
		width:900px;
		clear:both;
		overflow:hidden;
		}
</style>
<!-- templets/default/ -->
</head>

<body>
<div class="top cbody">
  <div class="toplogo"><img src="__PUBLIC__/admin/images/logo.jpg" /></div>
  <div class="topbanner">
  </div>
  <div class="toplink">
    <ul>
      <li><a href="#">设为首页</a></li>
      <li><a href='#' onclick="javascript:window.external.AddFavorite('http://127.0.0.1','我的网站');">收藏本站</a></li>
      <li><a href="#">网站地图</a> </li>
      <li><a href="#">RSS订阅</a></li>
    </ul>
  </div>
</div>
<div class="topmenu cbody">
  <ul>
	<li><a href="__APP__">首页</a></li>

	<?php if(is_array($catList)): foreach($catList as $key=>$Cvo): ?><li><a href="__APP__/<?php echo ($Cvo["module"]); ?>"><?php echo ($Cvo["catname"]); ?></a></li><?php endforeach; endif; ?>
  </ul>
</div>

<div class="main cbody margintop">

	<div class="ileft">

<div class="newsbox margintop">
			<dl>
				<dt><a href="__URL__">新闻中心</a></dt>
				<?php if(is_array($alist)): $i = 0; $__LIST__ = $alist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dd></dd><a href="__URL__/show/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>

			</dl>
  </div>

	<div class="floatclear"><!--清除浮动--></div>
</div>
<div class="flink">
	<div class="title">
		<dl>
			<dt>友情链接</dt>
			<dd><a href="link.php" target="_blank">更多链接</a></dd>
		</dl>
	</div>
	<div class="flinkcon">
	 <a href="#" target="_blank"><img src="__PUBLIC__/home/images/s_logo.gif" alt="本站基于BestCMS企业智能建站系统建立,BestCMS建站专业专注" width="150" height="45" border="0" /></a>
	</div>
</div>
<div class="footer cbody margintop">
<div class="footnav">
<div class="flinkcon">
		<ul>
		<?php echo ($footnav); ?>
		</ul>
</div>
</div>
  <div class="copyright">
		<br />
    <a href="#" target="_blank" style="text-decoration:none"><span><?php echo ($site_name); ?></span></a></div>
	<div class="slogo">	  <a href="#" target="_blank"><img src="__PUBLIC__/admin/images/s_logo.gif"  width="150" height="45" border="0" /></a> </div>
	<div class="floatclear"></div>
</div>
</body>
</html>