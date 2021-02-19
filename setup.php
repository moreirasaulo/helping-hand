<?php

session_start();

require_once 'vendor/autoload.php';


use Monolog\Logger;
use Monolog\Handler\StreamHandler;

//const ROWS_PER_PAGE = 6;

// create a log channel
$log = new Logger('main');
$log->pushHandler(new StreamHandler(dirname(__FILE__) . '/logs/everything.log', Logger::DEBUG));
$log->pushHandler(new StreamHandler(dirname(__FILE__) . '/logs/errors.log', Logger::ERROR));

if (strpos($_SERVER['HTTP_HOST'], "ipd23.com") !== false) {
  //  DB::$dbName = 'cp4976_helpinghand';
  //  DB::$user = 'cp4976_helpinghand';
  //  DB::$password = 'awUgtu7uebgq';
}
else {
    DB::$dbName = 'helpinghand';
    DB::$user = 'helpinghand';
    DB::$password = 'mHMnToqkLNc8c5LI'; 
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

// Create and configure Slim app
$config = ['settings' => [
    'addContentLengthHeader' => false,
    'displayErrorDetails' => true
]];

$app = new \Slim\App($config);

$container = $app->getContainer();
// Register Twig View helper
$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig(dirname(__FILE__) . '/templates', [
        'cache' => dirname(__FILE__) . '/cache',
        'debug' => true, // This line should enable debug mode
    ]);
    // Instantiate and add Slim specific extension
    $router = $c->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));
    return $view;
};


//user session
$container['view']->getEnvironment()->addGlobal('userSession', $_SESSION['user'] ??  null);
$pass = 'D34bBrgDyH4tAxLR';