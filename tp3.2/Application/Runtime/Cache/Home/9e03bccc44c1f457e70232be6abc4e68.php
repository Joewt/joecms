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
    <div class="container" style="text-align:center;">
        <h1 style="color:red"><?php echo ($message); ?></h1>
        <h3 id="location">系统将在
            <span style="color:red">3</span>秒后自动跳转到首页</h3>
    </div>
</section>
</body>
<script src="/Public/js/jquery.js"></script>
<script>
    //首页
    var url = "/";
    var time = 3;
    setInterval("refer()", 1000);
    function refer() {
        if (time == 0) {
            location.href = url;
        }
        $("#location span").html(time);
        time--;
    }
</script>

</html>