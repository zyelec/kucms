<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>main</title>
<link rel="stylesheet" type="text/css" href="/kucms/Public/admin/css/base.css" />
<link rel="stylesheet" type="text/css" href="/kucms/Public/admin/css/main.css" />
<style type="text/css" rel="stylesheet">
    form {
        margin: 0;
    }
    .editor {
        margin-top: 5px;
        margin-bottom: 5px;
    }
  </style>
 <script type="text/javascript" charset="utf-8" src="/kucms/Public/kindeditor-4.1.7/kindeditor.js"></script>
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
    <td><div style='float:left'> <img height="14" src="/kucms/Public/admin/images/frame/book1.gif" width="20" />&nbsp;欢迎使用内容管理系统，建站的首选工具。 </div>
      <div style='float:right;padding-right:8px;'>
        <!--  //保留接口  -->
      </div></td>
  </tr>
  <tr>
    <td height="1" background="/kucms/Public/admin/images/frame/sp_bg.gif" style='padding:0px'></td>
  </tr>
</table>
<form id="add_news" name="add_news" method="post" action="/kucms/index.php/Admin/Article/edit" enctype="multipart/form-data" onSubmit="return confirmSubmit(this)">
<table width="98%" align="center" border="0" cellpadding="3" cellspacing="1" bgcolor="#CBD8AC" style="margin-bottom:8px;margin-top:8px;">
  <tr>
    <td colspan="2" background="/kucms/Public/admin/images/frame/wbg.gif" bgcolor="#EEF4EA" class='title'><span>添加新闻资讯</span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">新闻栏目&nbsp; </div></td>
    <td width="82%"><select name="cid" id="parent_category">
	  <?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cVo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($cVo["id"]); ?>" <?php if(($cVo["id"]) == $alist["cid"]): ?>selected<?php endif; ?>><?php $__FOR_START_23089__=1;$__FOR_END_23089__=$cVo['count'];for($i=$__FOR_START_23089__;$i < $__FOR_END_23089__;$i+=1){ ?>-<?php } echo ($cVo["cname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	</select></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">新闻标题&nbsp; </div></td>
    <td width="82%"><input type="text" name="title" id="title" value="<?php echo ($alist["title"]); ?>">
		&nbsp; <font color="#FF0000">*</font></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">关键字&nbsp; </div></td>
    <td width="82%"><input type="text" name="keywords" id="keywords" size="50" value="<?php echo ($alist["keywords"]); ?>">
		&nbsp; <font color="#FF0000"></font></td>
  </tr>
  <tr bgcolor="#FFFFFF" height="80">
    <td width="18%"><div align="right">描述&nbsp; </div></td>
    <td width="82%"><textarea rows="3" cols="50" name="description" id="description"><?php echo ($alist["description"]); ?></textarea></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">标题图片&nbsp; </div></td>
    <td width="82%"><?php if($alist.img): ?><img src="/kucms/Public/Uploads/<?php echo ($alist["img"]); ?>" height="150"><?php endif; ?><br />
    	<input type="hidden" name="oldimg" value="<?php echo ($alist["img"]); ?>">
    	<input type="file" name="img" id="img">
		&nbsp;</td>
  </tr>
   <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">新闻内容&nbsp; </div></td>
    <td width="82%"><div class="editor">
      <textarea id="content1" name="content" style="width:700px;height:200px;visibility:hidden;"><?php echo ($alist["content"]); ?></textarea>
    </div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">其他信息 </div></td>
    <td width="82%">来源: <input type="text" size="10" name="from" value="<?php echo ($alist["form"]); ?>"> 发布人: <input type="text" size="10" name="author" value="<?php echo ($alist["author"]); ?>"> 发布时间: <input type="text" name="addtime" size="10" value="<?php echo ($alist["addtime"]); ?>"></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td colspan="2">
    <input type="hidden" name="id" value="<?php echo ($alist["id"]); ?>">
	<div align="center"><input type="submit" name="Submit" value="确定"> &nbsp;	<input type="reset" name="chongzhi" value="重置">
	</div>
	</td>
  </tr>
</table>
</form>
</body>
</html>