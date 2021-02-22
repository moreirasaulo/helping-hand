<?php
require_once 'init.php';
require_once "vendor/autoload.php";


//Login
$app->get('/login', function ($request, $response, $args) {
    return $this->view->render($response, 'login.html.twig');
});

$app->get('/test', function ($request, $response, $args) {
    return $this->view->render($response, 'error_404.html.twig');
});


// user updates account
$app->post('/accountcaregiver', function ($request, $response, $args) {
    $services = $request->getParam('serv');
    $address = $request->getParam('address');
    $postalCode = $request->getParam('postal');
    $phone = $request->getParam('phone');
    $firstName = $request->getParam('firstName');
    $lastName = $request->getParam('lastName');
    $description = $request->getParam('description');
    $photo = $request->getUploadedFiles()['photo'];
 
    $errorList = array();
 
    //verify address
    if ((strlen($address) < 5) || (strlen($address) > 200)) {
            $errorList[] = "Address must be between 5 and 200 characters";
            $address="";
    } 
 
    //verify postal code
    if (preg_match('/^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/', $postalCode) != 1) {
        $errorList[] = "Postal code must be in the A1A1A1 or A1A 1A1 format"; 
        $postalCode = "";   
    }
 
    //verify phone number
    if (preg_match('/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/', $phone) != 1) {
        $errorList[] = "Phone must be in 000-000-00-00 format";
        $phone = "";    
    }
 
    //verify first name
    if ((strlen($firstName) < 1) || (strlen($firstName) > 20)) {
        $errorList[] = "First name must be between 1 and 20 characters";    
        $firstName = "";
    }
 
    //verify last name
    if ((strlen($lastName) < 1) || (strlen($lastName) > 20)) {
        $errorList[] = "Last name must be between 1 and 20 characters";  
        $lastName = "";  
    }
 
    //verify description
    if ((strlen($description) < 10) || (strlen($description) > 500)) {
        $errorList[] = "Description must be between 10 and 500 characters";    
        $description = "";
    }
 
/*    // verify photo
    $hasPhoto = false;
    $mimeType = "";
    if ($photo->getError() != UPLOAD_ERR_NO_FILE) { // was image uploaded?
        // print_r($uploadedImage->getError());
        $hasPhoto = true;
        $result = verifyUploadedPhoto($photo, $mimeType);
        if ($result !== TRUE) {
            $errorList[] = $result;
        } 
    }
    else {
        $errorList[] = "Photo must be uploaded";
    } */
 
    if ($errorList) {                  
        return $this->view->render($response, 'accountcaregiver.html.twig', ['errorList' => $errorList, 
        'value'=> [ 'address' => $address, 'postalCode' => $postalCode, 'phone' => $phone,
         'firstName' => $firstName, 'lastName' => $lastName, 'description' => $description] ]);
    }
    else {
        $photoData = file_get_contents($photo->file);
        DB::query("UPDATE users SET address=%s, postalCode=%s, phoneNo=%s, firstName=%s, 
        lastName=%s, description=%s  WHERE id=%d", $address, $postalCode, $phone, $firstName,
        $lastName, $description, $_SESSION['user']['id']);
 
        $user = DB::queryFirstRow("SELECT * FROM users WHERE id = %d LIMIT 1", $_SESSION['user']['id']);
        $_SESSION['user'] = $user;
        return $this->view->render($response, 'accountcaregiver.html.twig', ['success' => "Account was successfully updated",
        'userSession' => $user]);            
    } 
});

/*
$app->post('/login', function ($request, $response, $args) use ($log) {
    $email = $request->getParam('email');
    $password = $request->getParam('password'); 

    //get user from db by email
    $user = DB::queryFirstRow("SELECT * FROM users WHERE email=%s", $email);
    $loginSuccess = false;
    $errorList = [];
    if ($user) {
         if ($password==$user['password']) {
            $loginSuccess = true;
        }
        else {
            $errorList[] =  "Password is not valid";
        }    
    } else {
        $errorList[] =  "This email is not registered";
    }

    //if email or password dont match
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
*/
//check if email exists in db (login)  AJAX
$app->get('/nothisemail/[{email}]', function ($request, $response, $args) {
    return "hi hi ";
    $email = isset($args['email']) ? $args['email'] : "";

    $record = DB::queryFirstRow("SELECT id FROM users WHERE email=%s", $email);
    if ($record) {
        return $response->write("");
    } else {
        return $response->write("This email is not registered");
    }
});

/*

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
        array_push($errorList,  "Robot verification failed, please try again.");  
    }
   
    if ($errorList) {                  
        return $this->view->render($response, 'register.html.twig', ['errorList' => $errorList, 'v'=> [ 'userName' => $password, 'email' => $email] ]);
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
*/