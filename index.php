<?php

require_once 'setup.php';
require_once 'main.php';
require_once 'user.php';

require_once 'admin.php';
require_once '_adminUser.php';
require_once '_car.php';
require_once '_customer.php';
require_once '_reservation.php';
require_once '_location.php';
require_once '_category.php';
require_once '_booking.php';

// Run app
$app->run();