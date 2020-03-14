<?php
require_once("../../vendor/autoload.php");
use App\Library\Library;
use App\Utility\Utility;
use App\Message\Message;

$objLibrary = new Library();
$objLibrary->setData($_POST);
$objLibrary->setData($_FILES);

$rs = $objLibrary->storeDoctor();


if(isset($_POST['add_doctor'])){
    if ($rs == true) {
        Message::message("Doctor Add Successfully.");
    }else{
        Message::message("Doctor Add Fail  Please Try Again");
    }
    Utility::redirect('index.php');
}else{
    if ($rs == true) {
        Message::message("Registration Successful. <br /> Please Login");
    }else{
        Message::message("Registration Fail. <br /> Please Try Again");
    }
    Utility::redirect('login.php');
}
//if ($rs) {
//    $objLibrary->storeSchedule();
//}

