<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* caregivers.html.twig */
class __TwigTemplate_2d2a744bd45b2d1f5ca25b204395820cb4fc9c9f5d63a0f3116206e9e6bc5953 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'head' => [$this, 'block_head'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "master.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("master.html.twig", "caregivers.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Caregivers";
    }

    // line 5
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        $this->displayParentBlock("head", $context, $blocks);
        echo "
\t
";
    }

    // line 10
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 11
        echo "
    <div class=\"container\">
    <br><br><br>
        <div class=\"row\">
        
         ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["list"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
            // line 17
            echo "         <div class=\"col-sm\">
        <img class=\"img-fluid img-thumbnail rounded\" src=\"data:image/jpeg;base64,'.base64_encode( ";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["c"], "photo", [], "any", false, false, false, 18), "html", null, true);
            echo " ).'\" alt=\"caregiver\">
        <p class=\"card-text\">";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["c"], "firstName", [], "any", false, false, false, 19), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["c"], "lastName", [], "any", false, false, false, 19), "html", null, true);
            echo "</p>
        <p><a class=\"btn btn-secondary custom-button\" href=\"#\" role=\"button\">View</a></p>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "    </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "caregivers.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 23,  88 => 19,  84 => 18,  81 => 17,  77 => 16,  70 => 11,  66 => 10,  59 => 6,  55 => 5,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"master.html.twig\" %}

{% block title %}Caregivers{% endblock %}

{% block head %}
{{ parent() }}
\t
{% endblock %}

{% block content %}

    <div class=\"container\">
    <br><br><br>
        <div class=\"row\">
        
         {% for c in list %}
         <div class=\"col-sm\">
        <img class=\"img-fluid img-thumbnail rounded\" src=\"data:image/jpeg;base64,'.base64_encode( {{c.photo}} ).'\" alt=\"caregiver\">
        <p class=\"card-text\">{{c.firstName}} {{c.lastName}}</p>
        <p><a class=\"btn btn-secondary custom-button\" href=\"#\" role=\"button\">View</a></p>
        </div>
    {% endfor %}
    </div>
    </div>
{% endblock %}
", "caregivers.html.twig", "C:\\xampp\\htdocs\\helpinghand\\templates\\caregivers.html.twig");
    }
}
