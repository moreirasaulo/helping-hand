<?php
require_once '_setup.php';
require_once "vendor/autoload.php";


/*Login*/
$app->get('/test', function ($request, $response, $args) {
    return $this->view->render($response, 'test.html.twig');
});
$app->get('/login', function ($request, $response, $args) {
    return $this->view->render($response, 'login.html.twig');
});
$app->get('/step1', function ($request, $response, $args) {
    return $this->view->render($response, 'step1.html.twig');
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
            array_push($errorList,  "password is not correct, try again.");
        }    
    } else {
        array_push($errorList,  "email is not correct.");
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

//*****************logout****************************/
$app->get('/logout', function ($request, $response, $args) use ($log) {
    unset($_SESSION['user']);
    unset($_SESSION['access_token']);
    //$log -> debug(sprintf("Logout successful for email %s, uid=%d, from %s", $email, $user['id'], $_SERVER['REMOTE_ADDR']));
    return $this->view->render($response, 'index.html.twig', ['userSession' => null]);    
});

//*****************Register****************************/
$app->get('/register', function ($request, $response, $args) {
    return $this->view->render($response, 'register.html.twig');
});



$app->post('/register', function ($request, $response, $args) {
    $userName = $request->getParam('userName');
    $email = $request->getParam('email');
    $password = $request->getParam('pass1');
    $passwordRepeat = $request->getParam('pass2');
    //$recaptcha =  $request->getParam('g-recaptcha-response');
    $errorList = array();

    $secret = "6Lde2rsZAAAAAI-XDqiPSHCGRS7n1r4yAELZTcmz"; 
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);

    if (preg_match('/^[a-zA-Z0-9 \\._\'"-]{4,50}$/', $userName) != 1) {
        array_push($errorList,  "User name must be 4-50 characters in numbers or lowercase letters.");
       
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errorList, "Email format is not valid.");
        
    } else {
        $record = DB::queryFirstRow("SELECT * FROM users WHERE email= %s ", $email);
        if ($record) {
            array_push($errorList, "This email is already registered");
            $email = "";
        }
    }    

    if ($password != $passwordRepeat) {
        array_push($errorList, "Passwords do not match.");
    }
    else {
        if ((strlen($password) < 6) || (strlen($password) > 100)
            || (preg_match("/[A-Z]/", $password) == FALSE )
            || (preg_match("/[a-z]/", $password) == FALSE )
            || (preg_match("/[0-9]/", $password) == FALSE )) {
            array_push($errorList,"Password must be 6-100 characters long with at least one uppercase, one lowercase, and one digit in it");    
        }                                                  
    }
    if(!$responseData->success)
    {
        array_push($errorList,  "Robot verification failed, please try again.");  
    }
   
    if ($errorList) {                  
        return $this->view->render($response, 'register.html.twig', ['errorList' => $errorList, 'v'=> [ 'userName' => $userName, 'email' => $email] ]);
    }
    else {
        DB::insert('users', ['userName' => $userName, 'email' => $email, 'password' => $password ]);    
        return $this->view->render($response, 'login.html.twig');            
    }
});

//*****************Check email exist in database****************************/

$app->get('/isemailtaken/[{email}]', function ($request, $response, $args) {
    $email = isset($args['email']) ? $args['email'] : "";
    //$email = $args['email'] ?? "";
    $record = DB::queryFirstRow("SELECT * FROM users WHERE email=%s", $email);
    if ($record) {
        return $response->write("Email already in use");
    } else {
        return $response->write("");
    }
});

$app->get('/nothisemail/[{email}]', function ($request, $response, $args) {
    $email = isset($args['email']) ? $args['email'] : "";
    //$email = $args['email'] ?? "";
    $record = DB::queryFirstRow("SELECT * FROM users WHERE email=%s", $email);
    if (!$record) {
        return $response->write("This email is not exist");
    } else {
        return $response->write("");
    }
});

//*****************Check username exist in database****************************/

$app->get('/isuserNametaken/[{userName}]', function ($request, $response, $args) {
    $userName= isset($args['userName']) ? $args['userName'] : "";
    //$email = $args['email'] ?? "";
    $record = DB::queryFirstRow("SELECT * FROM users WHERE userName=%s", $userName);
    if ($record) {
        return $response->write("User Name already in use");
    } else {
        return $response->write("");
    }
});


//*****************Forgot password use email to reset****************************/
$app->get('/forgotpassword', function ($request, $response, $args) {
    return $this->view->render($response, 'forgotpassword.html.twig');
});

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
$app->post('/forgotpassword', function ($request, $response, $args) {
    
    $errorList = array();
    $mail = new PHPMailer(true);
    $email = $request->getParam('email');
    $_SESSION['email'] = $email;
    if($email) {
        $record = DB::queryFirstRow("SELECT * FROM users WHERE email=%s", $email);
        if($record) {
            $subject = "Reset your password";
            $uid = $record['id'];
            $token = md5($uid.$record['email'].$record['password']);
            $url = "password_reset_action/email=".$email."&token=".$token;
            $time = date('Y-m-d H:i'); 
            $name = "Reset password";
            $msg = "Hi ".$email.":<br> you are in ". $time. ' submited reset password, please click below link. <br>
                    <a href="http://carrental.ipd21.com/password_reset_action/email='.$email.'">'.$url.'</a>';
            $mail->SMTPDebug = 0;                     
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                   
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'projecttest2022@gmail.com';                    
            $mail->Password   = 'Carrentalipd21';                               
            $mail->SMTPSecure = 'ssl';      
            $mail->Port       = 465;     
            $mail->setFrom($email, $name);
            $mail->addAddress($email);              
            $mail->addReplyTo($email, 'Information');
            $mail->isHTML(true);                               
            $mail->Subject = $subject;
            $mail->Body    = $msg;
            if($mail->send()) {
                return $this->view->render($response, 'password_reset_emailsent.html.twig', ['v'=> ['email' => $email]]); 
                
            } else {
                return $this->view->render($response, 'password_reset_emailsentfailed.html.twig'); 
            }
        } else {
            array_push($errorList, "Please enter correct email address");
            return $this->view->render($response, 'forgotpassword.html.twig', ['errorList' => $errorList]);
        }
    }
    
});

