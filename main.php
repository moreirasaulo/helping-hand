<?php
require_once '_setup.php';
$app->get('/internalerror', function ($request, $response, $args) {
    return $this->view->render($response, 'error_internal.html.twig');
});



// Define app routes
// index
$app->get('/', function ($request, $response, $args) {
    return $this->view->render($response, 'index.html.twig');
    //return $response->write("this is index");
});

$app->get('/session', function ($request, $response, $args) {
    echo "<pre>\n";
    print_r($_SESSION);
    return $response->write("");
});