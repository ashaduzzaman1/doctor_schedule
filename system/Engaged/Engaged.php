<?php
namespace App\Engaged;
use App\Model\Database;
use App\Message\Message;
use App\Utility\Utility;
use PDO;

class Engaged extends Database{

    public $id;
    public $engaged_id;
    public $org_name  = array();
    public $org_level = array();

    public function setData($postVariableData = NULL)
    {
        if (array_key_exists("id", $postVariableData)) {
            $this->id = $postVariableData['id'];
        }
        if (array_key_exists('d_id', $postVariableData)) {
            $this->id = $postVariableData['d_id'];
        }
        if (array_key_exists('engaged_id', $postVariableData)) {
            $this->engaged_id = $postVariableData['engaged_id'];
        }
        if (array_key_exists('org_name', $postVariableData)) {
            $this->org_name = $postVariableData['org_name'];
        }
        if (array_key_exists('org_level', $postVariableData)) {
            $this->org_level = $postVariableData['org_level'];
        }
    }//End of the setData() Method..

    public function viewRow()
    {
        $sql = "SELECT * FROM engaged_table WHERE id = '$this->engaged_id' LIMIT 1 ";
        $query = $this->DBH->prepare($sql);
        $query->execute();
        $result = $query->fetchobject();
        return $result; // ?  true : false;
    } //End of the isDoctorExists() Method...

    public function getSingleData($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE doctor_id = '$id' LIMIT 1 ";
        $query = $this->DBH->prepare($sql);
        $query->execute();
        $result = $query->fetchobject();
        return $result;
    } //End of the isDoctorExists() Method...
    
    
    public function index($fetchMode='ASSOC'){
        $sql = "SELECT * FROM engaged_table WHERE doctor_id = $this->id ";
        $STH = $this->DBH->query($sql);

        $fetchMode = strtoupper($fetchMode);
        if(substr_count($fetchMode,'OBJ') > 0)
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);

        $arrAllData  = $STH->fetchAll();
        return $arrAllData;

    }// end of index();

    public function storeEngaged()
    {
        $count = count($this->org_name);
        //Utility::dd($this);
        for ($i=0; $i<$count; $i++) {
            //$arr = array($this->degree_value[$i], $this->org_name[$i], $this->org_level[$i], $this->id);
            $values = '"'.$this->org_name[$i]. '","' . $this->org_level[$i] . '",'.$this->id;
            $query = "INSERT INTO engaged_table (org_name,org_level,doctor_id) VALUES ($values)";
            //echo $query; die();
            $STH = $this->DBH->prepare($query);

            $result = $STH->execute();
        }
        return $result;
    }
    public function updateEngaged()
    {
        $query = "UPDATE engaged_table SET org_name = '$this->org_name', org_level = '$this->org_level[0]' WHERE doctor_id = $this->id AND id = $this->engaged_id";
        //echo $query; die();
        //Utility::dd($this);
        $STH = $this->DBH->prepare($query);
        //$STH->bindParam(':'.$this->field, $this->value);
        //$STH->bindParam(':doctor_id', $this->id);
        $result = $STH->execute();
        return $result;
    }
    public function deleteEngaged($id){
        $sql = "DELETE FROM engaged_table WHERE `id` = $id ";
        $query = $this->DBH->prepare($sql);
        $result = $query->execute();

        if ($result){
            Message::message("Your Engaged Deleted Successfully !");
        }else{
            Message::message("Your Engaged Delete Fail !");
        }
        Utility::redirect("engagedWith.php");
    } //End of delete() Method...


}