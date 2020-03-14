<?php if(session_status()!=PHP_SESSION_ACTIVE) session_start();
require_once("../../vendor/autoload.php");
use App\WebContent\WebContent;
use App\Utility\Utility;
use App\Message\Message;

$objWebContent = new WebContent();
$objWebContent->setData($_SESSION);
$objWebContent->setData($_POST);

if (isset($_POST['store_web_content'])) {
    $result = $objWebContent->storeWebContent();
    //Utility::dd($result);
    if ($result) {
        Message::message("Your have successfully Complete the Process !");
        Utility::redirect('index.php');
    }else {
        Message::message("Your Data Store fail. Please Try Again !");
        Utility::redirect('webContent.php');
    }
} elseif(isset($_POST['update_web_content'])){
    $result2 = $objWebContent->updateWebContent();
    if ($result2 == true) {
        Message::message("Your Data Successfully Updated !");
        Utility::redirect('webContent.php');
    }else {
        Message::message("Your Data updated fail!");
        Utility::redirect('webContent.php');
    }
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $objWebContent->deleteWebContent($id);
}else{

}
?>