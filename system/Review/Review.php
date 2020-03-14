<?php
namespace App\Review;
use App\Model\Database;
use App\Message\Message;
use App\Utility\Utility;
use PDO;

class Review extends Database{
    
    public $id;
    public $rate = 0;
    public $field;
    public $value = 1;

    public function setData($postVariableData = NULL)
    {
        if (array_key_exists("id", $postVariableData)) {
            $this->id = $postVariableData['id'];
        }
        if (array_key_exists('rating', $postVariableData)) {
            $this->rate = $postVariableData['rating'];
        }
        if (array_key_exists('d_id', $postVariableData)) {
            $this->id = $postVariableData['d_id'];
        }
    }//End of the setData() Method..

    public function isDoctorExists()
    {
        $sql = "SELECT * FROM review WHERE doctor_id = '$this->id' LIMIT 1 ";
        $query = $this->DBH->prepare($sql);
        $query->execute();
        $result = $query->fetchobject();
        return $result; // ?  true : false;
    } //End of the isDoctorExists() Method...

    public function checkStar()
    {
        if ($this->rate == 5) {
            $this->field = 'five';
        }elseif($this->rate == 4){
            $this->field = 'four';
        }elseif($this->rate == 3){
            $this->field = 'three';
        }elseif($this->rate == 2){
            $this->field = 'two';
        }else{
            $this->field = 'one';
        }
    }//End of the checkStar() Method...

    public function storeReview()
    {
        $this->checkStar();
        $query = "INSERT INTO review ($this->field,doctor_id) VALUES ($this->value, $this->id)";
        //Utility::dd($this);
        //echo $query; die();
        $STH = $this->DBH->prepare($query);
        //$STH->bindParam(':'.$this->field, $this->value);
        //$STH->bindParam(':doctor_id', $this->id);
        $result = $STH->execute(array($this->field => $this->value, 'doctor_id' => $this->id));
        return $result;
    }
    public function updateReview()
    {
        $this->checkStar();
        //$query = "UPDATE review SET $this->field = :$this->field+1 WHERE doctor_id = :doctor_id";
        $query = "UPDATE review SET $this->field = $this->field+1 WHERE doctor_id = $this->id";
        //echo $query; die();
        //Utility::dd($this);
        $STH = $this->DBH->prepare($query);
        //$STH->bindParam(':'.$this->field, $this->value);
        //$STH->bindParam(':doctor_id', $this->id);
        $result = $STH->execute();
        return $result;
    }

    
}