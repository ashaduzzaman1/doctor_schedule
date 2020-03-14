<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../vendor/autoload.php');
use App\User\Auth;
use App\Utility\Utility;
use App\Message\Message;


$auth= new Auth();
$auth->setData($_POST);  // this setData() is  equivalent to setData method
$status = $auth->is_registered();
//Utility::dd($status);

if($status){
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['id'] = $status->id;
    Message::message("
                <div class=\"alert alert-success\" role='alert'>
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                            <strong>Welcome!</strong> You have successfully logged in.
                </div>");
    
    return Utility::redirect('../../index.php');

}else{
    Message::message("
                <div class=\"alert alert-danger\" role='alert'>
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                            <strong>Wrong information!</strong> Please try again.
                </div>");

    return Utility::redirect('../../login.php');

}


