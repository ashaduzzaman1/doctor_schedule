<?php
namespace App\Research;
use App\Model\Database;
use App\Message\Message;
use App\Utility\Utility;
use PDO;

class Research extends Database{

    public $id;
    public $paper_id;
    public $paper_name = array();
    public $doi_no  = array();
    public $journal    = array();

    public function setData($postVariableData = NULL)
    {
        if (array_key_exists("id", $postVariableData)) {
            $this->id = $postVariableData['id'];
        }
        if (array_key_exists('d_id', $postVariableData)) {
            $this->id = $postVariableData['d_id'];
        }
        if (array_key_exists('paper_id', $postVariableData)) {
            $this->paper_id = $postVariableData['paper_id'];
        }
        if (array_key_exists('paper_name', $postVariableData)) {
            $this->paper_name = $postVariableData['paper_name'];
        }
        if (array_key_exists('doi_no', $postVariableData)) {
            $this->doi_no = $postVariableData['doi_no'];
        }
        if (array_key_exists('journal', $postVariableData)) {
            $this->journal = $postVariableData['journal'];
        }
    }//End of the setData() Method..

    public function viewRow()
    {
        $sql = "SELECT * FROM research_table WHERE id = '$this->paper_id' LIMIT 1 ";
        $query = $this->DBH->prepare($sql);
        $query->execute();
        $result = $query->fetchobject();
        return $result; // ?  true : false;
    } //End of the isDoctorExists() Method...

    public function index($fetchMode='ASSOC'){
        $sql = "SELECT * FROM research_table WHERE doctor_id = $this->id ";
        $STH = $this->DBH->query($sql);

        $fetchMode = strtoupper($fetchMode);
        if(substr_count($fetchMode,'OBJ') > 0)
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);

        $arrAllData  = $STH->fetchAll();
        return $arrAllData;

    }// end of index();

    public function storePaper()
    {
        $count = count($this->paper_name);
        //Utility::dd($this);
        for ($i=0; $i<$count; $i++) {
            //$arr = array($this->paper_name[$i], $this->doi_no[$i], $this->journal[$i], $this->id);
            $values = '"'.$this->paper_name[$i].'","'.$this->doi_no[$i]. '","' . $this->journal[$i] . '",'.$this->id;
            $query = "INSERT INTO research_table (paper_name,doi_no,journal,doctor_id) VALUES ($values)";
            //echo $query; die();
            $STH = $this->DBH->prepare($query);

            $result = $STH->execute();
        }
        return $result;
    }
    public function updatePaper()
    {
        $query = "UPDATE research_table SET paper_name = '$this->paper_name', doi_no = '$this->doi_no', journal = '$this->journal' WHERE doctor_id = $this->id AND id = $this->paper_id";
        //echo $query; die();
        //Utility::dd($this);
        $STH = $this->DBH->prepare($query);
        //$STH->bindParam(':'.$this->field, $this->value);
        //$STH->bindParam(':doctor_id', $this->id);
        $result = $STH->execute();
        return $result;
    }
    public function deletePaper(){
        $sql = "DELETE FROM research_table WHERE `id` = $this->id ";
        $query = $this->DBH->prepare($sql);
        $result = $query->execute();

        if ($result){
            Message::message("Research Paper Deleted Successfully !");
        }else{
            Message::message("Research Paper Delete Fail !");
        }
        Utility::redirect("researchPaper.php");
    } //End of delete() Method...

    public function getMultipleData($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE doctor_id = '$id'";
        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $arrAllData  = $STH->fetchAll();
        return $arrAllData;
    } //End of the isDoctorExists() Method...


}