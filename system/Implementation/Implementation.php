<?php
namespace App\Implementation;
use App\Model\Database;
use App\Message\Message;
use App\Utility\Utility;
use PDO;

use App\Degree\Degree;
use App\Research\Research;
use App\Achievement\Achievement;
use App\Engaged\Engaged;
use App\WebContent\WebContent;
/*
$objLibrary = new Library();
$objDoctor = new Doctor();
$objDegree = new Degree();
$objResearch = new Research();
$objAchievement = new Achievement();
$objEngaged = new Engaged();
$objWebContent = new WebContent();
*/

class Implementation extends Database{

    public $id;
    public $degree_id = array();
    public $paper_id = array();
    public $web_content_id;

    public $institute_rate = array();
    public $paper_rating = array();

    public $bmdc_value;
    public $facebook_value;
    public $website_value;

    public $ex = 0;
    public $totalFive = 0;
    public $totalFour =0;
    public $totalThree = 0;
    public $totalTwo = 0;
    public $totalOne = 0;
    public $overallNumber = 0;

    public $singleFive = 0;
    public $singleFour = 0;
    public $singleThree = 0;
    public $singleTwo = 0;
    public $singleOne = 0;
    public $individualNumber = 0;

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

    public function viewRowById($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE doctor_id = '$id' LIMIT 1 ";
        $query = $this->DBH->prepare($sql);
        $query->execute();
        $result = $query->fetchobject();
        return $result;
    } //End of the viewRowById() Method...

    public function viewRowByField($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE id = '$id' LIMIT 1 ";
        $query = $this->DBH->prepare($sql);
        $query->execute();
        $result = $query->fetchobject();
        return $result;
    } //End of the viewRowByField() Method...

    public function maximumValue($field, $table)
    {
        $sql = "SELECT MAX($field) FROM $table";
        $query = $this->DBH->prepare($sql);
        $query->execute();
        $result = $query->fetch();
        return $result["MAX($field)"];
    }// End of the maximumValue() Method

    public function minimumValue($field, $table)
    {
        $sql = "SELECT MIN($field) FROM $table";
        $query = $this->DBH->prepare($sql);
        $query->execute();
        $result = $query->fetch();
        return $result["MIN($field)"];
    }//End of the minimumValue() Method

    public function findSingleValue($field, $table)
    {
        $sql = "SELECT $field FROM $table WHERE doctor_id = $this->id";
        $query = $this->DBH->prepare($sql);
        $query->execute();
        $result = $query->fetchobject();
        if ($result)
            return $result->$field;
        else
            return 0;
    }
    public function normalization($value, $max, $min)
    {
        if ($value>$min) {
            return ($value - $min) / ($max - $min);
        }else{
            return 0; }
    }
    public function overallTotalStar()
    {
        $sql = "SELECT * FROM review ";
        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allStar  = $STH->fetchAll();
        foreach ($allStar as $star){
            $this->totalFive = $this->totalFive + $star->five;
            $this->totalFour =  $this->totalFour + $star->four;
            $this->totalThree = $this->totalThree + $star->three;
            $this->totalTwo = $this->totalTwo + $star->two;
            $this->totalOne = $this->totalOne + $star->one;
        }
        $this->overallNumber = ($this->totalFive + $this->totalFour + $this->totalThree + $this->totalTwo + $this->totalOne);
        //Utility::dd($this->overallNumber);

    }
    public function individualTotalStar()
    {
        $sql = "SELECT * FROM review WHERE doctor_id = $this->id ";
        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $star  = $STH->fetchObject();
        if ($star == false){
            return 0;
        }
            $this->singleFive =  $star->five;
            $this->singleFour =  $star->four;
            $this->singleThree = $star->three;
            $this->singleTwo = $star->two;
            $this->singleOne = $star->one;
        $this->individualNumber = ($this->singleFive + $this->singleFour + $this->singleThree + $this->singleTwo + $this->singleOne);
        //Utility::dd($this->individualNumber);

    }
    public function overallAvg()
    {
        //$this->overallTotalStar();
        return (($this->totalFive * 5) + ($this->totalFour * 4) + ($this->totalThree * 3) + ($this->totalTwo * 2) + ($this->totalOne * 1))/$this->overallNumber;
    }
    public function individualAvg()
    {
        //$this->individualTotalStar();
        if ($this->individualNumber == 0)
            return 0;
        else
            return  (($this->singleFive * 5) + ($this->singleFour * 4) + ($this->singleThree * 3) + ($this->singleTwo * 2) + ($this->singleOne * 1))/$this->individualNumber;
    }

    //Start the researchPaper() Method
    public function patientReview($percentage)
    {
        $this->overallTotalStar();
        $this->individualTotalStar();
        if ($this->individualNumber == 0) {
            return 0;
        }else{
            $value = (($this->overallNumber * $this->overallAvg()) + ($this->individualNumber * $this->individualAvg()))
                / ($this->overallNumber + $this->individualNumber);

            return ($value * $percentage) / 5;
        }
    }//End the patientReview() Method...

