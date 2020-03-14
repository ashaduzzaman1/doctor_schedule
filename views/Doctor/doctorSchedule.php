<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
require_once "../../vendor/autoload.php";
use App\Library\Library;
use App\Schedule\Schedule;
use App\Utility\Utility;

$objSchedule = new Schedule();

$objLibrary = new Library();
date_default_timezone_set('Asia/Dhaka');

$date = date("Y-m-d");
$day = date("l");
$currentDay = date("l");
//unset($_SESSION['day']);

$_SESSION['date'] = $date;
$objLibrary->setData($_SESSION);
$isDoctorExists =  $objLibrary->view("doctor_info");

    if ($isDoctorExists == true){

    }else{
        Utility::redirect('index.php');
    }

if (isset($_GET['dayName'])){
    $day = $_GET['dayName'];
    $_SESSION['dayName'] = $_GET['dayName'];
}else{
    $_SESSION['dayName'] = $day;
}
//Utility::dd($_SESSION);
?>
<?php include "../../resource/doctor/inc/header.php"; ?>

    <!-- Start of main content description -->
<div class="content" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
   <div class="women_main">
       <div class="panel-title">
           Doctor Schedule Report By Day

       </div>

       <select  class="select2-container"  name="dayName" id="dayName" onchange="javascript:location.href = this.value;" >
           <?php
           if($day == "Saturday") echo '<option value="?dayName=Saturday" selected > Saturday  </option>';
           else echo '<option  value="?dayName=Saturday"> Saturday </option>';

           if($day == "Sunday") echo '<option value="?dayName=Sunday" selected > Sunday  </option>';
           else echo '<option  value="?dayName=Sunday"> Sunday </option>';

           if($day == "Monday") echo '<option value="?dayName=Monday" selected > Monday  </option>';
           else echo '<option  value="?dayName=Monday"> Monday </option>';

           if($day == "Thuesday") echo '<option value="?dayName=Thuesday" selected > Thuesday  </option>';
           else echo '<option  value="?dayName=Thuesday"> Thuesday </option>';

           if($day == "Wednesday") echo '<option value="?dayName=Wednesday" selected > Wednesday  </option>';
           else echo '<option  value="?dayName=Wednesday"> Wednesday </option>';

           if($day == "Thursday") echo '<option value="?dayName=Thursday" selected > Thursday  </option>';
           else echo '<option  value="?dayName=Thursday"> Thursday </option>';

           if($day == "Friday") echo '<option value="?dayName=Friday" selected > Friday  </option>';
           else echo '<option  value="?dayName=Friday"> Friday </option>';
           ?>
       </select>
       <div class="clearfix"></div>
        <?php
        $list = $objSchedule->weekRange($date);
        $objSchedule->setDayName($day);
        $selectDate = $objSchedule->findNextDate($list[0]);
        //Utility::dd($next);
        //echo $_SESSION['d_id'].' - '.$_SESSION['dayName'].' - '.$selectDate;
        $objSchedule->setData($_SESSION['d_id'], $_SESSION['dayName'], $selectDate);
        $rowMorning  = $objSchedule->checkScheduleByDay("Morning");
        //var_dump($rowMorning);
        ?>
       
       <?php
            $objLibrary->setData($_SESSION);
            $doctorData = $objLibrary->view("doctor_info");
            $doctorScheduleData = $objLibrary->viewSchedule($doctorData->unique_id);
       ?>
       <center>
           <h2>Doctor Schedule Morning Shift </h2>
           <h4> Doctor Name: <strong><?php echo $doctorData->dr_name; ?></strong> || Doctor Phone: <strong><?php echo $doctorData->phone; ?> </strong>||
               Morning Shift Time: <strong><?php echo $objLibrary->timeFormat($doctorScheduleData->morning_time_from).' - '.$objLibrary->timeFormat($doctorScheduleData->morning_time_to); ?></strong>
               || Vanue: <strong><?php echo $doctorScheduleData->morning_vanue ?></strong> </h4>
           <p>Booking Date: <strong><?php echo $selectDate; ?> </strong> | Booking Day: <strong> <?php echo $day; ?> </strong> </p>
       </center>


       <table class="table table-hover">
           <thead>
           <tr>
               <th>SL</th>
               <th>Patient Name</th>
               <th>Patient Phone</th>
               <th>Serial NO</th>
               <th>Booking Time</th>
           </tr>
           </thead>
           <tbody>
           <?php
           $j= 0;
           foreach ($rowMorning as $singleBooking){
               $patient = $objLibrary->viewById("patient", $singleBooking->user_id);
               $j++;
               echo "      
           <tr>
               <td>$j</td>
               <td>$patient->patient_name</td>
               <td>$patient->patient_phone</td>
               <td>$singleBooking->booking_serial</td>
               <td>$singleBooking->booking_time</td>
           </tr>";

           } ?>

           </tbody>
       </table>


       <div class="clearfix"></div>



       <?php
       $rowEvening = $objSchedule->checkScheduleByDay("Evening");
       //var_dump($rowEvening);
       ?>

       <hr>
       <center>
           <h2>Doctor Schedule Evening Shift </h2>
           <h4> Doctor Name: <strong><?php echo $doctorData->dr_name; ?></strong> || Doctor Phone: <strong><?php echo $doctorData->phone; ?> </strong>||
               Morning Shift Time: <strong><?php echo $objLibrary->timeFormat($doctorScheduleData->evening_time_from).' - '.$objLibrary->timeFormat($doctorScheduleData->evening_time_to); ?></strong>
               || Vanue: <strong><?php echo $doctorScheduleData->evening_vanue ?></strong> </h4>
           <p>Booking Date: <strong><?php echo $selectDate; ?> </strong> | Booking Day: <strong> <?php echo $day; ?> </strong> </p>
       </center>

       <table class="table table-hover">
           <thead>
           <tr>
               <th>S/L</th>
               <th>Patient Name</th>
               <th>Patient Phone</th>
               <th>Serial No</th>
               <th>Booking Time</th>
           </tr>
           </thead>
           <tbody>
           <?php
           $i=0;
           foreach ($rowEvening as $singleBooking){
               $patient = $objLibrary->viewById("patient", $singleBooking->user_id);
               $i++;
               echo "      
           <tr>
               <td>$i</td>
               <td>$patient->patient_name</td>
               <td>$patient->patient_phone</td>
               <td>$singleBooking->booking_serial</td>
               <td>$singleBooking->booking_time</td>
           </tr>";

           } ?>

           </tbody>
       </table>





       <!--- For email --- Retreite data -->
       <div class="registration" >
       <form action="emailSchedule.php" method="post">
           <textarea name="body" style="display: none">



       <center>
       <h2>Doctor Schedule Morning Shift </h2>
           <h4> Doctor Name: <strong><?php echo $doctorData->dr_name; ?></strong> || Doctor Phone: <strong><?php echo $doctorData->phone; ?> </strong>||
               Morning Shift Time: <strong><?php echo $objLibrary->timeFormat($doctorScheduleData->morning_time_from).' - '.$objLibrary->timeFormat($doctorScheduleData->morning_time_to); ?></strong>
           || Vanue: <strong><?php echo $doctorScheduleData->morning_vanue ?></strong> </h4>
       <p>Booking Date: <strong><?php echo $selectDate; ?> </strong> | Booking Day: <strong> <?php echo $day; ?> </strong> </p>
       </center>


       <table class="table table-hover">
           <thead>
           <tr>
               <th>SL</th>
               <th>Patient Name</th>
               <th>Patient Phone</th>
               <th>Serial NO</th>
               <th>Booking Time</th>
           </tr>
           </thead>
           <tbody>
       <?php
            $j= 0;
           foreach ($rowMorning as $singleBooking){
               $patient = $objLibrary->viewById("patient", $singleBooking->user_id);
               $j++;
          echo "      
           <tr>
               <td>$j</td>
               <td>$patient->patient_name</td>
               <td>$patient->patient_phone</td>
               <td>$singleBooking->booking_serial</td>
               <td>$singleBooking->booking_time</td>
           </tr>";

           } ?>
           
           </tbody>
       </table>


       <div class="clearfix"></div>



        <?php
        $rowEvening = $objSchedule->checkScheduleByDay("Evening");
        //var_dump($rowEvening);
        ?>

