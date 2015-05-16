<?php

/* ChatChatBundle:Chat:createclass.html.twig */
class __TwigTemplate_13898d333dc8fd73dd9b4570d7079c2988881c0dda13facc4d34cf8acd017a5c extends Twig_Template
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
    <script src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/chat/js/jquery.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>\t
    <script src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/chat/js/createclass.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
\t<title>ルーム作成|franker</title>
</head>
<body>
<h1>franker</h1>
\t<div id=\"body\" class=\"cen\">
\t\t<h2>ルームの作成</h2>
\t\t<div id=\"box_login\">
\t\t<form method=\"post\" action=\"";
        // line 19
        echo $this->env->getExtension('routing')->getPath("chat_chat_setCreateclass");
        echo "\" id=\"createclass\">
\t\t\t<div id=\"alert\"></div>
\t\t\t<p><input type=\"text\" class=\"login\"  id=\"classname\" name=\"classname\" placeholder=\"ルーム名\" required ></p>
\t\t\t<p><input type=\"text\" class=\"login\" id=\"classid\" name=\"classid\" placeholder=\"共通ID\" required ></p>
\t\t\t<input type=\"hidden\" name=\"firstcom\" id=\"firstcom\">
\t\t\t<p><button type=\"submit\" class=\"submit_btn\">作成</button>  <button　 onclick=\"history.back();\" style=\"text-decoration: underline\">戻る</button></p>
\t\t</form><br />
\t\t<p><a href=\"";
        // line 26
        echo $this->env->getExtension('routing')->getPath("logout");
        echo "\">ログアウト</a></p>
\t</div>
</div>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "ChatChatBundle:Chat:createclass.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 26,  48 => 19,  37 => 11,  33 => 10,  28 => 8,  19 => 1,);
    }
}
