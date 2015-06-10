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

if ($userID){
    $isLogin = true;
} else {
    $isLogin = false;
}

$nav = new class_navigation();
$clsLogin = new class_login();

$email = '';
$password = '';

$errEmail = '';
$errPassword = '';
$errLogin = '';

if (! $isLogin) {

    if (isset($_POST['email']) && isset($_POST['password'])) {
        /**
         * This is a repeat attempt
         */

        $email = $_POST["email"];
        $password = $_POST["password"];

        $clsLogin->doLogin($email, $password);

        $errEmail = $clsLogin->errEmail;
        $errPassword = $clsLogin->errPassword;
        $errLogin = $clsLogin->errLogin;
    } else {

        /**
         * This is first attempt
         */
    }

} else {

    $clsLogin->doLogout();
}



/**
 * Main Section
 */

    if (! $isLogin){
        //FIXME:  Don't connect until we have validated login information.
        $connection=new class_sql();
        if ($connection->connect()){
            echo 'Connected!';
        } else {
            echo 'Connection Failed :-(';
        }

        $output = "
            <H1>Login</H1>
            <em>For now, if email='james@whitehousenorth.com' and password='password' we'll call it a pass.</em>
            <br><em>Otherwise it's a fail.</em>
            <br><em>So ignore the false error messages.</em>
            <p><error>$errLogin</error></p>

            <form method=\"post\" name=\"login\" action=\"login.php\">

                <P><input type=\"text\" name=\"email\" value=\"$email\"><error>$errEmail</error></P>
                <p><input type=\"password\" name=\"password\" value=\"$password\"><error>$errPassword</error></p>
                <p><input type=\"submit\"><input type=\"hidden\" name=\"formName\" value=\"login\"></p>
            </form>"
            ;

    } else {
        $output = "
            <h1>Logged Out</h1>
            <a href=\"index.php\">Back to HelloWorld</a>"
        ;



        }

echo $output;

/**
* Footer Section
*/
$nav->footer();

?>