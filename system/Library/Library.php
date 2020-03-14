<?php
namespace App\Library;
use App\Model\Database;
use App\Message\Message;
use App\Utility\Utility;
use PDO;

class Library extends Database{

    public $deleted_at;
    public $id;
    public $unique_id;
    public $name;
    public $phone;
    public $email;
    public $gender;
    public $qualification;
    public $institute;
    public $specialist_id;
    public $location;
    public $about;
    public $password;
    public $status;
    public $picture;
    public $temp_picture;
    // For schedule properties
    public $morning_vanue;
    public $morning_time_from;
    public $morning_time_to;
    public $evening_vanue;
    public $evening_time_from;
    public $evening_time_to;
    public $day = '';
    public $s_day;
    public $s_date;

    public function __construct(){
        parent::__construct();
        //if (!isset($_SESSION)) session_start();
    }//End of __construct..
    public function setID($id){
        $this->id = $id;
    }

    public function setData($postVariableData = NULL){

        if (array_key_exists("id", $postVariableData)){
            $this->id          = $postVariableData['id'];
        }
        if (array_key_exists("s_day", $postVariableData)){
            $this->s_day          = $postVariableData['s_day'];
        }
        if (array_key_exists("s_date", $postVariableData)){
            $this->s_date          = $postVariableData['s_date'];
        }
        if (array_key_exists("d_id", $postVariableData)){
            $this->id          = $postVariableData['d_id'];
        }
        if (array_key_exists("unique_id", $postVariableData)){
            $this->unique_id  = $postVariableData['unique_id'];
        }
        if (array_key_exists("name", $postVariableData)){
            $this->name = $postVariableData['name'];
        }
        if (array_key_exists("phone", $postVariableData)){
            $this->phone = $postVariableData['phone'];
        }
        if (array_key_exists("email", $postVariableData)){
            $this->email = lcfirst($postVariableData['email']);
        }
        if (array_key_exists("gender", $postVariableData)){
            $this->gender = $postVariableData['gender'];
        }
        if (array_key_exists("qualification", $postVariableData)){
            $this->qualification = $postVariableData['qualification'];
        }
        if (array_key_exists("institute", $postVariableData)){
            $this->institute = $postVariableData['institute'];
        }
        if (array_key_exists("specialist_id", $postVariableData)){
            $this->specialist_id = $postVariableData['specialist_id'];
        }
        if (array_key_exists("location", $postVariableData)){
            $this->location = $postVariableData['location'];
        }
        if (array_key_exists("about", $postVariableData)){
            $this->about = $postVariableData['about'];
        }
        if (array_key_exists("password", $postVariableData)){
            $this->password = md5($postVariableData['password']);
        }
        if (array_key_exists("status", $postVariableData)){
            $this->status = $postVariableData['status'];
        }
        if (array_key_exists("morning_vanue", $postVariableData)){
            $this->morning_vanue = $postVariableData['morning_vanue'];
        }
        if (array_key_exists("morning_time_from", $postVariableData)){
            $this->morning_time_from = $postVariableData['morning_time_from'];
        }
        if (array_key_exists("morning_time_to", $postVariableData)){
            $this->morning_time_to = $postVariableData['morning_time_to'];
        }
        if (array_key_exists("evening_vanue", $postVariableData)){
            $this->evening_vanue = $postVariableData['evening_vanue'];
        }
        if (array_key_exists("evening_time_from", $postVariableData)){
            $this->evening_time_from = $postVariableData['evening_time_from'];
        }
        if (array_key_exists("evening_time_to", $postVariableData)){
            $this->evening_time_to = $postVariableData['evening_time_to'];
        }
        if (array_key_exists("day", $postVariableData)){
            if (is_array($postVariableData['day'])){
                $this->day = implode(',', $postVariableData['day']);
            }
        }

        if (array_key_exists("picture", $postVariableData)){
            $this->picture = $postVariableData['picture']['name'];
            $this->temp_picture = $postVariableData['picture']['tmp_name'];
        }
//        if (array_key_exists("marked", $postVariableData)){
//            $this->ids        = implode(",", $postVariableData['marked']);
//        }
        //Utility::dd($this->ids);
    }// End of setData Method

