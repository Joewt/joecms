<?php

/* admin/login.html */
class __TwigTemplate_225e6473c199ad21df748b664585f07e0607446af98631eaccccb9996e71bda3 extends Twig_Template
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
<div class=\"layer_form\">
    <div class=\"form_item\">
        <label>手机号码：</label>
        <div class=\"form_item_input\">
            <input type=\"text\" id=\"username\" placeholder=\"手机号码\" class=\"input_long\"/>
        </div>
        <i class=\"red\">*</i>
    </div>
    <div class=\"form_item\">
        <label>密 码：</label>
        <div class=\"form_item_input\">
            <input type=\"password\" id=\"password\" placeholder=\"请输入密码\" class=\"input_long\"/>
        </div>
        <i>*</i>
    </div>
    <div class=\"form_item\">
        <label>验证码：</label>
        <div class=\"form_item_input\">
            <input type=\"password\" id=\"validateCode\" placeholder=\"请输入验证码\" class=\"input_short\"/>
        </div>
        <a href=\"#\" class=\"form_item_code\" title=\"看不清换一张\"></a>
        <i>*</i>
    </div>
    <script type=\"text/javascript\">
        \$(function () {
            \$('#loginBtn').click(function () {
                var username = \$.trim(\$(\"#username\").val());//获取用户名
                var password = \$.trim(\$(\"#password\").val());
                var validateCode = \$.trim(\$(\"#validateCode\").val());

                var url = '登录请求的url路径';
                var param = {\"username\": username, \"password\": password, \"validateCode\": validateCode};

                \$.post(url, param, function(data) {
                    if (data == \"0\") {
                        //调用父窗口的function addPersonalCenter(){}方法，在父窗口右上角增加一个个人中心按钮
                        window.parent.addPersonalCenter();
                        // 先获取窗口索引，才能关闭窗口
                        var index = parent.layer.getFrameIndex(window.name);
                        parent.layer.close(index);
                    } else {
                        alert(\"登录失败！\");
                    }
                });
            });
        });
        lt;/script>
        </body>
</html>";
    }

    public function getTemplateName()
    {
        return "admin/login.html";
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
<div class=\"layer_form\">
    <div class=\"form_item\">
        <label>手机号码：</label>
        <div class=\"form_item_input\">
            <input type=\"text\" id=\"username\" placeholder=\"手机号码\" class=\"input_long\"/>
        </div>
        <i class=\"red\">*</i>
    </div>
    <div class=\"form_item\">
        <label>密 码：</label>
        <div class=\"form_item_input\">
            <input type=\"password\" id=\"password\" placeholder=\"请输入密码\" class=\"input_long\"/>
        </div>
        <i>*</i>
    </div>
    <div class=\"form_item\">
        <label>验证码：</label>
        <div class=\"form_item_input\">
            <input type=\"password\" id=\"validateCode\" placeholder=\"请输入验证码\" class=\"input_short\"/>
        </div>
        <a href=\"#\" class=\"form_item_code\" title=\"看不清换一张\"></a>
        <i>*</i>
    </div>
    <script type=\"text/javascript\">
        \$(function () {
            \$('#loginBtn').click(function () {
                var username = \$.trim(\$(\"#username\").val());//获取用户名
                var password = \$.trim(\$(\"#password\").val());
                var validateCode = \$.trim(\$(\"#validateCode\").val());

                var url = '登录请求的url路径';
                var param = {\"username\": username, \"password\": password, \"validateCode\": validateCode};

                \$.post(url, param, function(data) {
                    if (data == \"0\") {
                        //调用父窗口的function addPersonalCenter(){}方法，在父窗口右上角增加一个个人中心按钮
                        window.parent.addPersonalCenter();
                        // 先获取窗口索引，才能关闭窗口
                        var index = parent.layer.getFrameIndex(window.name);
                        parent.layer.close(index);
                    } else {
                        alert(\"登录失败！\");
                    }
                });
            });
        });
        lt;/script>
        </body>
</html>", "admin/login.html", "/Users/joe/PhpstormProjects/my_php_framework/app/views/admin/login.html");
    }
}
