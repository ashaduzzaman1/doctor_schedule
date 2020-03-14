<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();

require_once("../../vendor/autoload.php");
use App\Library\Library;
use App\Utility\Utility;

$singleData = array();
$obj = new Library();
$obj->setData($_SESSION);

$singleData = $obj->view("doctor_info");
if ($singleData == false) {
    Utility::redirect("doctorList.php");
}
?>
<?php include "../../resource/doctor/inc/header.php"; ?>

    <!-- Start of main content description -->
    <div class="content">
        <div class="monthly-grid">
            <div class="panel panel-widget">
                <div class="panel-title">
                    Your Profile Details

                </div>
                <div class="panel-body">




                    <div class="container-fluid"><hr>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="widget-box">
                                    <div class="widget-title"> <span class="icon"> <i class="icon-calendar"></i> </span>
                                        <h5>Details of Doctor</h5>
                                    </div>
                                    <div class="widget-content nopadding">
                                        <div class="col-xs-9 col-sm-9 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


                                            <div class="panel panel-info">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Doctor's Basic Information</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-3 col-lg-3 " align="center"> <img alt="Doctor Photo" src="../../resource/drPicture/<?php echo $singleData->picture ?>" class="img-circle img-responsive"> </div>

                                                        <div class=" col-md-9 col-lg-9 ">
                                                            <table class="table table-user-information">
                                                                <tbody>
                                                                <tr>
                                                                    <td>Doctor Name:</td>
                                                                    <td><?php echo $singleData->dr_name ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Doctor ID:</td>
                                                                    <td><?php echo $singleData->unique_id ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Phone Number:</td>
                                                                    <td><?php echo $singleData->phone ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Email Address:</td>
                                                                    <td><?php echo $singleData->email ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Gender:</td>
                                                                    <td><?php echo $singleData->gender ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Doctor's Qualification:</td>
                                                                    <td><?php echo $singleData->qualification ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Educational Institute:</td>
                                                                    <td><?php echo $singleData->institute ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Location:</td>
                                                                    <td><?php echo $singleData->location ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>About Doctor:</td>
                                                                    <td><?php echo $singleData->about ?></td>
                                                                </tr>


                                                                </tbody>
                                                            </table>
                                                        </div><!--End of col-md-9 col-lg-9  class-->
                                                    </div><!--End of row class-->
                                                </div><!--End of panel-body class-->

                            <div class="panel-footer">
                                 <a class="btn btn-sm btn-primary" type="button" data-toggle="tooltip" data-original-title="" href="#">
                                   <i class="glyphicon glyphicon-move"></i>
                                </a>
								<span class="pull-right">
									<a onclick="return confirm('Are you want to Edit Doctor?')" class="btn btn-sm btn-warning" type="button" data-toggle="tooltip" data-original-title="Edit this doctor" href="updateDoctorInfo.php?id=<?php echo $singleData->id; ?>">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
								</span>
                            </div>

                                            </div><!--End of panel panel-info class ---End Basic info -- -->
                                            <!--Start Doctor schedule info --->
                                            <?php
                                            $ob = new Library();
                                            $sdl_data = $ob->viewSchedule($singleData->unique_id);
                                            ?>
                                            <div class="panel panel-info">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Doctor's Schedule Information</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">

                                                        <div class=" col-md-9 col-lg-9 ">
                                                            <table class="table table-user-information">
                                                                <tbody>
                                                                <tr>
                                                                    <td> Morning Vanue:</td>
                                                                    <td><?php echo $sdl_data->morning_vanue ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Morning Time From:</td>
                                                                    <td><?php echo $ob->timeFormat($sdl_data->morning_time_from); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Morning Time To:</td>
                                                                    <td><?php echo $ob->timeFormat($sdl_data->morning_time_to); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Evening Vanue:</td>
                                                                    <td><?php echo $sdl_data->evening_vanue ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Evening Time From:</td>
                                                                    <td><?php echo $ob->timeFormat($sdl_data->evening_time_from); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Evening Time To:</td>
                                                                    <td><?php echo $ob->timeFormat($sdl_data->evening_time_to); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Doctor's working Days:</td>
                                                                    <td><?php echo $sdl_data->sdl_day ?></td>
                                                                </tr>


                                                                </tbody>
                                                            </table>
                                                        </div><!--End of col-md-9 col-lg-9  class-->
                                                    </div><!--End of row class-->
                                                </div><!--End of panel-body class-->
                              <div class="panel-footer">
                                      <a class="btn btn-sm btn-primary" type="button" data-toggle="tooltip" data-original-title="" href="#">
                                          <i class="glyphicon glyphicon-move"></i>
                                      </a>
								<span class="pull-right">
									<a onclick="return confirm('Are you want to Edit the Doctor Schedule?')" class="btn btn-sm btn-warning" type="button" data-toggle="tooltip" data-original-title="Edit this doctor Schedule" href="updateDoctorSchedule.php?id=<?php echo $singleData->id; ?>">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
								</span>
                              </div>
                                            </div><!--End of panel panel-info class and doctor shedule info -->



                                        </div><!--End of Col-sm col-lg-3-5--- class-->
                                    </div><!--End of widget-content nopadding class-->
                                </div><!--End of widget-box class-->
                            </div> <!--End of span12 class-->
                        </div><!--End of row-fluid class-->
                    </div> <!--End of container-fluid class-->










                </div>
            </div>
        </div>
        <!--end main area description -->

<?php include "../../resource/doctor/inc/footer.php"; ?>