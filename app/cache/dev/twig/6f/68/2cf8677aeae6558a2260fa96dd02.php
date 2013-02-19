<?php

/* TwigBundle:Exception:exception.txt.twig */
class __TwigTemplate_6f682cf8677aeae6558a2260fa96dd02 extends Twig_Template
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
        echo "[exception] ";
        echo twig_escape_filter($this->env, (((($this->getContext($context, "status_code") . " | ") . $this->getContext($context, "status_text")) . " | ") . $this->getAttribute($this->getContext($context, "exception"), "class")), "html", null, true);
        echo "
[message] ";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "exception"), "message"), "html", null, true);
        echo "
";
        // line 3
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "exception"), "toarray"));
        foreach ($context['_seq'] as $context["i"] => $context["e"]) {
            // line 4
            echo "[";
            echo twig_escape_filter($this->env, ($this->getContext($context, "i") + 1), "html", null, true);
            echo "] ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "class"), "html", null, true);
            echo ": ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "message"), "html", null, true);
            echo "
";
            // line 5
            $this->env->loadTemplate("TwigBundle:Exception:traces.txt.twig")->display(array("exception" => $this->getContext($context, "e")));
            // line 6
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['i'], $context['e'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 3,  24 => 2,  19 => 1,  94 => 39,  88 => 6,  79 => 39,  59 => 22,  31 => 6,  26 => 4,  21 => 1,  70 => 14,  63 => 9,  46 => 14,  22 => 1,  163 => 32,  155 => 50,  152 => 49,  149 => 48,  145 => 46,  139 => 45,  131 => 42,  123 => 41,  120 => 40,  115 => 39,  106 => 36,  101 => 33,  96 => 31,  83 => 25,  80 => 24,  74 => 22,  66 => 20,  55 => 16,  52 => 15,  50 => 14,  43 => 6,  41 => 5,  37 => 8,  35 => 7,  32 => 4,  29 => 6,  184 => 70,  178 => 66,  171 => 62,  165 => 58,  162 => 57,  157 => 56,  153 => 54,  151 => 53,  143 => 48,  138 => 45,  136 => 44,  133 => 43,  130 => 42,  122 => 37,  119 => 36,  116 => 35,  111 => 38,  108 => 37,  102 => 30,  98 => 32,  95 => 28,  92 => 29,  89 => 26,  85 => 24,  81 => 40,  73 => 19,  64 => 19,  60 => 8,  57 => 12,  54 => 6,  51 => 10,  48 => 14,  45 => 8,  42 => 12,  39 => 8,  36 => 5,  33 => 7,  30 => 3,);
    }
}
