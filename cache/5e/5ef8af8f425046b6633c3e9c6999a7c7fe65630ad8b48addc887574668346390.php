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
        $this->parent = $this->loadTemplate("master.html.twig", "login.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Login";
    }

    // line 7
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
 <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>  <!-- include jquery -->
    <script>
\$(document).ready(function() {
    \$('input[name=email]').on('paste, blur change', function() {
        var email = \$('input[name=email]').val();
        \$(\"#nothisemail\").load(\"/nothisemail/\" + email);
    });
    
    \$(document).ajaxError(function(event, jqxhr, settings, thrownError) {
        console.log(\"Ajax error occured on \" + settings.url);
        alert(\"Ajax error occured\");
    });
});

</script>

";
    }

    // line 28
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 29
        echo "<br>
<br>
<br>
<br>
<br>
<br>
<br>
    ";
        // line 36
        if (($context["errorList"] ?? null)) {
            // line 37
            echo "            <ul class=\"errorMsg\">
            ";
            // line 38
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["errorList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 39
                echo "                <li>";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "<li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            echo "            </ul>
        ";
        }
        // line 43
        echo "    <div class=\"wrap\">
    <h4> Log in </h4>
    <div class=\"row\">
            <div class=\"col-md-4\">
            <form method=\"POST\">
            <label for=\"email\" class=\"form-label\">Email address</label>
            <input type=\"email\" name=\"email\" id=\"email\" value=\"\" required=\"required\"></input>
            <span class=\"errorMsg\" id=\"nothisemail\"></span><br>
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
        return array (  117 => 43,  113 => 41,  104 => 39,  100 => 38,  97 => 37,  95 => 36,  86 => 29,  82 => 28,  59 => 8,  55 => 7,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"master.html.twig\" %}

{% block title %}Login{% endblock %}



{% block head %}
    {{ parent() }}
 <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>  <!-- include jquery -->
    <script>
\$(document).ready(function() {
    \$('input[name=email]').on('paste, blur change', function() {
        var email = \$('input[name=email]').val();
        \$(\"#nothisemail\").load(\"/nothisemail/\" + email);
    });
    
    \$(document).ajaxError(function(event, jqxhr, settings, thrownError) {
        console.log(\"Ajax error occured on \" + settings.url);
        alert(\"Ajax error occured\");
    });
});

</script>

{% endblock %}


{% block content %}
<br>
<br>
<br>
<br>
<br>
<br>
<br>
    {% if errorList %}
            <ul class=\"errorMsg\">
            {% for error in errorList %}
                <li>{{error}}<li>
            {% endfor %}
            </ul>
        {% endif %}
    <div class=\"wrap\">
    <h4> Log in </h4>
    <div class=\"row\">
            <div class=\"col-md-4\">
            <form method=\"POST\">
            <label for=\"email\" class=\"form-label\">Email address</label>
            <input type=\"email\" name=\"email\" id=\"email\" value=\"\" required=\"required\"></input>
            <span class=\"errorMsg\" id=\"nothisemail\"></span><br>
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
