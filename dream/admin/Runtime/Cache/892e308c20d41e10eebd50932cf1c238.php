<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>main</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/base.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/main.css" />

  <script type="text/javascript">
	
	function confirmSubmit(frm)
	{
	   if(frm.elements['oldpws'].value == '')
	   {
	      alert('旧密码不能为空！');
		  return false;
	   }else{
	      return true;
	   }

	   if(frm.elements['password'].value == '')
	   {
	      alert('新密码不能为空！');
		  return false;
	   }else{
	      return true;
	   }

	   if(frm.elements['repassword'].value == '')
	   {
	      alert('确认密码不能为空！');
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
<form id="mod_pws" name="mod_pws" method="post" action="__URL__/mod_pws" enctype="multipart/form-data" onSubmit="return confirmSubmit(this)">
<table width="98%" align="center" border="0" cellpadding="3" cellspacing="1" bgcolor="#CBD8AC" style="margin-bottom:8px;margin-top:8px;">
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">旧密码&nbsp; </div></td>
    <td width="82%"><input type="password" name="oldpws" id="oldpws">
		&nbsp; <font color="#FF0000">*</font></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">新密码&nbsp; </div></td>
    <td width="82%"><input type="password" name="password" id="password">
		&nbsp; <font color="#FF0000">*</font></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">确认密码&nbsp; </div></td>
    <td width="82%"><input type="password" name="repassword" id="repassword">
		&nbsp; <font color="#FF0000">*</font></td>
  </tr>
   <tr bgcolor="#FFFFFF">
    <td width="18%"><div align="right">验证码&nbsp; </div></td>
    <td width="82%"><input type="text" name="verfiy" id="verify">
		&nbsp; <font color="#FF0000">*</font></td>
  </tr>

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