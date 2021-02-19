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

/* register.html.twig */
class __TwigTemplate_9910336860b50e5682cc2bde9d9858cee42485523b871b38360c19d64c5efe91 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
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
        $this->parent = $this->loadTemplate("master.html.twig", "register.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Registration page";
    }

    // line 30
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " 
<br>
<br>
    ";
        // line 33
        if (($context["errorList"] ?? null)) {
            // line 34
            echo "        <ul class=\"errorMessage\">
        ";
            // line 35
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["errorList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 36
                echo "            <li>";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "<li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 38
            echo "        </ul>
    ";
        }
        // line 40
        echo "    <div class=\"wrap\">
        <form method=\"POST\">
            <h2>User Registration</h2> 
            <br>
            <h5>Are you a caregiver or senior? </h5>
            Caregiver   <input type=\"radio\" name=\"ans\" value=\"Caregiver\" />
            Senior   <input type=\"radio\" name=\"ans\" value=\"Senior\"  /> <br>

            
         ";
        // line 54
        echo "            <br>
            <h5>What services do you offer/require?</h5>

            Grocery shopping   <input type=\"checkbox\" id=\"groceries\" name=\"shopping\" value=\"Grocery shopping\">
            Companionship   <input type=\"checkbox\" id=\"companionship\" name=\"companionship\" value=\"Companionship\">
            Cooking   <input type=\"checkbox\" id=\"coocking\" name=\"coocking\" value=\"Cooking\"><br><br>

            <h5>Location </h5>
            Your address:
            <input type=\"text\" name=\"address\" value=\"";
        // line 63
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["v"] ?? null), "address", [], "any", false, false, false, 63), "html", null, true);
        echo "\"></input>
            Postal code:
            <input type=\"text\" name=\"postal\"  value=\"";
        // line 65
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["v"] ?? null), "postal", [], "any", false, false, false, 65), "html", null, true);
        echo "\"></input><br><br>

            <h5>Tell us more about yourself:</h5>
            <textarea name=\"body\" cols=\"60\" rows=\"10\" value = \"";
        // line 68
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["v"] ?? null), "description", [], "any", false, false, false, 68), "html", null, true);
        echo "\"></textarea><br>

            <label>Email:</label>
            <input type=\"text\" name=\"email\" value=\"";
        // line 71
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["v"] ?? null), "email", [], "any", false, false, false, 71), "html", null, true);
        echo "\"></input>
            <span class=\"errorMessage\" id=\"emailTaken\"></span>
            <br>
            <label>Password:</label>
            <input type=\"password\" name=\"pass1\"></input><br>
            <label>Password (repeat):</label>
            <input type=\"password\" name=\"pass2\"></input>
            <div class=\"g-recaptcha\" data-sitekey=\"6Lde2rsZAAAAAA_mSTwg1hdXZiSLbt3avb0I48jf\"></div>
            <span id=\"captcha_error\"></span>
            <input type=\"submit\" name=\"register\"  id=\"form\" class=\"btn btn-secondary\" style=\"width: 100px;\"></input>                                
        </form>

            
            
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 71,  117 => 68,  111 => 65,  106 => 63,  95 => 54,  84 => 40,  80 => 38,  71 => 36,  67 => 35,  64 => 34,  62 => 33,  54 => 30,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"master.html.twig\" %}

{% block title %}Registration page{% endblock %}

{#{% block head %}
    <link rel=\"stylesheet\" href=\"./css/loginregister.css\" />
    <script src=\"https://www.google.com/recaptcha/api.js\" async defer></script>
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>
    
    <script>
        \$(document).ready(function() {
            \$('input[name=email]').on('paste blur change input', function() {
                var email = \$('input[name=email]').val();
                \$(\"#emailTaken\").load(\"/isemailtaken/\" + email);
            });

            \$('input[name=userName]').on('paste blur change input', function() {
                var userName = \$('input[name=userName]').val();
                \$(\"#userNameTaken\").load(\"/isuserNametaken/\" + userName);
            });
           
            \$(document).ajaxError(function(event, jqxhr, settings, thrownError) {
                console.log(\"Ajax error occured on \" + settings.url);
                alert(\"Ajax error occured\");
            });
        });
    </script>
{% endblock %} #}

{% block content %} 
<br>
<br>
    {% if errorList %}
        <ul class=\"errorMessage\">
        {% for error in errorList %}
            <li>{{error}}<li>
        {% endfor %}
        </ul>
    {% endif %}
    <div class=\"wrap\">
        <form method=\"POST\">
            <h2>User Registration</h2> 
            <br>
            <h5>Are you a caregiver or senior? </h5>
            Caregiver   <input type=\"radio\" name=\"ans\" value=\"Caregiver\" />
            Senior   <input type=\"radio\" name=\"ans\" value=\"Senior\"  /> <br>

            
         {#   {% if \$_POST['ans'] == \"Caregiver\" %}
            <h4>What services do you offer?</h4>
            {% else %}
            <h4>What services do you need?</h4>
            {% endif %} #}
            <br>
            <h5>What services do you offer/require?</h5>

            Grocery shopping   <input type=\"checkbox\" id=\"groceries\" name=\"shopping\" value=\"Grocery shopping\">
            Companionship   <input type=\"checkbox\" id=\"companionship\" name=\"companionship\" value=\"Companionship\">
            Cooking   <input type=\"checkbox\" id=\"coocking\" name=\"coocking\" value=\"Cooking\"><br><br>

            <h5>Location </h5>
            Your address:
            <input type=\"text\" name=\"address\" value=\"{{ v.address }}\"></input>
            Postal code:
            <input type=\"text\" name=\"postal\"  value=\"{{ v.postal }}\"></input><br><br>

            <h5>Tell us more about yourself:</h5>
            <textarea name=\"body\" cols=\"60\" rows=\"10\" value = \"{{v.description}}\"></textarea><br>

            <label>Email:</label>
            <input type=\"text\" name=\"email\" value=\"{{ v.email }}\"></input>
            <span class=\"errorMessage\" id=\"emailTaken\"></span>
            <br>
            <label>Password:</label>
            <input type=\"password\" name=\"pass1\"></input><br>
            <label>Password (repeat):</label>
            <input type=\"password\" name=\"pass2\"></input>
            <div class=\"g-recaptcha\" data-sitekey=\"6Lde2rsZAAAAAA_mSTwg1hdXZiSLbt3avb0I48jf\"></div>
            <span id=\"captcha_error\"></span>
            <input type=\"submit\" name=\"register\"  id=\"form\" class=\"btn btn-secondary\" style=\"width: 100px;\"></input>                                
        </form>

            
            
    </div>
</div>
{% endblock %}
", "register.html.twig", "C:\\xampp\\htdocs\\helpinghand\\templates\\register.html.twig");
    }
}
