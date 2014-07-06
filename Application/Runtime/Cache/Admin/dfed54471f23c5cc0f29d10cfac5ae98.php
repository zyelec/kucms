<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>main</title>
<base target="_self">
<link rel="stylesheet" type="text/css" href="/kucms/Public/admin/css/base.css" />
<link rel="stylesheet" type="text/css" href="/kucms/Public/admin/css/main.css" />
</head>
<body leftmargin="8" topmargin='8'>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div style='float:left'> <img height="14" src="/kucms/Public/admin/images/frame/book1.gif" width="20" />&nbsp;欢迎使用内容管理系统，建站的首选工具。 </div>
      <div style='float:right;padding-right:8px;'>
        <!--  //保留接口  -->
      </div></td>
  </tr>
  <tr>
    <td height="1" background="/kucms/Public/admin/images/frame/sp_bg.gif" style='padding:0px'></td>
  </tr>
</table>
<form id="doEdit" name="doEdit" method="post" action="/kucms/index.php/Admin/Category/doEdit">
<table width="98%" align="center" border="0" cellpadding="3" cellspacing="1" bgcolor="#CBD8AC" style="margin-bottom:8px;margin-top:8px;">
  <tr>
    <td colspan="2" background="/kucms/Public/admin/images/frame/wbg.gif" bgcolor="#EEF4EA" class='title'><span>添加分类</span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">分类名称&nbsp; </div></td>
    <td width="82%"><input name="category_name" type="text" size="30" value="<?php echo ($current['cname']); ?>"/>&nbsp; <font color="#FF0000">*</font></td>

  </tr>
    <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">上级分类&nbsp; </div></td>
    <td width="82%">
	<select name="parent_category" id="parent_category">
	  <option value="0">顶级分类</option>
	  <?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data["id"]); ?>" <?php if(($data["id"]) == $current["fid"]): ?>selected<?php endif; ?>><?php $__FOR_START_23738__=0;$__FOR_END_23738__=$data['count'];for($i=$__FOR_START_23738__;$i < $__FOR_END_23738__;$i+=1){ ?>&nbsp;&nbsp;<?php } echo ($data["cname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	</select>	
	</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">选择模型&nbsp;</div></td>
    <td width="82%">
	<select name="moduleid" id="moduleid">
	  <?php if(is_array($mlist)): $i = 0; $__LIST__ = $mlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mvo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($mvo["id"]); ?>" <?php if(($mvo["id"]) == $current['moduleid']): ?>selected<?php endif; ?>><?php echo ($mvo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	</select>	
	</td>
  </tr>
   <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">栏目目录&nbsp; </div></td>
    <td width="82%"><input name="parentdir" type="text" size="30" value="<?php echo ($clist["parentdir"]); ?>"/></td>
  </tr>
   <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">排序&nbsp; </div></td>
    <td width="82%"><input name="category_sort" type="text" size="30" value="<?php echo ($clist["listorder"]); ?>"/></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">是否显示&nbsp; </div></td>
    <td width="82%"><input name="is_show" type="radio" id="is_show"  style="border:0px;" value="1" <?php if($current["isshow"] == 1): ?>checked<?php endif; ?> />
    显示  <input type="radio" style="border:0px;" name="is_show" id="is_show" value="0" <?php if($current["isshow"] == 0): ?>checked<?php endif; ?> />隐藏</td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">显示模板&nbsp; </div></td>
    <td width="82%"><input name="template" type="radio" id="template"  style="border:0px;" value="1" <?php if($current["template"] == 1): ?>checked<?php endif; ?> />列表页显示
      <input type="radio" style="border:0px;" name="template" id="template" value="0" <?php if($current["template"] == 0): ?>checked<?php endif; ?> />内容页显示 </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="2">
	<div align="center"><input type="submit" name="Submit" value="确定"> 
	<input type="hidden" name="id" value="<?php echo ($current["id"]); ?>"/>&nbsp;<input type="reset" name="chongzhi" value="重置">
	</div>
	</td>
  </tr>
</table>
</form>
</body>
</html>