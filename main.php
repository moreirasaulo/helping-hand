<?php
require_once 'init.php';
$app->get('/internalerror', function ($request, $response, $args) {
    return $this->view->render($response, 'error_internal.html.twig');
});



// Define app routes
// index (home page)
$app->get('/', function ($request, $response, $args) {
    return $this->view->render($response, 'index.html.twig');
});

$app->get('/session', function ($request, $response, $args) {
    echo "<pre>\n";
    print_r($_SESSION);
    return $response->write("");
});
