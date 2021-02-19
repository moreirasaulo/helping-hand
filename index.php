<?php

session_start();

require_once 'vendor/autoload.php';

// Define app routes
require_once 'init.php';
require_once 'main.php';
require_once 'user.php';


// Run app
$app->run();