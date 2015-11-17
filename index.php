<?php

// Define DB connection parameters.
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'job_hunt_user');
define('DB_PASSWORD', 'K6NdbvSjV6LXy2mK');
define('DB_NAME', 'job_hunt');

// Include Autoload.php and instantiate it, which registers the autoloader function.
require_once('system/Autoload.php');
new Autoload();

// Start the session.
session_start();

// Post/Get/Redirect
Params::pgr();

// Run everything.
Calling::run();

// Clear the session variable used to store POST data.
Params::clearSessionParams();

?>

