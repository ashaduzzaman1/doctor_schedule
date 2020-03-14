<?php
namespace App\Schedule;
use App\Model\Database;
use App\Message\Message;
use App\Utility\Utility;
use App\Library\Library;
use PDO;

class Schedule extends Database{
    public $dayValueList = array("Sunday" =>0, "Monday" => 1, "Tuesday" => 2, "Wednesday" => 3, "Thursday" => 4, "Friday" => 5, "Saturday" => 6);
    public $getDay;
    public $d_id;
    public $dayName;
    public $selectDate;


    public function __construct(){
        parent::__construct();
    }//End of __construct..

    public function setData($d_id, $dayName, $selectDate){
        $this->d_id = $d_id;
        $this->dayName = $dayName;
        $this->selectDate = $selectDate;
    }
    
    public function setDayName($dayName){
        if (array_key_exists($dayName, $this->dayValueList)){
            $this->getDay       = $this->dayValueList[$dayName];
        }
    }
    
    public function weekRange($date){
        $ts = strtotime($date);
        $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
        return array(date('Y-m-d', $start),
            date('Y-m-d', strtotime('next saturday', $start)));
    }
    public function findNextDate($date){
        return date('Y-m-d', strtotime('+'.$this->getDay.' day', strtotime($date)));
    }

    public function checkScheduleByDay($shift){
        $sql = "SELECT * FROM booking_table WHERE doctor_id = '$this->d_id' AND booking_shift = '$shift' AND booking_date = '$this->selectDate' AND booking_day = '$this->dayName' ";
        //echo $sql; die();
        $STH = $this->DBH->prepare($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $STH->execute();
        $arrAllData  = $STH->fetchAll();
        return $arrAllData;
    }// End CheckScheduleByDay() Method...

    public function makeSerial(){
        //$query = "SELECT * FROM booking_table ";
        $sql = $this->DBH->prepare("SELECT COUNT(*) FROM booking_table WHERE doctor_id = '$this->d_id' AND booking_day = '$this->dayName' AND booking_date = '$this->selectDate' ");
        $row = $sql->execute();
        $count = $sql->fetchColumn();
        return ($count+1);
    }//End of the makeSerial() Method...
    
    public function findShift($time){
        $objLibrary = new Library();
        $objLibrary->setID($this->d_id);
        $doctorData = $objLibrary->view("doctor_info");
        $doctorScheduleData = $objLibrary->viewSchedule($doctorData->unique_id);
        $mStart = $doctorScheduleData->morning_time_from;
        $mEnd = $doctorScheduleData->morning_time_to;

        $eStart = $doctorScheduleData->evening_time_from;
        $eEnd = $doctorScheduleData->evening_time_to;

        for ($i= $mStart; $i<= $mEnd; $i++) {
            if ($i == $time){
                $result = "Morning";
                break;
            }   
        }

        for ($i= $eStart; $i<= $eEnd; $i++) {
            if ($i == $time){
                $result = "Evening";
                break;
            }
        }
        if (!$result){
            return "Morning";
        }else{
            return $result;
        }
    }
    public function checkPatientInHour($slot){
        $sql = $this->DBH->prepare("SELECT COUNT(*) FROM booking_table WHERE doctor_id = '$this->d_id' AND booking_day = '$this->dayName' AND booking_date = '$this->selectDate' AND booking_time = '$slot' ");
        $row = $sql->execute();
        $count = $sql->fetchColumn();
        //echo $count; die();
        return $count;
    }

    public function storeBooking($data = array()){
        $keys   = implode(",", array_keys($data));
        $values =":".implode(",:", array_keys($data));

        $sql    ="INSERT INTO booking_table ($keys) VALUES ($values)";
        //echo $sql; die();
        $stmt   = $this->DBH->prepare($sql);

        foreach ($data as $key => $values){
             $stmt->bindParam(":$key",$data[$key]);
        }
        $result = $stmt->execute();

        if ($result){
            Message::message("Your Booking Successful !");
        }else{
            Message::message("Your Booking Fail !");
        }
        Utility::redirect("index.php");
    }




}///End of the Schedule Class