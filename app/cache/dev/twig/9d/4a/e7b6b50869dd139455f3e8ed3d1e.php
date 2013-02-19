<?php

/* AcmeDemoBundle:Demo:contact.html.twig */
class __TwigTemplate_9d4ae7b6b50869dd139455f3e8ed3d1e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AcmeDemoBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
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
    public function block_title($context, array $blocks = array())
    {
        echo "Symfony - Contact form";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <form action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_demo_contact"), "html", null, true);
        echo "\" method=\"POST\" id=\"contact_form\">
        ";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'errors');
        echo "

        ";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "email"), 'row');
        echo "
        ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "message"), 'row');
        echo "

        ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'rest');
        echo "
        <input type=\"submit\" value=\"Send\" class=\"symfony-button-grey\" />
    </form>
";
    }

    public function getTemplateName()
    {
        return "AcmeDemoBundle:Demo:contact.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 37,  65 => 23,  49 => 13,  140 => 39,  87 => 20,  77 => 27,  113 => 43,  90 => 24,  62 => 14,  56 => 12,  173 => 61,  169 => 14,  166 => 13,  156 => 10,  148 => 5,  117 => 44,  97 => 45,  86 => 39,  40 => 15,  23 => 1,  479 => 162,  473 => 161,  468 => 158,  460 => 155,  456 => 153,  452 => 151,  443 => 149,  439 => 148,  436 => 147,  434 => 146,  429 => 144,  426 => 143,  422 => 142,  412 => 134,  408 => 132,  406 => 131,  401 => 130,  397 => 129,  392 => 126,  386 => 122,  383 => 121,  380 => 120,  378 => 119,  373 => 116,  367 => 112,  364 => 111,  361 => 110,  359 => 109,  354 => 106,  340 => 105,  336 => 103,  321 => 101,  313 => 99,  311 => 98,  308 => 97,  304 => 95,  297 => 91,  293 => 90,  284 => 89,  282 => 88,  277 => 86,  267 => 85,  263 => 84,  257 => 81,  251 => 80,  246 => 78,  240 => 77,  234 => 74,  228 => 73,  223 => 71,  219 => 70,  213 => 69,  207 => 68,  198 => 67,  181 => 66,  176 => 62,  170 => 61,  168 => 60,  146 => 58,  142 => 56,  128 => 50,  125 => 69,  107 => 36,  38 => 6,  144 => 53,  141 => 51,  135 => 47,  126 => 43,  109 => 5,  103 => 37,  67 => 13,  61 => 22,  47 => 9,  105 => 41,  93 => 28,  76 => 16,  72 => 14,  68 => 24,  91 => 50,  84 => 28,  27 => 4,  44 => 12,  25 => 5,  225 => 96,  216 => 90,  212 => 88,  205 => 84,  201 => 83,  196 => 80,  194 => 79,  191 => 78,  189 => 77,  186 => 76,  180 => 72,  172 => 67,  159 => 11,  154 => 59,  147 => 55,  132 => 48,  127 => 46,  121 => 30,  118 => 29,  114 => 42,  104 => 23,  100 => 54,  78 => 21,  75 => 18,  71 => 17,  58 => 17,  34 => 11,  28 => 4,  24 => 4,  19 => 1,  94 => 44,  88 => 41,  79 => 26,  59 => 13,  31 => 5,  26 => 6,  21 => 2,  70 => 22,  63 => 19,  46 => 10,  22 => 2,  163 => 59,  155 => 58,  152 => 49,  149 => 48,  145 => 46,  139 => 55,  131 => 51,  123 => 33,  120 => 40,  115 => 28,  106 => 36,  101 => 29,  96 => 21,  83 => 22,  80 => 28,  74 => 24,  66 => 15,  55 => 15,  52 => 10,  50 => 12,  43 => 7,  41 => 8,  37 => 7,  35 => 5,  32 => 5,  29 => 3,  184 => 70,  178 => 71,  171 => 62,  165 => 58,  162 => 57,  157 => 60,  153 => 54,  151 => 6,  143 => 40,  138 => 51,  136 => 50,  133 => 31,  130 => 30,  122 => 43,  119 => 39,  116 => 35,  111 => 59,  108 => 37,  102 => 47,  98 => 31,  95 => 34,  92 => 43,  89 => 31,  85 => 29,  81 => 17,  73 => 19,  64 => 29,  60 => 21,  57 => 12,  54 => 22,  51 => 14,  48 => 9,  45 => 12,  42 => 7,  39 => 9,  36 => 5,  33 => 6,  30 => 3,);
    }
}