<?php
namespace App\Signin;
if(!isset($_SESSION) )  session_start();
use App\Model\Database as DB;
use App\Utility\Utility;

class Signin extends DB{

    public $a_email = "";
    public $a_pass = "";

    public function __construct(){
        parent::__construct();
    }

    public function setData($data = Array()){
        if (array_key_exists('a_email', $data)) {
            $this->a_email = $data['a_email'];
        }
        if (array_key_exists('a_pass', $data)) {
            $this->a_pass = md5($data['a_pass']);
        }
        return $this;
    }

    public function is_exist(){

        $query = "SELECT * FROM admin_table WHERE a_email = :a_email";
        $result = $this->DBH->prepare($query);
        $result->bindParam(':a_email', $this->a_email);
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
        $query = "SELECT * FROM admin_table WHERE a_email = :a_email AND a_pass = :a_pass";
        $result = $this->DBH->prepare($query);
        $result->bindParam(':a_email', $this->a_email);
        $result->bindParam(':a_pass', $this->a_pass);
        $result->execute();

        return $result->fetchObject();
//        if ($count > 0) {
//            return TRUE;
//        } else {
//            return FALSE;
//        }
    }

    public function logged_in(){
        if ((array_key_exists('a_email', $_SESSION)) && (!empty($_SESSION['a_email']))) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function log_out(){
        $_SESSION['a_email'] = "";
        $_SESSION['a_id'] = "";
        return TRUE;
    }
}
