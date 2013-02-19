<?php

/* TwigBundle:Exception:trace.html.twig */
class __TwigTemplate_44f9d1a9f98c36ad8a982e3ed6a7d39c extends Twig_Template
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
        if ($this->getAttribute($this->getContext($context, "trace"), "function")) {
            // line 2
            echo "    at
    <strong>
        <abbr title=\"";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "trace"), "class"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "trace"), "short_class"), "html", null, true);
            echo "</abbr>
        ";
            // line 5
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getContext($context, "trace"), "type") . $this->getAttribute($this->getContext($context, "trace"), "function")), "html", null, true);
            echo "
    </strong>
    (";
            // line 7
            echo $this->env->getExtension('code')->formatArgs($this->getAttribute($this->getContext($context, "trace"), "args"));
            echo ")
";
        }
        // line 9
        echo "
";
        // line 10
        if (((($this->getAttribute($this->getContext($context, "trace", true), "file", array(), "any", true, true) && $this->getAttribute($this->getContext($context, "trace"), "file")) && $this->getAttribute($this->getContext($context, "trace", true), "line", array(), "any", true, true)) && $this->getAttribute($this->getContext($context, "trace"), "line"))) {
            // line 11
            echo "    ";
            echo (($this->getAttribute($this->getContext($context, "trace"), "function")) ? ("<br />") : (""));
            echo "
    in ";
            // line 12
            echo $this->env->getExtension('code')->formatFile($this->getAttribute($this->getContext($context, "trace"), "file"), $this->getAttribute($this->getContext($context, "trace"), "line"));
            echo "&nbsp;
    ";
            // line 13
            ob_start();
            // line 14
            echo "    <a href=\"#\" onclick=\"toggle('trace_";
            echo twig_escape_filter($this->env, (($this->getContext($context, "prefix") . "_") . $this->getContext($context, "i")), "html", null, true);
            echo "'); switchIcons('icon_";
            echo twig_escape_filter($this->env, (($this->getContext($context, "prefix") . "_") . $this->getContext($context, "i")), "html", null, true);
            echo "_open', 'icon_";
            echo twig_escape_filter($this->env, (($this->getContext($context, "prefix") . "_") . $this->getContext($context, "i")), "html", null, true);
            echo "_close'); return false;\">
        <img class=\"toggle\" id=\"icon_";
            // line 15
            echo twig_escape_filter($this->env, (($this->getContext($context, "prefix") . "_") . $this->getContext($context, "i")), "html", null, true);
            echo "_close\" alt=\"-\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/images/blue_picto_less.gif"), "html", null, true);
            echo "\" style=\"visibility: ";
            echo (((0 == $this->getContext($context, "i"))) ? ("visible") : ("hidden"));
            echo "\" />
        <img class=\"toggle\" id=\"icon_";
            // line 16
            echo twig_escape_filter($this->env, (($this->getContext($context, "prefix") . "_") . $this->getContext($context, "i")), "html", null, true);
            echo "_open\" alt=\"+\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/images/blue_picto_more.gif"), "html", null, true);
            echo "\" style=\"visibility: ";
            echo (((0 == $this->getContext($context, "i"))) ? ("hidden") : ("visible"));
            echo "; margin-left: -18px\" />
    </a>
    ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 19
            echo "    <div id=\"trace_";
            echo twig_escape_filter($this->env, (($this->getContext($context, "prefix") . "_") . $this->getContext($context, "i")), "html", null, true);
            echo "\" style=\"display: ";
            echo (((0 == $this->getContext($context, "i"))) ? ("block") : ("none"));
            echo "\" class=\"trace\">
        ";
            // line 20
            echo $this->env->getExtension('code')->fileExcerpt($this->getAttribute($this->getContext($context, "trace"), "file"), $this->getAttribute($this->getContext($context, "trace"), "line"));
            echo "
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:trace.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 20,  84 => 19,  74 => 16,  57 => 14,  55 => 13,  51 => 12,  44 => 10,  36 => 7,  25 => 4,  105 => 24,  98 => 22,  96 => 21,  89 => 19,  76 => 16,  72 => 14,  68 => 12,  50 => 8,  33 => 5,  27 => 4,  24 => 3,  22 => 2,  225 => 96,  216 => 90,  212 => 88,  205 => 84,  201 => 83,  196 => 80,  194 => 79,  191 => 78,  189 => 77,  186 => 76,  180 => 72,  178 => 71,  172 => 67,  163 => 63,  159 => 61,  157 => 60,  154 => 59,  147 => 55,  143 => 54,  138 => 51,  136 => 50,  132 => 48,  130 => 47,  127 => 46,  121 => 45,  118 => 44,  114 => 43,  104 => 36,  100 => 34,  95 => 31,  78 => 28,  75 => 27,  71 => 26,  63 => 24,  58 => 9,  41 => 9,  34 => 11,  19 => 1,  94 => 39,  81 => 40,  79 => 17,  59 => 22,  48 => 19,  39 => 6,  35 => 7,  31 => 5,  26 => 6,  21 => 2,  128 => 34,  120 => 31,  103 => 28,  97 => 25,  93 => 20,  88 => 6,  83 => 18,  66 => 15,  60 => 23,  53 => 12,  49 => 11,  46 => 11,  43 => 7,  37 => 6,  32 => 4,  29 => 3,);
    }
}