    public function storeDoctor(){

        $query = "INSERT INTO doctor_info (unique_id,dr_name,phone,email,gender,qualification,institute,specialist_id,location,about,password,status,picture) VALUES (:unique_id,:dr_name,:phone,:email,:gender,:qualification,:institute,:specialist_id,:location,:about,:password,:status,:picture)";
        //$query = "INSERT INTO `doctor_info`(`unique_id`, `dr_name`, `phone`, `email`, `gender`, `qualification`, `institute`, `specialist`, `loacation`, `about`, `bmdc_id`, `status`, `picture`) VALUES (:unique_id, :dr_name, :email, :gender, :qualification, :institute, :specialist, :location, :about, :bmdc_id, :status, :picture)";
        $STH = $this->DBH->prepare($query);
        $STH->bindParam(':unique_id', $this->unique_id);
        $STH->bindParam(':dr_name', $this->name);
        $STH->bindParam(':phone', $this->phone);
        $STH->bindParam(':email', $this->email);
        $STH->bindParam(':gender', $this->gender);
        $STH->bindParam(':qualification', $this->qualification);
        $STH->bindParam(':institute', $this->institute);
        $STH->bindParam(':specialist_id', $this->specialist_id);
        $STH->bindParam(':location', $this->location);
        $STH->bindParam(':about', $this->about);
        $STH->bindParam(':password', $this->password);
        $STH->bindParam(':status', $this->status);
        $STH->bindParam(':picture', $this->picture);
        $result = $STH->execute();
        //$ss = $STH->debugDumpParams();

        if ($result){
            Message::message("Doctor info Inserted Successfully!");
            //$uploads_dir = "../../../../resource/img/picture";
            $uploads_dir = "../../resource/drPicture/";
            $target_file = $uploads_dir . $this->picture;
            $move = move_uploaded_file($this->temp_picture, $target_file);
            if ($move){
                Message::message("Doctor info and Photo Uploaded Successfully !");
            }
            //return true;
            $this->storeSchedule();
        }else{
            Message::message("Doctor Informantion Upload Fail!");
            //Utility::redirect('index.php');
            return false;
        }
        return true;
        //Utility::redirect('index.php');

    }//...End store() method...
    public function storeSchedule(){

        $query = "INSERT INTO doctor_schedule (morning_vanue,morning_time_from,morning_time_to,evening_vanue,evening_time_from,evening_time_to,sdl_day,doctor_uid) VALUES (:morning_vanue,:morning_time_from,:morning_time_to,:evening_vanue,:evening_time_from,:evening_time_to,:sdl_day,:doctor_uid)";
        $STH = $this->DBH->prepare($query);
        $STH->bindParam(':morning_vanue', $this->morning_vanue);
        $STH->bindParam(':morning_time_from', $this->morning_time_from);
        $STH->bindParam(':morning_time_to', $this->morning_time_to);
        $STH->bindParam(':evening_vanue', $this->evening_vanue);
        $STH->bindParam(':evening_time_from', $this->evening_time_from);
        $STH->bindParam(':evening_time_to', $this->evening_time_to);
        $STH->bindParam(':sdl_day', $this->day);
        $STH->bindParam(':doctor_uid', $this->unique_id);
        $result = $STH->execute();
        if ($result){
            Message::message("Data Inserted Successfully !");
            return true;
        }else{
            Message::message("Data Insertion Fail!");
            return false;
        }

        //Utility::redirect('index.php');

    }//...End storeSchedule() method...

    public function storeAll($table, $data = array()){

        $keys   = implode(",", array_keys($data));
        $values =":".implode(",:", array_keys($data));

        $sql    ="INSERT INTO $table($keys) VALUES ($values)";
        $stmt   = $this->DBH->prepare($sql);

        foreach ($data as $key => $values){
            $stmt->bindParam(":$key",$data[$key]);
        }
        $stmt->execute();

        /*
        if ($result){
            Message::message("Data Trashed Successfully !");
        }else{
            Message::message("Data Trash Fail !");
        }
        //Utility::redirect("");
        */
    } //End of StoreAll() Method

    public function index($fetchMode='ASSOC'){
        $sql = "SELECT * FROM doctor_info WHERE deleted_at IS NULL ";
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
        $sql = "SELECT * from doctor_info WHERE deleted_at IS NOT NULL ";
        $STH = $this->DBH->query($sql);

        $fetchMode = strtoupper($fetchMode);
        if(substr_count($fetchMode,'OBJ') > 0)
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);

