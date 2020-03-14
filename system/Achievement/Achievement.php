<?php
namespace App\Achievement;
use App\Model\Database;
use App\Message\Message;
use App\Utility\Utility;
use PDO;

class Achievement extends Database{

    public $id;
    public $achievement_id;
    public $achievement_name  = array();
    public $org_level    = array();

    public function setData($postVariableData = NULL)
    {
        if (array_key_exists("id", $postVariableData)) {
            $this->id = $postVariableData['id'];
        }
        if (array_key_exists('d_id', $postVariableData)) {
            $this->id = $postVariableData['d_id'];
        }
        if (array_key_exists('achievement_id', $postVariableData)) {
            $this->achievement_id = $postVariableData['achievement_id'];
        }
        if (array_key_exists('achievement_name', $postVariableData)) {
            $this->achievement_name = $postVariableData['achievement_name'];
        }
        if (array_key_exists('org_level', $postVariableData)) {
            $this->org_level = $postVariableData['org_level'];
        }
    }//End of the setData() Method..

    public function viewRow()
    {
        $sql = "SELECT * FROM achievement_table WHERE id = '$this->achievement_id' LIMIT 1 ";
        $query = $this->DBH->prepare($sql);
        $query->execute();
        $result = $query->fetchobject();
        return $result; // ?  true : false;
    } //End of the isDoctorExists() Method...

    public function index($fetchMode='ASSOC'){
        $sql = "SELECT * FROM achievement_table WHERE doctor_id = $this->id ";
        $STH = $this->DBH->query($sql);

        $fetchMode = strtoupper($fetchMode);
        if(substr_count($fetchMode,'OBJ') > 0)
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);

        $arrAllData  = $STH->fetchAll();
        return $arrAllData;

    }// end of index();

    public function storeAchievement()
    {
        $count = count($this->achievement_name);
        //Utility::dd($this);
        for ($i=0; $i<$count; $i++) {
            //$arr = array($this->degree_value[$i], $this->achievement_name[$i], $this->org_level[$i], $this->id);
            $values = '"'.$this->achievement_name[$i]. '","' . $this->org_level[$i] . '",'.$this->id;
            $query = "INSERT INTO achievement_table (achievement_name,org_level,doctor_id) VALUES ($values)";
            //echo $query; die();
            $STH = $this->DBH->prepare($query);

            $result = $STH->execute();
        }
        return $result;
    }
    public function updateAchievement()
    {
        $query = "UPDATE achievement_table SET achievement_name = '$this->achievement_name', org_level = '$this->org_level[0]' WHERE doctor_id = $this->id AND id = $this->achievement_id";
        //echo $query; die();
        //Utility::dd($this);
        $STH = $this->DBH->prepare($query);
        //$STH->bindParam(':'.$this->field, $this->value);
        //$STH->bindParam(':doctor_id', $this->id);
        $result = $STH->execute();
        return $result;
    }
    public function deleteAchievement($id){
        $sql = "DELETE FROM achievement_table WHERE `id` = $id ";
        $query = $this->DBH->prepare($sql);
        $result = $query->execute();

        if ($result){
            Message::message("Achievement Deleted Successfully !");
        }else{
            Message::message("Achievement Delete Fail !");
        }
        Utility::redirect("achievement.php");
    } //End of delete() Method...


}