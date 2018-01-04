<?php

/* index.html */
class __TwigTemplate_181367b8f0fe774a723d4dd0fd2ba6fc47d1b6c9597f7d7f168a0e32d385c029 extends Twig_Template
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
    <link rel=\"stylesheet\" href=\"./public/layui/css/layui.css\">
    <script type=\"text/javascript\" src=\"http://libs.baidu.com/jquery/1.9.0/jquery.min.js\"></script>
    <script type=\"text/javascript\" src=\"./public/js/dialog/layer/layer.js\"></script>
    <script type=\"text/javascript\" src=\"./public/layui/layui.js\"></script>
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
        return "index.html";
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
    <link rel=\"stylesheet\" href=\"./public/layui/css/layui.css\">
    <script type=\"text/javascript\" src=\"http://libs.baidu.com/jquery/1.9.0/jquery.min.js\"></script>
    <script type=\"text/javascript\" src=\"./public/js/dialog/layer/layer.js\"></script>
    <script type=\"text/javascript\" src=\"./public/layui/layui.js\"></script>
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
</html>", "index.html", "/Users/joe/PhpstormProjects/my_php_framework/app/views/index.html");
    }
}
