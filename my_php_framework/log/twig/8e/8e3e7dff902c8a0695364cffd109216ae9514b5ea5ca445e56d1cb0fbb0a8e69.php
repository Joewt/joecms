<?php

/* index/index.html */
class __TwigTemplate_d2cc5b68dc95eb228e00d05460a56d180fd94237477485e9384e611aab12cfe1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\"
          content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <link rel=\"stylesheet\" href=\"../../../public/layui/css/layui.css\">
    <script src=\"/public/jquery.js\"></script>
    <script type=\"text/javascript\" src=\"../../../public/layui/layui.all.js\"></script>
    <title>index</title>
</head>
<body>
<ul class=\"layui-nav\" lay-filter=\"\">
    <li class=\"layui-nav-item\"><a href=\"\">最新活动</a></li>
    <li class=\"layui-nav-item layui-this\"><a href=\"\">产品</a></li>
    <li class=\"layui-nav-item\"><a href=\"\">大数据</a></li>
    <li class=\"layui-nav-item\">
        <a href=\"javascript:;\">解决方案</a>
        <dl class=\"layui-nav-child\"> <!-- 二级菜单 -->
            <dd><a href=\"\">移动模块</a></dd>
            <dd><a href=\"\">后台模版</a></dd>
            <dd><a href=\"\">电商平台</a></dd>
        </dl>
    </li>
    <li class=\"layui-nav-item\"><a href=\"\">社区</a></li>
</ul>

<script>
    //注意：导航 依赖 element 模块，否则无法进行功能性操作
    layui.use('element', function(){
        var element = layui.element;

        //…
    });
</script>

</body>
</html>";
    }

    public function getTemplateName()
    {
        return "index/index.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!doctype html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\"
          content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <link rel=\"stylesheet\" href=\"../../../public/layui/css/layui.css\">
    <script src=\"/public/jquery.js\"></script>
    <script type=\"text/javascript\" src=\"../../../public/layui/layui.all.js\"></script>
    <title>index</title>
</head>
<body>
<ul class=\"layui-nav\" lay-filter=\"\">
    <li class=\"layui-nav-item\"><a href=\"\">最新活动</a></li>
    <li class=\"layui-nav-item layui-this\"><a href=\"\">产品</a></li>
    <li class=\"layui-nav-item\"><a href=\"\">大数据</a></li>
    <li class=\"layui-nav-item\">
        <a href=\"javascript:;\">解决方案</a>
        <dl class=\"layui-nav-child\"> <!-- 二级菜单 -->
            <dd><a href=\"\">移动模块</a></dd>
            <dd><a href=\"\">后台模版</a></dd>
            <dd><a href=\"\">电商平台</a></dd>
        </dl>
    </li>
    <li class=\"layui-nav-item\"><a href=\"\">社区</a></li>
</ul>

<script>
    //注意：导航 依赖 element 模块，否则无法进行功能性操作
    layui.use('element', function(){
        var element = layui.element;

        //…
    });
</script>

</body>
</html>", "index/index.html", "/Users/joe/PhpstormProjects/my_php_framework/app/views/index/index.html");
    }
}