<hr>
       <center>
           <h2>Doctor Schedule Evening Shift </h2>
           <h4> Doctor Name: <strong><?php echo $doctorData->dr_name; ?></strong> || Doctor Phone: <strong><?php echo $doctorData->phone; ?> </strong>||
               Morning Shift Time: <strong><?php echo $objLibrary->timeFormat($doctorScheduleData->evening_time_from).' - '.$objLibrary->timeFormat($doctorScheduleData->evening_time_to); ?></strong>
               || Vanue: <strong><?php echo $doctorScheduleData->evening_vanue ?></strong> </h4>
           <p>Booking Date: <strong><?php echo $selectDate; ?> </strong> | Booking Day: <strong> <?php echo $day; ?> </strong> </p>
       </center>

       <table class="table table-hover">
           <thead>
           <tr>
               <th>S/L</th>
               <th>Patient Name</th>
               <th>Patient Phone</th>
               <th>Serial No</th>
               <th>Booking Time</th>
           </tr>
           </thead>
           <tbody>
           <?php
           $i=0;
           foreach ($rowEvening as $singleBooking){
               $patient = $objLibrary->viewById("patient", $singleBooking->user_id);
               $i++;
               echo "      
           <tr>
               <td>$i</td>
               <td>$patient->patient_name</td>
               <td>$patient->patient_phone</td>
               <td>$singleBooking->booking_serial</td>
               <td>$singleBooking->booking_time</td>
           </tr>";

           } ?>

           </tbody>
       </table>
       </textarea>
           <!-- For Delete Function -->
           <input type="hidden" value="<?php echo $doctorData->id; ?>" name="id">
           <input type="hidden" value="<?php echo $day; ?>" name="s_day">
           <input type="hidden" value="<?php echo $selectDate; ?>" name="s_date">
           <!-- // End Delete Function Part -->

           <input type="hidden" value="<?php echo $doctorData->dr_name; ?>" name="dr_name">
           <input type="hidden" value="<?php echo $doctorData->email; ?>" name="email">
           <input class="btn btn-inverse" type="submit" value="Sent Mail" title="Mail sent to doctor">
           <input class="btn btn-danger" type="submit" name="deleteSchedule" value="Delete" title="Dlete the Schedule" Onclick="return ConfirmDelete()">
       </form>
       </div>


   </div> <!-- End of women_main -->
    <!--end main area description -->

<?php include "../../resource/doctor/inc/footer.php"; ?>

    <script>
        function ConfirmDelete() {
            var x = confirm("Is Mail it? _ Are you sure you want to 'delete' The Doctor Schedule Data? ");
            if (x)
                return true;
            else
                return false;
        }
     </script>