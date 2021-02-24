<?php
require_once "vendor/autoload.php";
require_once 'init.php';



$app->get('/internalerror', function ($request, $response, $args) {
    return $this->view->render($response, 'error_internal.html.twig');
});


//confirm booking (by caregiver)
$app->post('/caregiverbookings', function ($request, $response, $args) use ($log) {
    $confirm = $request->getParam('confirm');
    $decline = $request->getParam('decline');
    $availID = $request->getParam('availID');
    $clientID = $request->getParam('clientID');

    if(isset($confirm)) {
        DB::query("UPDATE reservations SET isDeclined=%d, isAccepted=%d, WHERE clientID=%d AND availabilityID=%d",
     0, 1, $clientID, $availID);
    }
    else{
        DB::query("UPDATE reservations SET isDeclined=%d, isAccepted=%d, WHERE clientID=%d AND availabilityID=%d",
     1, 0, $clientID, $availID);
    }
    $user = $_SESSION['user'];
    
    return $this->view->render($response, '/teste.php');
});


/*
//confirm booking
$app->get('/bookingconfirm/{clientID}/{availabilityID}/{action:(confirm|refuse)}', function ($request, $response, $args) {
    $clientID = $args['clientID'];
    $availabilityID = $args['availabilityID'];
    DB::query("UPDATE reservations SET isDeclined=%d, isAccepted=%d, WHERE clientID=%d AND availabilityID=%d",
     0, 1, $clientID, $availabilityID);

     $user = $_SESSION['user'];

    // use flash message to confirm deletion / confirmation

    // redirect back to /caregiverbookings

    $bookings = DB::query("SELECT reservations.clientID, reservations.availabilityID, users.id, users.firstName, users.lastName,
    users.description,
    availabilities.dateTime, reservations.isFullfiled, reservations.isDeclined FROM reservations
     INNER JOIN availabilities ON reservations.availabilityID = availabilities.id INNER JOIN users ON reservations.clientID = users.id
     WHERE availabilities.caregiverID = %d ORDER BY id DESC", $user['id']);
     return $this->view->render($response, 'caregiverbookings.html.twig',
      ['bookingConfirmed' => "Booking successfully confirmed"],['bookings' => $bookings]);
});// translate->condition(array('action' => 'confirm|refuse')); 

*/



//display blob
$app->get('/imageview/{id}', function ($request, $response, $args) {
    $id= $args['id'];
    
    $record = DB::queryFirstRow("SELECT photo,imageMimeType  FROM users WHERE id=%d", $id);
    if ($record) {
        $response->headers->set('Content-Type', $record['imageMimeType']);
        echo $record['photo'];
    } else {
        return $response->write("");
    }
});




$app->get('/accountcaregiver', function ($request, $response, $args) {
    $user = $_SESSION['user'];
    $services = DB::query("SELECT * FROM services WHERE caregiverID = %d ORDER BY id DESC", $user['id']);
    return $this->view->render($response, 'accountcaregiver.html.twig', ['services' => $services]);
});

//caregiver schedule
$app->get('/caregiverschedule', function ($request, $response, $args) {
    $user = $_SESSION['user'];
    $availabilities = DB::query("SELECT * FROM availabilities LEFT OUTER JOIN reservations ON 
    availabilities.id = reservations.availabilityID WHERE caregiverID = %d ORDER BY id DESC", $user['id']);
    return $this->view->render($response, 'caregiverschedule.html.twig', ['availabilities' => $availabilities]);
});

//caregiver schedule (add new availability)
$app->post('/caregiverschedule', function ($request, $response, $args) {
    $user = $_SESSION['user'];
    $date = $request->getParam('date');
    $time = $request->getParam('time');
    $combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));

    DB::insert('availabilities', [ 'dateTime' => $combinedDT, 'caregiverID' => $user['id']]);

    $availabilities = DB::query("SELECT * FROM availabilities LEFT OUTER JOIN reservations
     ON availabilities.id = reservations.availabilityID WHERE caregiverID = %d ORDER BY id DESC", $user['id']);
    return $this->view->render($response, 'caregiverschedule.html.twig', ['availabilities' => $availabilities]);
});

$app->get('/caregiverbookings', function ($request, $response, $args) {
    $user = $_SESSION['user'];
    $bookings = DB::query("SELECT reservations.clientID, reservations.availabilityID, users.id, users.firstName, users.lastName,
    users.description, availabilities.dateTime, reservations.isFullfiled, reservations.isDeclined FROM reservations
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
    $caregiversList = DB::query("SELECT * FROM users WHERE role=%s ORDER BY id DESC", "caregiver");
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
