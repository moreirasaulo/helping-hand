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

/* navbar.html.twig */
class __TwigTemplate_71ed29176bf365557879fd6ee542ebd5aa43b662b47867c07cc44c80dd49ba4f extends \Twig\Template
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
        echo "<header>
        <!--Navigation-->
        <nav class=\"navbar navbar-expand-md navbar-dark bg-dark fixed-top\">
            <a class=\"navbar-brand\" href=\"\">
                <img src=\"images/logo.png\" alt=\"dog icon\">
            </a>
            <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarResponsive\">
            <span class=\"navbar-toggler-icon\"></span>
            </button>

            <div class=\"collapse navbar-collapse\" id=\"navbarResponsive\">
                <ul class=\"navbar-nav ml-auto\">
                    <!--ml auto is to align list(menu) to left, mr would be to right-->
                    <li class=\"nav-item\">
                        <a href=\"/helpinghand\" class=\"nav-link\">Home</a>
                    </li>
                    <li class=\"nav-item\">
                        <a href=\"/helpinghand#aboutUs\" class=\"nav-link\">About us</a>
                    </li>
                    <li class=\"nav-item\">
                        <a href=\"caregivers\" class=\"nav-link\">Our caregivers</a>
                    </li>
                    <li class=\"nav-item\">
                      <a href=\"#\" class=\"nav-link\">Find caregiver near you</a>
                  </li>
                    <li class=\"nav-item\">
                        <a href=\"login\" class=\"nav-link\">Log in</a>
                    </li>
                    <li class=\"nav-item\">
                        <a href=\"register\" class=\"nav-link\">Register</a>
                    </li>
                    
                </ul>
            </div>
        </nav>
        <!--end of navigation-->
    </header>";
    }

    public function getTemplateName()
    {
        return "navbar.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<header>
        <!--Navigation-->
        <nav class=\"navbar navbar-expand-md navbar-dark bg-dark fixed-top\">
            <a class=\"navbar-brand\" href=\"\">
                <img src=\"images/logo.png\" alt=\"dog icon\">
            </a>
            <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarResponsive\">
            <span class=\"navbar-toggler-icon\"></span>
            </button>

            <div class=\"collapse navbar-collapse\" id=\"navbarResponsive\">
                <ul class=\"navbar-nav ml-auto\">
                    <!--ml auto is to align list(menu) to left, mr would be to right-->
                    <li class=\"nav-item\">
                        <a href=\"/helpinghand\" class=\"nav-link\">Home</a>
                    </li>
                    <li class=\"nav-item\">
                        <a href=\"/helpinghand#aboutUs\" class=\"nav-link\">About us</a>
                    </li>
                    <li class=\"nav-item\">
                        <a href=\"caregivers\" class=\"nav-link\">Our caregivers</a>
                    </li>
                    <li class=\"nav-item\">
                      <a href=\"#\" class=\"nav-link\">Find caregiver near you</a>
                  </li>
                    <li class=\"nav-item\">
                        <a href=\"login\" class=\"nav-link\">Log in</a>
                    </li>
                    <li class=\"nav-item\">
                        <a href=\"register\" class=\"nav-link\">Register</a>
                    </li>
                    
                </ul>
            </div>
        </nav>
        <!--end of navigation-->
    </header>", "navbar.html.twig", "C:\\xampp\\htdocs\\helpinghand\\templates\\navbar.html.twig");
    }
}
