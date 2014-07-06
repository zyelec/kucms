<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0032)http://s1.mi.com/open/index.html -->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0"> 
<title><?php echo ($site_name); ?></title>
<meta name="description" content="<?php echo ($seo_description); ?>">
<meta name="keywords" content="<?php echo ($seo_keywords); ?>">
<link rel="stylesheet" type="text/css" href="/kucms/Public/Home/css/main.css" />
<link rel="stylesheet" type="text/css" href="/kucms/Public/Home/css/nav.css" />
</head>
<body>
<div class="box">
    <div class="warp">
        <div class="logo"><a href="/kucms/index.php"><img src="/kucms/Public/Home/images/logo.gif"></a></div>
    </div>
    <div class="nav">
        <ul>
            <li class="one"><a href="/kucms/index.php">首页</a></li>
            <?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$clist): $mod = ($i % 2 );++$i;?><li class="one"><a href="/kucms/index.php/Home/Category/index/id/<?php echo ($clist["id"]); ?>"><?php echo ($clist["cname"]); ?></a>
                    <ul>
                        <?php if(is_array($clist["sub"])): $i = 0; $__LIST__ = $clist["sub"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sublist): $mod = ($i % 2 );++$i;?><li class="two"><a href="/kucms/index.php/Home/Category/index/id/<?php echo ($sublist["id"]); ?>"><?php echo ($sublist["cname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>                    
        </ul>
    </div>

    <div class="news">
     这是内容页
     
     <div class="news_info">
     	<?php echo ($list["title"]); ?>
     	<?php echo ($list["content"]); ?>
     </div>
       <!--  <div class="pcate">
            <div class="top_cate">
                <div class="top_font">新闻列表</div>
            </div>
        </div>
        
       
         <div class="nlist">
            <div class="alist">
                <ul>
                    <li>45446466</li>
                    <li>45446466</li>
                    <li>45446466</li>
                    <li>45446466</li>
                    <li>45446466</li>
                    <li>45446466</li>
                </ul>
            </div>
        </div>   -->
    </div>

    <div class="footer">
        <div class="copyright">
            Copyright © 2014 - 2015  All Rights Reserved.<br>
             版權所有
        </div>
    </div>
</body>
</html>