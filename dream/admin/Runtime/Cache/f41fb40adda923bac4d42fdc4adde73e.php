<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>main</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/base.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/main.css" />
<style type="text/css" rel="stylesheet">
    form {
        margin: 0;
    }
    .editor {
        margin-top: 5px;
        margin-bottom: 5px;
    }
  </style>
  <script type="text/javascript">
	
	function confirmSubmit(frm)
	{
	   if(frm.elements['title'].value == '')
	   {
	      alert('新闻标题不能为空！');
		  return false;
	   }else{
	      return true;
	   }
	}
  </script>
</head>
<body leftmargin="8" topmargin='8'>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div style='float:left'> <img height="14" src="__PUBLIC__/admin/images/frame/book1.gif" width="20" />&nbsp;欢迎使用内容管理系统，建站的首选工具。 </div>
      <div style='float:right;padding-right:8px;'>
        <!--  //保留接口  -->
      </div></td>
  </tr>
  <tr>
    <td height="1" background="__PUBLIC__/admin/images/frame/sp_bg.gif" style='padding:0px'></td>
  </tr>
</table>
<form id="add_news" name="add_news" method="post" action="__URL__/doSite" enctype="multipart/form-data" onSubmit="return confirmSubmit(this)">
<table width="98%" align="center" border="0" cellpadding="3" cellspacing="1" bgcolor="#CBD8AC" style="margin-bottom:8px;margin-top:8px;">
  <tr>
    <td colspan="2" background="__PUBLIC__/admin/images/frame/wbg.gif" bgcolor="#EEF4EA" class='title'><span>站点配置</span></td>
  </tr>
  <?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr bgcolor="#FFFFFF">
	    <td width="18%"><div align="right"><?php echo ($vo["info"]); ?>&nbsp; </div></td>
	    <td width="82%"><input type="text" size="25" name="<?php echo ($vo["varname"]); ?>" value="<?php echo ($vo["value"]); ?>"></td>
	  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  
  
 
  <tr bgcolor="#FFFFFF">
    <td colspan="2">
	<div align="center"><input type="submit" name="Submit" value="确定"> 
	<input type="hidden" name="act" value="add_news"/>
&nbsp;	
<input type="reset" name="chongzhi" value="重置">
	</div>
	</td>
  </tr>
</table>
</form>
</body>
</html>