        $arrAllData  = $STH->fetchAll();
        return $arrAllData;

    }// end of trashed();
    public function view($table){
        $sql = "SELECT * FROM $table WHERE id = $this->id LIMIT 1 ";
        $query = $this->DBH->prepare($sql);
        $query->execute();
        return $query->fetchobject();
    } //End view() Method...
    
    public function viewSpecialist(){
        $sql = "SELECT * FROM specialist_table ";
        $STH = $this->DBH->prepare($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $STH->execute();
        return $STH->fetchAll();
    } //End viewSpecialist() Method...
    public function viewSpecialistById($id){
        $sql = "SELECT * FROM specialist_table WHERE id = $id LIMIT 1 ";
        $query = $this->DBH->prepare($sql);
        $query->execute();
        return $query->fetchobject();
    } //End viewSpecialist() Method...
    
    public function viewById($table, $id){
        $sql = "SELECT * FROM $table WHERE id = $id LIMIT 1 ";
        $query = $this->DBH->prepare($sql);
        $query->execute();
        return $query->fetchobject();
    } //End view() Method...
    
    public function viewAllScheule($table, $id){
        $sql = "SELECT * FROM $table WHERE user_id = $id ";
        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $arrAllData  = $STH->fetchAll();
        return $arrAllData;
    } //End view() Method...
    
    public function checkDay($singleday, $days){
        $days = explode(',', $days);
        if (in_array($singleday, $days)){
            return true;
        }else{
            return false;
        }
    }//End of checkHobby() Method...
    
    
    public function viewSchedule($unique_id){
        $sql = "SELECT * FROM doctor_schedule WHERE doctor_uid = $unique_id LIMIT 1 ";
        $query = $this->DBH->prepare($sql);
        $query->execute();
        return $query->fetchobject();
    } //End Show() Method...

    public function timeFormat($time){
        return date("g:i a", strtotime($time.":00"));
    }
    public function updateSchedule()
    {
        $sql = "UPDATE doctor_schedule SET morning_vanue = '$this->morning_vanue', morning_time_from = '$this->morning_time_from', morning_time_to = '$this->morning_time_to', evening_vanue = '$this->evening_vanue', evening_time_from = '$this->evening_time_from', evening_time_to = '$this->evening_time_to', sdl_day = '$this->day' WHERE id = '$this->id'";
        $query = $this->DBH->prepare($sql);
        $result = $query->execute();

        if ($result) {
            Message::message("Schedule Updated Successfully !");
        } else {
            Message::message("Schedule Update Fail !");
        }
        Utility::redirect("doctorList.php");
    }//End UpdateSchedule() Method...

    public function updateDoctor(){

        if ($this->picture){
            $sql = "UPDATE `doctor_info` SET dr_name = '$this->name', phone = '$this->phone', email = '$this->email', gender = '$this->gender', qualification = '$this->qualification', institute = '$this->institute', specialist_id = '$this->specialist_id', location = '$this->location', about = '$this->about', `picture` = '$this->picture' WHERE id = ".$this->id;
            $data = $this->view("doctor_info");
            $files = '../../resource/drPicture/'.$data->picture;
            unlink($files);
            $uploads_dir = "../../resource/drPicture/";
            $target_file = $uploads_dir . $this->picture;
            $move = move_uploaded_file($this->temp_picture, $target_file);
            if ($move){
                Message::message("Picture Updated Successfully");
            }

        }else{
            //$sql = "UPDATE `doctor_info` SET `user_name` = '".$this->name."', `age` = '".$this->age."', `skills` = '".$this->skills."' WHERE `doctor_info`.`id` = ".$this->id;
            $sql = "UPDATE `doctor_info` SET dr_name = '$this->name', phone = '$this->phone', email = '$this->email', gender = '$this->gender', qualification = '$this->qualification', institute = '$this->institute', specialist_id = '$this->specialist_id', location = '$this->location', about = '$this->about' WHERE id = '$this->id' ";
        }

        $query = $this->DBH->prepare($sql);
        $result = $query->execute();

        if ($result && $move){
            Message::message("Doctor Infomation Updated Successfully !");

        }elseif($result){
            Message::message("Data Updated Successefully !");
        }else{
            Message::message("Data Update Fail !");
        }
        Utility::redirect("doctorList.php");
    }//End of Uddate() Method

    public function deleteMarked($IDs = array()){
        $this->deleted_at = time();
        if (is_array($IDs) && count($IDs)>0) {
            $this->ids = implode(",",  $IDs);

            $sql = "DELETE FROM `doctor_info` WHERE `doctor_info`.`id` IN (" . $this->ids . ")";
            $query = $this->DBH->prepare($sql);
            $result = $query->execute();

            if ($result) {
                Message::message("All Data Deleted Successfully !");
            } else {
                Message::message("Data Delete Fail !");
            }
        }else
            Message::message("No Item selected to Delete!");

        Utility::redirect("doctorList.php");
    }// End of deleteMarked()...
    public function trashMarked($IDs = array()){
        $this->deleted_at = time();
        if (is_array($IDs) && count($IDs)>0) {
            $this->ids = implode(",",  $IDs);

            $sql = "UPDATE `doctor_info` SET `deleted_at` = '" . $this->deleted_at . "' WHERE `doctor_info`.`id` IN (" . $this->ids . ")";
            $query = $this->DBH->prepare($sql);
            $result = $query->execute();

            if ($result) {
                Message::message("All Data Trashed Successfully !");
            } else {
                Message::message("Data Trash Fail !");
            }
        }else
            Message::message("No Item selected to Trash!");

        Utility::redirect("doctorList.php");
    }
    public function recoverMarked($IDs = array()){
        if (is_array($IDs) && count($IDs)>0) {
            $this->ids = implode(",", $IDs);

            $sql = "UPDATE `doctor_info` SET `deleted_at` = NULL WHERE `doctor_info`.`id` IN (" . $this->ids . ")";
            $query = $this->DBH->prepare($sql);
            $result = $query->execute();

            if ($result) {
                Message::message("All Data Recovered Successfully !");
            } else {
                Message::message("Data Recover Fail !");
            }
        }else
            Message::message("No Item selected to Recover!");

        Utility::redirect("doctorList.php");
    } //End of the recoverMarked() Method...


    public function delete($table){
        $sql = "DELETE FROM $table WHERE `id` = $this->id ";
        $query = $this->DBH->prepare($sql);
        $result = $query->execute();

        if ($result){
            Message::message("doctor Deleted Successfully !");
        }else{
            Message::message("doctor Delete Fail !");
        }
        Utility::redirect("doctorList.php");
    } //End of delete() Method...
    
    public function trash($table){
        $this->deleted_at = time();
        $sql = "UPDATE $table SET `deleted_at` = '".$this->deleted_at."' WHERE `id` = ".$this->id;
        $query = $this->DBH->prepare($sql);
        $result = $query->execute();
        
        if ($result){
            Message::message("Doctor Trashed Successfully !");
        }else{
            Message::message("Doctor Trash Fail !");
        }
        Utility::redirect("doctorList.php");
    } //End of TrashDoctor() Method...

    public function deleteSchedule(){
        $sql = "DELETE FROM booking_table WHERE doctor_id = '$this->id' AND booking_date = '$this->s_date' AND booking_day = '$this->s_day' ";
        $query = $this->DBH->prepare($sql);
        $result = $query->execute();

        if ($result){
            Message::message("Doctor Schedule Deleted Successfully !");
        }else{
            Message::message("Doctor Schedule Delete Fail !");
        }
        Utility::redirect("index.php");
    } //End of delete() Method...
    
    public function indexPaginator($page=0,$itemsPerPage=3){

        $start = (($page-1) * $itemsPerPage);

        $sql = "SELECT * from doctor_info  WHERE deleted_at IS NULL LIMIT $start,$itemsPerPage";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;

    }// end of indexPaginator() Method...



    public function trashedPaginator($page=0,$itemsPerPage=3){

        $start = (($page-1) * $itemsPerPage);

        $sql = "SELECT * from doctor_info  WHERE deleted_at IS NOT NULL LIMIT $start,$itemsPerPage";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;

    }// end of trashedPaginator();

    public function search($requestArray){
        $sql = "";
        $sql = "SELECT * FROM `doctor_info` WHERE `deleted_at` IS NULL AND (`dr_name` LIKE '%".$requestArray['search']."%' OR `qualification` LIKE '%".$requestArray['search']."%' OR `institute` LIKE '%".$requestArray['search']."%' OR `unique_id` LIKE '%".$requestArray['search']."%' )";
        //if(isset($requestArray['byTitle']) && !isset($requestArray['byAuthor']) ) $sql = "SELECT * FROM `doctor_info` WHERE `deleted_at` IS NULL AND `book_name` LIKE '%".$requestArray['search']."%'";
        //if(!isset($requestArray['byTitle']) && isset($requestArray['byAuthor']) )  $sql = "SELECT * FROM `doctor_info` WHERE `deleted_at` IS NULL AND `writter` LIKE '%".$requestArray['search']."%'";

        if ($sql != "") {
            $STH = $this->DBH->query($sql);
            if($STH){
                $STH->setFetchMode(PDO::FETCH_OBJ);
                $allData = $STH->fetchAll();
                return $allData;
            }else{
                Message::message("Sorry! No Item found!");
                return array();
            }
        }else {
            Message::message("Sorry! No Item found!");
            return array();
        }
    }// end of search()



    public function getAllKeywords()
    {
        //$data = ('dr_name', );
        $_allKeywords = array();
        $WordsArr = array();
        $sql = "SELECT * FROM `doctor_info` WHERE `deleted_at` IS NULL";

        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);

        // for each search field of dr_name block start
        //foreach ($data as $value){}
        $allData = $STH->fetchAll();
        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->dr_name);
        }

        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData= $STH->fetchAll();
        foreach ($allData as $oneData) {

            $eachString = strip_tags($oneData->dr_name);
            $eachString = trim( $eachString);
            $eachString = preg_replace( "/\r|\n/", " ", $eachString);
            $eachString = str_replace("&nbsp;","",  $eachString);
            $WordsArr   = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field of dr_name block end


        // for each search field of block start
        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData= $STH->fetchAll();
        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->qualification);
        }

        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData= $STH->fetchAll();
        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->qualification);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);
            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end


        return array_unique($_allKeywords);


    }// get all keywords


}