<?php

require_once "vendor/autoload.php";
require_once 'init.php';

$availabilities = DB::query("SELECT * FROM availabilities LEFT OUTER JOIN reservations ON availabilities.id = reservations.availabilityID WHERE caregiverID = %d ORDER BY id DESC", 2);

 print_r($availabilities);

?>