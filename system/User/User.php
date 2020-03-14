<?php
namespace App\User;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;


class User extends DB{

    public $table = "patient";
    public $id = "";
    public $patient_name="";
    public $gender = "";
    public $email = "";
    public $patient_phone="";
    public $patient_address="";
    public $password="";
    public $email_token = "";

    public function __construct(){
        parent::__construct();
    }

    public function setData($data=array()){
        if(array_key_exists('patient_name',$data)){
            $this->patient_name=$data['patient_name'];
        }
        if(array_key_exists('email',$data)){
            $this->email=$data['email'];
        }
        if(array_key_exists('patient_phone',$data)){
            $this->patient_phone=$data['patient_phone'];
        }
        if(array_key_exists('patient_address',$data)){
            $this->patient_address=$data['patient_address'];
        }
        if(array_key_exists('gender',$data)){
            $this->gender = $data['gender'];
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


    public function store() {

        //$data = array(':patient_name'=>$this->patient_name, ':email'=>$this->email,':patient_phone'=>$this->patient_phone,':gender'=>$this->gender, ':patient_address'=>$this->patient_address, ':password'=>$this->password, ':email_token'=>$this->email_token);

        //$query = "INSERT INTO `patient` (`patient_name`, `email`, `patient_phone`, `gender`, `patient_address`, `password`, `email_verified`) VALUES (:patient_name, :email, :patient_phone, :gender, :patient_address, :password, :email_token)";
        //$query = "INSERT INTO `patient`(`patient_name`, `email`, `patient_phone`, `gender`, `patient_address`, `password`, `email_verified`) VALUES ('$this->patient_name', '$this->email', '$this->patient_phone', '$this->gender', '$this->gender', '$this->patient_address', '$this->password', '$this->email_token')";
//        $stmt = $this->DBH->prepare($query);
//        foreach ($data as $key => $values){
//            $stmt->bindParam($key, $data[$key]);
//        }

        $query = "INSERT INTO `patient`(`patient_name`, `email`, `patient_phone`, `gender`, `patient_address`, `password`, `email_verified`) 
                  VALUES ('$this->patient_name', '$this->email', '$this->patient_phone', '$this->gender', '$this->patient_address', '$this->password', '$this->email_token')";
        //echo $query; exit();
        $result = $this->DBH->exec($query);
        //$res = $result->execute();
        return $result;
    }

    public function change_password(){
        $query="UPDATE `doctor_schedule_db`.`patient` SET `password`=:password  WHERE `patient`.`email` =:email";
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
        $sql = "SELECT * FROM patient WHERE email = '$this->email' LIMIT 1 ";
        $query = $this->DBH->prepare($sql);
        $query->execute();
        return $query->fetchobject();
        
    }// end of view()

    
    public function validTokenUpdate(){
        $query="UPDATE `doctor_schedule_db`.`patient` SET  `email_verified`='".'Yes'."' WHERE `patient`.`email` =:email";
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
        return Utility::redirect('../../../../views/main/login.php');
    }

    public function update(){
        $query="UPDATE `patient` SET `patient_name`=:patient_name, `patient_phone` = :patient_phone, `gender` = :gender,
              `patient_address` = :patient_address  WHERE `patient`.`email` = :email";

        $result=$this->DBH->prepare($query);

        $result->execute(array(':patient_name'=>$this->patient_name, ':email'=>$this->email,':patient_phone'=>$this->patient_phone, ':password'=>$this->password,
            'gender'=>$this->gender, ':patient_address'=>$this->patient_address));

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Data has been updated  successfully.
              </div>");
        }
        else {
            echo "Error";
        }
        return Utility::redirect($_SERVER['HTTP_REFERER']);
    }

}

