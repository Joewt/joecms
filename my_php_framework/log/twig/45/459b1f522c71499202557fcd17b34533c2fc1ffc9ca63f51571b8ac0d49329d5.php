<?php

/* admin/index/index.html */
class __TwigTemplate_67be0f743468d6c6ad843159f3a28fcc043d565036f39c839199b901e9a2bb60 extends Twig_Template
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
    <title>后台管理</title>
    <link rel=\"stylesheet\" href=\"../../../../public/layui/css/layui.css\">
    <script type=\"text/javascript\" src=\"../../../../public/layui/layui.all.js\"></script>
</head>
<body>
<div class=\"layui-layout layui-layout-admin\">
    <div class=\"layui-header\">
        <div class=\"layui-logo\">joecms内容管理系统</div>
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
                    JOE
                </a>
                <dl class=\"layui-nav-child\">
                    <dd><a href=\"\">基本资料</a></dd>
                    <dd><a href=\"\">安全设置</a></dd>
                </dl>
            </li>
            <li class=\"layui-nav-item\"><a href=\"/admin/loginout\">退出登录</a></li>
        </ul>
    </div>

    <div class=\"layui-side layui-bg-black\">
        <div class=\"layui-side-scroll\">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class=\"layui-nav layui-nav-tree\"  lay-filter=\"test\">
                <li class=\"layui-nav-item layui-nav-itemed\">
                    <a class=\"\" href=\"javascript:;\">菜单管理</a>
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
        <table class=\"layui-table\">
            <colgroup>
                <col width=\"150\">
                <col width=\"200\">
                <col>
            </colgroup>
            <thead>
            <tr>
                <th>昵称</th>
                <th>加入时间</th>
                <th>签名</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>贤心</td>
                <td>2016-11-29</td>
                <td>人生就像是一场修行</td>
            </tr>
            <tr>
                <td>许闲心</td>
                <td>2016-11-28</td>
                <td>于千万人之中遇见你所遇见的人，于千万年之中，时间的无涯的荒野里…</td>
            </tr>
            </tbody>
        </table>
        <div style=\"padding: 15px;\">内容主体区域</div>
    </div>

    <div class=\"layui-footer\">
        <!-- 底部固定区域 -->
        © layui.com - 底部固定区域
    </div>
</div>
<script src=\"/public/jquery.js\"></script>
<script src=\"/public/js/dialog.js\"></script>
<script>

</script>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "admin/index/index.html";
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
    <title>后台管理</title>
    <link rel=\"stylesheet\" href=\"../../../../public/layui/css/layui.css\">
    <script type=\"text/javascript\" src=\"../../../../public/layui/layui.all.js\"></script>
</head>
<body>
<div class=\"layui-layout layui-layout-admin\">
    <div class=\"layui-header\">
        <div class=\"layui-logo\">joecms内容管理系统</div>
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
                    JOE
                </a>
                <dl class=\"layui-nav-child\">
                    <dd><a href=\"\">基本资料</a></dd>
                    <dd><a href=\"\">安全设置</a></dd>
                </dl>
            </li>
            <li class=\"layui-nav-item\"><a href=\"/admin/loginout\">退出登录</a></li>
        </ul>
    </div>

    <div class=\"layui-side layui-bg-black\">
        <div class=\"layui-side-scroll\">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class=\"layui-nav layui-nav-tree\"  lay-filter=\"test\">
                <li class=\"layui-nav-item layui-nav-itemed\">
                    <a class=\"\" href=\"javascript:;\">菜单管理</a>
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
        <table class=\"layui-table\">
            <colgroup>
                <col width=\"150\">
                <col width=\"200\">
                <col>
            </colgroup>
            <thead>
            <tr>
                <th>昵称</th>
                <th>加入时间</th>
                <th>签名</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>贤心</td>
                <td>2016-11-29</td>
                <td>人生就像是一场修行</td>
            </tr>
            <tr>
                <td>许闲心</td>
                <td>2016-11-28</td>
                <td>于千万人之中遇见你所遇见的人，于千万年之中，时间的无涯的荒野里…</td>
            </tr>
            </tbody>
        </table>
        <div style=\"padding: 15px;\">内容主体区域</div>
    </div>

    <div class=\"layui-footer\">
        <!-- 底部固定区域 -->
        © layui.com - 底部固定区域
    </div>
</div>
<script src=\"/public/jquery.js\"></script>
<script src=\"/public/js/dialog.js\"></script>
<script>

</script>
</body>
</html>", "admin/index/index.html", "/Users/joe/PhpstormProjects/my_php_framework/app/views/admin/index/index.html");
    }
}
