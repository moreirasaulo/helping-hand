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
<br>
<br>
<br>
<br>
    ";
        // line 34
        if (($context["errorList"] ?? null)) {
            // line 35
            echo "            <ul class=\"errorMessage\">
            ";
            // line 36
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["errorList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 37
                echo "                <li>";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "<li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 39
            echo "            </ul>
        ";
        }
        // line 41
        echo "    <div class=\"wrap\">
    <h4> Log in </h4>
    <div class=\"row\">
            <div class=\"col-md-4\">
            <form method=\"POST\" id=\"myForm\">
            <label for=\"email\" class=\"form-label\">Email address</label>
            <input type=\"email\" class=\"form-control\" id=\"email\" name = \"email\" placeholder=\"name@example.com\">
            <label for=\"password\" class=\"form-label\">Password</label>
            <input type=\"password\" class=\"form-control\" id=\"password\" name = \"password\">
            <input type=\"submit\" name=\"login\" id=\"login\" value=\"Log in\" class=\"btn btn-primary\"/> <br><br>
            <button type=\"button\" onclick=\"window.location='/logingoogle.php'\" name=\"logingmail\" class=\"btn btn-primary\">Log in with Google</button><br><br>
            <button type=\"button\" onclick=\"window.location='/loginfacebook.php'\" name=\"loginfacebook\" class=\"btn btn-primary\">Log in with Facebook</button><br><br>

\t\t    <h5><a href=\"/forgotpassword\">Forgot Password?</a></h5>
            <h5><a>Not a member yet?<a href=\"register\"> Register now!</a></h5>      
            </form>
            </div>
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
        return array (  89 => 41,  85 => 39,  76 => 37,  72 => 36,  69 => 35,  67 => 34,  58 => 27,  54 => 26,  47 => 3,  36 => 1,);
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
<br>
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
    <h4> Log in </h4>
    <div class=\"row\">
            <div class=\"col-md-4\">
            <form method=\"POST\" id=\"myForm\">
            <label for=\"email\" class=\"form-label\">Email address</label>
            <input type=\"email\" class=\"form-control\" id=\"email\" name = \"email\" placeholder=\"name@example.com\">
            <label for=\"password\" class=\"form-label\">Password</label>
            <input type=\"password\" class=\"form-control\" id=\"password\" name = \"password\">
            <input type=\"submit\" name=\"login\" id=\"login\" value=\"Log in\" class=\"btn btn-primary\"/> <br><br>
            <button type=\"button\" onclick=\"window.location='/logingoogle.php'\" name=\"logingmail\" class=\"btn btn-primary\">Log in with Google</button><br><br>
            <button type=\"button\" onclick=\"window.location='/loginfacebook.php'\" name=\"loginfacebook\" class=\"btn btn-primary\">Log in with Facebook</button><br><br>

\t\t    <h5><a href=\"/forgotpassword\">Forgot Password?</a></h5>
            <h5><a>Not a member yet?<a href=\"register\"> Register now!</a></h5>      
            </form>
            </div>
            </div>

    </div>
</div>
{% endblock %}
", "login.html.twig", "C:\\xampp\\htdocs\\helpinghand\\templates\\login.html.twig");
    }
}
