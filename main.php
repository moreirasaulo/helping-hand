<?php
require_once "vendor/autoload.php";
require_once 'init.php';



$app->get('/internalerror', function ($request, $response, $args) {
    return $this->view->render($response, 'error_internal.html.twig');
});


//confirm booking (by caregiver)
$app->post('/caregiverbookings', function ($request, $response, $args) use ($log) {
    $confirm = $request->getParam('confirm');
   // $decline = $request->getParam('decline');
    $availID = $request->getParam('availabilityID');
    $clientID = $request->getParam('clientID');

    if(isset($confirm)) {
        DB::query("UPDATE reservations SET isDeclined=%i, isAccepted=%i WHERE clientID=%i AND availabilityID=%i",
     0, 1, $clientID, $availID);
    }
    else{
        DB::query("UPDATE reservations SET isDeclined=%i, isAccepted=%i WHERE clientID=%i AND availabilityID=%i",
     1, 0, $clientID, $availID);
    }
    $user = $_SESSION['user'];
    $bookings = DB::query("SELECT reservations.clientID, reservations.availabilityID, users.id, users.firstName, users.lastName,
    users.description, users.imagePath, availabilities.dateTime, reservations.isFullfiled, reservations.isAccepted, reservations.isDeclined FROM reservations
     INNER JOIN availabilities ON reservations.availabilityID = availabilities.id INNER JOIN users ON reservations.clientID = users.id
     WHERE availabilities.caregiverID = %d ORDER BY id DESC", $user['id']);
    return $this->view->render($response, 'caregiverbookings.html.twig', ['bookings' => $bookings]);
    
});


//confirm service fulfillment by client
$app->post('/clientbookings', function ($request, $response, $args) use ($log) {
    $confirm = $request->getParam('confirm');
    $user = $_SESSION['user'];
    $clientID = $user['id'];
    if(isset($confirm)) {
        $user = $_SESSION['user'];
        $clientID = $user['id'];
        $availID = $request->getParam('availabilityID');

    
        DB::query("UPDATE reservations SET isFullfiled=%i WHERE clientID=%i AND availabilityID=%i",
        1, $clientID, $availID);
    }
    else {
        $user = $_SESSION['user'];
        $clientID = $user['id'];
        $availabilityID = $request->getParam('availabilityID');
        $body = $request->getParam('body');
        $isPositive = $request->getParam('isPositive');

        DB::insert('reviews', [
            'clientID' => $user['id'],
            'availabilityID' => $availabilityID,
            'body' => $body,
            'isPositive' => $isPositive
          ]);
    }
    $reviews = DB::query("SELECT * FROM reviews WHERE clientID=%i", $clientID);
    if($reviews) {
        $bookings = DB::query("SELECT reservations.*, availabilities.*,users.*, r1.body FROM reservations INNER JOIN availabilities ON reservations.availabilityID = availabilities.id 
        INNER JOIN users ON availabilities.caregiverID = users.id INNER JOIN 
        reviews as r1 ON reservations.availabilityID = r1.availabilityID  INNER JOIN 
        reviews as r2 ON reservations.clientID = r2.clientID WHERE reservations.clientID=%i", $clientID);
    }
    else {
        $bookings = DB::query("SELECT reservations.*, availabilities.*,users.* FROM reservations INNER JOIN availabilities ON reservations.availabilityID = availabilities.id 
        INNER JOIN users ON availabilities.caregiverID = users.id  WHERE reservations.clientID=%i", $clientID);
    }
   
    return $this->view->render($response, 'clientbookings.html.twig', ['bookings' => $bookings]);
    
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
    $strDateTime = $date . " " . $time;
    $dateTime = new DateTime($strDateTime);

    $now = date("Y-m-d H:i:s");
    $currentDateTime = new DateTime($now);
    $currentDateTime->modify('-6 hours');

    $errorList = array();

    if($dateTime < $currentDateTime) {
        $errorList[] = "Your availability must be later than current date and time";
    }

    if ($errorList) {
        $user = $_SESSION['user'];
        $availabilities = DB::query("SELECT * FROM availabilities LEFT OUTER JOIN reservations ON 
        availabilities.id = reservations.availabilityID WHERE caregiverID = %d ORDER BY id DESC", $user['id']);
        return $this->view->render($response, 'caregiverschedule.html.twig', ['errorList' => $errorList, 'availabilities' => $availabilities]);
    }
    else {

        DB::insert('availabilities', [ 'dateTime' => $dateTime, 'caregiverID' => $user['id']]);
        $availabilities = DB::query("SELECT * FROM availabilities LEFT OUTER JOIN reservations
        ON availabilities.id = reservations.availabilityID WHERE caregiverID = %d ORDER BY id DESC", $user['id']);
        return $this->view->render($response, 'caregiverschedule.html.twig', ['availabilities' => $availabilities, 
        'success' => "Availability was added successfully"]);
    }
});


//caregiver bookings
$app->get('/caregiverbookings', function ($request, $response, $args) {
    $user = $_SESSION['user'];
    $bookings = DB::query("SELECT reservations.clientID, reservations.availabilityID, users.id, users.firstName, users.lastName,
    users.description, users.imagePath, availabilities.dateTime,reservations.isAccepted, reservations.isFullfiled, reservations.isDeclined FROM reservations
     INNER JOIN availabilities ON reservations.availabilityID = availabilities.id INNER JOIN users ON reservations.clientID = users.id
     WHERE availabilities.caregiverID = %d ORDER BY id DESC", $user['id']);
  //   $clients = DB::query("SELECT * FROM users WHERE id = %d ", $bookings['users.id']);
    return $this->view->render($response, 'caregiverbookings.html.twig', ['bookings' => $bookings]);
});



//client bookings
$app->get('/clientbookings', function ($request, $response, $args) {
    $user = $_SESSION['user'];
    $reviews = DB::query("SELECT * FROM reviews WHERE clientID=%i", $user['id']);
    if($reviews) {
        $bookings = DB::query("SELECT reservations.*, availabilities.*,users.*, r1.body FROM reservations INNER JOIN availabilities ON reservations.availabilityID = availabilities.id 
        INNER JOIN users ON availabilities.caregiverID = users.id INNER JOIN 
        reviews as r1 ON reservations.availabilityID = r1.availabilityID  INNER JOIN 
        reviews as r2 ON reservations.clientID = r2.clientID WHERE reservations.clientID=%i", $user['id']);
    }
    else {
        $bookings = DB::query("SELECT reservations.*, availabilities.*, users.* FROM reservations INNER JOIN availabilities ON reservations.availabilityID = availabilities.id 
        INNER JOIN users ON availabilities.caregiverID = users.id  WHERE reservations.clientID=%i", $user['id']);
    }
    
  //   $clients = DB::query("SELECT * FROM users WHERE id = %d ", $bookings['users.id']);
    return $this->view->render($response, 'clientbookings.html.twig', ['bookings' => $bookings]);
});


//personal data
$app->get('/personaldata', function ($request, $response, $args) {
    return $this->view->render($response, 'teste.html');
});




$app->get('/caregivers', function ($request, $response, $args) {
    $caregiversList = DB::query("SELECT * FROM users WHERE role=%s ORDER BY id DESC", "caregiver");
    return $this->view->render($response, 'caregivers.html.twig', ['list' => $caregiversList]);
});

//caregivers near you
$app->get('/caregiversnearyou', function ($request, $response, $args) {
    return $this->view->render($response, 'findcaregiversnearyou.html.twig');
});

$app->post('/caregiversnearyou', function ($request, $response, $args) {
    $postalcode = $request->getParam('postalcode');
    $latLong = getLatLong($postalcode);
    $latitude = $latLong['latitude'] ? $latLong['latitude'] : 'Not found';
    $longitude = $latLong['longitude'] ? $latLong['longitude'] : 'Not found';
    if ($postalcode) {
        $codes = DB::query("SELECT postalCode FROM users");
        $index = 1;
        foreach ($codes as &$code) {
            $arrLatLong = getLatLong($code);
            $latitude = $arrLatLong['latitude'];
            $longitude = $arrLatLong['longitude'];          
        }
        return $this->view->render($response, 'findcaregiversnearyou.html.twig', ['codes' => $codes, 'latitude' => $latitude , 'longitude' => $longitude]);
    }
    return $this->view->render($response, 'findcaregiversnearyou.html.twig', ['latitude' => $latitude , 'logitude' => $longitude]);
});


function getLatLong($code)
{
    $mapsApiKey = 'AIzaSyBON6db-E8cIzVii1TuqKult0KLq9zvrDE';
    $query = "https://maps.googleapis.com/maps/api/geocode/json?&address=".urlencode($code)."&key=".$mapsApiKey;
    $geocodeFromCode = file_get_contents($query);
    $output = json_decode($geocodeFromCode);
    $data['latitude'] = $output->results[0]->geometry->location->lat;
    $data['longitude'] = $output->results[0]->geometry->location->lng;
    if(!empty($data)){
        return $data;
    }else{
        return false;
    }
}


//view caregiver
$app->get('/viewcaregiver/{id}', function ($request, $response, $args) {
    $id= $args['id'];
    $caregiver = DB::queryFirstRow("SELECT * FROM users WHERE id=%i", $id);
    $services = DB::query("SELECT * FROM services WHERE caregiverID = %d ORDER BY id DESC", $id);
    $availabilities = DB::query("SELECT * FROM availabilities LEFT OUTER JOIN reservations
        ON availabilities.id = reservations.availabilityID WHERE caregiverID = %d AND reservationNo IS NULL ORDER BY id DESC", $id);
    $reviews = DB::query("SELECT * FROM reviews INNER JOIN availabilities ON reviews.availabilityID = availabilities.id
     WHERE caregiverID = %d", $id);    
    return $this->view->render($response, 'viewcaregiver.html.twig', ['caregiver' => $caregiver, 'services' => $services,
    'a' => $availabilities, 'reviews' => $reviews]);
});


//book caregiver (by client)
$app->post('/viewcaregiver/{id}', function ($request, $response, $args) {
    $user = $_SESSION['user'];
    $availId = $request->getParam('availId');
    $lastReservNo = DB::query(" SELECT * FROM reservations ORDER BY reservationNo DESC LIMIT 1");
    $reservNoInt = intval($lastReservNo);
    $reservNo = $lastReservNo++;


        DB::insert('reservations', [ 'clientID' => $user['id'], 'availabilityID' => $availId, 'isAccepted' => 0,
        'isFullfiled' => 0, 'reservationNo' => $reservNo, 'isDeclined' => 0]);

        $id= $args['id'];
    $caregiver = DB::queryFirstRow("SELECT * FROM users WHERE id=%i", $id);
    $services = DB::query("SELECT * FROM services WHERE caregiverID = %d ORDER BY id DESC", $id);
    $availabilities = DB::query("SELECT * FROM availabilities LEFT OUTER JOIN reservations
        ON availabilities.id = reservations.availabilityID WHERE caregiverID = %d AND reservationNo IS NULL ORDER BY id DESC", $id);

        return $this->view->render($response, 'viewcaregiver.html.twig', [ 
        'success' => "You successfully booked time slot",'caregiver' => $caregiver, 'services' => $services,
        'a' => $availabilities]);

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


// index (home page)
$app->get('/', function ($request, $response, $args) {

    $caregivers = DB::query("SELECT * FROM users WHERE role = %s ORDER BY id DESC LIMIT 3", "caregiver");
    return $this->view->render($response, 'index.html.twig', [ 
        'caregivers' => $caregivers]);
});



$app->get('/session', function ($request, $response, $args) {
    echo "<pre>\n";
    print_r($_SESSION);
    return $response->write("");
});
