<?php
session_start();
require_once("../../vendor/autoload.php");
use App\Degree\Degree;
use App\Utility\Utility;
use App\Message\Message;

$objDegree = new Degree();
$objDegree->setData($_SESSION);
$objDegree->setData($_POST);

if (isset($_POST['store_degree'])) {
    $result = $objDegree->storeDegree();
    //Utility::dd($result);
    if ($result == true) {
        Utility::redirect('researchPaper.php');
    } else {
        echo "Can't insert";
        Utility::redirect('degreeStore.php');
    }
} elseif(isset($_POST['update_degree'])){
    $result2 = $objDegree->updateDegree();
    if ($result2 == true) {
        Utility::redirect('degreeStore.php');
    } else {
        //echo "Can't update";
        Utility::redirect('degreeStore.php');
    }
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $objDegree->deleteDegree();
}
?>