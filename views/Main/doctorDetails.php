<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
require_once("../../vendor/autoload.php");

use App\Library\Library;
use App\Utility\Utility;

$singleData = array();
$obj = new Library();
$obj->setData($_GET);

$singleData = $obj->view("doctor_info");
if ($singleData == false) {
    Utility::redirect("index.php");
}
?>
<?php include('../../resource/main/inc/header.php'); ?>
    <div class="pagetop">
        <div class="container">
            <span>What We Actually Do?</span>
            <h1><span>MEDICALIST</span> Doctor DETAIL</h1>
            <ul>
                <li><a href="index.php" title="">Home</a></li>
                <li><a href="index.php" title="">Doctor</a></li>
                <li> Single Doctor</li>
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
                                    <div class="staff-img"><img height="500" width="400" src="../../resource/drPicture/<?php echo $singleData->picture ?>" alt="" /></div>
                                    <div class="member-detail">
                                        <i>Provide Comprehensive Quality Care</i>
                                        <h2>I' m <strong><?php echo $singleData->dr_name ?></strong></h2>
                                        <span>Orthopaedic</span>
                                        <ul class="info-list">
                                            <li><strong>Address:</strong><?php echo $singleData->location ?></li>
                                            <li><strong>E-mail:</strong><?php echo $singleData->email ?></li>
                                            <li><strong>Phone:</strong><?php echo $singleData->phone ?></li>
                                            <?php
                                            $obj = new Library();
                                            $schedule = $obj->viewSchedule($singleData->unique_id);
                                            $from = $schedule->morning_time_from;
                                            $to = $schedule->morning_time_to;
                                            $from_e = $schedule->morning_time_from;
                                            $to_e = $schedule->morning_time_to;
                                            ?>
                                            <li><strong>TIMING MORNING:</strong><?php echo $obj->timeFormat($from); ?> - <?php echo $obj->timeFormat($to); ?></li>
                                            <li><strong><i>TIMING EVENING</i></strong> <?php echo $obj->timeFormat($from_e); ?> - <?php echo $obj->timeFormat($to_e); ?></li>
                                        </ul>
                                        <a class="dark-btn" href="appointment.php?d_id=<?php echo $singleData->id ?>" title="Book The Doctor">
                                            <i class="fa fa-user"></i>
                                            BOOK NOW
                                        </a>
                                        <div class="social-icons">
                                            <a title="" href="#"><i class="fa fa-facebook"></i></a>
                                            <a title="" href="#"><i class="fa fa-linkedin"></i></a>
                                            <a title="" href="#"><i class="fa fa-twitter"></i></a>
                                            <a title="" href="#"><i class="fa fa-skype"></i></a>
                                        </div>
                                    </div><!-- Member Detail -->
                                </div>
                            </div><!-- Member Introduction -->

                            <div class="staff-tabs">
                                <div class="staff-tabs-selectors">
                                    <ul class="tabs">
                                        <li class="tab"><a href="#test1"><i class="fa fa-user"></i> About Me</a></li>
                                        <li class="tab"><a class="active" href="#test2"><i class="fa fa-pie-chart"></i> Professional Skills</a></li>
                                        <li class="tab"><a href="#test3"><i class="fa fa-calendar-o"></i> Availablity Calendar</a></li>
                                    </ul>
                                </div>
                                <div class="staff-tab-content">
                                    <div id="test1">
                                        <p>Duis sed odio sit amet nibh vulate cursus sit amet mauris.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed no mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris ine rat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim et ven veni am, quis nostrud exercitation ullamco laboris nisi ut aliquip ex commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse er os cillum dolore eu fugiat nulla pariatur.</p>
                                        <p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit. Class apte nt taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.</p>
                                    </div>
                                    <div id="test2">
                                        <p>Duis sed odio sit amet nibh vulate cursus sit amet mauris.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed no mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, er inceptos himenaeos. Mauris inerat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque.</p>
                                        <div class="all-skills">
                                            <div class="row">
                                                <div class="col s12 m6 l6">
                                                    <div class="progess-container">
                                                        <strong>Cosmetic Surgery</strong>
                                                        <span>80%</span>
                                                        <div class="progress"><div class="determinate" style="width: 80%"></div></div>
                                                    </div><!-- Progress Container -->
                                                </div>
                                                <div class="col s12 m6 l6">
                                                    <div class="progess-container">
                                                        <strong>Dental Surgeon</strong>
                                                        <span>86%</span>
                                                        <div class="progress"><div class="determinate" style="width: 86%"></div></div>
                                                    </div><!-- Progress Container -->
                                                </div>
                                                <div class="col s12 m6 l6">
                                                    <div class="progess-container">
                                                        <strong>Pediatrician</strong>
                                                        <span>65%</span>
                                                        <div class="progress"><div class="determinate" style="width:65%"></div></div>
                                                    </div><!-- Progress Container -->
                                                </div>
                                                <div class="col s12 m6 l6">
                                                    <div class="progess-container">
                                                        <strong>General Doctor</strong>
                                                        <span>90%</span>
                                                        <div class="progress"><div class="determinate" style="width:90%"></div></div>
                                                    </div><!-- Progress Container -->
                                                </div>
                                            </div>
                                        </div><!-- All Skills -->
                                    </div>
                                    <div id="test3">
                                        <p>Duis sed odio sit amet nibh vulate cursus sit amet mauris.Morbi accumsan psum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed no mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris ine rat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque.</p>


                                        <div class="appointment-tab">
                                            <div class="row">
                                                <div class="col s12 m12 l5">
                                                    <div class="appointment-details">
                                                        <span>Provide Comprehensive</span>
                                                        <h4>Make An <span>Appointment</span></h4>
                                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam adipiscing elit orem.</p>
                                                    </div><!-- Appointment Details -->
                                                </div>
                                                <div class="col s12 m12 l7">
                                                    <div class="appointment-form">
                                                        <form>
                                                            <div class="row">
                                                                <div class="input-field col s12">
                                                                    <select>
                                                                        <option value="" disabled selected>Choose Service</option>
                                                                        <option value="1">Option 1</option>
                                                                        <option value="2">Option 2</option>
                                                                        <option value="3">Option 3</option>
                                                                    </select>
                                                                </div>
                                                                <div class="input-field simple-label col s6">
                                                                    <label>DATE FROM *</label>
                                                                </div>
                                                                <div class="input-field col s6">
                                                                    <input type="date" class="datepicker" />
                                                                </div>
                                                                <div class="input-field simple-label col s6">
                                                                    <label>DESIRABLE TIME *</label>
                                                                </div>
                                                                <div class="input-field col s6">
                                                                    <select>
                                                                        <option value="" disabled selected>Select Time</option>
                                                                        <option value="1">01:00 AM</option>
                                                                        <option value="2">05:00 PM</option>
                                                                        <option value="3">09:00 PM</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col s12">
                                                                    <p>All Fields With An ( * ) Are Required.</p>
                                                                </div>
                                                                <div class="input-field col s12">
                                                                    <button class="coloured-btn" type="submit"><i class="fa fa-recycle"></i> Check Now</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div><!-- Staff Detail -->
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include('../../resource/main/inc/footer.php'); ?>