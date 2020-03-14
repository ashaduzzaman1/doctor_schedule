<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
require_once ("../../vendor/autoload.php");

use App\Library\Library;
use App\Utility\Utility;
$object = new Library();

$object->setData($_POST);
if (array_key_exists($_POST,"deleteSchedule") || isset($_POST['deleteSchedule'])){
    $object->setData($_POST);
    $object->deleteSchedule();
    die();
}


################################# Update Information Here ##########################
$yourGmailAddress = "jobayer136501@gmail.com"; #<<<<<<<<<<<<<< Set Your Email Address
$gmailPassword = "bitm136501";   #<<<<<<<<<<<<<< Set Your Gmail Password
####################################################################################

require '../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

use App\Message\Message;
//Utility::dd($_POST);
?>

<?php
if(isset($_REQUEST['email']) && isset($_REQUEST['body'])) {
    date_default_timezone_set('Etc/UTC');

    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Tell PHPMailer to use SMTP
    $mail->isSMTP();
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 2;
    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';
    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';
    // use
    // $mail->Host = gethostbyname('smtp.gmail.com');
    // if your network does not support SMTP over IPv6
    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 587; //587
    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'tls'; //tls
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = $yourGmailAddress;
    //Password to use for SMTP authentication
    $mail->Password = $gmailPassword;
    //Set who the message is to be sent from
    $mail->setFrom($yourGmailAddress, 'PHP WARRIOR');
    //Set an alternative reply-to address
    $mail->addReplyTo($yourGmailAddress, 'PHP WARRIOR');
    //Set who the message is to be sent to
    $mail->addAddress($_REQUEST['email'], $_REQUEST['dr_name']);
    //Set the subject line
    $mail->Subject ="List of Doctor Schedule of 1 day";
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
    //Replace the plain text body with one created manually
    $mail->AltBody = 'This is a plain-text message body';


    $mail->Body = $_POST['body'];
    //Attach an image file,
    //$mail->addAttachment('images/phpmailer_mini.png');
    //send the message, check for errors
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        Message::message("Email has been sent successfully.");
        //Utility::redirect("index.php");
        ?>
        <script type="text/javascript">
            window.location.href = 'index.php';
        </script>
        <?php
        //Utility::redirect("index.php");
    }
}
?>