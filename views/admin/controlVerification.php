<?php
session_start();
require_once("../../vendor/autoload.php");
use App\Verified\Verified;
use App\Utility\Utility;
use App\Message\Message;

$objVerified = new Verified();
$objVerified->setData($_SESSION);
$objVerified->setData($_POST);

if (isset($_POST['verified_data'])) {
    if (isset($_POST['degree_id'])){
        $objVerified->updateDegree();
    }
    if (isset($_POST['paper_id'])){
        $objVerified->updateResearch();
    }
    if (isset($_POST['web_content_id'])){
        $objVerified->updateWebContent();
    }
    Utility::redirect('verificationDocInfo.php');
}else{
    Message::message('No Data found to update!');
    Utility::redirect('inex.php');
}


?>