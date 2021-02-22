<?php

require_once "vendor/autoload.php";
require_once 'init.php';

$bookings = DB::query("SELECT reservations.clientID, reservations.availabilityID, users.id FROM reservations
 INNER JOIN availabilities ON reservations.availabilityID = availabilities.id INNER JOIN users ON reservations.clientID = users.id
 WHERE availabilities.caregiverID = %d ORDER BY id DESC", 2);
 
 print_r($bookings);

?>