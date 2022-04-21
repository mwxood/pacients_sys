<?php

class Session {

    private $signed_in = false;
    public $user_id;
    public $message;
    public $is_login = false;
    public $is_error = false;

    function __construct() {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        
        $this->visitor_count();
        $this->check_the_login();
        $this->check_message();
        $this->logoutUserIsNotActive();
        $_SESSION['timestamp'] = time();
    }

    public function is_signed_in() {
        return $this->signed_in;
    }

    public static function is_login_in() {
        return $this->is_login;
    }

    public function login($user) {
        if($user) {
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->signed_in = true;
        }
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($this->user_id);
        unset($_SESSION['timestamp']);
        $this->signed_in = false;
    }



    private function check_the_login() {
        if(isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
            $this->signed_in = true;
        } else {
            unset($this->user_id);
            $this->signed_in = false;
        }
    }

    public function visitor_count() {
        if(isset($_SESSION['count'])) {
            return $this->count = $_SESSION['count']++;
        }else {
            return $_SESSION['count'] = 1;
        }
    }

    public function message($msg="") {
        if(!empty($msg)) {
            $_SESSION['message'] = $msg;
        }else {
            return $this->message;
        }
    }

    public function flash_message($msg) {
        if(!empty($msg)) { 
            $error_message = '<div class="alert alert-danger">' . $msg . '</div>';
            $success_message = '<div class="alert alert-success">' . $msg . '</div>';
            if(!$this->is_error) {
                return '<div class="message-holder animated delay-1s fadeOut">' . $success_message . '</div>';
                
            } else {
                return '<div class="message-holder animated delay-1s fadeOut">' . $error_message . '</div>';
            }
        }
    }

    public function check_message() {
        if(isset($_SESSION['message'])) {
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        }else {
            $this->message = "";
        }
    }

    public function logoutUserIsNotActive() {
        if(isset($_SESSION['timestamp'])) {
            if(time() - $_SESSION['timestamp'] > 300) {
                $this->logout();
                $this->is_login = false;
                unset($_SESSION['timestamp']);
                header("Location: ./login.php");
            } else {
                $this->is_login = true;
                $_SESSION['timestamp'] = time();
            }
        }
    }
}

$session = new Session();
$message = $session->message();
