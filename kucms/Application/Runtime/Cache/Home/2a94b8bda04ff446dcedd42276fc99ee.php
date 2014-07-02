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

<div class="space"></div>
    <!--导航结束-->
    <div class="rotate">
        <img src="/kucms/Public/Home/images/logo.jpg">
    </div>
    <div class="space"></div>
    <!--轮换结束-->
    <div class="recommend">
        <div class="pcate">
            <div class="top_cate">
                <div class="top_font">产品分类</div>
            </div>
            <div class="sort">
                <ul>
                    <?php if(is_array($pcate)): $i = 0; $__LIST__ = $pcate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pcate): $mod = ($i % 2 );++$i;?><li><?php echo ($pcate["cname"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <div class="plist">
            <div class="ptlink">
                <a href="product.php">更多</a>
            </div>
            <div class="pright">
            	<dl>
                     <?php if(is_array($produce)): foreach($produce as $key=>$produce): ?><dd>
	                         <a href='/kucms/index.php/Home/Index/produce_view/id/<?php echo ($produce["id"]); ?>' target='_blank' class='pimg'><img src='/kucms/Public/Uploads/1.jpg' /></a>
	                         <a href='/kucms/index.php/Home/Index/produce_view/id/<?php echo ($produce["id"]); ?>' target='_blank'><span>产品1</a></span>
	                     </dd><?php endforeach; endif; ?>
            	</dl>
            </div>
        </div>
    </div>
    <!--产品分类-->
    <div class="recommend">
        <div class="pcate">
            <div class="top_cate">
                <div class="top_font">产品分类</div>
            </div>
            <div class="sort">
                <ul>
                    <?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$clist): $mod = ($i % 2 );++$i;?><li><?php echo ($clist["cname"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <div class="plist">
            <div class="ptlink">
                <a href="product.php">更多</a>
            </div>
            <div class="pright">
              <?php if(is_array($plist)): $i = 0; $__LIST__ = $plist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$plist): $mod = ($i % 2 );++$i;?><dl>                       
                  <dd>
                    <a href='/kucms/index.php/Home/Category/show/module/Article/id/<?php echo ($plist["id"]); ?>' target='_blank' class='pimg'>
                    <img src='/kucms/Public/Uploads/<?php echo ($plist["img"]); ?>.jpg' /></a>                           
                  </dd>
                  <dt><a href='/kucms/index.php/Home/Category/show/module/Article/id/<?php echo ($plist["id"]); ?>' target='_blank'><?php echo ($plist["name"]); ?></a></dt>         
                </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                                 
            </div>
            <div class="clean"></div>
        </div>
    </div>
    <div class="clean"></div>
    <div class="space"></div>
    <!--新闻分类-->
    <div class="news">
        <div class="news_top">
            <div class="news_title"><a href="/kucms/index.php/Home/List/index/module/Article/id/0" title="新闻中心">新闻中心</a></div>
        </div>
        <div class="nlist">
            <div class="nlist_left">
                <ul>
                	<?php if(is_array($alist)): $i = 0; $__LIST__ = $alist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$alist): $mod = ($i % 2 );++$i;?><li><a href="/kucms/index.php/Home/Category/show/module/Article/id/<?php echo ($alist["id"]); ?>"><?php echo ($alist["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    

                </ul>
            </div>
            <!-- <div class="nlist_right">
                <ul>
                    <li>45446466</li>
                    <li>45446466</li>
                    <li>45446466</li>
                    <li>45446466</li>
                    <li>45446466</li>
                    <li>45446466</li>
                </ul>
            </div> -->
        </div>   
    </div>
    <div class="clean"></div>
    <div class="space"></div>
    <div class="picture">
        <div class="icate">图片中心</div>
        <div class="ilist"></div>   
    </div>
    <div class="clean"></div>
    <div class="space"></div>
    <div class="footer">
        <div class="copyright">
            Copyright © 2014 - 2015  All Rights Reserved.<br>
             版權所有
        </div>
    </div>
</body>
</html>