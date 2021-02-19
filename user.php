<?php
require_once 'init.php';
require_once "vendor/autoload.php";


//Login
$app->get('/login', function ($request, $response, $args) {
    return $this->view->render($response, 'login.html.twig');
});

$app->post('/login', function ($request, $response, $args) use ($log) {
    $email = $request->getParam('email');
    $password = $request->getParam('password'); 
    $user = DB::queryFirstRow("SELECT * FROM users WHERE email = %s LIMIT 1", $email);
    $loginSuccess = false;
    $errorList = array();
    if ($user) {
         if ($password==$user['password']) {
            $loginSuccess = true;
        }
        else {
            $errorList[] =  "Password is not valid";
        }    
    } else {
        $errorList[] =  "Email is not correct";
    }
    if ($errorList) {                  
        return $this->view->render($response, 'login.html.twig', ['errorList' => $errorList]);
    } else if(!$loginSuccess) {
        $log -> debug(sprintf("Login failed for email %s from %s", $email, $_SERVER['REMOTE_ADDR']));
        return $this->view->render($response, 'login.html.twig', ['loginSuccess' => true]);
    } else {
        unset($user['password']);
        $_SESSION['user'] = $user; 
        $log -> debug(sprintf("Login successful for email %s, uid=%d, from %s", $email, $user['id'], $_SERVER['REMOTE_ADDR']));
        return $this->view->render($response, 'index.html.twig', ['userSession' => $_SESSION['user']]);    
    }
});

//Logout
$app->get('/logout', function ($request, $response, $args) use ($log) {
    unset($_SESSION['user']);
    unset($_SESSION['access_token']);
    return $this->view->render($response, 'index.html.twig', ['userSession' => null]);    
});

//registration page
$app->get('/register', function ($request, $response, $args) {
    return $this->view->render($response, 'register.html.twig');
});


$app->post('/register', function ($request, $response, $args) {
    $role = $request->getParam('ans');
    $descrip = $_POST['body'];
    $email = $request->getParam('email');
    $password = $request->getParam('pass1');
    $passwordRepeat = $request->getParam('pass2');

    $errorList = array();

    $secret = "6Lde2rsZAAAAAI-XDqiPSHCGRS7n1r4yAELZTcmz"; 
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errorList, "Email format is not valid.");
        
    } else {
        $record = DB::queryFirstRow("SELECT * FROM users WHERE email= %s ", $email);
        if ($record) {
            array_push($errorList, "This email already exists");
            $email = "";
        }
    }    

    if ($password != $passwordRepeat) {
        array_push($errorList, "Passwords do not match");
    }
    else {
        if ((strlen($password) < 6) || (strlen($password) > 30)
            || (preg_match("/[A-Z]/", $password) == FALSE )
            || (preg_match("/[a-z]/", $password) == FALSE )
            || (preg_match("/[0-9]/", $password) == FALSE )) {
            array_push($errorList,"Password must be 6-30 characters long with at least one uppercase, one lowercase, and one digit");    
        }                                                  
    }
    if(!$responseData->success)
    {
        array_push($errorList,  "Automatic verification failed, please try again.");  
    }
   
    if ($errorList) {                  
        return $this->view->render($response, 'register.html.twig', ['errorList' => $errorList, 'v'=> [ 'password' => $password, 'email' => $email] ]);
    }
    else {
        DB::insert('users', [ 'email' => $email, 'password' => $password ]);    
        return $this->view->render($response, 'login.html.twig');            
    }
});

//is email uqnique

$app->get('/isemailunique/[{email}]', function ($request, $response, $args) {
    $email = isset($args['email']) ? $args['email'] : "";
    $record = DB::queryFirstRow("SELECT * FROM users WHERE email=%s", $email);
    if ($record) {
        return $response->write("This email already registrered");
    } else {
        return $response->write("");
    }
});

$app->get('/uniqueemail/[{email}]', function ($request, $response, $args) {
    $email = isset($args['email']) ? $args['email'] : "";
    $record = DB::queryFirstRow("SELECT * FROM users WHERE email=%s", $email);
    if (!$record) {
        return $response->write("This email is availabale");
    } else {
        return $response->write("");
    }
});



//password reset through email
