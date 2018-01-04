<?php

/* layout.html */
class __TwigTemplate_62af9daa0e1f72c487e14f5a75101fd0adb0dcc0d738b4bf25e6dee988a63421 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
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
</head>
<body>
<header>header</header>

<content>

    ";
        // line 12
        $this->displayBlock('content', $context, $blocks);
        // line 15
        echo "
</content>

<footer>footer</footer>
</body>
</html>";
    }

    // line 12
    public function block_content($context, array $blocks = array())
    {
        // line 13
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function getDebugInfo()
    {
        return array (  47 => 13,  44 => 12,  35 => 15,  33 => 12,  20 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>Title</title>
</head>
<body>
<header>header</header>

<content>

    {% block content%}

    {% endblock %}

</content>

<footer>footer</footer>
</body>
</html>", "layout.html", "/Users/joe/PhpstormProjects/my_php_framework/app/views/layout.html");
    }
}
