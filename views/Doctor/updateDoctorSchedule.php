<?php
require_once ("../../vendor/autoload.php");
use App\Library\Library;
use App\Utility\Utility;
$object = new Library();
$object->setData($_GET);
$getAllData = $object->view("doctor_schedule");
if ($getAllData == false) {
    Utility::redirect("doctorList.php");
}
?>
<?php include "../../resource/doctor/inc/header.php"; ?>

<!-- Start of main content description -->
<div class="content">
    <div class="women_main">
        <div class="form-title">
            <h4>Update Doctor Schedule Information :</h4>
        </div
            <!-- start content -->
        <div class="registration">

            <div class="registration_left">

                <h2> <span> Basic Information </span></h2>
                <!-- [if IE]
                    < link rel='stylesheet' type='text/css' href='ie.css'/>
                 [endif] -->

                <!-- [if lt IE 7]>
                    < link rel='stylesheet' type='text/css' href='ie6.css'/>
                <! [endif] -->
                <script>
                    (function() {

                        // Create input element for testing
                        var inputs = document.createElement('input');

                        // Create the supports object
                        var supports = {};

                        supports.autofocus   = 'autofocus' in inputs;
                        supports.required    = 'required' in inputs;
                        supports.placeholder = 'placeholder' in inputs;

                        // Fallback for autofocus attribute
                        if(!supports.autofocus) {

                        }

                        // Fallback for required attribute
                        if(!supports.required) {

                        }

                        // Fallback for placeholder attribute
                        if(!supports.placeholder) {

                        }

                        // Change text inside send button on submit
                        var send = document.getElementById('register-submit');
                        if(send) {
                            send.onclick = function () {
                                this.innerHTML = '...Sending';
                            }
                        }

                    })();
                </script>
                <div class="registration_form">
                    <!-- Form -->
                    <form action="editSchedule.php" method="post" enctype="multipart/form-data">
                    <!-- Form -->
                    <h4>Morning Shift:</h4>
                    <div>
                        <label>
                            <input name="morning_vanue" value="<?php echo $getAllData->morning_vanue ?>" type="text" tabindex="1" required="">
                            <input name="id" value="<?php echo $getAllData->id ?>" type="hidden">
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="morning_time_from">Time(From)</label>
                        <select id="selector1" class="form-control1" name="morning_time_from" tabindex="2">
                            <option value="7" <?php if($getAllData->morning_time_from == '7'){ echo "selected=''";} ?> >07:00 AM</option>
                            <option value="8" <?php if($getAllData->morning_time_from == '8'){ echo "selected=''";} ?>>08:00 AM</option>
                            <option value="9" <?php if($getAllData->morning_time_from == '9'){ echo "selected=''";} ?>>09:00 AM</option>
                            <option value="10" <?php if($getAllData->morning_time_from == '10'){ echo "selected=''";} ?>>10:00 AM</option>
                            <option value="11" <?php if($getAllData->morning_time_from == '11'){ echo "selected=''";} ?>>11:00 AM</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="morning_time_to">Time(To)</label>
                        <select id="selector1" class="form-control1" name="morning_time_to" tabindex="3">
                            <option value="9" <?php if($getAllData->morning_time_to == '9'){ echo "selected=''";} ?>>09:00 AM</option>
                            <option value="10" <?php if($getAllData->morning_time_to == '10'){ echo "selected=''";} ?>>10:00 AM</option>
                            <option value="11" <?php if($getAllData->morning_time_to == '11'){ echo "selected=''";} ?>>11:00 AM</option>
                            <option value="12" <?php if($getAllData->morning_time_to == '12'){ echo "selected=''";} ?>>12:00 PM</option>
                            <option value="13" <?php if($getAllData->morning_time_to == '13'){ echo "selected=''";} ?>>01:00 PM</option>
                        </select>
                    </div>
                    <h4>Evening Shift:</h4>
                    <div>
                        <label>
                            <input name="evening_vanue" value="<?php echo $getAllData->evening_vanue ?>" type="text" tabindex="4">
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="evening_time_from">Time(From)</label>
                        <select id="selector1" class="form-control1" name="evening_time_from" tabindex="5">
                            <option value="12" <?php if($getAllData->evening_time_from == '12'){ echo "selected=''";} ?>>12:00 PM</option>
                            <option value="13" <?php if($getAllData->evening_time_from == '13'){ echo "selected=''";} ?>>01:00 PM</option>
                            <option value="14" <?php if($getAllData->evening_time_from == '14'){ echo "selected=''";} ?>>02:00 PM</option>
                            <option value="15" <?php if($getAllData->evening_time_from == '15'){ echo "selected=''";} ?>>03:00 PM</option>
                            <option value="16" <?php if($getAllData->evening_time_from == '16'){ echo "selected=''";} ?>>04:00 PM</option>
                            <option value="17" <?php if($getAllData->evening_time_from == '17'){ echo "selected=''";} ?>>05:00 PM</option>
                            <option value="18" <?php if($getAllData->evening_time_from == '18'){ echo "selected=''";} ?>>06:00 PM</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="evening_time_to">Time(To)</label>
                        <select id="evening_time_to" class="form-control1" name="evening_time_to" tabindex="6">
                            <option value="16" <?php if($getAllData->evening_time_to == '16'){ echo "selected=''";} ?>>04:00 PM</option>
                            <option value="17" <?php if($getAllData->evening_time_to == '17'){ echo "selected=''";} ?>>05:00 PM</option>
                            <option value="18" <?php if($getAllData->evening_time_to == '18'){ echo "selected=''";} ?>>06:00 PM</option>
                            <option value="19" <?php if($getAllData->evening_time_to == '19'){ echo "selected=''";} ?>>07:00 PM</option>
                            <option value="20" <?php if($getAllData->evening_time_to == '20'){ echo "selected=''";} ?>>08:00 PM</option>
                            <option value="21" <?php if($getAllData->evening_time_to == '21'){ echo "selected=''";} ?>>09:00 PM</option>
                            <option value="22" <?php if($getAllData->evening_time_to == '22'){ echo "selected=''";} ?>>10:00 PM</option>
                            <option value="23" <?php if($getAllData->evening_time_to == '23'){ echo "selected=''";} ?>>11:00 PM</option>
                        </select>
                    </div> <br />
                    <div class="form-group">
                        <label for="checkbox">Select Day</label>
                        <div class="checkbox-inline1">
                            <label>
                                <input type="checkbox" value="Saturday" name="day[]" <?php if($object->checkDay("Saturday", $getAllData->sdl_day)){ echo "checked=''";} ?> />
                                Saturday
                            </label>
                            <label>
                                <input type="checkbox" value="Sunday" name="day[]" <?php if($object->checkDay("Sunday", $getAllData->sdl_day)){ echo "checked=''";} ?> /">
                                Sunday
                            </label>
                            <label>
                                <input type="checkbox" value="Monday" name="day[]" <?php if($object->checkDay("Monday", $getAllData->sdl_day)){ echo "checked=''";} ?> />
                                Monday
                            </label>
                            <label>
                                <input type="checkbox" value="Tuesday" name="day[]" <?php if($object->checkDay("Tuesday", $getAllData->sdl_day)){ echo "checked=''";} ?> />
                                Tuesday
                            </label>
                            <label>
                                <input type="checkbox" value="Wednesday" name="day[]" <?php if($object->checkDay("Wednesday", $getAllData->sdl_day)){ echo "checked=''";} ?> />
                                Wednesday
                            </label>
                            <label>
                                <input type="checkbox" value="Thursday" name="day[]" <?php if($object->checkDay("Thursday", $getAllData->sdl_day)){ echo "checked=''";} ?> />
                                Thursday
                            </label>
                            <label>
                                <input type="checkbox" value="Friday" name="day[]" <?php if($object->checkDay("Friday", $getAllData->sdl_day)){ echo "checked=''";} ?> />
                                Friday
                            </label>
                        </div>
                    </div>
                    <div>
                        <input type="submit" value="Update Schedule">
                    </div>
                    </form>
                    <!-- /Form -->
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!--End Main area description -->

<?php include "../../resource/doctor/inc/footer.php"; ?>