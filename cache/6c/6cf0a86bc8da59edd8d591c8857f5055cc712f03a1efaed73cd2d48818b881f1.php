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

/* carousel.html.twig */
class __TwigTemplate_36abc88da642dda508e581e14e66738b17efa829eff2125a7393d0de7115ba9b extends \Twig\Template
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
<div id=\"carousel\" class=\"carousel slide\" data-bs-ride=\"carousel\">
  <div class=\"carousel-inner\">
    <div class=\"carousel-item active\">
      <img src=\"images/carousel2.jpg\" class=\"d-block w-100 myImg\" alt=\"...\">
      <div class=\"carousel-caption d-none d-md-block\">
        <h2>Helping hand</h2>
        <h4>We are here to help to connect seniors to caregivers</h4>
      </div>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "carousel.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
<div id=\"carousel\" class=\"carousel slide\" data-bs-ride=\"carousel\">
  <div class=\"carousel-inner\">
    <div class=\"carousel-item active\">
      <img src=\"images/carousel2.jpg\" class=\"d-block w-100 myImg\" alt=\"...\">
      <div class=\"carousel-caption d-none d-md-block\">
        <h2>Helping hand</h2>
        <h4>We are here to help to connect seniors to caregivers</h4>
      </div>
    </div>
  </div>
</div>
", "carousel.html.twig", "C:\\xampp\\htdocs\\helpinghand\\templates\\carousel.html.twig");
    }
}