    public function maxMultiValue($field, $table)
    {
        $allRating = array();
        $sql = "SELECT DISTINCT(doctor_id) FROM $table";
        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allId  = $STH->fetchAll();
        foreach ($allId as $id){
            $allRating[] = $this->sumDoctorValue($id->doctor_id, $field, $table);
        }
        return max($allRating);
    }
    public function maxMultiValues($field, $table)
    {
        $allRating = array();
        $sql = "SELECT DISTINCT(doctor_id) FROM $table";
        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allId  = $STH->fetchAll();
        foreach ($allId as $id){
            $allRating[] = $this->sumDoctorValue($id->doctor_id, $field, $table);
        }
        return max($allRating);
    }
    public function minMultiValue($field, $table)
    {
        $allRating = array();
        $sql = "SELECT DISTINCT(doctor_id) FROM $table";
        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allId  = $STH->fetchAll();
        foreach ($allId as $id){
            $allRating[] = $this->sumDoctorValue($id->doctor_id, $field, $table);
        }
        return min($allRating);
    }
    public function sumDoctorValue($id, $field, $table)
    {
        $sum = 0;
        $sql = "SELECT * FROM $table WHERE doctor_id = $id ";
        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData  = $STH->fetchAll();
        foreach ($allData as $data){
            $sum = $sum + $data->$field;
        }
        return $sum;
    }
    public function singleMaxValue($id, $field, $table)
    {
        $allValues= array();
        $sql = "SELECT * FROM $table WHERE doctor_id = $id ";
        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData  = $STH->fetchAll();
        foreach ($allData as $data){
            $allValues[] = $data->$field;
        }
        if (empty($allValues))
            return false;
        else
            return max($allValues);
    }
    //Start the degree() Method
    public function degree($percentage)
    {
        $value = $this->sumDoctorValue($this->id,'degree_value', 'degree_table'); //wrong...
        $max   = $this->maxMultiValue('degree_value', 'degree_table');
        $min   = $this->minMultiValue('degree_value', 'degree_table');
        //echo 'val-'.$value,$max,$min;
        $normaValue = $this->normalization($value,$max, $min);
        return $normaValue * $percentage;
    }

    //Start the university() Method
    public function university($percentage)
    {
        $value = $this->singleMaxValue($this->id, 'institute_rate', 'degree_table');
        $max   = $this->maximumValue('institute_rate', 'degree_table');
        $min   = $this->minimumValue('institute_rate', 'degree_table');
        //echo 'val-'.$value,$max,$min;
        if ($value == false)
            return 0;
        else
            $normaValue = $this->normalization($value,$max, $min);
        return (1-$normaValue) * $percentage;
    }

    //Start the researchPaper() Method
    public function researchPaper($percentage)
    {
        $value = $this->sumDoctorValue($this->id, 'paper_rating', 'research_table');
        $max   = $this->maxMultiValue('paper_rating', 'research_table');
        $min   = $this->minMultiValue('paper_rating', 'research_table');
        $normaValue = $this->normalization($value,$max, $min);
        return $normaValue * $percentage;
    }
    //Start the achievement() Method
    public function achievement($percentage)
    {
        $value = $this->sumDoctorValue($this->id, 'org_level', 'achievement_table');
        $max   = $this->maxMultiValue('org_level', 'achievement_table');
        $min   = $this->minMultiValue('org_level', 'achievement_table');
        $normaValue = $this->normalization($value,$max, $min);
        return $normaValue * $percentage;
    } //End of achievement() Method

    public function membership($percentage)
    {
        $value = $this->sumDoctorValue($this->id, 'org_level', 'engaged_table');
        $max   = $this->maxMultiValue('org_level', 'engaged_table');
        $min   = $this->minMultiValue('org_level', 'engaged_table');
        $normaValue = $this->normalization($value,$max, $min);
        return $normaValue * $percentage;
    } //End of achievement() Method

    //Start the BMDC() Method
    public function bmdc($percentage){
        $result = $this->viewRowById('web_content_table', $this->id);
        if ($result != false)
            $value = $result->bmdc_value;
        else
            return 0;
        if ($value == 1){
            return $percentage*1;
        }else{
            return 0;
        }
    } // End of the bmdc() method

    public function website($percentage)
    {
        $value = $this->findSingleValue('website_value', 'web_content_table');
        $max = $this->maximumValue('website_value', 'web_content_table');
        $min = $this->minimumValue('website_value', 'web_content_table');
        if ($value == false)
            return 0;
        else
            $normaVal = $this->normalization($value,$max, $min);
        return (1-$normaVal)*$percentage;
    }// End of the website() method..

    public function socialNetwork($percentage)
    {
        $value = $this->findSingleValue('facebook_value', 'web_content_table');
        $max   = $this->maximumValue('facebook_value', 'web_content_table');
        $min   = $this->minimumValue('facebook_value', 'web_content_table');
        //echo $value.' - '.$max.' - '.$min; die();
        $normaVal = $this->normalization($value,$max, $min);
        //echo $normaVal; die();
        return $normaVal*$percentage;
    }// End of the facebook() method...

    /** Save the doctor dating Point into database  **/

    public function saveRating($rate)
    {
//        $query = "UPDATE `doctor_info` SET `rating_point` = :rating_point, WHERE `doctor_info`.`id` = :id";
//        $result = $this->DBH->prepare($query);
//        $ret = $result->execute(array(':rating_point' => $rate, ':id' => $this->id));
        $ret = $this->DBH->query("UPDATE `doctor_info` SET `rating_point`= $rate WHERE id = $this->id");
        $ret = $ret->execute();
    }
    public function ResetObject() {
        foreach ($this as $key => $value) {
            if ($key != 'DBH')
               //unset($this->$key);
            $this->$key = NULL;
        }
    }//End ResetObject of Class

}// End of the Class.....