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
 <script type="text/javascript" charset="utf-8" src="__PUBLIC__/kindeditor-4.1.7/kindeditor.js"></script>
  <script type="text/javascript">
	KindEditor.ready(function(K) {
		K.create('textarea[name="content"]', {
			filterMode : false
		});
	});

	
	function confirmSubmit(frm)
	{
	   if(frm.elements['title'].value == '')
	   {
	      alert('产品名称不能为空！');
		  return false;
	   }else if(frm.elements['price'].value == ''){
	      alert('产品价格不能为空！');
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
<form id="add_news" name="add_news" method="post" action="__URL__/doAdd" enctype="multipart/form-data" onSubmit="return confirmSubmit(this)">
<table width="98%" align="center" border="0" cellpadding="3" cellspacing="1" bgcolor="#CBD8AC" style="margin-bottom:8px;margin-top:8px;">
  <tr>
    <td colspan="2" background="__PUBLIC__/admin/images/frame/wbg.gif" bgcolor="#EEF4EA" class='title'><span>添加产品资讯</span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">产品栏目&nbsp; </div></td>
    <td width="82%"><select name="pid" id="parent_category">
	  <?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cVo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($cVo["id"]); ?>"><?php echo ($cVo["catname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	</select></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">产品名称&nbsp; </div></td>
    <td width="82%"><input type="text" name="name" id="name">
		&nbsp; <font color="#FF0000">*</font></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">产品价格&nbsp; </div></td>
    <td width="82%"><input type="text" name="price" id="price">
		&nbsp; <font color="#FF0000">*</font></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">产品图片&nbsp; </div></td>
    <td width="82%"><input type="file" name="img" id="img">
		&nbsp;</td>
  </tr>
   <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">产品介绍&nbsp; </div></td>
    <td width="82%"><div class="editor">
      <textarea id="content1" name="content" style="width:700px;height:200px;visibility:hidden;"></textarea>
    </div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">其他信息 </div></td>
    <td width="82%">
    发布人: 
      <input type="text" size="5" name="author" value="管理员"> 发布时间: <input type="text" name="addtime" size="8" value=<?php echo date("Y-m-d"); ?>></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="2">
	<div align="center"><input type="submit" name="Submit" value="确定"> 
	<input type="hidden" name="act" value="add_produce"/>
&nbsp;	
<input type="reset" name="chongzhi" value="重置">
	</div>
	</td>
  </tr>
</table>
</form>
</body>
</html>