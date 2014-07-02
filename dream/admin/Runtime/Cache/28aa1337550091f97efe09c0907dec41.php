<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文档管理</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/base.css">
<script language="javascript">

function delArc(aid){
	var id=getCheckboxItem();
	if(id)
	{
	  if(confirm("是否将此产品删除?")){ 
	    location="__URL__/act_add/act/del_produce/id/"+id;
      }
	}else{
	    alert('请选择删除的产品');
	}
}

//获得选中文件的文件名
function getCheckboxItem()
{
	var allSel="";
	if(document.form2.id.value) return document.form2.id.value;
	for(i=0;i<document.form2.id.length;i++)
	{
		if(document.form2.id[i].checked)
		{
			if(allSel=="")
				allSel=document.form2.id[i].value;
			else
				allSel=allSel+","+document.form2.id[i].value;
		}
	}
	return allSel;
}

function selAll()
{
	for(i=0;i<document.form2.id.length;i++)
	{
		if(!document.form2.id[i].checked)
		{
			document.form2.id[i].checked=true;
		}
	}
}
function noSelAll()
{
	for(i=0;i<document.form2.id.length;i++)
	{
		if(document.form2.id[i].checked)
		{
			document.form2.id[i].checked=false;
		}
	}
}
</script>
</head>
<body leftmargin="8" topmargin="8" background='__PUBLIC__/admin/images/allbg.gif'>
<!--  内容列表   -->
<form name="form2" style="margin-bottom:0px;">
<table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px; margin-bottom:0px;">
<tr bgcolor="#E7E7E7">
	<td height="30" colspan="8" background="__PUBLIC__/admin/images/tbg.gif"><span style="float:left; padding-top:3px; padding-left:5px;">产品列表</span><span style="float:right;">
	<input type='button' class="coolbg np" onClick="location='__URL__/add/id/<?php echo ($alist["id"]); ?>';" value='添加新闻' /></span></td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
	<th width="8%">ID</th>
	<th width="5%">选择</th>
	<th width="42%">标题</th>
	<th width="14%">类别</th>
	<th>操作</th>
	</tr>

<?php if(is_array($alist)): foreach($alist as $key=>$data): ?><tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
	<td><?php echo ($data["id"]); ?></td>
	<td><input name="id" type="checkbox" id="id" value="<?php echo ($data["id"]); ?>" class="np"></td>
	<td align="left"><a href='__URL__/edit/id/<?php echo ($data["id"]); ?>'><u><?php echo ($data["title"]); ?></u></a></td>
	<td><?php echo ($data["catname"]); ?></td>
	<td><a href="__URL__/edit/id/<?php echo ($data["id"]); ?>">编辑</a> | <a href="__URL__/del/id/<?php echo ($data["id"]); ?>">删除</a></td>
	</tr><?php endforeach; endif; ?>
<tr bgcolor="#FAFAF1">
<td height="28" colspan="8">
	<span style="float:left">
	<a href="javascript:selAll()" class="coolbg">全选</a>
	<a href="javascript:noSelAll()" class="coolbg">取消</a>
	<a href="javascript:delArc(0)" class="coolbg">&nbsp;删除&nbsp;</a>
	</span>
	<span style="float:right"><?php echo ($page); ?></span>
	</td>
</tr>
</table>
</form>
</body>
</html>