<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
require_once("../../vendor/autoload.php");

use App\Library\Library;
use App\Utility\Utility;

$singleData = array();
$obj = new Library();
$obj->setData($_SESSION);
//Utility::dd($_SESSION);
$singleData = $obj->viewById("patient",$_SESSION['id']);
if ($singleData == false) {
    Utility::redirect("index.php");
}
?>
<?php include('../../resource/main/inc/header.php'); ?>
    <div class="pagetop">
        <div class="container">
            <span>Doctor Schedule Management</span>
            <h1><span>MEDICALIST</span> Your Profile Information</h1>
            <ul>
                <li><a href="index.php" title="Home">Home</a></li>
                <li><a href="patientProfile.php" title="Profile">Your Profile</a></li>
            </ul>
        </div>
    </div>


    <section>
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col column s12 m12 l12">
                        <div class="staff-detail">
                            <div class="member-introduction">
                                <div class="member-wrapper">
                                   
                                    <div class="member-detail">
                                        <h2>Name -  <strong><?php echo $singleData->patient_name ?></strong></h2>
                                        <span></span>
                                        <ul class="info-list">
                                            <li><strong>Address: </strong><?php echo $singleData->patient_address ?></li>
                                            <li><strong>E-mail: &nbsp;&nbsp;&nbsp;&nbsp;</strong><?php echo $singleData->email ?></li>
                                            <li><strong>Phone:  &nbsp;&nbsp;&nbsp;&nbsp;</strong><?php echo $singleData->patient_phone ?></li>
                                            <li><strong>Gender: </strong><?php echo $singleData->gender ?></li>
                                        </ul>
                                        <div class="social-icons">
                                            <a title="" href="#"><i class="fa fa-facebook"></i></a>
                                            <a title="" href="#"><i class="fa fa-linkedin"></i></a>
                                            <a title="" href="#"><i class="fa fa-twitter"></i></a>
                                            <a title="" href="#"><i class="fa fa-skype"></i></a>
                                        </div>
                                    </div><!-- Member Detail -->
                                </div>
                            </div><!-- Member Introduction -->

                        </div><!-- Staff Detail -->
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include('../../resource/main/inc/footer.php'); ?>