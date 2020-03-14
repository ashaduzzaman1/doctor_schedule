<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
require_once("../../vendor/autoload.php");

use App\Library\Library;
use App\Utility\Utility;

$singleData = array();
$obj = new Library();
$obj->setData($_SESSION);
if (!isset($_SESSION['id'])){
    Utility::redirect('User/Authentication/logout.php');
}
$allData = $obj->viewAllScheule("booking_table", $_SESSION['id']);
//Utility::dd($allData);
if ($singleData == false) {
    //Utility::redirect("index.php");
}
?>
<?php include('../../resource/main/inc/header.php'); ?>
    <div class="pagetop">
        <div class="container">
            <span>Doctor Schedule Management</span>
            <h1><span>MEDICALIST</span> Your Profile Information</h1>
            <ul>
                <li><a href="index.php" title="">Home</a></li>
                <li><a href="index.php" title="">Patient</a></li>
                <li> Patient Schedule List</li>
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
                                    <div class="staff-img"><img height="500" width="400" src="../../resource/drPicture/<?php //echo $singleData->picture ?>" alt="" /></div>
                                    <div class="member-detail">
                                        <i>Doctor Schedule Management (DSM) </i>
                                        <strong>YOUR SCHEDULE LIST</strong>
                                        <span></span>
                                        <ul class="info-list">
                                            <li><strong>Booking Time</strong> || <strong>Booking Date</strong> || <strong>Booking SL</strong> || <strong>Doctor</strong></li>
                                            <hr>
                                            <?php foreach ($allData as $value){ ?>

                                            <li>
                                                <strong><?php echo $value->booking_time ?></strong>&nbsp;&nbsp;&nbsp; ||&nbsp;&nbsp;&nbsp;
                                                <strong><?php echo $value->booking_date ?></strong>&nbsp;&nbsp;&nbsp; || &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <strong><?php echo $value->booking_serial ?></strong>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ||&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a title="" href="doctorDetails.php?id=<?php echo $value->doctor_id ?>"><i class="fa fa-user-md"></i></a>
                                            </li>

                                            <?php } ?>
                                        </ul>
                                        <div class="social-icons">

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