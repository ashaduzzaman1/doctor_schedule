<?php
require_once("../../vendor/autoload.php");
use App\Library\Library;
use App\Utility\Utility;

$objLibrary = new Library();
$objLibrary->setData($_POST);

if (array_key_exists("recoverMarked", $_POST)){
    $objLibrary->recoverMarked($_POST['marked']);
}else{
    Utility::redirect("doctorList.php");
}

if (array_key_exists("deleteMarked", $_POST)){
    $objLibrary->deleteMarked($_POST['marked']);
}else{
    Utility::redirect("doctorList.php");
}
if (array_key_exists("trashMarked", $_POST)){
    $objLibrary->trashMarked($_POST['marked']);
}else{
    Utility::redirect("doctorList.php");
}
