<?php
namespace App\Patient;
use App\Model\Database;
use App\Message\Message;
use App\Utility\Utility;
use PDO;

class Patient extends Database{

    public $table = "patient";
    public $deleted_at;
    public $id;
    public $ids;
    public $patient_name;
    public $patient_phone;
    public $email;
    public $gender;
    public $patient_address;
    public $password;

    public function setData($postVariableData = NULL)
    {

        if (array_key_exists("id", $postVariableData)) {
            $this->id = $postVariableData['id'];
        }
        if(array_key_exists('patient_name',$postVariableData)){
            $this->patient_name = $postVariableData['patient_name'];
        }
        if(array_key_exists('email',$postVariableData)){
            $this->email = $postVariableData['email'];
        }
        if(array_key_exists('patient_phone',$postVariableData)){
            $this->patient_phone = $postVariableData['patient_phone'];
        }
        if(array_key_exists('patient_address',$postVariableData)){
            $this->patient_address = $postVariableData['patient_address'];
        }
        if(array_key_exists('gender',$postVariableData)){
            $this->gender = $postVariableData['gender'];
        }

    } // End setData() Method...

    public function view(){
        $sql = "SELECT * FROM patient WHERE id = '$this->id' LIMIT 1 ";
        $query = $this->DBH->prepare($sql);
        $query->execute();
        return $query->fetchobject();

    }// end of view()

    public function index($fetchMode='ASSOC'){
        $sql = "SELECT * FROM patient WHERE deleted_at IS NULL ";
        $STH = $this->DBH->query($sql);

        $fetchMode = strtoupper($fetchMode);
        if(substr_count($fetchMode,'OBJ') > 0)
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);

        $arrAllData  = $STH->fetchAll();
        return $arrAllData;

    }// end of index();
    public function trashed($fetchMode='ASSOC'){
        $sql = "SELECT * from patient WHERE deleted_at IS NOT NULL ";
        $STH = $this->DBH->query($sql);

        $fetchMode = strtoupper($fetchMode);
        if(substr_count($fetchMode,'OBJ') > 0)
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);

        $arrAllData  = $STH->fetchAll();
        return $arrAllData;

    }// end of trashed();

    public function update(){
        $query = "UPDATE `patient` SET `patient_name` = :patient_name, `patient_phone` = :patient_phone, `email` = :email, `gender` = :gender,
              `patient_address` = :patient_address  WHERE `patient`.`id` = :id";

        $result = $this->DBH->prepare($query);

        $result = $result->execute(array(':patient_name'=>$this->patient_name, ':patient_phone'=>$this->patient_phone, ':email'=>$this->email,
            'gender'=>$this->gender, ':patient_address'=>$this->patient_address, ':id'=>$this->id));

        if($result){
            Message::message("
             <div class=\"alert alert-info\" id='message'>
             <strong>Success!</strong> Patient Data has been updated  successfully.
              </div>");
        }
        else {
            Message::message("
             <div class=\"alert alert-info\" id='message'>
             <strong>Error!</strong> Patient Data updated  Fail.
              </div>");
        }
        return Utility::redirect("userList.php");
    } // End of the update() Method...

    public function indexPaginator($page=0,$itemsPerPage=3){

        $start = (($page-1) * $itemsPerPage);

        $sql = "SELECT * from patient  WHERE deleted_at IS NULL LIMIT $start,$itemsPerPage";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;

    }// end of indexPaginator() Method...



    public function trashedPaginator($page=0,$itemsPerPage=3){

        $start = (($page-1) * $itemsPerPage);

        $sql = "SELECT * from patient  WHERE deleted_at IS NOT NULL LIMIT $start,$itemsPerPage";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;

    }// end of trashedPaginator();
    
    
    
    
    /* --- Delete -- Trash --- Recover ---- and ALL marked---- */

    public function deleteMarked($IDs = array()){
        $this->deleted_at = time();
        if (is_array($IDs) && count($IDs)>0) {
            $this->ids = implode(",",  $IDs);

            $sql = "DELETE FROM `patient` WHERE `patient`.`id` IN (" . $this->ids . ")";
            $query = $this->DBH->prepare($sql);
            $result = $query->execute();

            if ($result) {
                Message::message("All Data Deleted Successfully !");
            } else {
                Message::message("Data Delete Fail !");
            }
        }else
            Message::message("No Item selected to Delete!");

        Utility::redirect("userList.php");
    }//deleteMarked()...
    public function trashMarked($IDs = array()){
        $this->deleted_at = time();
        if (is_array($IDs) && count($IDs)>0) {
            $this->ids = implode(",",  $IDs);

            $sql = "UPDATE `patient` SET `deleted_at` = '" . $this->deleted_at . "' WHERE `patient`.`id` IN (" . $this->ids . ")";
            $query = $this->DBH->prepare($sql);
            $result = $query->execute();

            if ($result) {
                Message::message("All Data Trashed Successfully !");
            } else {
                Message::message("Data Trash Fail !");
            }
        }else
            Message::message("No Item selected to Trash!");

        Utility::redirect("userList.php");
    }
    public function recoverMarked($IDs = array()){
        if (is_array($IDs) && count($IDs)>0) {
            $this->ids = implode(",", $IDs);
            $sql = "UPDATE `patient` SET `deleted_at` = NULL WHERE `id` IN (" . $this->ids . ")";
            $query = $this->DBH->prepare($sql);
            $result = $query->execute();

            if ($result) {
                Message::message("All Patient Recovered Successfully !");
            } else {
                Message::message("Patient Recover Fail !");
            }
        }else
            Message::message("No Item selected to Recover!");

        Utility::redirect("userList.php");
    } //End of the recoverMarked() Method...


    public function delete($table){
        $sql = "DELETE FROM $table WHERE `id` = $this->id ";
        $query = $this->DBH->prepare($sql);
        $result = $query->execute();

        if ($result){
            Message::message("Patient Deleted Successfully !");
        }else{
            Message::message("Patient Delete Fail !");
        }
        Utility::redirect("userList.php");
    } //End of delete() Method...

    public function trash($table){
        $this->deleted_at = time();
        $sql = "UPDATE $table SET `deleted_at` = '".$this->deleted_at."' WHERE `id` = ".$this->id;
        $query = $this->DBH->prepare($sql);
        $result = $query->execute();

        if ($result){
            Message::message("Patient Trashed Successfully !");
        }else{
            Message::message("Patient Trash Fail !");
        }
        Utility::redirect("userList.php");
    } //End of TrashPatient() Method...


}// End of the Class .. .