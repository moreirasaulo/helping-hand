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
        $this->parent = $this->loadTemplate("master.html.twig", "register.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Registration page";
    }

    // line 31
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 32
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
     <script src=\"jquery.js\"></script> 
    <script src=\"jquery.steps.js\"></script>
";
    }

    // line 38
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " 
<br>
<br>
<br>
<br>
<script>
      \$(\"#wizard\").steps();
    </script>
<div id=\"wizard\">
  <form id=\"form-3\" action=\"#\">
  <h1>Account</h1>
  <fieldset>
    <legend>Account Information</legend>
    <label for=\"userName\">User name *</label>
    <input id=\"userName\" name=\"userName\" type=\"text\" class=\"required\" />
    <label for=\"password\">Password *</label>
    <input id=\"password\" name=\"password\" type=\"text\" class=\"required\" />
    <label for=\"confirm\">Confirm Password *</label>
    <input id=\"confirm\" name=\"confirm\" type=\"text\" class=\"required\" />
    <p>(*) Mandatory</p>
  </fieldset>
  <h1>Profile</h1>
  <fieldset>
    <legend>Profile Information</legend>
    <label for=\"name\">First name *</label>
    <input id=\"name\" name=\"name\" type=\"text\" class=\"required\" />
    <label for=\"surname\">Last name *</label>
    <input id=\"surname\" name=\"surname\" type=\"text\" class=\"required\" />
    <label for=\"email\">Email *</label>
    <input id=\"email\" name=\"email\" type=\"text\" class=\"required email\" />
    <label for=\"address\">Address</label>
    <input id=\"address\" name=\"address\" type=\"text\" />
    <label for=\"age\"
      >Age (The warning step will show up if age is less than 18) *</label
    >
    <input id=\"age\" name=\"age\" type=\"text\" class=\"required number\" />
    <p>(*) Mandatory</p>
  </fieldset>
  <h1>Warning</h1>
  <fieldset>
    <legend>You are to young</legend>
    <p>Please go away ;-)</p>
  </fieldset>
  <h1>Finish</h1>
  <fieldset>
    <legend>Terms and Conditions</legend>
    <input
      id=\"acceptTerms\"
      name=\"acceptTerms\"
      type=\"checkbox\"
      class=\"required\"
    />
    <label for=\"acceptTerms\">I agree with the Terms and Conditions.</label>
  </fieldset>
</form>
</div>


    ";
        // line 96
        if (($context["errorList"] ?? null)) {
            // line 97
            echo "        <ul class=\"errorMessage\">
        ";
            // line 98
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["errorList"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 99
                echo "            <li>";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "<li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 101
            echo "        </ul>
    ";
        }
        // line 103
        echo "



    <div id=\"example-basic\">
    <h3>Keyboard</h3>
    <section>
        <p>Try the keyboard navigation by clicking arrow left or right!</p>
    </section>
    <h3>Effects</h3>
    <section>
        <p>Wonderful transition effects.</p>
    </section>
    <h3>Pager</h3>
    <section>
        <p>The next and previous buttons help you to navigate through your content.</p>
    </section>
</div>





    <div class=\"wrap\">
        <form method=\"POST\">
            <h2>User Registration</h2> 
            <br>
            <h5>Are you a caregiver or senior? </h5>
            Caregiver   <input type=\"radio\" checked name=\"ans\" value=\"Caregiver\" />
            Senior   <input type=\"radio\" name=\"ans\" value=\"Senior\"  /> <br>

            
         ";
        // line 140
        echo "            <br>
            <h5>What services do you offer/require?</h5>

            Grocery shopping   <input type=\"checkbox\" id=\"groceries\" name=\"shopping\" value=\"Grocery shopping\">
            Companionship   <input type=\"checkbox\" id=\"companionship\" name=\"companionship\" value=\"Companionship\">
            Cooking   <input type=\"checkbox\" id=\"coocking\" name=\"coocking\" value=\"Cooking\"><br><br>

            <h5>Location </h5>
            Your address:
            <input type=\"text\" name=\"address\" value=\"";
        // line 149
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["v"] ?? null), "address", [], "any", false, false, false, 149), "html", null, true);
        echo "\"></input>
            Postal code:
            <input type=\"text\" name=\"postal\"  value=\"";
        // line 151
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["v"] ?? null), "postal", [], "any", false, false, false, 151), "html", null, true);
        echo "\"></input><br><br>

            <h5>Tell us more about yourself:</h5>
            <textarea name=\"body\" cols=\"60\" rows=\"10\" value = \"";
        // line 154
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["v"] ?? null), "description", [], "any", false, false, false, 154), "html", null, true);
        echo "\"></textarea><br>

            <h5>Please upload your photo:</h5>
            <input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\"><br><br>

            <label>Email:</label>
            <input type=\"text\" name=\"email\" value=\"";
        // line 160
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["v"] ?? null), "email", [], "any", false, false, false, 160), "html", null, true);
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
        return array (  218 => 160,  209 => 154,  203 => 151,  198 => 149,  187 => 140,  153 => 103,  149 => 101,  140 => 99,  136 => 98,  133 => 97,  131 => 96,  68 => 38,  59 => 32,  55 => 31,  48 => 3,  37 => 1,);
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


