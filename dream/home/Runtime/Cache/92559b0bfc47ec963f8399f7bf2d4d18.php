<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="keywords" content="<?php echo ($info["home_key"]); ?>" />
<meta http-equiv="description" content="<?php echo ($info["home_info"]); ?>" />
<title>用户注册 - <?php echo ($info["home_name"]); ?></title>
<link href="__PUBLIC__/home/css/main.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/home/css/index.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/home/css/other.css" rel="stylesheet" type="text/css" />
<style type="text/css">
table tr{ height:30px;}
table td{ font-size:14px;}
table span
{
	color:red;
}
</style>
<script type="text/javascript" src="__PUBLIC__/js/prototype.js"></script>
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
        <div class="title">新闻分类</div>
		<div class="rbox">
		<ul>
		<?php if(is_array($cat)): foreach($cat as $key=>$cat): if($cat["cat_id"] != '' ): ?><li><a href='__URL__/news/nid/<?php echo ($cat["cat_id"]); ?>'><?php echo ($cat["cat_name"]); ?></a></li><?php endif; endforeach; endif; ?>
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
				<a href="#">用户注册</a>
			</div>

			<div class="pleft">
			  <form method="post" name="reg" action="__URL__/doReg" onsubmit="javascript:return CheckForm();" style="margin-left:0px; padding-left:0px;">
<table border="0" align="center" cellpadding="7" cellspacing="0" style="margin-top:5px; margin-left:20px; padding-top:0px; border:0px;">
	<tr class="tr">
		<td width="100">用户名：</td>
		<td width="500">
			<input type="text" name="username" maxlength="20" id="username" onblur="return check_user();"/>
<?php if($userError) { echo "<font id=\"name\" color=#FF0000>".$msg."</font>"; } else { ?>
			<span id="name">*</span>
<?php } ?>
		</td>
	</tr>
	<tr class="tr">
		<td>密码：</td>
		<td>
			<input type="radio" name="sex" id="sex" value="1" checked="checked"/>男 <input type="radio" name="sex" id="sex" value="0"/>女
		</td>
	</tr>
	<tr class="tr">
		<td>密码：</td>
		<td>
			<input type="password" name="password" maxlength="20" id="password1" onblur="return check_password1();"/>
			<span id="pass1">*</span>
		</td>
	</tr>
	<tr class="tr">
		<td>确定密码：</td>
		<td>
			<input type="password" name="repassword" maxlength="20" id="password2" onblur="return check_password2();"/>
			<span id="pass2">*</span>
		</td>
	</tr>
	<tr class="tr">
		<td>邮箱：</td>
		<td>
			<input type="text" name="email" size="30" maxlength="35" id="email" onblur="return check_email();"/>
			<span id="em">*</span>
		</td>
	</tr>
	<tr class="tr">
		<td>验证码：</td>
		<td>
		<input type="text" size="5" maxlength="4" name="verify"><span>*</span>
		 <img src="__APP__/Index/verify/" />
<?php if($codeError) { echo "<font color=#FF0000>".$msg."</font>"; } ?>
		</td>
	</tr>
	<tr class="tr">
		<td colspan="2" align="center"><input type="submit" name="submit" value="提交" /></td>
	</tr>
</table>
</form>
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