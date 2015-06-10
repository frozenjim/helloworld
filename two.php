<?php

/**
 * Prepare the session
 */
session_start();

set_include_path(get_include_path().PATH_SEPARATOR.'/home/james/projects/helloworld/inc');
spl_autoload_extensions('.php, .inc');
spl_autoload_register();

/**
 * Initialize Variables
 */

isset($_SESSION['userID']) ? $userID = $_SESSION['userID'] :$userID = 0;
isset($_SESSION['REQUEST_METHOD']) ? $requestMethod = $_SESSION['REQUEST_METHOD'] : $requestMethod = false;

/**
 * Build the sections
 */

$nav = new class_navigation();

/**
 * Main Section
 */
echo '<html><body><h1>Page Two</h1>';

/**
 * Footer Section
 */
$nav->footer();

echo '</body></html>';


?>

