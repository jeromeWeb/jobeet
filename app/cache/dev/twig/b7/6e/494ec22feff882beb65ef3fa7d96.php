<?php

/* AcmeDemoBundle:Secured:layout.html.twig */
class __TwigTemplate_b76e494ec22feff882beb65ef3fa7d96 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AcmeDemoBundle::layout.html.twig");

        $this->blocks = array(
            'content_header_more' => array($this, 'block_content_header_more'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AcmeDemoBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content_header_more($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("content_header_more", $context, $blocks);
        echo "
    <li>logged in as <strong>";
        // line 5
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "app"), "user")) ? ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "user"), "username")) : ("Anonymous")), "html", null, true);
        echo "</strong> - <a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_demo_logout"), "html", null, true);
        echo "\">Logout</a></li>
";
    }

    public function getTemplateName()
    {
        return "AcmeDemoBundle:Secured:layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 11,  82 => 37,  65 => 23,  49 => 13,  140 => 39,  87 => 20,  77 => 27,  113 => 43,  90 => 24,  62 => 14,  56 => 12,  173 => 61,  169 => 14,  166 => 13,  156 => 10,  148 => 5,  117 => 44,  97 => 45,  86 => 39,  40 => 6,  23 => 1,  479 => 162,  473 => 161,  468 => 158,  460 => 155,  456 => 153,  452 => 151,  443 => 149,  439 => 148,  436 => 147,  434 => 146,  429 => 144,  426 => 143,  422 => 142,  412 => 134,  408 => 132,  406 => 131,  401 => 130,  397 => 129,  392 => 126,  386 => 122,  383 => 121,  380 => 120,  378 => 119,  373 => 116,  367 => 112,  364 => 111,  361 => 110,  359 => 109,  354 => 106,  340 => 105,  336 => 103,  321 => 101,  313 => 99,  311 => 98,  308 => 97,  304 => 95,  297 => 91,  293 => 90,  284 => 89,  282 => 88,  277 => 86,  267 => 85,  263 => 84,  257 => 81,  251 => 80,  246 => 78,  240 => 77,  234 => 74,  228 => 73,  223 => 71,  219 => 70,  213 => 69,  207 => 68,  198 => 67,  181 => 66,  176 => 62,  170 => 61,  168 => 60,  146 => 58,  142 => 56,  128 => 50,  125 => 69,  107 => 36,  38 => 6,  144 => 53,  141 => 51,  135 => 47,  126 => 43,  109 => 5,  103 => 37,  67 => 13,  61 => 22,  47 => 9,  105 => 41,  93 => 28,  76 => 16,  72 => 14,  68 => 24,  91 => 50,  84 => 28,  27 => 4,  44 => 12,  25 => 29,  225 => 96,  216 => 90,  212 => 88,  205 => 84,  201 => 83,  196 => 80,  194 => 79,  191 => 78,  189 => 77,  186 => 76,  180 => 72,  172 => 67,  159 => 11,  154 => 59,  147 => 55,  132 => 48,  127 => 46,  121 => 30,  118 => 29,  114 => 42,  104 => 23,  100 => 54,  78 => 21,  75 => 18,  71 => 17,  58 => 17,  34 => 11,  28 => 3,  24 => 4,  19 => 1,  94 => 44,  88 => 41,  79 => 26,  59 => 13,  31 => 4,  26 => 9,  21 => 2,  70 => 22,  63 => 19,  46 => 10,  22 => 2,  163 => 59,  155 => 58,  152 => 49,  149 => 48,  145 => 46,  139 => 55,  131 => 51,  123 => 33,  120 => 40,  115 => 28,  106 => 36,  101 => 29,  96 => 21,  83 => 22,  80 => 28,  74 => 24,  66 => 15,  55 => 15,  52 => 14,  50 => 12,  43 => 11,  41 => 10,  37 => 5,  35 => 5,  32 => 5,  29 => 3,  184 => 70,  178 => 71,  171 => 62,  165 => 58,  162 => 57,  157 => 60,  153 => 54,  151 => 6,  143 => 40,  138 => 51,  136 => 50,  133 => 31,  130 => 30,  122 => 43,  119 => 39,  116 => 35,  111 => 59,  108 => 37,  102 => 47,  98 => 31,  95 => 34,  92 => 43,  89 => 31,  85 => 29,  81 => 17,  73 => 19,  64 => 29,  60 => 21,  57 => 12,  54 => 22,  51 => 14,  48 => 9,  45 => 8,  42 => 7,  39 => 9,  36 => 5,  33 => 4,  30 => 3,);
    }
}
