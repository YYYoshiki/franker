<?php

/* ChatChatBundle:Chat:class_top.html.twig */
class __TwigTemplate_c666f089f9a9c12442272fd0bd9aca35a77fcf75caa28048607b80a45473f857 extends Twig_Template
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
<html lang=\"ja\">
<head>
\t<meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0,user-scalable=no\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">
    <link href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/style.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
    <link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
\t<title>ルーム一覧|Franker</title>
</head>
<body>
<h1>franker</h1>
</p><a href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("chat_chat_menu");
        echo "\">　メニューに戻る</a></p>
\t<div id=\"Cbody\" class=\"cen\">
\t<p>ルームの一覧</p>
\t\t<h3>
\t\t<ul class=\"navi\">
\t\t\t ";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["class"]) ? $context["class"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
            // line 20
            echo "\t\t\t \t<li class=\"today\"><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("chat_chat_index", array("common_id" => $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "classid"))), "html", null, true);
            echo "\" class=\"today\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "classname"), "html", null, true);
            echo "<br>";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "create_time"), "Y/m/d H:i:s"), "html", null, true);
            echo "</a></li>
   \t\t\t ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "\t\t</ul>
\t\t</h3>
\t</div>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "ChatChatBundle:Chat:class_top.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 22,  49 => 20,  45 => 19,  37 => 14,  28 => 8,  19 => 1,);
    }
}
