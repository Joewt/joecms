<?php

/* admin/login/index.html */
class __TwigTemplate_9320d9eb9d2dc3798f76a966b79947baae0552c5b692b3f40276e5fc114db697 extends Twig_Template
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
<html lang=\"zh-CN\">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"\">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">
    <link rel=\"icon\" href=\"\">

    <title>cms内容管理平台</title>
    <link rel=\"stylesheet\" href=\"../../../../public/layui/css/layui.css\">
    <script type=\"text/javascript\" src=\"../../../../public/layui/layui.all.js\"></script>
</head>
<body>
<fieldset class=\"layui-elem-field layui-field-title\" style=\"margin-top: 20px;\">
    <legend style=\"margin-left: 50%\">登录</legend>
</fieldset>
<div class=\"layui-container\">
    <form class=\"layui-form\" action=\"\" method=\"post\">
    <div class=\"layui-form-item\">
        <label class=\"layui-form-label\">用户名</label>
        <div class=\"layui-input-block\">
            <input type=\"text\" name=\"username\" required  lay-verify=\"username\" placeholder=\"请输入用户名\" autocomplete=\"off\" class=\"layui-input\">
        </div>
    </div>
    <div class=\"layui-form-item\">
        <label class=\"layui-form-label\">密码</label>
        <div class=\"layui-input-block\">
            <input type=\"password\" name=\"password\" required lay-verify=\"pass\" placeholder=\"请输入密码\" autocomplete=\"off\" class=\"layui-input\">
        </div>
    </div>
    <div class=\"layui-form-item\">
        <div class=\"layui-input-block\">
            <button class=\"layui-btn\" lay-submit lay-filter=\"formDemo\">立即登录</button>
            <button type=\"reset\" class=\"layui-btn layui-btn-primary\">重置</button>
        </div>
    </div>
</form>


</div>
<script type=\"text/javascript\" src=\"/public/jquery.js\"></script>
<script src=\"/public/js/dialog.js\"></script>
<script src=\"/public/js/admin/login.js\"></script>
<script>

</script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "admin/login/index.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"zh-CN\">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"\">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">
    <link rel=\"icon\" href=\"\">

    <title>cms内容管理平台</title>
    <link rel=\"stylesheet\" href=\"../../../../public/layui/css/layui.css\">
    <script type=\"text/javascript\" src=\"../../../../public/layui/layui.all.js\"></script>
</head>
<body>
<fieldset class=\"layui-elem-field layui-field-title\" style=\"margin-top: 20px;\">
    <legend style=\"margin-left: 50%\">登录</legend>
</fieldset>
<div class=\"layui-container\">
    <form class=\"layui-form\" action=\"\" method=\"post\">
    <div class=\"layui-form-item\">
        <label class=\"layui-form-label\">用户名</label>
        <div class=\"layui-input-block\">
            <input type=\"text\" name=\"username\" required  lay-verify=\"username\" placeholder=\"请输入用户名\" autocomplete=\"off\" class=\"layui-input\">
        </div>
    </div>
    <div class=\"layui-form-item\">
        <label class=\"layui-form-label\">密码</label>
        <div class=\"layui-input-block\">
            <input type=\"password\" name=\"password\" required lay-verify=\"pass\" placeholder=\"请输入密码\" autocomplete=\"off\" class=\"layui-input\">
        </div>
    </div>
    <div class=\"layui-form-item\">
        <div class=\"layui-input-block\">
            <button class=\"layui-btn\" lay-submit lay-filter=\"formDemo\">立即登录</button>
            <button type=\"reset\" class=\"layui-btn layui-btn-primary\">重置</button>
        </div>
    </div>
</form>


</div>
<script type=\"text/javascript\" src=\"/public/jquery.js\"></script>
<script src=\"/public/js/dialog.js\"></script>
<script src=\"/public/js/admin/login.js\"></script>
<script>

</script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</body>
</html>", "admin/login/index.html", "/Users/joe/PhpstormProjects/my_php_framework/app/views/admin/login/index.html");
    }
}
