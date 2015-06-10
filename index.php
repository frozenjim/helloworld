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
?>
<html><body>
<h1>The Homepage :-)</h1>
get_include_path = <? get_include_path();?>

<?php

/**
 * Onepage idea

if ($requestMethod = 'POST'){
    isset ($_POST['formName']) ? $formName = $_POST['formName'] : $formName = 'none' ;
    echo "Posting form is $formName";
    switch ($formName){
        case "login":
            echo "logging in...";
            break;
        default:
            echo "Error: Unknown Post formName.";
            break;
    }
} else {
    echo "request method is $requestMethod.";
}

*/


/**
 * Footer Section
 */
$nav->footer();

echo '</body></html>';

