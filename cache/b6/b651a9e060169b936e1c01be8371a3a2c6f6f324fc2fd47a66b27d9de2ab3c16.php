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
            'banner' => [$this, 'block_banner'],
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
        // line 22
        echo "  </head>
  <body>

  ";
        // line 25
        $this->loadTemplate("navbar.html.twig", "master.html.twig", 25)->display($context);
        // line 26
        echo "
  ";
        // line 27
        $this->displayBlock('banner', $context, $blocks);
        // line 28
        echo "   
  
    <div class='container'>
      ";
        // line 31
        $this->displayBlock('content', $context, $blocks);
        // line 32
        echo "    </div>



<footer class=\"footer mt-auto py-3\" id=\"footer\">
 ";
        // line 37
        $this->displayBlock('footer', $context, $blocks);
        // line 55
        echo "</footer>

    
    
    
    <!--JQuery, Popper, Bootstrap JS, Smart Wizard-->
    <script src=\"https://code.jquery.com/jquery-3.5.1.min.js\" integrity=\"sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=\" crossorigin=\"anonymous\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js\" integrity=\"sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN\" crossorigin=\"anonymous\"></script>
    <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js\" integrity=\"sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV\" crossorigin=\"anonymous\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js\" type=\"text/javascript\"></script>
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
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl\" crossorigin=\"anonymous\">
       <!--Custom CSS-->
    <link rel=\"stylesheet\" href=\"styles.css\">
      <!-- Favicon-->
      <link rel=\"icon\" type=\"image/png\" href=\"images/favicon.png\">
    <!--Font-->
    <link href=\"https://fonts.googleapis.com/css2?family=Salsa&display=swap\" rel=\"stylesheet\">
    <!--Font awesome-->
    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.15.0/css/all.css\">
    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.15.0/css/v4-shims.css\">
      
    <title>";
        // line 20
        $this->displayBlock('title', $context, $blocks);
        echo " Helping hand</title>
     ";
    }

    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 27
    public function block_banner($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 31
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 37
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 38
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
        return array (  142 => 38,  138 => 37,  132 => 31,  126 => 27,  115 => 20,  98 => 5,  94 => 4,  77 => 55,  75 => 37,  68 => 32,  66 => 31,  61 => 28,  59 => 27,  56 => 26,  54 => 25,  49 => 22,  47 => 4,  42 => 1,);
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
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl\" crossorigin=\"anonymous\">
       <!--Custom CSS-->
    <link rel=\"stylesheet\" href=\"styles.css\">
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

  {% block banner %}{% endblock %}
   
  
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

    
    
    
    <!--JQuery, Popper, Bootstrap JS, Smart Wizard-->
    <script src=\"https://code.jquery.com/jquery-3.5.1.min.js\" integrity=\"sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=\" crossorigin=\"anonymous\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js\" integrity=\"sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN\" crossorigin=\"anonymous\"></script>
    <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js\" integrity=\"sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV\" crossorigin=\"anonymous\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js\" type=\"text/javascript\"></script>
  </body>
</html>

", "master.html.twig", "C:\\xampp\\htdocs\\helpinghand\\templates\\master.html.twig");
    }
}
