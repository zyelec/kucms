<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="keywords" content="<?php echo ($seo_keywords); ?>" />
<meta http-equiv="description" content="<?php echo ($seo_description); ?>" />
<title><?php echo ($seo_title); ?> - <?php echo ($site_name); ?></title>
<link href="__PUBLIC__/home/css/main.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/home/css/index.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/sayslide/css/saySlide.css" type="text/css" rel="stylesheet" />
<script src="__PUBLIC__/sayslide/jquery-1.7.1.min.js" type="text/javascript" ></script>
<script src="__PUBLIC__/sayslide/jquery.saySlide.js" type="text/javascript" ></script>


<script type="text/javascript">
	function lookup(inputString) {
		if(inputString.length == 0) {
			// Hide the suggestion box.
			$('#suggestions').hide();
		} else {
			$.post("__ROOT__/index.php/index/search", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').show();
					$('#autoSuggestionsList').html(data);
				}
			});
		}
	} // lookup
	
	function fill(thisValue) {
		$('#inputString').val(thisValue);
		setTimeout("$('#suggestions').hide();", 200);
	}
</script>
<style type="text/css">
	.suggestionsBox {
		position: absolute;
		top:135px;
		left: 326px;
		margin: 10px 0px 0px 0px;
		width: 221px;
		border: 1px solid #000;	
	}
	
	.suggestionList {
		margin: 0px;
		padding: 0px;
	}
	
	.suggestionList li {
		
		margin: 0px 0px 3px 0px;
		list-style:none;
		padding: 3px;
		cursor: pointer;
	}
	
	.suggestionList li:hover {
		background-color: #659CD8;
	}
	
  #ad{width:900px;height:512px;margin:5px auto 5px 0px;overflow:hidden;}
  
</style>
<!-- templets/default/ -->
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
	<form method="post" action="__URL__/news">
				<div id="new_search" >
					<font style="font-size:14px;">新闻搜索:</font>
					<input type="text" size="30" value="" id="inputString" name="inputString" onkeyup="lookup(this.value);" onblur="fill();" />
					<input type="submit" value="搜索"/>
				</div>
				
				<div class="suggestionsBox" id="suggestions" style="display: none;">
					<div class="suggestionList" id="autoSuggestionsList" style=" border:1 solid #CCCCCC;">
						&nbsp;
					</div>
				</div>
			</form>

	<div id="ad">
	  <?php if(is_array($rlist)): foreach($rlist as $key=>$rvo): ?><div><img src="__PUBLIC__/uploads/<?php echo ($rvo["img"]); ?>" stitle="<?php echo ($rvo["title"]); ?>" slink="<?php echo ($rvo["url"]); ?>" /></div><?php endforeach; endif; ?>
	</div>
	<script>
		$("#ad").saySlide({isTitle:true,isBottombg:true,autodir:'left',autoTime:2000,isBottombg:true});
	</script>
	
	<div class="ileft">
	
		<div class="newsbox margintop">
				<dl>
					<dt><a href="__APP__/Article">新闻中心</a></dt>
					<dd>
						<ul>
	                	<?php if(is_array($article_list)): foreach($article_list as $key=>$news): ?><li><a href='__APP__/Article/show/id/<?php echo ($news["id"]); ?>' target='_blank'><?php echo ($news["title"]); ?></a></li><?php endforeach; endif; ?>
						</ul>
					</dd>
				</dl>
				<dl>
					<dt><a href="__APP__/Article">新闻中心</a></dt>
					<dd>
						<ul>
	                	<?php if(is_array($new2)): foreach($new2 as $key=>$new): ?><li><a href='__URL__/news_view/id/<?php echo ($new["id"]); ?>' target='_blank'><?php echo ($new["title"]); ?></a></li><?php endforeach; endif; ?>
						</ul>
					</dd>
				</dl>
	</div>
			<div class="leftlist margintop">
				<div class="ptitle">
					<a href="__APP__/Produce">产品展示</a>
				</div>
				<div class="ptlink">
					<a href="product.php">查看更多公司产品</a></div>
				<div class="pleft picnews">
						<dl>
						   <?php if(is_array($plist)): foreach($plist as $key=>$produce): ?><dd><a href='__APP__/Produce/show/id/<?php echo ($produce["id"]); ?>' target='_blank' class='pimg'><img src='__PUBLIC__/uploads/<?php echo ($produce["img"]); ?>' title="<?php echo ($produce["name"]); ?>" height="100"/></a><a href='__URL__/Produce/show/id/<?php echo ($produce["id"]); ?>' target='_blank'><span><?php echo ($produce["name"]); ?></a></span></dd><?php endforeach; endif; ?>
						</dl>
				</div>
			</div>
	  </div>
	<div class="iright">
      <span id="_loginform">
		<div class="rlist">
        	<form action='__APP__/Member/login' method='POST' name='frmmember' id="frmmember">
			<div class="title">会员登陆</div>
		    <span id="_loginform">
		    <div class="rbox userlogin">
		      <?php if($_COOKIE['user']!= ''): ?><dl>                
                <dd> 欢迎您，<?php echo (cookie('user')); ?> <a href="__APP__/Member/logout">退出</a></dd>
              </dl>
			<?php else: ?>
		      <dl>
		      	 <dt>用户名：</dt>                
                  <dd><input name="username" type="text" class="username" id="username" maxlength="20" /></dd>
              </dl>
              <dl>
                <dt>密&nbsp;&nbsp;码：</dt>
		        <dd><input name="password" type="password" class="password" id="password" maxlength="20" />
	            </dd>
	          </dl>
		      <dl>
                <dt>验证码：</dt>
		        <dd>
                  <input name="verify" class="gdcode" type="text" size="4" maxlength="4" />
                  <img src="__APP__/Index/verify/" /> 
                </dd>
	          </dl>
		      <div class="ulsubmit">
                <input name="submit" type="submit" class="submit" value="登陆" />
              <a href="__APP__/Member/reg">注册帐号</a> </div><?php endif; ?>
	        </div>
		    </span>
       	  </form>
		</div>
      </span>

<!--<div class="rlist margintop">
        <form action='order_result.php' method='post' name='frmorder' target="_blank" id="frmorder">
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