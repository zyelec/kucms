<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理平台</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	overflow:hidden;
}
.STYLE3 {color: #528311; font-size: 12px; }
.STYLE4 {
	color: #42870a;
	font-size: 12px;
}
form{margin: 0;padding:0}
-->
</style>
<script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
<script type="text/javascript">
  
$(function(){
  $(document).keyup(function(event){
    if(event.keyCode == 13){
      checksubmit();
    }
  });
    $('.login').click(function(){
    checksubmit();
  });

    $('.reset').click(function(){

$('input[name="username"]').val("");
$('input[name="password"]').val("");

});
 $('input[name="username"]').focus();//初始化 文本框焦点为用户名
});
function checksubmit()
{
    var name=$('input[name="username"]').val();

    var password=$('input[name="password"]').val();

    if(name=="")
    {
      alert('请输入用户名');
      $('input[name="username"]').focus();
      return false;
    }    
    else
    {
       if(password=="")
        {
          alert('请输入密码');
          $('input[name="password"]').focus();
          return false;
        }
    }
    $('form[name="loginform"]').submit();
}
</script>
</head>

<body>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#e5f6cf">&nbsp;</td>
  </tr>
  <tr>
    <td height="608" background="__PUBLIC__/admin/images/login_03.gif"><table width="862" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="266" background="__PUBLIC__/admin/images/login_04.gif">&nbsp;</td>
      </tr>
      <tr>
        <td height="95">
<form action="__URL__/doLogin" method="post" name="loginform">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="424" height="95" background="__PUBLIC__/admin/images/login_06.gif">&nbsp;</td>
            <td width="183" background="__PUBLIC__/admin/images/login_07.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="21%" height="30"><div align="center"><span class="STYLE3">用户</span></div></td>
                <td width="79%" height="30"><input type="text" name="username"  style="height:18px; width:130px; border:solid 1px #cadcb2; font-size:12px; color:#81b432;"></td>
              </tr>
              <tr>
                <td height="30"><div align="center"><span class="STYLE3">密码</span></div></td>
                <td height="30"><input type="password" name="password"  style="height:18px; width:130px; border:solid 1px #cadcb2; font-size:12px; color:#81b432;"></td>
              </tr>
              <tr>
                <td height="30">&nbsp;</td>
                <td height="30"><input type="submit" name="submit" value="登录">
                <input type="reset" name="cancel" value="取消">
                
                </td>
              </tr>
            </table></td>
            <td width="255" background="__PUBLIC__/admin/images/login_08.gif">&nbsp;</td>
          </tr>
        </table>
</form>
      </td>
      </tr>
      <tr>
        <td height="247" valign="top" background="__PUBLIC__/admin/images/login_09.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="22%" height="30">&nbsp;</td>
            <td width="56%">&nbsp;</td>
            <td width="22%">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="44%" height="20">&nbsp;</td>
                <td width="56%" class="STYLE4">版本 2013 </td>
              </tr>
            </table></td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#a2d962">&nbsp;</td>
  </tr>
</table>

<map name="Map"><area shape="rect" coords="3,3,36,19" href="#" class='login'><area shape="rect" coords="40,3,78,18" href="#" class='reset'></map></body>
</html>