<?php

/* WebProfilerBundle:Profiler:admin.html.twig */
class __TwigTemplate_6dc1868fdb6454228f67d0bb5c7822ee extends Twig_Template
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
        echo "<div class=\"search import clearfix\">
    <h3>
        <img style=\"margin: 0 5px 0 0; vertical-align: middle; height: 16px\" width=\"16\" height=\"16\" alt=\"Import\" src=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webprofiler/images/import.png"), "html", null, true);
        echo "\" />
        Admin
    </h3>

    <form action=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_profiler_import"), "html", null, true);
        echo "\" method=\"post\" enctype=\"multipart/form-data\">
        ";
        // line 8
        if ((!twig_test_empty($this->getContext($context, "token")))) {
            // line 9
            echo "            <div style=\"margin-bottom: 10px\">
                &#187;&#160;<a href=\"";
            // line 10
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_profiler_purge", array("token" => $this->getContext($context, "token"))), "html", null, true);
            echo "\">Purge</a>
            </div>
            <div style=\"margin-bottom: 10px\">
                &#187;&#160;<a href=\"";
            // line 13
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_profiler_export", array("token" => $this->getContext($context, "token"))), "html", null, true);
            echo "\">Export</a>
            </div>
        ";
        }
        // line 16
        echo "        &#187;&#160;<label for=\"file\">Import</label><br />
        <input type=\"file\" name=\"file\" id=\"file\" /><br />
        <button type=\"submit\">
            <span class=\"border_l\">
                <span class=\"border_r\">
                    <span class=\"btn_bg\">UPLOAD</span>
                </span>
            </span>
        </button>
        <div class=\"clear_fix\"></div>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:admin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 16,  36 => 9,  30 => 7,  89 => 28,  78 => 26,  74 => 25,  67 => 21,  61 => 18,  56 => 15,  45 => 13,  41 => 12,  34 => 8,  29 => 6,  55 => 15,  46 => 12,  42 => 11,  39 => 10,  35 => 9,  33 => 10,  23 => 3,  19 => 1,);
    }
}
