<?php
namespace App\WebContent;
use App\Model\Database;
use App\Message\Message;
use App\Utility\Utility;
use PDO;

class WebContent extends Database{

    public $table        = "web_content_table";
    public $id;
    public $wc_id;
    public $bmdc_id      = '';
    public $facebook_url = '';
    public $website_url  = '';


    public function setData($postVariableData = NULL)
    {

        if (array_key_exists("id", $postVariableData)){
            $this->id = $postVariableData['id'];
        }
        if (array_key_exists("d_id", $postVariableData)){
            $this->id = $postVariableData['d_id'];
        }
        if (array_key_exists("web_content_id", $postVariableData)) {
            $this->wc_id = $postVariableData['web_content_id'];
        }
        if(array_key_exists('bmdc_id',$postVariableData)){
            $this->bmdc_id = $postVariableData['bmdc_id'];
        }
        if(array_key_exists('facebook_url',$postVariableData)){
            $this->facebook_url = $postVariableData['facebook_url'];
        }
        if(array_key_exists('website_url',$postVariableData)){
            $this->website_url = $postVariableData['website_url'];
        }

    } // End setData() Method...

    public function viewRow(){
        $sql = "SELECT * FROM web_content_table WHERE id = '$this->wc_id' LIMIT 1 ";
        $query = $this->DBH->prepare($sql);
        $query->execute();
        return $query->fetchobject();
    }// End of view() Method...
    public function view(){
        $sql = "SELECT * FROM web_content_table WHERE doctor_id = '$this->id' LIMIT 1 ";
        $query = $this->DBH->prepare($sql);
        $query->execute();
        return $query->fetchobject();
    }// End of viewRow() Method...

    public function storeWebContent(){

        $query = "INSERT INTO web_content_table (bmdc_id,facebook_url,website_url,doctor_id) VALUES (:bmdc_id,:facebook_url,:website_url,:doctor_id)";
        //Utility::dd($this);
        $STH = $this->DBH->prepare($query);
        $STH->bindParam(':bmdc_id', $this->bmdc_id);
        $STH->bindParam(':facebook_url', $this->facebook_url);
        $STH->bindParam(':website_url', $this->website_url);
        $STH->bindParam(':doctor_id', $this->id);
        $result = $STH->execute();
        return $result;
        /*
        if ($result){
            Message::message("Your Web Content Added Successfully !");
        }else{
            Message::message("Your Web Content Add Fail!");
        }
        Utility::redirect('index.php'); */

    }//...End storeWebContent() method...

    public function index($fetchMode='ASSOC'){
        $sql = "SELECT * FROM web_content_table ";
        $STH = $this->DBH->query($sql);

        $fetchMode = strtoupper($fetchMode);
        if(substr_count($fetchMode,'OBJ') > 0)
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);

        $arrAllData  = $STH->fetchAll();
        return $arrAllData;

    }// end of index();


    public function updateWebContent(){
        $query = "UPDATE web_content_table SET `bmdc_id` = :bmdc_id, `facebook_url` = :facebook_url, `website_url` = :website_url  WHERE `id` = :id";

        $result = $this->DBH->prepare($query);

        $result = $result->execute(array(':bmdc_id'=>$this->bmdc_id, ':facebook_url'=>$this->facebook_url, 'website_url'=>$this->website_url, ':id'=>$this->wc_id));

//        if($result){
//            Message::message("
//             <div class=\"alert alert-success\" id='message'>
//             <strong>Success! </strong> WebContent Data has been updated  successfully.
//              </div>");
//        }
//        else {
//            Message::message("
//             <div class=\"alert alert-danger\" id='message'>
//             <strong>Error! </strong> WebContent Data updated  Fail.
//              </div>");
//        }
        return $result;
    } // End of the update() MEthod...

    public function indexPaginator($page=0,$itemsPerPage=3){

        $start = (($page-1) * $itemsPerPage);

        $sql = "SELECT * from web_content_table LIMIT $start,$itemsPerPage";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;

    }// end of indexPaginator() Method...


    public function deleteWebContent($id){
        $sql = "DELETE FROM web_content_table WHERE `id` = $id ";
        $query = $this->DBH->prepare($sql);
        $result = $query->execute();

        if ($result){
            Message::message("Web Content Deleted Successfully !");
        }else{
            Message::message("Web Content Delete Fail !");
        }
        Utility::redirect("webContent.php");
    } //End of delete() Method...


}// End of the Class .. .