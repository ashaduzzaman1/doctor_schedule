<?php
session_start();
require_once("../../vendor/autoload.php");
use App\Achievement\Achievement;
use App\Utility\Utility;
use App\Message\Message;

$objAchievement = new Achievement();
$objAchievement->setData($_SESSION);
$objAchievement->setData($_POST);

if (isset($_POST['store_achievement'])) {
    $result = $objAchievement->storeAchievement();
    //Utility::dd($result);
    if ($result == true) {
        Utility::redirect('engagedWith.php');
    } else {
        echo "Can't insert";
        Utility::redirect('achievement.php');
    }
} elseif(isset($_POST['update_achievement'])){
    $result2 = $objAchievement->updateAchievement();
    if ($result2 == true) {
        Utility::redirect('achievement.php');
    } else {
        //echo "Can't update";
        Utility::redirect('achievement.php');
    }
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $objAchievement->deleteAchievement($id);
}
?>