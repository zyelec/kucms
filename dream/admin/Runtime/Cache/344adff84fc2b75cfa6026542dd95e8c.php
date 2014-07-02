<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<title>menu</title>
<link rel="stylesheet" href="__PUBLIC__/admin/css/base.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/admin/css/menu.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script language='javascript'>var curopenItem = '1';</script>
<script language="javascript" type="text/javascript" src="__PUBLIC__/admin/js/frame/menu.js"></script>
<base target="main" />
</head>
<body target="main">
<?php if($_GET['channel']== 1): ?><table width='99%' height="100%" border='0' cellspacing='0' cellpadding='0'>
	  <tr>
	    <td style='padding-left:3px;padding-top:8px' valign="top">
		<!-- Item 1 Strat -->
	      <dl class='bitem'>
	        <dt onClick='showHide("items1_1")'><b>后台首页</b></dt>
	        <dd style='display:block' class='sitem' id='items1_1'>
	          <ul class='sitemu'>
	            <li><a href='main.html' target='main'>后台首页</a> </li>
	            <li><a href='__APP__/Index/pws' target='main'>修改密码</a></li>
	            <li><a href='__APP__/Index/cache' target='main'>更新缓存</a></li>
	          </ul>
	        </dd>
	      </dl>
	      <!-- Item 1 End -->
	  	 
		  </td>
	  </tr>
	</table>
<?php elseif($_GET['channel']== 2): ?>
	<table width='99%' height="100%" border='0' cellspacing='0' cellpadding='0'>
	  <tr>
	    <td style='padding-left:3px;padding-top:8px' valign="top">
		<!-- Item 1 Strat -->
	      <dl class='bitem'>
	        <dt onClick='showHide("items1_1")'><b>内容管理</b></dt>
	        <dd style='display:block' class='sitem' id='items1_1'>
	          <ul class='sitemu'>
	            <li>
	              <div class='items'>
	                <div class='fllct'><a href='__APP__/Category' target='main'>栏目管理</a> <a href='__APP__/Category/add' target='main'>添加</a></div>
	              </div>
	            </li>
	            <?php if(is_array($Mlist)): $i = 0; $__LIST__ = $Mlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Mvo): $mod = ($i % 2 );++$i;?><li><a href='__APP__/<?php echo ($Mvo["name"]); ?>' target='main'><?php echo ($Mvo["title"]); ?></a> <a href='__APP__/<?php echo ($Mvo["name"]); ?>/add/id/<?php echo ($Mvo["id"]); ?>' target='main'>添加</a></li><?php endforeach; endif; else: echo "" ;endif; ?>
	            

	          </ul>
	        </dd>
	      </dl>
	      <!-- Item 1 End -->
	  	 
		  </td>
	  </tr>
	</table>
<?php elseif($_GET['channel']== 3): ?>	
	<table width='99%' height="100%" border='0' cellspacing='0' cellpadding='0'>
	  <tr>
	    <td style='padding-left:3px;padding-top:8px' valign="top">
	      <!-- Item 1 End -->
		  <!-- Item 2 Strat -->
		  <dl class='bitem'>
	        <dt onClick='showHide("items2_1")'><b>产品内容管理</b></dt>
	        <dd style='display:block' class='sitem' id='items2_1'>
	          <ul class='sitemu'>
	            <li><a href='__APP__/Produce/add/id/3' target='main'>添加产品</a></li>
	            <li><a href='__APP__/Produce/index' target='main'>产品列表</a></li>
	            <li><a href='__APP__/Produce/trash' target='main'>回收站</a></li>
	          </ul>
	        </dd>
	      </dl>
		  <!-- Item 2 End -->
		  </td>
	  </tr>
	</table>
<?php elseif($_GET['channel']== 4): ?>
	<table width='99%' height="100%" border='0' cellspacing='0' cellpadding='0'>
	  <tr>
	    <td style='padding-left:3px;padding-top:8px' valign="top">
		  <!-- Item 2 Strat -->
		  <dl class='bitem'>
	        <dt onClick='showHide("items2_1")'><b>新闻内容管理</b></dt>
	        <dd style='display:block' class='sitem' id='items2_1'>
	          <ul class='sitemu'>
	            <li><a href='__APP__/Article/add/id/4' target='main'>录入新闻</a></li>
	            <li><a href='__APP__/Article/index' target='main'>查看新闻</a></li>
	            <li><a href='__APP__/Article/trash' target='main'>回收站</a></li>
	          </ul>
	        </dd>
	      </dl>
		  <!-- Item 2 End -->
		  </td>
	  </tr>
	</table>
<?php elseif($_GET['channel']== 5): ?>
	<table width='99%' height="100%" border='0' cellspacing='0' cellpadding='0'>
	  <tr>
	    <td style='padding-left:3px;padding-top:8px' valign="top">
		<!-- Item 1 Strat -->
	      <dl class='bitem'>
	        <dt onClick='showHide("items1_1")'><b>系统设置</b></dt>
	        <dd style='display:block' class='sitem' id='items1_1'>
	          <ul class='sitemu'>
	            <li><a href='__APP__/Config' target='main'>站点配置</a></li>
	          </ul>
	        </dd>
	      </dl>
	      <!-- Item 1 End -->
		  <!-- Item 2 Strat -->
		  <dl class='bitem'>
	        <dt onClick='showHide("items2_1")'><b>幻灯片管理</b></dt>
	        <dd style='display:block' class='sitem' id='items2_1'>
	          <ul class='sitemu'>
	            <li><a href='__APP__/Rotate/add' target='main'>添加</a></li>
	            <li><a href='__APP__/Rotate/index' target='main'>列表</a></li>
	          </ul>
	        </dd>
	      </dl>
		  <!-- Item 2 End -->
		  </td>
	  </tr>
	</table>
<?php else: ?>
	<table width='99%' height="100%" border='0' cellspacing='0' cellpadding='0'>
	  <tr>
	    <td style='padding-left:3px;padding-top:8px' valign="top">
		<!-- Item 1 Strat -->
	      <dl class='bitem'>
	        <dt onClick='showHide("items1_1")'><b>后台首页</b></dt>
	        <dd style='display:block' class='sitem' id='items1_1'>
	          <ul class='sitemu'>
	            <li><a href='main.html' target='main'>后台首页</a> </li>
	            <li><a href='__APP__/Index/pws' target='main'>修改密码</a></li>
	            <li><a href='__APP__/Index/cache' target='main'>更新缓存</a></li>
	          </ul>
	        </dd>
	      </dl>
	      <!-- Item 1 End -->
	  	 
		  </td>
	  </tr>
	</table><?php endif; ?>
</body>
</html>