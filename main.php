<?php
require_once "vendor/autoload.php";
require_once 'init.php';



$app->get('/internalerror', function ($request, $response, $args) {
    return $this->view->render($response, 'error_internal.html.twig');
});







//confirm booking
$app->get('bookingconfirm/{clientID}/{availabilityID}', function ($request, $response, $args) {
    $clientID = $args['clientID'];
    $availabilityID = $args['availabilityID'];
    DB::query("UPDATE reservations SET isDeclined=%d, isAccepted=%d, WHERE clientID=%d AND availabilityID=%d",
     0, 1, $clientID, $availabilityID);
     $user = $_SESSION['user'];
    $bookings = DB::query("SELECT reservations.clientID, reservations.availabilityID, users.id, users.firstName, users.lastName,
    availabilities.dateTime, reservations.isFullfiled, reservations.isDeclined FROM reservations
     INNER JOIN availabilities ON reservations.availabilityID = availabilities.id INNER JOIN users ON reservations.clientID = users.id
     WHERE availabilities.caregiverID = %d ORDER BY id DESC", $user['id']);
     return $this->view->render($response, 'caregiverbookings.html.twig', ['bookingConfirmed' => "Booking successfully confirmed"],['bookings' => $bookings]);
}); 

$app->get('/accountcaregiver', function ($request, $response, $args) {
    $user = $_SESSION['user'];
    $services = DB::query("SELECT * FROM services WHERE caregiverID = %d ORDER BY id DESC", $user['id']);
    return $this->view->render($response, 'accountcaregiver.html.twig', ['services' => $services]);
});

$app->get('/caregiverbookings', function ($request, $response, $args) {
    $user = $_SESSION['user'];
    $bookings = DB::query("SELECT reservations.clientID, reservations.availabilityID, users.id, users.firstName, users.lastName,
    availabilities.dateTime, reservations.isFullfiled, reservations.isDeclined FROM reservations
     INNER JOIN availabilities ON reservations.availabilityID = availabilities.id INNER JOIN users ON reservations.clientID = users.id
     WHERE availabilities.caregiverID = %d ORDER BY id DESC", $user['id']);
  //   $clients = DB::query("SELECT * FROM users WHERE id = %d ", $bookings['users.id']);
    return $this->view->render($response, 'caregiverbookings.html.twig', ['bookings' => $bookings]);
});


//personal data
$app->get('/personaldata', function ($request, $response, $args) {
    return $this->view->render($response, 'teste.html');
});






$app->get('/caregivers', function ($request, $response, $args) {
    $caregiversList = DB::query("SELECT * FROM users ORDER BY id DESC");
    foreach ($caregiversList as &$caregiver) {
    
        $fullName = $caregiver['firstName'] . " " . $caregiver['lastName'];
        $description = $caregiver['description'];
        $photo = $caregiver['photo'];
    }

    return $this->view->render($response, 'caregivers.html.twig', ['list' => $caregiversList]);
});



//test
$app->get('/isitok/[{email}]', function ($request, $response, $args) {
    $email= isset($args['email']) ? $args['email'] : "";
    //$email = $args['email'] ?? "";
    $record = DB::queryFirstRow("SELECT * FROM users WHERE email=%s", $email);
    if ($record) {
        return $response->write("It is ok");
    } else {
        return $response->write("");
    }
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
