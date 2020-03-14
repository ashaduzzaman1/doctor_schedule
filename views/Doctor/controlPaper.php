<?php
session_start();
require_once("../../vendor/autoload.php");
use App\Research\Research;
use App\Utility\Utility;
use App\Message\Message;

$objResearch = new Research();
$objResearch->setData($_SESSION);
$objResearch->setData($_POST);

if (isset($_POST['store_paper'])) {
    $result = $objResearch->storePaper();
    //Utility::dd($result);
    if ($result == true) {
        Utility::redirect('achievement.php');
    } else {
        //echo "Can't insert";
        Message::message('Fail! Please try again...');
        Utility::redirect('researchPaper.php');
    }
} elseif(isset($_POST['update_paper'])){
    $result2 = $objResearch->updatePaper();
    if ($result2 == true) {
        Utility::redirect('achievement.php');
    } else {
        Message::message('Fail! Please try again...');
        Utility::redirect('researchPaper.php');
    }
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $objResearch->deletePaper();
}
?>