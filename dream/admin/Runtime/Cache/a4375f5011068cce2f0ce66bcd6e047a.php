<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>main</title>
<base target="_self">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/base.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/main.css" />
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
<form id="add_cat" name="add_cat" method="post" action="__URL__/doAdd">
<table width="98%" align="center" border="0" cellpadding="3" cellspacing="1" bgcolor="#CBD8AC" style="margin-bottom:8px;margin-top:8px;">
  <tr>
    <td colspan="2" background="__PUBLIC__/admin/images/frame/wbg.gif" bgcolor="#EEF4EA" class='title'><span>添加新闻分类</span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">分类名称&nbsp; </div></td>
    <td width="82%"><input name="category_name" type="text" size="30"/>&nbsp; <font color="#FF0000">*</font></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">上级分类&nbsp; </div></td>
    <td width="82%">
	<select name="parent_category" id="parent_category">
	  <option value="0">顶级分类</option>
	  <?php if(is_array($cList)): $i = 0; $__LIST__ = $cList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cVo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($cVo["id"]); ?>"><?php echo ($cVo["cname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	</select>	
	</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">选择模型&nbsp; </div></td>
    <td width="82%">
	<select name="moduleid" id="moduleid">
	  <option value="0">顶级分类</option>
	  <?php if(is_array($mList)): $i = 0; $__LIST__ = $mList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data["id"]); ?>"><?php echo ($data["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	</select>	
	</td>
  </tr>
   <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">栏目目录&nbsp; </div></td>
    <td width="82%"><input name="parent_dir" type="text" size="30" value=""/></td>
  </tr>
   <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">排序&nbsp; </div></td>
    <td width="82%"><input name="category_sort" type="text" size="30" value="0"/></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">是否显示&nbsp; </div></td>
    <td width="82%"><input name="is_show" type="radio" id="is_show"  style="border:0px;" value="1" checked/>
    是  <input type="radio" style="border:0px;" name="is_show" id="is_show" value="0"/>否 </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="2">
	<div align="center"><input type="submit" name="Submit" value="确定"> 
	<input type="hidden" name="act" value="add_category"/>&nbsp;<input type="reset" name="chongzhi" value="重置">
	</div>
	</td>
  </tr>
</table>
</form>
</body>
</html>