<?php


class class_login {
    var $email;
    var $password;

    var $userID;
    var $username;

    var $errEmail;
    var $errLogin;
    var $errPassword;

    public function doLogin($getEmail, $getPassword){
        $this->email = $getEmail;
        $this->password = $getPassword;

        if ($getPassword == 'password' && $getEmail == 'james@whitehousenorth.com'){
            $this->userID = 12;
            $this->username = 'frozenjim';

            $this->errEmail = 'Email OK';
            $this->errLogin = 'Logged In OK';
            $this->errPassword = 'Password OK';
        } else{
            $this->userID = 0;
            $this->username = '';

            $this->errEmail = ' * Invalid email address';
            $this->errLogin = ' * Sorry, try again...';
            $this->errPassword = ' * Invalid password';
        }

        $_SESSION['userID'] = $this->userID;
        return $this->userID;
    }

    public function doLogout(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        session_destroy();
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getErrEmail(){
        return $this->errEmail;
    }

    public function getErrLogin(){
        return $this->errLogin;
    }

    public function getErrPassword(){
        return $this->errPassword;
    }



}