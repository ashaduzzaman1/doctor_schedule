<?php
include_once('../../../../vendor/autoload.php');
use App\User\User;
use App\User\Auth;
use App\Message\Message;
use App\Utility\Utility;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$auth= new Auth();
$auth->setData($_POST);// this setData() is equivalent to setData()
$status  =   $auth->is_exist();

if($status){
    Message::setMessage("<div class='alert alert-danger'>
    <strong>Taken!</strong> Email has already been taken. </div>");
    return Utility::redirect($_SERVER['HTTP_REFERER']);
}else{
    //Utility::dd($_POST);
    $_POST['email_token'] = md5(uniqid(rand()));

    $obj= new User();
    $obj->setData($_POST); // this setData() is equivalent to setData()
    //Utility::dd($_POST);
    $result = $obj->store();


    if ($result) {
//        require '../../../../vendor/phpMailer/phpmailer/src/Exception.php';
//        require '../../../../vendor/phpMailer/phpmailer/src/PHPMailer.php';
//        require '../../../../vendor/phpMailer/phpmailer/src/SMTP.php';
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 1;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'jobayer136501@gmail.com';                 // SMTP username
            $mail->Password = 'bitm136501';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('sohojlovvo@gmail.com', 'Sohojlovvo - Patient Management');
            $mail->addAddress($_POST['email'], $_POST['patient_name']);     // Add a recipient
            $mail->addAddress('sohojlovvo@gmail.com');               // Name is optional
            $mail->addReplyTo('sohojlovvo@gmail.com', 'Registration Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = "Sohojlvvo - Your Account Activation Link";
            $url = "http://sohojlovvo.com";// . $_SERVER['REQUEST_URI'];
            $message =  "<b>Sohojlovvo.com</b> /n Please click this link to verify your account: ".
                $url."/views/main/User/Profile/emailverification.php?email=".$_POST['email']."&email_token=".$_POST['email_token'];
            $mail->Body    = $message;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent--'; exit();
            die();
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            exit();
            die();
        }
        /*
        //require '../../../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
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
        $mail->SetFrom('sohojlovvo@gmail.com','Sohojlovvo - Patient Management');
        $mail->AddReplyTo("sohojlovvo@gmail.com","Sohojlvvo - Patient Management");
        $mail->Subject    = "Sohojlvvo - Your Account Activation Link";
        $url = "http://sohojlovvo.com";// . $_SERVER['REQUEST_URI'];
        $message =  "Sohojlovvo.com /n Please click this link to verify your account: ".
        $url."/views/main/User/Profile/emailverification.php?email=".$_POST['email']."&email_token=".$_POST['email_token'];
        $mail->MsgHTML($message);
        $mail->Send();
        */

        Message::message("
                <div class=\"alert alert-success\">
                            <strong>Success!</strong> Data has been stored successfully, Please check your email and active your account.
                </div>");
        return Utility::redirect($_SERVER['HTTP_REFERER']);
    } else {
        Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Failed!</strong> Data has not been stored successfully.
                </div>");
        return Utility::redirect($_SERVER['HTTP_REFERER']);
    }
}
