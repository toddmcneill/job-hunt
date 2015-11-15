<?php

// Define DB
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'job_hunt_user');
define('DB_PASSWORD', 'K6NdbvSjV6LXy2mK');
define('DB_NAME', 'job_hunt');

// Include Autoload.php and instantiate it, which registers the autoloader function.
require_once('system/Autoload.php');
new Autoload();

// Run everything.
Calling::run();

?>