{% block head %}
    {{ parent() }}
     <script src=\"jquery.js\"></script> 
    <script src=\"jquery.steps.js\"></script>
{% endblock %}


{% block content %} 
<br>
<br>
<br>
<br>
<script>
      \$(\"#wizard\").steps();
    </script>
<div id=\"wizard\">
  <form id=\"form-3\" action=\"#\">
  <h1>Account</h1>
  <fieldset>
    <legend>Account Information</legend>
    <label for=\"userName\">User name *</label>
    <input id=\"userName\" name=\"userName\" type=\"text\" class=\"required\" />
    <label for=\"password\">Password *</label>
    <input id=\"password\" name=\"password\" type=\"text\" class=\"required\" />
    <label for=\"confirm\">Confirm Password *</label>
    <input id=\"confirm\" name=\"confirm\" type=\"text\" class=\"required\" />
    <p>(*) Mandatory</p>
  </fieldset>
  <h1>Profile</h1>
  <fieldset>
    <legend>Profile Information</legend>
    <label for=\"name\">First name *</label>
    <input id=\"name\" name=\"name\" type=\"text\" class=\"required\" />
    <label for=\"surname\">Last name *</label>
    <input id=\"surname\" name=\"surname\" type=\"text\" class=\"required\" />
    <label for=\"email\">Email *</label>
    <input id=\"email\" name=\"email\" type=\"text\" class=\"required email\" />
    <label for=\"address\">Address</label>
    <input id=\"address\" name=\"address\" type=\"text\" />
    <label for=\"age\"
      >Age (The warning step will show up if age is less than 18) *</label
    >
    <input id=\"age\" name=\"age\" type=\"text\" class=\"required number\" />
    <p>(*) Mandatory</p>
  </fieldset>
  <h1>Warning</h1>
  <fieldset>
    <legend>You are to young</legend>
    <p>Please go away ;-)</p>
  </fieldset>
  <h1>Finish</h1>
  <fieldset>
    <legend>Terms and Conditions</legend>
    <input
      id=\"acceptTerms\"
      name=\"acceptTerms\"
      type=\"checkbox\"
      class=\"required\"
    />
    <label for=\"acceptTerms\">I agree with the Terms and Conditions.</label>
  </fieldset>
</form>
</div>


    {% if errorList %}
        <ul class=\"errorMessage\">
        {% for error in errorList %}
            <li>{{error}}<li>
        {% endfor %}
        </ul>
    {% endif %}




    <div id=\"example-basic\">
    <h3>Keyboard</h3>
    <section>
        <p>Try the keyboard navigation by clicking arrow left or right!</p>
    </section>
    <h3>Effects</h3>
    <section>
        <p>Wonderful transition effects.</p>
    </section>
    <h3>Pager</h3>
    <section>
        <p>The next and previous buttons help you to navigate through your content.</p>
    </section>
</div>





    <div class=\"wrap\">
        <form method=\"POST\">
            <h2>User Registration</h2> 
            <br>
            <h5>Are you a caregiver or senior? </h5>
            Caregiver   <input type=\"radio\" checked name=\"ans\" value=\"Caregiver\" />
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

            <h5>Please upload your photo:</h5>
            <input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\"><br><br>

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
