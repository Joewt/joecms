<?php if (!defined('THINK_PATH')) exit(); $config=D("Basic")->select(); $navs = D("Menu")->getBarMenus(); ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="">
    <title>cms</title>
    <link rel="stylesheet" href="/Public/layui/css/layui.css">
    <link rel="stylesheet" href="/Public/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="/Public/css/home/main.css" type="text/css" />
    <script type="text/javascript" src="/Public/layui/layui.all.js"></script>
</head>

<body>
   
    <ul class="layui-nav" lay-filter="">

    <li class="layui-nav-item">
        <a href="/"<?php if($result['catId'] == 0): ?>class="layui-nav-item layui-this"<?php endif; ?>>首页</a>
    </li>
    <?php if(is_array($navs)): foreach($navs as $key=>$vo): ?><li class="layui-nav-item">
            <a href="/index.php?c=cat&id=<?php echo ($vo["menu_id"]); ?>" <?php if($vo['menu_id'] == $result['catId']): ?>class="layui-nav-item layui-this"<?php endif; ?>><?php echo ($vo["name"]); ?></a>
        </li><?php endforeach; endif; ?>

    </ul>
    
    <script>
        //注意：导航 依赖 element 模块，否则无法进行功能性操作
        layui.use('element', function () {
            var element = layui.element;

            //…
        });
    </script>
</body>

</html>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-9">

                <div class="news-list">
                    <?php if(is_array($result['listNews'])): $i = 0; $__LIST__ = $result['listNews'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
                            <dt><?php echo ($vo["title"]); ?></dt>
                            <dd class="news-img">
                                <a href="/index.php?c=detail&id=<?php echo ($vo["news_id"]); ?>">
                                    <img width="200" height="120" src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>">
                                </a>
                            </dd>
                            <dd class="news-intro">
                                <?php echo ($vo["description"]); ?>
                            </dd>
                            <dd class="news-info">
                                <?php echo ($vo["keywords"]); ?>
                                <span><?php echo (date("Y-m-d H:i:s",$vo["create_time"])); ?></span> 阅读(<?php echo ($vo["count"]); ?>)
                            </dd>
                        </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                    <?php echo ($result['pageres']); ?>

                </div>

                <!--<button id="sing_more" type="button" class="btn btn-primary btn-lg btn-block sing_display_none">更多</button>-->
            </div>
            <!--start right -->

            <div class="col-sm-3 col-md-3">
    <div class="right-title">
        <h3>文章排行</h3>
        <span>TOP ARTICLES</span>
    </div>

    <div class="right-content">
        <ul>
            <?php if(is_array($result['rankNews'])): $k = 0; $__LIST__ = $result['rankNews'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li class="num<?php echo ($k); ?> curr">
                    <a target="_blank" href="/index.php?c=detail&id=<?php echo ($vo["news_id"]); ?>"><?php echo ($vo["small_title"]); ?></a>
                    <?php if($k == 1): ?><div class="intro">
                            <?php echo ($vo["description"]); ?>
                        </div><?php endif; ?>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <?php if(is_array($result['advNews'])): $k = 0; $__LIST__ = $result['advNews'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div class="right-hot">
            <a target="_blank" href="<?php echo ($vo["url"]); ?>">
                <img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["name"]); ?>">
            </a>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
            <!-- end right-->
        </div>
    </div>
</section>
</body>
<script src="/Public/js/jquery.js"></script>
<script>

</script>
<script src="/Public/js/home/common.js"></script>

</html>