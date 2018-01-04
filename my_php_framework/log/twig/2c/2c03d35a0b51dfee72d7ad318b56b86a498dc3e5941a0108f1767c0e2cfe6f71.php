<?php

/* admin/index.html */
class __TwigTemplate_c399e8cdd58d715c961d89dfb43d47d1e599fae8128be1c3ed635c9033c0893c extends Twig_Template
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
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>Title</title>
    <link rel=\"stylesheet\" href=\"../../../public/layui/css/layui.css\">
    <script type=\"text/javascript\" src=\"http://libs.baidu.com/jquery/1.9.0/jquery.min.js\"></script>
    <script type=\"text/javascript\" src=\"../../../public/js/dialog/layer/layer.js\"></script>
    <script type=\"text/javascript\" src=\"../../../public/layui/layui.js\"></script>
</head>
<body>
<div class=\"layui-layout layui-layout-admin\">
    <div class=\"layui-header\">
        <div class=\"layui-logo\">layui 后台布局</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class=\"layui-nav layui-layout-left\">
            <li class=\"layui-nav-item\"><a href=\"\">控制台</a></li>
            <li class=\"layui-nav-item\"><a href=\"\">商品管理</a></li>
            <li class=\"layui-nav-item\"><a href=\"\">用户</a></li>
            <li class=\"layui-nav-item\">
                <a href=\"javascript:;\">其它系统</a>
                <dl class=\"layui-nav-child\">
                    <dd><a href=\"\">邮件管理</a></dd>
                    <dd><a href=\"\">消息管理</a></dd>
                    <dd><a href=\"\">授权管理</a></dd>
                </dl>
            </li>
        </ul>
        <ul class=\"layui-nav layui-layout-right\">
            <li class=\"layui-nav-item\">
                <a href=\"javascript:;\">
                    <img src=\"http://t.cn/RCzsdCq\" class=\"layui-nav-img\">
                    贤心
                </a>
                <dl class=\"layui-nav-child\">
                    <dd><a href=\"\">基本资料</a></dd>
                    <dd><a href=\"\">安全设置</a></dd>
                </dl>
            </li>
            <li class=\"layui-nav-item\"><a href=\"\">退了</a></li>
        </ul>
    </div>

    <div class=\"layui-side layui-bg-black\">
        <div class=\"layui-side-scroll\">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class=\"layui-nav layui-nav-tree\"  lay-filter=\"test\">
                <li class=\"layui-nav-item layui-nav-itemed\">
                    <a class=\"\" href=\"javascript:;\">所有商品</a>
                    <dl class=\"layui-nav-child\">
                        <dd><a href=\"javascript:;\">列表一</a></dd>
                        <dd><a href=\"javascript:;\">列表二</a></dd>
                        <dd><a href=\"javascript:;\">列表三</a></dd>
                        <dd><a href=\"\">超链接</a></dd>
                    </dl>
                </li>
                <li class=\"layui-nav-item\">
                    <a href=\"javascript:;\">解决方案</a>
                    <dl class=\"layui-nav-child\">
                        <dd><a href=\"javascript:;\">列表一</a></dd>
                        <dd><a href=\"javascript:;\">列表二</a></dd>
                        <dd><a href=\"\">超链接</a></dd>
                    </dl>
                </li>
                <li class=\"layui-nav-item\"><a href=\"\">云市场</a></li>
                <li class=\"layui-nav-item\"><a href=\"\">发布商品</a></li>
            </ul>
        </div>
    </div>

    <div class=\"layui-body\">
        <!-- 内容主体区域 -->
        <div style=\"padding: 15px;\">内容主体区域</div>
    </div>

    <div class=\"layui-footer\">
        <!-- 底部固定区域 -->
        © layui.com - 底部固定区域
    </div>
</div>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
</script>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "admin/index.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>Title</title>
    <link rel=\"stylesheet\" href=\"../../../public/layui/css/layui.css\">
    <script type=\"text/javascript\" src=\"http://libs.baidu.com/jquery/1.9.0/jquery.min.js\"></script>
    <script type=\"text/javascript\" src=\"../../../public/js/dialog/layer/layer.js\"></script>
    <script type=\"text/javascript\" src=\"../../../public/layui/layui.js\"></script>
</head>
<body>
<div class=\"layui-layout layui-layout-admin\">
    <div class=\"layui-header\">
        <div class=\"layui-logo\">layui 后台布局</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class=\"layui-nav layui-layout-left\">
            <li class=\"layui-nav-item\"><a href=\"\">控制台</a></li>
            <li class=\"layui-nav-item\"><a href=\"\">商品管理</a></li>
            <li class=\"layui-nav-item\"><a href=\"\">用户</a></li>
            <li class=\"layui-nav-item\">
                <a href=\"javascript:;\">其它系统</a>
                <dl class=\"layui-nav-child\">
                    <dd><a href=\"\">邮件管理</a></dd>
                    <dd><a href=\"\">消息管理</a></dd>
                    <dd><a href=\"\">授权管理</a></dd>
                </dl>
            </li>
        </ul>
        <ul class=\"layui-nav layui-layout-right\">
            <li class=\"layui-nav-item\">
                <a href=\"javascript:;\">
                    <img src=\"http://t.cn/RCzsdCq\" class=\"layui-nav-img\">
                    贤心
                </a>
                <dl class=\"layui-nav-child\">
                    <dd><a href=\"\">基本资料</a></dd>
                    <dd><a href=\"\">安全设置</a></dd>
                </dl>
            </li>
            <li class=\"layui-nav-item\"><a href=\"\">退了</a></li>
        </ul>
    </div>

    <div class=\"layui-side layui-bg-black\">
        <div class=\"layui-side-scroll\">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class=\"layui-nav layui-nav-tree\"  lay-filter=\"test\">
                <li class=\"layui-nav-item layui-nav-itemed\">
                    <a class=\"\" href=\"javascript:;\">所有商品</a>
                    <dl class=\"layui-nav-child\">
                        <dd><a href=\"javascript:;\">列表一</a></dd>
                        <dd><a href=\"javascript:;\">列表二</a></dd>
                        <dd><a href=\"javascript:;\">列表三</a></dd>
                        <dd><a href=\"\">超链接</a></dd>
                    </dl>
                </li>
                <li class=\"layui-nav-item\">
                    <a href=\"javascript:;\">解决方案</a>
                    <dl class=\"layui-nav-child\">
                        <dd><a href=\"javascript:;\">列表一</a></dd>
                        <dd><a href=\"javascript:;\">列表二</a></dd>
                        <dd><a href=\"\">超链接</a></dd>
                    </dl>
                </li>
                <li class=\"layui-nav-item\"><a href=\"\">云市场</a></li>
                <li class=\"layui-nav-item\"><a href=\"\">发布商品</a></li>
            </ul>
        </div>
    </div>

    <div class=\"layui-body\">
        <!-- 内容主体区域 -->
        <div style=\"padding: 15px;\">内容主体区域</div>
    </div>

    <div class=\"layui-footer\">
        <!-- 底部固定区域 -->
        © layui.com - 底部固定区域
    </div>
</div>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
</script>
</body>
</html>", "admin/index.html", "/Users/joe/PhpstormProjects/my_php_framework/app/views/admin/index.html");
    }
}
