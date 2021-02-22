<?php

require_once 'vendor/autoload.php';

use Respect\Validation\Validator as Validator;


use Monolog\Logger;
use Monolog\Handler\StreamHandler;

use Slim\Http\UploadedFile; 


// create a log channel
$log = new Logger('main');
$log->pushHandler(new StreamHandler(dirname(__FILE__) . '/logs/everything.log', Logger::DEBUG));
$log->pushHandler(new StreamHandler(dirname(__FILE__) . '/logs/errors.log', Logger::ERROR));


// always include authentication info and client's IP address in the log
$log->pushProcessor(function ($record) {
    $record['extra']['user'] = isset($_SESSION['user']) ? $_SESSION['user']['email'] : '=anonymous=';
    $record['extra']['ip'] = $_SERVER['REMOTE_ADDR'];
    return $record;
});


if (strpos($_SERVER['HTTP_HOST'], "ipd23.com") !== false) {
    DB::$dbName = 'cp4976_helpinghand';
    DB::$user = 'cp4976_helpinghand';
    DB::$password = 'mHMnToqkLNc8c5LI';
}
else {
    DB::$dbName = 'helpinghand';
    DB::$user = 'helpingHand';
    DB::$password = '3gRTDYFDKtlX99ok';   //3gRTDYFDKtlX99ok   //mHMnToqkLNc8c5LI
    DB::$host = 'localhost';
    DB::$port = 3333;
}


DB::$error_handler = 'db_error_handler'; 
DB::$nonsql_error_handler = 'db_error_handler';


function db_error_handler($params) {
    echo "Database error";
    global $log;
    $log->error("Database error: " . $params['error']);
    if (isset($params['query'])) {
        $log->error("SQL query: " . $params['query']);
    }
    header("Location: /internalerror");
    die;
}

/* getting access to twig rendering directly, without PHP Slim
http_response_code(500); // internal server error
$twig = $container['view']->getEnvironment();
die($twig->render('error_internal.html.twig')); */


// Create and configure Slim app
$config = ['settings' => [
    'addContentLengthHeader' => false,
    'displayErrorDetails' => true
]];
$app = new \Slim\App($config);

// Fetch DI Container
$container = $app->getContainer();

// Register Twig View helper
$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig(dirname(__FILE__) . '/templates', [
        'cache' => dirname(__FILE__) . '/tmplcache',
        'debug' => true, // This line should enable debug mode
    ]);
    //
    $view->getEnvironment()->addGlobal('test1','VALUE');
    // Instantiate and add Slim specific extension
    $router = $c->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));
    return $view;
};



// All templates will be given userSession variable
$container['view']->getEnvironment()->addGlobal('userSession', $_SESSION['user'] ?? null );
$container['view']->getEnvironment()->addGlobal('flashMessage', getAndClearFlashMessage());

$passwordPepper = 'mmyb7oSAeXG9DTz2uFqu';

//Override the default Not Found Handler before creating App
$container['notFoundHandler'] = function ($container) {
    return function ($request, $response) use ($container) {
        $response = $response->withStatus(404);
        return $container['view']->render($response, 'error_404.html.twig');
    };
};


// Flash messages handling

$container['view']->getEnvironment()->addGlobal('flashMessage', getAndClearFlashMessage());

function setFlashMessage($message) {
    $_SESSION['flashMessage'] = $message;
}


// returns empty string if no message, otherwise returns string with message and clears is
function getAndClearFlashMessage() {
    if (isset($_SESSION['flashMessage'])) {
        $message = $_SESSION['flashMessage'];
        unset($_SESSION['flashMessage']);
        return $message;
    }
    return "";
}
