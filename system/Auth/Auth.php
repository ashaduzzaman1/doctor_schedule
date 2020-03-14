<?php
namespace App\Auth;
if(!isset($_SESSION) )  session_start();
use App\Model\Database as DB;
use App\Utility\Utility;

class Auth extends DB{

    public $email = "";
    public $password = "";

    public function __construct(){
        parent::__construct();
    }

    public function setData($data = Array()){
        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }
        if (array_key_exists('password', $data)) {
            $this->password = md5($data['password']);
        }
        return $this;
    }

    public function is_exist(){

        $query = "SELECT * FROM doctor_info WHERE email = :email";
        $result = $this->DBH->prepare($query);
        $result->bindParam(':email', $this->email);
        $result->execute();

        $count = $result->rowCount();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function is_registered(){
        //Utility::dd($this);
        $query = "SELECT * FROM doctor_info WHERE email = :email AND password = :password";
        $result = $this->DBH->prepare($query);
        $result->bindParam(':email', $this->email);
        $result->bindParam(':password', $this->password);
        $result->execute();

        return $result->fetchObject();
//        if ($count > 0) {
//            return TRUE;
//        } else {
//            return FALSE;
//        }
    }

    public function logged_in(){
        if ((array_key_exists('email', $_SESSION)) && (!empty($_SESSION['email']))) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function log_out(){
        $_SESSION['email'] = "";
        $_SESSION['id'] = "";
        return TRUE;
    }
}

