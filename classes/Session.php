<?php
require_once "User.php";

class Session {
    private static $instance;
    const TIME = 500;
    private $user;

    public static function getSession() {
        session_start();
        if(self::$instance == null) self::$instance = new Session();
        return self::$instance;

    }

    public static function startSession() {
        $_SESSION["start"] = time();

    }
    public static function isExpired(){
        return (time() - $_SESSION["start"]) > self::TIME;
    }
    public  function closeSession() {
        unset($_SESSION["dataUser"]);
        unset($_SESSION["start"]);
        $_SESSION = [];
       
    }

    public function checkSession() {
        if(self::isExpired()){
            $this->closeSession();
            return true;
        }else{
            self::startSession();
            return false;
        }
    }


    public function saveDataUser($user) {
        $this->user = $user;
        $_SESSION["dataUser"] =serialize($this->user);
    }
    public function getDataUser() {
        
        return unserialize($_SESSION["dataUser"]);
    }
}
?>