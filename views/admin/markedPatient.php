<?php
require_once("../../vendor/autoload.php");
use App\Patient\Patient;
use App\Utility\Utility;

$objPatient = new Patient();
$objPatient->setData($_POST);

if (array_key_exists("recoverMarkAll", $_POST))
{
    $objPatient->recoverMarked($_POST['marked']);
    
}elseif (array_key_exists("deleteMarkAll", $_POST))
{
    $objPatient->deleteMarked($_POST['marked']);
    
}elseif (array_key_exists("trashMarkAll", $_POST))
{
    $objPatient->trashMarked($_POST['marked']);
    
}else
{
    Utility::redirect("userList.php");
}
