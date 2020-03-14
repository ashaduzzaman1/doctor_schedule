<?php
namespace App\Doctor;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;

use App\Degree\Degree;
use App\Research\Research;
use App\Achievement\Achievement;
use App\Engaged\Engaged;
use App\WebContent\WebContent;
/*
$objDegree = new Degree();
$objResearch = new Research();
$objAchievement = new Achievement();
$objEngaged = new Engaged();
$objWebContent = new WebContent();
*/

class Doctor extends DB{

    public $table = "doctor_info";
    public $id = "";
    public $email = "";
    public $password="";
    public $email_token = "";

    public function __construct(){
        parent::__construct();
    }

    public function setData($data=array()){
        if(array_key_exists('email',$data)){
            $this->email=$data['email'];
        }

        if(array_key_exists('password',$data)){
            $this->password=md5($data['password']);
        }
        if(array_key_exists('id',$data)){
            $this->id=$data['id'];
        }
        if(array_key_exists('email_token',$data)){
            $this->email_token=$data['email_token'];
        }

        return $this;

    }

    public function change_password(){
        $query="UPDATE `doctor_schedule_db`.`doctor_info` SET `password`=:password  WHERE `doctor_info`.`email` =:email";
        $result=$this->conn->prepare($query);
        $result->execute(array(':password'=>$this->password,':email'=>$this->email));

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Password has been updated  successfully.
              </div>");
           // Utility::redirect('../../../../views/SEIPXXXX/User/Profile/signup.php');
        }
        else {
            echo "Error";
        }

    }

    public function view(){
        $sql = "SELECT * FROM doctor_info WHERE email = '$this->email' LIMIT 1 ";
        $query = $this->DBH->prepare($sql);
        $query->execute();
        return $query->fetchobject();
        
    }// end of view()

    
    public function validTokenUpdate(){
        $query="UPDATE `doctor_schedule_db`.`doctor_info` SET  `email_verified`='".'Yes'."' WHERE `patient`.`email` =:email";
        $result=$this->DBH->prepare($query);
        $result->execute(array(':email'=>$this->email));

        if($result){
            Message::message("
             <div class=\"alert alert-success\">
             <strong>Success!</strong> Email verification has been successful. Please login now!
              </div>");
        }
        else {
            echo "Error";
        }
        return Utility::redirect('../../../../views/Doctor/login.php');
    }

    public function indexId($fetchMode='ASSOC'){
        $sql = "SELECT `doctor_id` FROM `degree_table`
                UNION
                SELECT `doctor_id` FROM `achievement_table`
                UNION
                SELECT `doctor_id` FROM `research_table`
                UNION
                SELECT `doctor_id` FROM `engaged_table`
                UNION
                SELECT `doctor_id` FROM `web_content_table`
               ";
        $STH = $this->DBH->query($sql);

        $fetchMode = strtoupper($fetchMode);
        if(substr_count($fetchMode,'OBJ') > 0)
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);

        $arrAllData  = $STH->fetchAll();
        return $arrAllData;

    }// end of index();
    

    public function indexPaginator($page=0,$itemsPerPage=3){

        $start = (($page-1) * $itemsPerPage);

        $sql = "SELECT `doctor_id` FROM `degree_table`
                UNION
                SELECT `doctor_id` FROM `achievement_table`
                UNION
                SELECT `doctor_id` FROM `research_table`
                UNION
                SELECT `doctor_id` FROM `engaged_table`
                UNION
                SELECT `doctor_id` FROM `web_content_table` 
                LIMIT $start,$itemsPerPage";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;

    }// end of indexPaginator() Method...


}

