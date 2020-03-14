<?php
namespace App\Specialist;
use App\Model\Database;
use App\Message\Message;
use App\Utility\Utility;
use PDO;

class Specialist extends Database{

    public $table = "specialist_table";
    public $id;
    public $specialist = '';
    public $symptoms = '';


    public function setData($postVariableData = NULL)
    {

        if (array_key_exists("id", $postVariableData)) {
            $this->id = $postVariableData['id'];
        }
        if(array_key_exists('symptoms',$postVariableData)){
            $this->symptoms = $postVariableData['symptoms'];
        }
        if(array_key_exists('specialist',$postVariableData)){
            $this->specialist = $postVariableData['specialist'];
        }

    } // End setData() Method...

    public function view(){
        $sql = "SELECT * FROM specialist_table WHERE id = '$this->id' LIMIT 1 ";
        $query = $this->DBH->prepare($sql);
        $query->execute();
        return $query->fetchobject();
    }// End of view() Method...
    public function viewAll(){
        $sql = "SELECT * FROM specialist_table ";
        $query = $this->DBH->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }// End of view() Method...
    
    public function storeSpecialist(){

        $query = "INSERT INTO specialist_table (specialist,symptoms) VALUES (:specialist,:symptoms)";
        //Utility::dd($this);
        $STH = $this->DBH->prepare($query);
        $STH->bindParam(':specialist', $this->specialist);
        $STH->bindParam(':symptoms', $this->symptoms);
        $result = $STH->execute();
        if ($result){
            Message::message("Specialist Added Successfully !");
        }else{
            Message::message("Specialist Add Fail!");
        }

        Utility::redirect('specialist.php');

    }//...End storeSchedule() method...

    public function index($fetchMode='ASSOC'){
        $sql = "SELECT * FROM specialist_table ";
        $STH = $this->DBH->query($sql);

        $fetchMode = strtoupper($fetchMode);
        if(substr_count($fetchMode,'OBJ') > 0)
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);

        $arrAllData  = $STH->fetchAll();
        return $arrAllData;

    }// end of index();


    public function update(){
        $query = "UPDATE specialist_table SET `specialist` = :specialist, `symptoms` = :symptoms  WHERE `id` = :id";

        $result = $this->DBH->prepare($query);

        $result = $result->execute(array(':specialist'=>$this->specialist, ':symptoms'=>$this->symptoms, ':id'=>$this->id));

        if($result){
            Message::message("
             <div class=\"alert alert-success\" id='message'>
             <strong>Success! </strong> Specialist Data has been updated  successfully.
              </div>");
        }
        else {
            Message::message("
             <div class=\"alert alert-danger\" id='message'>
             <strong>Error! </strong> Specialist Data updated  Fail.
              </div>");
        }
        return Utility::redirect("specialist.php");
    } // End of the update() MEthod...

    public function indexPaginator($page=0,$itemsPerPage=3){

        $start = (($page-1) * $itemsPerPage);

        $sql = "SELECT * from specialist_table LIMIT $start,$itemsPerPage";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;

    }// end of indexPaginator() Method...


    /* --- Delete -- and ALL marked---- */

    public function deleteMarked($IDs = array()){
        //$this->deleted_at = time();
        if (is_array($IDs) && count($IDs)>0) {
            $this->ids = implode(",",  $IDs);

            $sql = "DELETE FROM specialist_table WHERE `id` IN (" . $this->ids . ")";
            $query = $this->DBH->prepare($sql);
            $result = $query->execute();

            if ($result) {
                Message::message("Selected Data Deleted Successfully !");
            } else {
                Message::message("Selected Data Delete Fail !");
            }
        }else
            Message::message("No Item selected to Delete!");

        Utility::redirect("specialist.php");
    }//deleteMarked()...


    public function delete(){
        $sql = "DELETE FROM specialist_table WHERE `id` = $this->id ";
        $query = $this->DBH->prepare($sql);
        $result = $query->execute();

        if ($result){
            Message::message("Specialist Deleted Successfully !");
        }else{
            Message::message("Specialist Delete Fail !");
        }
        Utility::redirect("specialist.php");
    } //End of delete() Method...


}// End of the Class .. .