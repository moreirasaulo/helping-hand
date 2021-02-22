<?php
require_once "vendor/autoload.php";
require_once 'init.php';



//Login page
$app->get('/login', function ($request, $response, $args) {
    return $this->view->render($response, 'login.html.twig');
});

//check if email exists in db (login)  AJAX
$app->get('/emailexists/[{email}]', function ($request, $response, $args) {
    $email = isset($args['email']) ? $args['email'] : "";

    $record = DB::queryFirstRow("SELECT id FROM users WHERE email=%s", $email);
    if (!$record) {
        return $response->write("This email is not registered");
    } else {
        return $response->write("");
    }
});


//check if email exists in db (resistration)  AJAX
$app->get('/isemailtaken/[{email}]', function ($request, $response, $args) {
    $email = isset($args['email']) ? $args['email'] : "";

    $record = DB::queryFirstRow("SELECT id FROM users WHERE email=%s", $email);
    if ($record) {
        return $response->write("This email is already taken");
    } else {
        return $response->write("");
    }
});





//User tries to log in
$app->post('/login', function ($request, $response, $args) use ($log) {
    $email = $request->getParam('email');
    $password = $request->getParam('password'); 

    //get user from db by email
    $user = DB::queryFirstRow("SELECT * FROM users WHERE email=%s", $email);
    $loginSuccess = false;
    $errorList = array();
    if ($user && ($password == $user['password'])) {
        $loginSuccess = true;  
    } else {
        $errorList[] =  "Wrong email or password";
    }

    //if email or password dont match (login failed)
     if(!$loginSuccess) {
        $log -> debug(sprintf("Login failed for email %s from %s", $email, $_SERVER['REMOTE_ADDR']));
        return $this->view->render($response, 'login.html.twig', ['errorList' => $errorList]);
    } else { //login successful
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


// user tries to register
$app->post('/register', function ($request, $response, $args) {
    $role = $request->getParam('role');
    $services = $request->getParam('serv');
    $address = $request->getParam('address');
    $postalCode = $request->getParam('postal');
    $phone = $request->getParam('phone');
    $gender = $request->getParam('gender');
    $dateOfBirth = $request->getParam('dateOfBirth');
    $firstName = $request->getParam('firstName');
    $lastName = $request->getParam('lastName');
    $description = $request->getParam('description');
    $photo = $request->getUploadedFiles()['photo'];
    $email = $request->getParam('email');
    $password = $request->getParam('pass1');
    $passwordRep = $request->getParam('pass2');



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

    //verify date of birth
    if (preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $dateOfBirth) != 1) {
        $errorList[] = "Date must be in the 0000-00-00 format";
        $dateOfBirth = "";
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

    //verify email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || (strlen($email) < 5) || (strlen($email) > 30)) {
        $errorList[] = "Email must be in valid format, between 5 and 30 characters";
    }
    else {
        $record = DB::queryFirstRow("SELECT * FROM users WHERE email= %s ", $email);
        if ($record) {
            $errorList[] = "This email already exists";
            $email = "";
        }
    }

    //vefiry password
    if ($password != $passwordRep) {
        $errorList[] = "Passwords must match";
    }
    else {
        if ((strlen($password) < 6) || (strlen($password) > 20)
            || (preg_match("/[A-Z]/", $password) == FALSE )
            || (preg_match("/[a-z]/", $password) == FALSE )
            || (preg_match("/[0-9]/", $password) == FALSE )) {
            $errorList[] = "Password must be between 6 and 20 characters and contain at least one uppercase, one lowercase, and one digit";    
        }                                                  
    }

    // verify photo
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
    }


    if ($errorList) {                  
        return $this->view->render($response, 'register.html.twig', ['errorList' => $errorList, 
        'value'=> [ 'role' => $role, 'address' => $address, 'postalCode' => $postalCode, 'phone' => $phone,
        'gender' => $gender, 'dateOfBirth' => $dateOfBirth, 'firstName' => $firstName, 'lastName' => $lastName, 'description' => $description,
        'email' => $email] ]);
    }
    else {
        $photoData = file_get_contents($photo->file);
        DB::insert('users', [ 'firstName' => $firstName, 'lastName' => $lastName, 'gender' => $gender, 
        'dateOfBirth' => $dateOfBirth, 'phoneNo' => $phone, 'address' => $address, 'postalCode' => $postalCode,
        'email' => $email, 'password' => $password, 'role' => $role, 'photo' => $photoData, 'description' => $description]);    
        return $this->view->render($response, 'login.html.twig');            
    } 
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

//function to verify photo
// returns TRUE on success
// returns a string with error message on failure
function verifyUploadedPhoto($photo, &$mime = null) {
    if ($photo->getError() != 0) {
        return "Error uploading photo " . $photo->getError();
    } 
    if ($photo->getSize() > 1024*1024) { // 1MB
        return "File too big. 1MB max is allowed.";
    }
    $info = getimagesize($photo->file);
    if (!$info) {
        return "File is not an image";
    }
    // echo "\n\nimage info\n";
    // print_r($info);
    if ($info[0] < 200 || $info[0] > 1000 || $info[1] < 200 || $info[1] > 1000) {
        return "Width and height must be within 200-1000 pixels range";
    }
    $ext = "";
    switch ($info['mime']) {
        case 'image/jpeg': $ext = "jpg"; break;
        case 'image/gif': $ext = "gif"; break;
        case 'image/png': $ext = "png"; break;
        default:
            return "Only JPG, GIF and PNG file types are allowed";
    } 
    if (!is_null($mime)) {
        $mime = $info['mime'];
    }
    return TRUE;
}
  
 

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