$app->map(['GET', 'POST'], '/password_reset_action/{email}', function ($request, $response, $args) {
    $email = $args['email'];
    if( $email = $_SESSION['email']) {
        $pass1 = $request->getParam('pass1');
        $pass2 = $request->getParam('pass2');
        $errorList = array();
        $record = DB::queryFirstRow("SELECT * FROM users WHERE email=%s", $email);
        if($record) {
            if ($pass1 != $pass2) {
                array_push($errorList, "Passwords do not match.");
            } else {
                if ((strlen($pass1) < 6) || (strlen($pass1) > 100)
                    || (preg_match("/[A-Z]/", $pass1) == FALSE )
                    || (preg_match("/[a-z]/", $pass1) == FALSE )
                    || (preg_match("/[0-9]/", $pass1) == FALSE )) {
                    array_push($errorList,"Password must be 6-100 characters long with at least one uppercase, one lowercase, and one digit in it");    
                }                                                  
            }
            if ($errorList) {                  
                return $this->view->render($response, 'password_reset_action.html.twig', ['errorList' => $errorList, 'v'=> ['email' => $email] ]);
            }
            else {
                DB::update('users', ['password'=>$pass1],"email=%s", $email);
                return $this->view->render($response, 'password_reset_action_success.html.twig');      
            }
        } else {
            array_push($errorList,"Email is not correct"); 
            return $this->view->render($response, 'password_reset_action.html.twig', ['errorList' => $errorList]);
        }
    } 
});

//*****************about us page****************************/
$app->get('/aboutus', function ($request, $response, $args) {
    return $this->view->render($response, 'aboutus.html.twig');
});

$app->post('/aboutus', function ($request, $response, $args) {
    $postalcode = $request->getParam('postalcode');
    $latLong = getLatLong($postalcode);
    $latitude = $latLong['latitude'] ? $latLong['latitude'] : 'Not found';
    $longitude = $latLong['longitude'] ? $latLong['longitude'] : 'Not found';
    if ($postalcode || $_SESSION['latLong']) {
        $rentalPlaceList = DB::query("SELECT * FROM locations");
        $index = 1;
        foreach ($rentalPlaceList as &$rentalPlace) {
            $arrLatLong = getLatLong($rentalPlace['postalCode']);
            $rentalPlace['index'] = $index++;
            $rentalPlace['Latitude'] = $arrLatLong['latitude'];
            $rentalPlace['Longitude'] = $arrLatLong['longitude'];          
        }
        return $this->view->render($response, 'aboutus.html.twig', ['rentalPlaceList' => $rentalPlaceList, 'latitude' => $latitude , 'longitude' => $longitude]);
    }
    return $this->view->render($response, 'aboutus.html.twig', ['latitude' => $latitude , 'logitude' => $longitude]);
});
//*****************questions page****************************/
$app->get('/questions', function ($request, $response, $args) {
    return $this->view->render($response, 'questions.html.twig');
});

//*****************contact us page ****************************/
$app->get('/contactus', function ($request, $response, $args) {  
    return $this->view->render($response, 'contactus.html.twig');
});

$app->post('/contactus', function ($request, $response, $args) {
    $mail = new PHPMailer(true);
    $name = $request->getParam('name');
    $email = $request->getParam('email');
    $msg = $request->getParam('message');
    $mail->SMTPDebug = 0;                     
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                   
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'projecttest2022@gmail.com';                    
    $mail->Password   = 'Carrentalipd21';                               
    $mail->SMTPSecure = 'ssl';      
    $mail->Port       = 465;     
    $mail->setFrom($email, $name);
    $mail->addAddress('projecttest2022@gmail.com');              
    $mail->addReplyTo($email, 'Information');
    $mail->isHTML(true);                               
    $mail->Subject = $name;
    $mail->Body= $msg;
    if($mail->send()) {
       // return $this->vie->write("message sent");
    return $this->view->render($response, 'contactus.html.twig');  
    } else {
        return $this->vie->write("email sent failed");
    }
    
});

function getLatLong($code)
{
    $mapsApiKey = 'AIzaSyBON6db-E8cIzVii1TuqKult0KLq9zvrDE';
    $query = "https://maps.googleapis.com/maps/api/geocode/json?&address=".urlencode($code)."&key=".$mapsApiKey;
    $geocodeFromPoco = file_get_contents($query);
    $output = json_decode($geocodeFromPoco);

    // convert into readable format
    $data['latitude'] = $output->results[0]->geometry->location->lat;
    $data['longitude'] = $output->results[0]->geometry->location->lng;
    //Return latitude and longitude of the given postalcode
    if(!empty($data)){
        return $data;
    }else{
        return false;
    }
}



