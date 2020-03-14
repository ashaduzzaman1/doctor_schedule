<?php
session_start();
require_once("../../vendor/autoload.php");
use App\Review\Review;
use App\Utility\Utility;
//use App\Message\Message;

$objReview = new Review();
$objReview->setData($_POST);
$objReview->setData($_SESSION);


if (isset($_POST['rating']) && !empty($_POST['rating']))
{
    $isDoctor = $objReview->isDoctorExists();
    //Utility::dd($isDoctor);
    if ($isDoctor == false){
        $result = $objReview->storeReview();
        //Utility::dd($result);
        if($result == true) {
            echo 'Thanks for Rating . . .';
        }else {
            //echo "can't insert";
        }
    }else{
        $result2 = $objReview->updateReview();
        if($result2 == true) {
            echo 'Thanks for Rating . . .';
        }else {
            //echo "can't update";
        }
    }
}else{
    //echo 'no post data';
}