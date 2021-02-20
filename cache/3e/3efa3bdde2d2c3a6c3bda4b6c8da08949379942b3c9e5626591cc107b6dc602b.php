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
     <link href=\"https://cdn.jsdelivr.net/npm/smartwizard@5/dist/css/smart_wizard_all.min.css\" rel=\"stylesheet\" type=\"text/css\" />
     <link href=\"styles/smart_wizard_dots.css\" rel=\"stylesheet\" type=\"text/css\" /> 
     <script src=\"https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js\" type=\"text/javascript\"></script>
     <script type=\"text/javascript\" src=\"https://code.jquery.com/jquery-3.3.1.min.js\"></script>
     <script>
    



     \$(document).ready(function(){
 
        // SmartWizard initialize
        \$('#smartwizard').smartWizard({
            theme: 'dots',
           
            
        }); 

        \$(\"#smartwizard\").on(\"leaveStep\", function(e, anchorObject, currentStepIndex, nextStepIndex, stepDirection) {
            \$stepIndex = \$('#smartwizard').smartWizard(\"getStepIndex\");
            

        if ((\$stepIndex == 0) && \$(\"input:checked\").length < 2)
        {
            \$(\"#roleErr\").html(\"Please select between caregiver and senior\");
            return false;
        }
        else {
            \$(\"#roleErr\").html(\"\");
        }
        if((\$stepIndex == 1) && \$(\"input[type=checkbox]:checked\").length < 1)
        {
            \$(\"#serviceErr\").html(\"Please select at least one service\");
            return false;
        }
        else {
            \$(\"#serviceErr\").html(\"\");
        } 



        if((\$stepIndex == 2) && (\$('input[name=address').val().length == 0))
        {
            \$(\"#addressErr\").html(\"Please enter address\");
            return false;
        }
        else {
            \$(\"#addressErr\").html(\"\");
        }
        if((\$stepIndex == 2) && (\$('input[name=postal').val().length == 0))
        {
            \$(\"#postalErr\").html(\"Please enter postal code\");
            return false;
        }
        else {
            \$(\"#postalErr\").html(\"\");
        }
        if((\$stepIndex == 2) && (\$('input[name=phone').val().length == 0))
        {
            \$(\"#phoneErr\").html(\"Please enter phone number\");
            return false;
        }
        else {
            \$(\"#phoneErr\").html(\"\");
        }
});
    });

//validation





</script>
";
    }

    // line 111
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " 
<img src=\"images/register.jpg\" class=\"d-block w-100 myImg\" alt=\"...\">
<br>
<br>
<br>
<br>
<h2> Registration </h2>
<!-- SmartWizard html -->
 <form method='POST'>
    <div id=\"smartwizard\">
   
        <ul class=\"nav\">
            <li class=\"nav-item\">
              <a class=\"nav-link\" href=\"#step-1\">
                <strong>Step 1</strong> <br>Caregiver/Senior
              </a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link\" href=\"#step-2\">
                <strong>Step 2</strong> <br>Services
              </a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link\" href=\"#step-3\">
                <strong>Step 3</strong> <br>Location
              </a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link \" href=\"#step-4\">
                <strong>Step 4</strong> <br>About you
              </a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link \" href=\"#step-5\">
                <strong>Step 5</strong> <br>Image
              </a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link \" href=\"#step-6\">
                <strong>Step 6</strong> <br>Email/Password
              </a>
            </li>
        </ul>

        <!--Caregiver or Senior-->
        <div class=\"tab-content\">
            <div id=\"step-1\" class=\"tab-pane\" role=\"tabpanel\" aria-labelledby=\"step-1\">
                <h5>Are you a caregiver or a senior? </h5>
                <div class=\"form-check\">
                <input class=\"form-check-input\" type=\"radio\" name=\"role\" id=\"caregiverRadio\" checked>
                <label class=\"form-check-label\" for=\"caregiverRadio\">
                    Caregiver
                </label>
                </div>
                <div class=\"form-check\">
                <input class=\"form-check-input\" type=\"radio\" name=\"role\" id=\"seniorRadio\">
                <label class=\"form-check-label\" for=\"seniorRadio\">
                    Senior
                </label>
                </div>
                <p id=\"roleErr\" class=\"errorMsg\"></p>
        </div>
        <!--Services -->
            <div id=\"step-2\" class=\"tab-pane\" role=\"tabpanel\" aria-labelledby=\"step-2\">
                <h5>What services do you offer/require?</h5>
                <div class=\"form-check\">
                <input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"groceries\" name=\"shopping\">
                <label class=\"form-check-label\" for=\"groceries\">
                    Grocery shopping
                </label>
                </div>
                <div class=\"form-check\">
                <input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"companionship\" name=\"companionship\">
                <label class=\"form-check-label\" for=\"companionship\">
                    Companionship
                </label>
                </div>
                <div class=\"form-check\">
                <input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"cooking\" name=\"cooking\">
                <label class=\"form-check-label\" for=\"cooking\">
                    Cooking
                </label>
                </div>
                <div class=\"form-check\">
                <input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"cleaning\" name=\"cleaning\">
                <label class=\"form-check-label\" for=\"cleaning\">
                    Cleaning
                </label>
                </div>
                <div class=\"form-check\">
                <input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"medcare\" name=\"medcare\">
                <label class=\"form-check-label\" for=\"medcare\">
                    Basic medical care
                </label>
                </div>
                <p id=\"serviceErr\" class=\"errorMsg\"></p>
            </div>

            <!--LOcation + contact -->
            <div id=\"step-3\" class=\"tab-pane\" role=\"tabpanel\" aria-labelledby=\"step-3\">
            <h5>Location </h5>
            <div class=\"row\">
            <div class=\"col-md-5\">
                <label for=\"address\" class=\"form-label\">Address</label>
                <input type=\"text\" class=\"form-control\" name=\"address\" id=\"address\">
                <label for=\"postal\" class=\"form-label\">Postal code</label>
                <input type=\"text\" class=\"form-control\" name=\"postal\" id=\"postal\" placeholder=\"H1A1H1\">
                <label for=\"phone\" class=\"form-label\">Phone number</label>
                <input type=\"text\" class=\"form-control\" name=\"phone\" id=\"phone\" placeholder=\"000-000-00-00\">  
            </div>
            <div class=\"col-md-5\">
                    <br><br>
                 <p id=\"addressErr\" class=\"errorMsg\"></p>
                  <br><br>
                 <p id=\"postalErr\" class=\"errorMsg\"></p>
                  <br><br>
                 <p id=\"phoneErr\" class=\"errorMsg\"></p>
            </div>
            </div>
            </div>
            <!--Personal info-->
            <div id=\"step-4\" class=\"tab-pane\" role=\"tabpanel\" aria-labelledby=\"step-4\">
            <h5>Tell us a little more about yourself </h5>
            <div class=\"row\">
            <div class=\"col-md-3\">
                <div class=\"form-check\">
                <input class=\"form-check-input\" type=\"radio\" name=\"gender\" id=\"male\" checked>
                <label class=\"form-check-label\" for=\"male\">
                    Male
                </label>
                </div>
                <div class=\"form-check\">
                <input class=\"form-check-input\" type=\"radio\" name=\"gender\" id=\"female\">
                <label class=\"form-check-label\" for=\"female\">
                    Female
                </label>
                </div>
                <div class=\"form-check\">
                <input class=\"form-check-input\" type=\"radio\" name=\"gender\" id=\"other\">
                <label class=\"form-check-label\" for=\"other\">
                    Other
                </label>
                </div>
                 <label for=\"DOB\" class=\"form-label\">Date of birth</label>
                <input type=\"text\" class=\"form-control\" name=\"DOB\" id=\"DOB\">
            </div>
            <div class=\"col-md-3\">
                <label for=\"firstName\" class=\"form-label\">First name</label>
                <input type=\"text\" class=\"form-control\" name=\"firstName\" id=\"firstName\">
                <label for=\"lastName\" class=\"form-label\">Last name</label>
                <input type=\"text\" class=\"form-control\" name=\"lastName\" id=\"lastName\">
            </div>
            <div class=\"col-md-3\">
                <label for=\"description\" class=\"form-label\">Share something about yourself</label>
                <textarea class=\"form-control\" id=\"description\" name=\"description\" rows=\"3\"></textarea>
            </div>
            </div>
            </div>
            <!--Image-->
            <div id=\"step-5\" class=\"tab-pane\" role=\"tabpanel\" aria-labelledby=\"step-3\">
            <h5>Please upload your photo:</h5>
            <div class=\"input-group mb-3\">
            <input type=\"file\" class=\"form-control\" name=\"image\" id=\"image\">
            </div>
            </div>
            <!--Email/Password-->
            <div id=\"step-6\" class=\"tab-pane\" role=\"tabpanel\" aria-labelledby=\"step-3\">
            <div class=\"row\">
            <div class=\"col-md-4\">
            <label for=\"email\" class=\"form-label\">Email address</label>
            <input type=\"email\" class=\"form-control\" id=\"email\" name = \"email\" placeholder=\"name@example.com\">
            <label for=\"pass1\" class=\"form-label\">Password</label>
            <input type=\"password\" class=\"form-control\" id=\"pass1\" name = \"pass1\">
            <label for=\"pass2\" class=\"form-label\">Password(repeat)</label>
            <input type=\"pass2\" class=\"form-control\" id=\"pass2\" name = \"pass2\">
            </div>
            <div class=\"col-md-4 align-self-center\">
                 <input type=\"submit\" name=\"register\" id=\"form\" value=\"Register\" class=\"btn btn-primary\"/> 
            </div>
            </div>



            
           
            </div>
        </div>
        
    </div>
    </form>

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
        return array (  141 => 111,  59 => 32,  55 => 31,  48 => 3,  37 => 1,);
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
     <link href=\"https://cdn.jsdelivr.net/npm/smartwizard@5/dist/css/smart_wizard_all.min.css\" rel=\"stylesheet\" type=\"text/css\" />
     <link href=\"styles/smart_wizard_dots.css\" rel=\"stylesheet\" type=\"text/css\" /> 
     <script src=\"https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js\" type=\"text/javascript\"></script>
     <script type=\"text/javascript\" src=\"https://code.jquery.com/jquery-3.3.1.min.js\"></script>
     <script>
    



     \$(document).ready(function(){
 
        // SmartWizard initialize
        \$('#smartwizard').smartWizard({
            theme: 'dots',
           
            
        }); 

        \$(\"#smartwizard\").on(\"leaveStep\", function(e, anchorObject, currentStepIndex, nextStepIndex, stepDirection) {
            \$stepIndex = \$('#smartwizard').smartWizard(\"getStepIndex\");
            

        if ((\$stepIndex == 0) && \$(\"input:checked\").length < 2)
        {
            \$(\"#roleErr\").html(\"Please select between caregiver and senior\");
            return false;
        }
        else {
            \$(\"#roleErr\").html(\"\");
        }
        if((\$stepIndex == 1) && \$(\"input[type=checkbox]:checked\").length < 1)
        {
            \$(\"#serviceErr\").html(\"Please select at least one service\");
            return false;
        }
        else {
            \$(\"#serviceErr\").html(\"\");
        } 



        if((\$stepIndex == 2) && (\$('input[name=address').val().length == 0))
        {
            \$(\"#addressErr\").html(\"Please enter address\");
            return false;
        }
        else {
            \$(\"#addressErr\").html(\"\");
        }
        if((\$stepIndex == 2) && (\$('input[name=postal').val().length == 0))
        {
            \$(\"#postalErr\").html(\"Please enter postal code\");
            return false;
        }
        else {
            \$(\"#postalErr\").html(\"\");
        }
        if((\$stepIndex == 2) && (\$('input[name=phone').val().length == 0))
        {
            \$(\"#phoneErr\").html(\"Please enter phone number\");
            return false;
        }
        else {
            \$(\"#phoneErr\").html(\"\");
        }
});
    });

//validation





</script>
{% endblock %}  


{% block content %} 
<img src=\"images/register.jpg\" class=\"d-block w-100 myImg\" alt=\"...\">
<br>
<br>
<br>
<br>
<h2> Registration </h2>
<!-- SmartWizard html -->
 <form method='POST'>
    <div id=\"smartwizard\">
   
        <ul class=\"nav\">
            <li class=\"nav-item\">
              <a class=\"nav-link\" href=\"#step-1\">
                <strong>Step 1</strong> <br>Caregiver/Senior
              </a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link\" href=\"#step-2\">
                <strong>Step 2</strong> <br>Services
              </a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link\" href=\"#step-3\">
                <strong>Step 3</strong> <br>Location
              </a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link \" href=\"#step-4\">
                <strong>Step 4</strong> <br>About you
              </a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link \" href=\"#step-5\">
                <strong>Step 5</strong> <br>Image
              </a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link \" href=\"#step-6\">
                <strong>Step 6</strong> <br>Email/Password
              </a>
            </li>
        </ul>

        <!--Caregiver or Senior-->
        <div class=\"tab-content\">
            <div id=\"step-1\" class=\"tab-pane\" role=\"tabpanel\" aria-labelledby=\"step-1\">
                <h5>Are you a caregiver or a senior? </h5>
                <div class=\"form-check\">
                <input class=\"form-check-input\" type=\"radio\" name=\"role\" id=\"caregiverRadio\" checked>
                <label class=\"form-check-label\" for=\"caregiverRadio\">
                    Caregiver
                </label>
                </div>
                <div class=\"form-check\">
                <input class=\"form-check-input\" type=\"radio\" name=\"role\" id=\"seniorRadio\">
                <label class=\"form-check-label\" for=\"seniorRadio\">
                    Senior
                </label>
                </div>
                <p id=\"roleErr\" class=\"errorMsg\"></p>
        </div>
        <!--Services -->
            <div id=\"step-2\" class=\"tab-pane\" role=\"tabpanel\" aria-labelledby=\"step-2\">
                <h5>What services do you offer/require?</h5>
                <div class=\"form-check\">
                <input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"groceries\" name=\"shopping\">
                <label class=\"form-check-label\" for=\"groceries\">
                    Grocery shopping
                </label>
                </div>
                <div class=\"form-check\">
                <input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"companionship\" name=\"companionship\">
                <label class=\"form-check-label\" for=\"companionship\">
                    Companionship
                </label>
                </div>
                <div class=\"form-check\">
                <input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"cooking\" name=\"cooking\">
                <label class=\"form-check-label\" for=\"cooking\">
                    Cooking
                </label>
                </div>
                <div class=\"form-check\">
                <input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"cleaning\" name=\"cleaning\">
                <label class=\"form-check-label\" for=\"cleaning\">
                    Cleaning
                </label>
                </div>
                <div class=\"form-check\">
                <input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"medcare\" name=\"medcare\">
                <label class=\"form-check-label\" for=\"medcare\">
                    Basic medical care
                </label>
                </div>
                <p id=\"serviceErr\" class=\"errorMsg\"></p>
            </div>

            <!--LOcation + contact -->
            <div id=\"step-3\" class=\"tab-pane\" role=\"tabpanel\" aria-labelledby=\"step-3\">
            <h5>Location </h5>
            <div class=\"row\">
            <div class=\"col-md-5\">
                <label for=\"address\" class=\"form-label\">Address</label>
                <input type=\"text\" class=\"form-control\" name=\"address\" id=\"address\">
                <label for=\"postal\" class=\"form-label\">Postal code</label>
                <input type=\"text\" class=\"form-control\" name=\"postal\" id=\"postal\" placeholder=\"H1A1H1\">
                <label for=\"phone\" class=\"form-label\">Phone number</label>
                <input type=\"text\" class=\"form-control\" name=\"phone\" id=\"phone\" placeholder=\"000-000-00-00\">  
            </div>
            <div class=\"col-md-5\">
                    <br><br>
                 <p id=\"addressErr\" class=\"errorMsg\"></p>
                  <br><br>
                 <p id=\"postalErr\" class=\"errorMsg\"></p>
                  <br><br>
                 <p id=\"phoneErr\" class=\"errorMsg\"></p>
            </div>
            </div>
            </div>
            <!--Personal info-->
            <div id=\"step-4\" class=\"tab-pane\" role=\"tabpanel\" aria-labelledby=\"step-4\">
            <h5>Tell us a little more about yourself </h5>
            <div class=\"row\">
            <div class=\"col-md-3\">
                <div class=\"form-check\">
                <input class=\"form-check-input\" type=\"radio\" name=\"gender\" id=\"male\" checked>
                <label class=\"form-check-label\" for=\"male\">
                    Male
                </label>
                </div>
                <div class=\"form-check\">
                <input class=\"form-check-input\" type=\"radio\" name=\"gender\" id=\"female\">
                <label class=\"form-check-label\" for=\"female\">
                    Female
                </label>
                </div>
                <div class=\"form-check\">
                <input class=\"form-check-input\" type=\"radio\" name=\"gender\" id=\"other\">
                <label class=\"form-check-label\" for=\"other\">
                    Other
                </label>
                </div>
                 <label for=\"DOB\" class=\"form-label\">Date of birth</label>
                <input type=\"text\" class=\"form-control\" name=\"DOB\" id=\"DOB\">
            </div>
            <div class=\"col-md-3\">
                <label for=\"firstName\" class=\"form-label\">First name</label>
                <input type=\"text\" class=\"form-control\" name=\"firstName\" id=\"firstName\">
                <label for=\"lastName\" class=\"form-label\">Last name</label>
                <input type=\"text\" class=\"form-control\" name=\"lastName\" id=\"lastName\">
            </div>
            <div class=\"col-md-3\">
                <label for=\"description\" class=\"form-label\">Share something about yourself</label>
                <textarea class=\"form-control\" id=\"description\" name=\"description\" rows=\"3\"></textarea>
            </div>
            </div>
            </div>
            <!--Image-->
            <div id=\"step-5\" class=\"tab-pane\" role=\"tabpanel\" aria-labelledby=\"step-3\">
            <h5>Please upload your photo:</h5>
            <div class=\"input-group mb-3\">
            <input type=\"file\" class=\"form-control\" name=\"image\" id=\"image\">
            </div>
            </div>
            <!--Email/Password-->
            <div id=\"step-6\" class=\"tab-pane\" role=\"tabpanel\" aria-labelledby=\"step-3\">
            <div class=\"row\">
            <div class=\"col-md-4\">
            <label for=\"email\" class=\"form-label\">Email address</label>
            <input type=\"email\" class=\"form-control\" id=\"email\" name = \"email\" placeholder=\"name@example.com\">
            <label for=\"pass1\" class=\"form-label\">Password</label>
            <input type=\"password\" class=\"form-control\" id=\"pass1\" name = \"pass1\">
            <label for=\"pass2\" class=\"form-label\">Password(repeat)</label>
            <input type=\"pass2\" class=\"form-control\" id=\"pass2\" name = \"pass2\">
            </div>
            <div class=\"col-md-4 align-self-center\">
                 <input type=\"submit\" name=\"register\" id=\"form\" value=\"Register\" class=\"btn btn-primary\"/> 
            </div>
            </div>



            
           
            </div>
        </div>
        
    </div>
    </form>

{% endblock %}
", "register.html.twig", "C:\\xampp\\htdocs\\helpinghand\\templates\\register.html.twig");
    }
}
