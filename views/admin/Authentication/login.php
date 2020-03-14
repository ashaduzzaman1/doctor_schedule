<?php
if(!isset($_SESSION) )session_start();
include_once('../../../vendor/autoload.php');
use App\Signin\Signin;
use App\Utility\Utility;
use App\Message\Message;

$auth= new Signin();
$auth->setData($_POST);  // this setData() is  equivalent to setData method
$status = $auth->is_registered();
//Utility::dd($status);

if($status){
    $_SESSION['a_email'] = $_POST['a_email'];
    $_SESSION['a_id'] = $status->id;
    Message::message("
                <div class=\"alert alert-success\">
                            <strong>Welcome!</strong> You have successfully logged in.
                </div>");
    
    return Utility::redirect('../index.php');

}else{
    Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Wrong information!</strong> Please try again.
                </div>");

    return Utility::redirect('../login.php');

}