<?php

/* partials/page.html.twig */
class __TwigTemplate_b79b0b6d6d54be2e9b02fc6cc61823e11f041be9cb6d0c1aba824d1f871058be extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@nucleus/page.html.twig", "partials/page.html.twig", 1);
        $this->blocks = array(
            'page_head' => array($this, 'block_page_head'),
            'page_footer' => array($this, 'block_page_footer'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@nucleus/page.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_page_head($context, array $blocks = array())
    {
        // line 4
        if (($context["page_head"] ?? null)) {
            // line 5
            echo "        ";
            echo ($context["page_head"] ?? null);
            echo "
    ";
        } else {
            // line 7
            echo "        ";
            $this->displayParentBlock("page_head", $context, $blocks);
            echo "
    ";
        }
    }

    // line 11
    public function block_page_footer($context, array $blocks = array())
    {
        // line 12
        echo "    ";
        $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "platform", array()), "finalize", array(), "method");
        // line 13
        echo "    ";
        echo ($context["wp_footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "partials/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 13,  51 => 12,  48 => 11,  40 => 7,  34 => 5,  32 => 4,  29 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "partials/page.html.twig", "/Users/eexie/Documents/git/cfes/wp-content/plugins/gantry5/engines/nucleus/views/partials/page.html.twig");
    }
}
