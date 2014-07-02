<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="keywords" content="<?php echo ($seo_keywords); ?>" />
<meta http-equiv="description" content="<?php echo ($seo_description); ?>" />
<title>-<?php echo ($site_name); ?></title>
<link href="__PUBLIC__/home/css/main.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/home/css/index.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/home/css/other.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.newslist{
	width:680px;
	clear:both;
	overflow:hidden;
}

.newslist ul{
	width:670px;
	margin:6px auto;
}

.newslist li{
	height:29px;
	width:650px;
	line-height:29px;
	text-indent:10px;
	white-space:nowrap;
	text-overflow:ellipsis;
	overflow: hidden; 
}

.newslist li a{	
	font-size:14px;
	text-decoration:none;
}

.newsinfo {
	font-size:12px;
	line-height:150%;
	padding:10px;
	width:670px;
	overflow:hidden;
}

.newstitle {
	font-size:14px;
	line-height:30px;
	font-weight:bold;
	text-align:center;
}

.newsother {
	color:#CCCCCC;
}

.newsother ul li{
	list-style:none;
	float:right;
	text-align:center;
	padding-right:20px;
}
	

.pager {
	width:880px;
	margin:0px auto 0px;
	overflow:hidden;
	padding-bottom:10px;
	padding-left:200px;
}

.pager a{
	color:#666666;
	display:block;
	float:left;
	height:15px;
	line-height:15px;
	padding-right:12px;
	padding-left:12px;
	margin:10px 0px 0px -1px;
	white-space:nowrap;
	border-left:1px solid #EEE;
}
</style> 
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

<div class="iright">

<div class="rlist margintop">
        <div class="title">产品分类</div>
		<div class="rbox">
		<ul>
		 <?php if(is_array($pcat)): foreach($pcat as $key=>$cat): if($cat["id"] != '' ): ?><li><a href='__URL__/index/cid/<?php echo ($cat["id"]); ?>'><?php echo ($cat["catname"]); ?></a></li><?php endif; endforeach; endif; ?>
		</ul>
		</div>
</div>	
<!--<div class="rlist margintop">
        <form action='order_result.php' method='post' name='frmorder' target='_blank' id="frmorder">
          <div class="title">订单查询</div>
			<div class="rbox vote"> <span>		    请输入订单号
				<input name="oid" type="text" id="oid" maxlength="50" />
			</span>
				<div class="votesubmit">
					<input type="submit" value="查询" class="submit" />
				</div>
		  </div>
  </form>
	  </div> -->

<div class="rlist margintop">
        <div class="title">联系我们</div>

			<div class="rbox vote">	
				<span>公司名称:<?php echo ($company_name); ?></span>
				<span>地址:<?php echo ($add); ?></span>
				<span>传真:<?php echo ($fax); ?></span>	
				<span>E-mail:<?php echo ($mail); ?></span>
				<span>联系电话:<?php echo ($phone); ?></span>		
			</div>
</div>		



</div>


	<div class="ileft">
	  <div class="leftlist margintop">
			<div class="ptitle">
				<a href="#">查看新闻</a>
			</div>

			<div class="pleft">

			<div class="newstitle" style="font-size:14px; font-weight:bold; line-height:30px; text-align:center;">
			<?php echo ($show["name"]); ?>
			</div>
			
			<div class="newsother">
			<ul>
			<li>来源：</li>
			<li>发布人：<?php echo ($show["author"]); ?></li>
			<li>发布时间：<?php echo ($show["addtime"]); ?></li>
			</ul>
			</div>
			
			<div class="newsinfo">
			<?php echo ($show["info"]); ?>
			</div>
			
			</div>
	  </div>
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
	<?php echo ($link); ?>
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