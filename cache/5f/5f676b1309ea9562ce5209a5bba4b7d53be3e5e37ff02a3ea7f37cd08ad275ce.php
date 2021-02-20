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

/* banner.html.twig */
class __TwigTemplate_9d3fd082fe49b3f824ee45fa7a5642c078f9b8a750b056f4e97cc6572d9212f2 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "

<div id=\"banner\" class=\"carousel slide\" data-bs-ride=\"carousel\">
  <div class=\"carousel-inner\">
    <div class=\"carousel-item active\">
      <img src=\"images/carousel2.jpg\" class=\"d-block w-100 myImg\" alt=\"...\">
      <div class=\"carousel-caption d-none d-md-block\">
      <h1>Helping hand care</h1>
            <p>Some representative placeholder content for the third slide of this carousel</p>
                <p><a class=\"btn btn-lg btn-primary\" href=\"register\">Register now</a></p>
      </div>

        
    </div>

  </div>
</div>




";
    }

    public function getTemplateName()
    {
        return "banner.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("

<div id=\"banner\" class=\"carousel slide\" data-bs-ride=\"carousel\">
  <div class=\"carousel-inner\">
    <div class=\"carousel-item active\">
      <img src=\"images/carousel2.jpg\" class=\"d-block w-100 myImg\" alt=\"...\">
      <div class=\"carousel-caption d-none d-md-block\">
      <h1>Helping hand care</h1>
            <p>Some representative placeholder content for the third slide of this carousel</p>
                <p><a class=\"btn btn-lg btn-primary\" href=\"register\">Register now</a></p>
      </div>

        
    </div>

  </div>
</div>




", "banner.html.twig", "C:\\xampp\\htdocs\\helpinghand\\templates\\banner.html.twig");
    }
}
