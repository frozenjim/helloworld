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

$nav = new class_navigation();
$login = new class_login();

$login->doLogout();

/**
 * Main Section
 */
?>

<h1>Logged Out</h1>
<a href="index.php">Back to HelloWorld</a>

<?php

/**
 * Footer Section
 */
$nav->footer();

?>