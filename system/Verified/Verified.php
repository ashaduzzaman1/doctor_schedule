<?php
namespace App\Verified;
use App\Model\Database;
use App\Message\Message;
use App\Utility\Utility;
use PDO;

class Verified extends Database{

    public $id;
    public $degree_id = array();
    public $paper_id = array();
    public $web_content_id;

    public $institute_rate = array();
    public $paper_rating = array();

    public $bmdc_value;
    public $facebook_value;
    public $website_value;

    public function setData($postVariableData = NULL)
    {
        if (array_key_exists("id", $postVariableData)) {
            $this->id = $postVariableData['id'];
        }
        if (array_key_exists('degree_id', $postVariableData)) {
            $this->degree_id = $postVariableData['degree_id'];
        }
        if (array_key_exists('institute_rate', $postVariableData)) {
            $this->institute_rate = $postVariableData['institute_rate'];
        }

        if (array_key_exists('paper_id', $postVariableData)) {
            $this->paper_id = $postVariableData['paper_id'];
        }
        if (array_key_exists('paper_rating', $postVariableData)) {
            $this->paper_rating = $postVariableData['paper_rating'];
        }

        if (array_key_exists("web_content_id", $postVariableData)) {
            $this->web_content_id = $postVariableData['web_content_id'];
        }
        if (array_key_exists('bmdc_value', $postVariableData)) {
            $this->bmdc_value = $postVariableData['bmdc_value'];
        }
        if (array_key_exists('facebook_value', $postVariableData)) {
            $this->facebook_value = $postVariableData['facebook_value'];
        }
        if (array_key_exists('website_value', $postVariableData)) {
            $this->website_value = $postVariableData['website_value'];
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

    public function updateDegree(){
        $count = count($this->degree_id);
        //Utility::dd($this);
        for ($i=0; $i<$count; $i++) {
            $rate = $this->institute_rate[$i];
            $did  = $this->degree_id[$i];
            $query = "UPDATE degree_table SET institute_rate = $rate WHERE id = $did LIMIT 1 ";
            //echo $query; die();
            $STH = $this->DBH->prepare($query);
            $result = $STH->execute();
        }
        //return $result;
    } // End of the updateDegree() Method . . .
    public function updateResearch(){
        $count = count($this->paper_id);
        //Utility::dd($this);
        for ($i=0; $i<$count; $i++) {
            $rating = $this->paper_rating[$i];
            $pid    = $this->paper_id[$i];
            $query  = "UPDATE research_table SET paper_rating = $rating WHERE id = $pid LIMIT 1 ";
            //echo $query; die();
            $STH = $this->DBH->prepare($query);
            $STH->execute();
        }
    }// End of the updateResearch() Method . .

    public function updateWebContent()
    {
        $query = "UPDATE web_content_table SET bmdc_value = '$this->bmdc_value', facebook_value = '$this->facebook_value', website_value = '$this->website_value' WHERE id = $this->web_content_id";
        $STH = $this->DBH->prepare($query);
        $result = $STH->execute();
        return $result;
    }

}