<?php

/* TwigBundle:Exception:error.xml.twig */
class __TwigTemplate_3add79fcaa88b7c0be3a9b66ce323b09 extends Twig_Template
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
        echo "<?xml version=\"1.0\" encoding=\"";
        echo twig_escape_filter($this->env, $this->env->getCharset(), "html", null, true);
        echo "\" ?>

<error code=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->getContext($context, "status_code"), "html", null, true);
        echo "\" message=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "status_text"), "html", null, true);
        echo "\" />
";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.xml.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 3,  225 => 96,  216 => 90,  212 => 88,  205 => 84,  201 => 83,  196 => 80,  194 => 79,  191 => 78,  189 => 77,  186 => 76,  180 => 72,  172 => 67,  159 => 61,  154 => 59,  147 => 55,  132 => 48,  127 => 46,  121 => 45,  118 => 44,  114 => 43,  104 => 36,  100 => 34,  78 => 28,  75 => 27,  71 => 26,  58 => 22,  34 => 11,  28 => 3,  24 => 2,  19 => 1,  94 => 39,  88 => 6,  79 => 39,  59 => 22,  31 => 6,  26 => 6,  21 => 1,  70 => 14,  63 => 24,  46 => 14,  22 => 1,  163 => 63,  155 => 50,  152 => 49,  149 => 48,  145 => 46,  139 => 45,  131 => 42,  123 => 41,  120 => 40,  115 => 39,  106 => 36,  101 => 33,  96 => 31,  83 => 25,  80 => 24,  74 => 22,  66 => 20,  55 => 16,  52 => 15,  50 => 14,  43 => 6,  41 => 15,  37 => 8,  35 => 7,  32 => 4,  29 => 6,  184 => 70,  178 => 71,  171 => 62,  165 => 58,  162 => 57,  157 => 60,  153 => 54,  151 => 53,  143 => 54,  138 => 51,  136 => 50,  133 => 43,  130 => 47,  122 => 37,  119 => 36,  116 => 35,  111 => 38,  108 => 37,  102 => 30,  98 => 32,  95 => 31,  92 => 29,  89 => 26,  85 => 24,  81 => 40,  73 => 19,  64 => 19,  60 => 23,  57 => 12,  54 => 6,  51 => 10,  48 => 19,  45 => 8,  42 => 12,  39 => 8,  36 => 5,  33 => 7,  30 => 3,);
    }
}
