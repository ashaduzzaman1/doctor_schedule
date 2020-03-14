<?php
require_once("../../vendor/autoload.php");
use App\Library\Library;
use App\Utility\Utility;
use App\Message\Message;

$objLibrary = new Library();
$objLibrary->setData($_POST);
$objLibrary->setData($_FILES);

$rs = $objLibrary->storeDoctor();

if ($rs == true) {
    Message::message("Doctor Add Successfully.");
}else{
    Message::message("Doctor Add Fail  Please Try Again");
}
Utility::redirect('index.php');