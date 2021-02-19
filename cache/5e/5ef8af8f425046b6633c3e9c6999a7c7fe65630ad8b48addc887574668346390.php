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

/* login.html.twig */
class __TwigTemplate_4688e56358dfdde59c699a97ab67dfaad87b0316d842971af52c750cf40313c0 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("master.html.twig", "login.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Login";
    }

    // line 26
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 27
        echo "<br>
<br>
<br>
    ";
        // line 30
        if (($context["errorList"] ?? null)) {
            // line 31
            echo "            <ul class=\"errorMessage\">
            ";
            // line 32
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["errorList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 33
                echo "                <li>";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "<li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "            </ul>
        ";
        }
        // line 37
        echo "    <div class=\"wrap\">
        <form method=\"POST\" id=\"myForm\">
            <label>Email: </label>
            <input type=\"text\" name=\"email\" id=\"email\" value=\"\" required=\"required\"></input>
            <span class=\"errorMessage\" id=\"nothisemail\"></span><br />
            <label>Password: </label>
            <input type=\"password\" name=\"password\" autocomplete=\"new-password\" id=\"password\" required=\"required\" value=\"\"></input><br />
            <input type=\"submit\" name=\"login\" id=\"login\" value=\"Login\" class=\"button\"><br><br>\t\t
            <button class=\"loginBtn loginBtn--google\" onclick=\"window.location='/logingoogle.php'\" type=\"button\" name=\"logingmail\"  class=\"btn btn-danger\">Login with Google</button><br>
            <button class=\"loginBtn loginBtn--facebook\" onclick=\"window.location='/loginfacebook.php'\" type=\"button\" name=\"loginfacebook\" class=\"btn btn-danger\">Login with Facebook</button><br>      
            <h5><a href=\"/forgotpassword\">Forgot Password?</a></h5>
            <h5><a>Not a member yet?<a href=\"register\"> Register now!</a></h5>      
        </form>   
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 37,  81 => 35,  72 => 33,  68 => 32,  65 => 31,  63 => 30,  58 => 27,  54 => 26,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"master.html.twig\" %}

{% block title %}Login{% endblock %}

{#{% block head %}
<link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css\" integrity=\"sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN\" crossorigin=\"anonymous\">
<link rel=\"stylesheet\" href=\"../css/loginregister.css\" />
<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>
<script src=\"js/jquery-2.2.0.min.js\"></script>
<script>
\$(document).ready(function() {
    \$('input[name=email]').on('paste, blur change', function() {
        var email = \$('input[name=email]').val();
        \$(\"#emaildoesnotexist\").load(\"/emaildoesnotexist/\" + email);
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
<br>
    {% if errorList %}
            <ul class=\"errorMessage\">
            {% for error in errorList %}
                <li>{{error}}<li>
            {% endfor %}
            </ul>
        {% endif %}
    <div class=\"wrap\">
        <form method=\"POST\" id=\"myForm\">
            <label>Email: </label>
            <input type=\"text\" name=\"email\" id=\"email\" value=\"\" required=\"required\"></input>
            <span class=\"errorMessage\" id=\"nothisemail\"></span><br />
            <label>Password: </label>
            <input type=\"password\" name=\"password\" autocomplete=\"new-password\" id=\"password\" required=\"required\" value=\"\"></input><br />
            <input type=\"submit\" name=\"login\" id=\"login\" value=\"Login\" class=\"button\"><br><br>\t\t
            <button class=\"loginBtn loginBtn--google\" onclick=\"window.location='/logingoogle.php'\" type=\"button\" name=\"logingmail\"  class=\"btn btn-danger\">Login with Google</button><br>
            <button class=\"loginBtn loginBtn--facebook\" onclick=\"window.location='/loginfacebook.php'\" type=\"button\" name=\"loginfacebook\" class=\"btn btn-danger\">Login with Facebook</button><br>      
            <h5><a href=\"/forgotpassword\">Forgot Password?</a></h5>
            <h5><a>Not a member yet?<a href=\"register\"> Register now!</a></h5>      
        </form>   
        </div>
    </div>
</div>
{% endblock %}
", "login.html.twig", "C:\\xampp\\htdocs\\helpinghand\\templates\\login.html.twig");
    }
}
