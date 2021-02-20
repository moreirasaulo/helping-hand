<?php

session_start();

require_once 'vendor/autoload.php';
require_once 'init.php';

// Define app routes

require_once 'main.php';
require_once 'user.php';


// Run app
$app->run();