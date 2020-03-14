<?php
namespace App\Degree;
use App\Model\Database;
use App\Message\Message;
use App\Utility\Utility;
use PDO;

class Degree extends Database{

    public $id;
    public $degree_id;
    public $degree_value = array();
    public $degree_name  = array();
    public $institute    = array();

    public function setData($postVariableData = NULL)
    {
        if (array_key_exists("id", $postVariableData)) {
            $this->id = $postVariableData['id'];
        }
        if (array_key_exists('d_id', $postVariableData)) {
            $this->id = $postVariableData['d_id'];
        }
        if (array_key_exists('degree_id', $postVariableData)) {
            $this->degree_id = $postVariableData['degree_id'];
        }
        if (array_key_exists('degree_value', $postVariableData)) {
            $this->degree_value = $postVariableData['degree_value'];
        }
        if (array_key_exists('degree_name', $postVariableData)) {
            $this->degree_name = $postVariableData['degree_name'];
        }
        if (array_key_exists('institute', $postVariableData)) {
            $this->institute = $postVariableData['institute'];
        }
    }//End of the setData() Method..

    public function viewRow()
    {
        $sql = "SELECT * FROM degree_table WHERE id = '$this->degree_id' LIMIT 1 ";
        $query = $this->DBH->prepare($sql);
        $query->execute();
        $result = $query->fetchobject();
        return $result; // ?  true : false;
    } //End of the isDoctorExists() Method...
    
    public function index($fetchMode='ASSOC'){
        $sql = "SELECT * FROM degree_table WHERE doctor_id = $this->id ";
        $STH = $this->DBH->query($sql);

        $fetchMode = strtoupper($fetchMode);
        if(substr_count($fetchMode,'OBJ') > 0)
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);

        $arrAllData  = $STH->fetchAll();
        return $arrAllData;

    }// end of index();

    public function storeDegree()
    {
        $count = count($this->degree_value);
        //Utility::dd($this);
        for ($i=0; $i<$count; $i++) {
            //$arr = array($this->degree_value[$i], $this->degree_name[$i], $this->institute[$i], $this->id);
            $values = '"'.$this->degree_value[$i].'","'.$this->degree_name[$i]. '","' . $this->institute[$i] . '",'.$this->id;
            $query = "INSERT INTO degree_table (degree_value,degree_name,institute,doctor_id) VALUES ($values)";
            //echo $query; die();
            $STH = $this->DBH->prepare($query);

            $result = $STH->execute();
        }
        return $result;
    }
    public function updateDegree()
    {
        $query = "UPDATE degree_table SET degree_value = '$this->degree_value', degree_name = '$this->degree_name', institute = '$this->institute' WHERE doctor_id = $this->id AND id = $this->degree_id";
        //echo $query; die();
        //Utility::dd($this);
        $STH = $this->DBH->prepare($query);
        //$STH->bindParam(':'.$this->field, $this->value);
        //$STH->bindParam(':doctor_id', $this->id);
        $result = $STH->execute();
        return $result;
    }
    public function deleteDegree(){
        $sql = "DELETE FROM degree_table WHERE `id` = $this->id ";
        $query = $this->DBH->prepare($sql);
        $result = $query->execute();

        if ($result){
            Message::message("Degree Deleted Successfully !");
        }else{
            Message::message("Degree Delete Fail !");
        }
        Utility::redirect("degreeStore.php");
    } //End of delete() Method...


}