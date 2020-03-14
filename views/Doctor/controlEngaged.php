<?php if(session_status()!=PHP_SESSION_ACTIVE) session_start();
require_once("../../vendor/autoload.php");
use App\Engaged\Engaged;
use App\Utility\Utility;
use App\Message\Message;

$objEngaged = new Engaged();
$objEngaged->setData($_SESSION);
$objEngaged->setData($_POST);

if (isset($_POST['store_engaged'])) {
    $result = $objEngaged->storeEngaged();
    //Utility::dd($result);
    if ($result == true) {
        Utility::redirect('webContent.php');
    } else {
        Message::message("Your Data Store fail. Please Try Again !");
        Utility::redirect('engagedWith.php');
    }
} elseif(isset($_POST['update_engaged'])){
    $result2 = $objEngaged->updateEngaged();
    if ($result2 == true) {
        Message::message("Your Data Successfully Updated !");
        Utility::redirect('engagedWith.php');
    } else {
        Message::message("Your Data updated fail!");
        Utility::redirect('engagedWith.php');
    }
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $objEngaged->deleteEngaged($id);
}else{
    
}
?>