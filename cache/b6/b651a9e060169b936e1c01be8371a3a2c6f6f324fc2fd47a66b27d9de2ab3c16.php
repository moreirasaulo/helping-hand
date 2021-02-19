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

/* master.html.twig */
class __TwigTemplate_c1a79f92a2c94b35c181e08e8c1f22355dcaa51c3b5da018ee91cdf78d430b95 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
  <head>
      ";
        // line 4
        $this->displayBlock('head', $context, $blocks);
        // line 21
        echo "  </head>
  <body>

  ";
        // line 24
        $this->loadTemplate("navbar.html.twig", "master.html.twig", 24)->display($context);
        // line 25
        echo "    ";
        $this->loadTemplate("carousel.html.twig", "master.html.twig", 25)->display($context);
        // line 26
        echo "     <br>
     <br>
  
    <div class='container'>


            ";
        // line 32
        $this->displayBlock('content', $context, $blocks);
        // line 33
        echo "    
    </div>



<footer class=\"footer mt-auto py-3\" id=\"footer\">
 ";
        // line 39
        $this->displayBlock('footer', $context, $blocks);
        // line 57
        echo "</footer>

    
    
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=\"https://code.jquery.com/jquery-3.5.1.slim.min.js\" integrity=\"sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj\" crossorigin=\"anonymous\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js\" integrity=\"sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN\" crossorigin=\"anonymous\"></script>
    <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js\" integrity=\"sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV\" crossorigin=\"anonymous\"></script>
  </body>
</html>

";
    }

    // line 4
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">

    <!-- Bootstrap CSS -->
    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css\" integrity=\"sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z\" crossorigin=\"anonymous\">
    <!--Custom CSS-->
    <link rel=\"stylesheet\" href=\"/styles.css\">
      <!-- Favicon-->
      <link rel=\"icon\" type=\"image/png\" href=\"images/favicon.png\">
    <!--Font-->
    <link href=\"https://fonts.googleapis.com/css2?family=Salsa&display=swap\" rel=\"stylesheet\">
    <!--Font awesome-->
    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.15.0/css/all.css\">
    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.15.0/css/v4-shims.css\">
    <title>";
        // line 19
        $this->displayBlock('title', $context, $blocks);
        echo " Helping hand</title>
     ";
    }

    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 32
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 39
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 40
        echo "  <div class=\"container container-footer\">
    <div class=\"row footer-text justify-content-md-center align-items-center\">
      <div class=\"col footer-left\"> 
        <p class=\"footer-line\"><small>&copy;2021</small>
          <span class=\"company-name\">Helping hand</span></p>
       <a class= \"custom-link\"href=\"#\"> <span class=\"fab fa-instagram fa-2x\"></span></a>
       <a class= \"custom-link\"href=\"#\"> <span class=\"fab fa-facebook-square fa-2x\"></span></a> 
       <a class= \"custom-link\"href=\"#\"> <span class=\"fab fa-twitter fa-2x\"></span></a> 
       <a class= \"custom-link\"href=\"#\"> <span class=\"fab fa-youtube fa-2x\"></span></a>
       <p class=\"created\">Created by Saulo Moreira da Silva and Ksenia Studilina</p>
      </div>
        <span class=\"fas fa-envelope fa-2x custom-link-text\"></span>
        <span class=\"footer-line\">info@helping-hand.com</span><br>
        </div>
    </div>
  </div>
   ";
    }

    public function getTemplateName()
    {
        return "master.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 40,  131 => 39,  125 => 32,  114 => 19,  98 => 5,  94 => 4,  78 => 57,  76 => 39,  68 => 33,  66 => 32,  58 => 26,  55 => 25,  53 => 24,  48 => 21,  46 => 4,  41 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
  <head>
      {% block head %}
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">

    <!-- Bootstrap CSS -->
    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css\" integrity=\"sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z\" crossorigin=\"anonymous\">
    <!--Custom CSS-->
    <link rel=\"stylesheet\" href=\"/styles.css\">
      <!-- Favicon-->
      <link rel=\"icon\" type=\"image/png\" href=\"images/favicon.png\">
    <!--Font-->
    <link href=\"https://fonts.googleapis.com/css2?family=Salsa&display=swap\" rel=\"stylesheet\">
    <!--Font awesome-->
    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.15.0/css/all.css\">
    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.15.0/css/v4-shims.css\">
    <title>{% block title %}{% endblock %} Helping hand</title>
     {% endblock %}
  </head>
  <body>

  {% include ('navbar.html.twig') %}
    {% include ('carousel.html.twig') %}
     <br>
     <br>
  
    <div class='container'>


            {% block content %}{% endblock %}
    
    </div>



<footer class=\"footer mt-auto py-3\" id=\"footer\">
 {% block footer %}
  <div class=\"container container-footer\">
    <div class=\"row footer-text justify-content-md-center align-items-center\">
      <div class=\"col footer-left\"> 
        <p class=\"footer-line\"><small>&copy;2021</small>
          <span class=\"company-name\">Helping hand</span></p>
       <a class= \"custom-link\"href=\"#\"> <span class=\"fab fa-instagram fa-2x\"></span></a>
       <a class= \"custom-link\"href=\"#\"> <span class=\"fab fa-facebook-square fa-2x\"></span></a> 
       <a class= \"custom-link\"href=\"#\"> <span class=\"fab fa-twitter fa-2x\"></span></a> 
       <a class= \"custom-link\"href=\"#\"> <span class=\"fab fa-youtube fa-2x\"></span></a>
       <p class=\"created\">Created by Saulo Moreira da Silva and Ksenia Studilina</p>
      </div>
        <span class=\"fas fa-envelope fa-2x custom-link-text\"></span>
        <span class=\"footer-line\">info@helping-hand.com</span><br>
        </div>
    </div>
  </div>
   {% endblock %}
</footer>

    
    
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=\"https://code.jquery.com/jquery-3.5.1.slim.min.js\" integrity=\"sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj\" crossorigin=\"anonymous\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js\" integrity=\"sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN\" crossorigin=\"anonymous\"></script>
    <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js\" integrity=\"sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV\" crossorigin=\"anonymous\"></script>
  </body>
</html>

", "master.html.twig", "C:\\xampp\\htdocs\\helpinghand\\templates\\master.html.twig");
    }
}
