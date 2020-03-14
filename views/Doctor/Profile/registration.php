<?php
include_once('../../../../vendor/autoload.php');
use App\User\User;
use App\User\Auth;
use App\Message\Message;
use App\Utility\Utility;

$auth= new Auth();
$auth->setData($_POST);// this setData() is equivalent to setData()
$status  =   $auth->is_exist();
if($status){
    Message::setMessage("<div class='alert alert-danger'>
    <strong>Taken!</strong> Email has already been taken. </div>");
    return Utility::redirect($_SERVER['HTTP_REFERER']);
}else{
    $_POST['email_token'] = md5(uniqid(rand()));

    $obj= new User();
    $obj->setData($_POST); // this setData() is equivalent to setData()
    //Utility::dd($_POST);
    $obj->store();
    require '../../../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host       = "smtp.gmail.com";
    $mail->Port       = 465;
    $mail->AddAddress($_POST['email']);
    $mail->Username="jobayer136501@gmail.com";               //       your gmail address
    $mail->Password="bitm136501";                        //       your gmail password
    $mail->SetFrom('phpwarrior@gmail.com','Patient Management');
    $mail->AddReplyTo("phpwarrior@gmail.com","Patient Management");
    $mail->Subject    = "Your Account Activation Link";
    $message =  "Please click this link to verify your account: 
       http://localhost/DSM/views/main/User/Profile/emailverification.php?email=".$_POST['email']."&email_token=".$_POST['email_token'];
    $mail->MsgHTML($message);
    $mail->Send();
}
