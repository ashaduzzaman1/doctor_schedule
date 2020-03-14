<?php include "../../resource/admin/inc/header.php"; ?>

    <!-- Start of main content description -->
<div class="content">
    <?php
    require_once ("../../vendor/autoload.php");
    use App\Library\Library;
    $objLibrary = new Library();
    use App\Message\Message;
    $msg = Message::message();
    if($msg != '')
    {
    echo "<div class='alert alert-success alert-block' id='message'>
        <a class='close' data-dismiss='alert' href='#'>×</a>
        <h4 class='alert-heading'>Message!</h4>";
        echo $msg;
        echo "</div>";
    }
    ?>
    <div class="women_main">
        <div class="form-title">
            <h4>Create a new doctor :</h4>
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
                    <form action="store.php" method="post" enctype="multipart/form-data">
                        <div>
                            <label>
                                <input name="name" placeholder="Enter Name:" type="text" tabindex="1" required="" autofocus="">
                            </label>
                        </div>
                        <div>
                            <label>
                                <input name="phone" placeholder="Enter Phone Number:" type="text" tabindex="2" required="" autofocus="">
                            </label>
                        </div>
                        <div>
                            <label>
                                <input name="email" placeholder="Enter Email address:" type="text" tabindex="3" required="">
                            </label>
                        </div>
                        <?php $unique = mt_rand(100000, 999999); ?>
                        <div class="sky-form">
                            <label for="">Select Gender</label>
                            <div class="sky_form1">
                                <ul>
                                    <li><label class="radio left"><input type="radio" value="Male" name="gender" tabindex="4" checked=""><i></i>Male</label></li>
                                    <li><label class="radio"><input type="radio" value="Female" name="gender"><i></i>Female</label></li>
                                    <div class="clearfix"></div>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <label>
                                <input name="qualification" placeholder="Enter Qualification:" type="text" tabindex="5" required="">
                            </label>
                        </div>
                        <div>
                            <label>
                                <input name="institute" placeholder="Enter Educational Institute:" type="text" tabindex="6" required="">
                            </label>
                        </div>
                        <div class="form-group">
                            <?php $allCat = $objLibrary->viewSpecialist(); ?>
                            <label class="col-sm-2 control-label" for="specialist_id">Specialist</label>
                            <select id="" class="form-control1" name="specialist_id" tabindex="7">
                                <option value='' disabled> Select Specialist</option>
                                <?php
                                    foreach($allCat as $cat) {
                                        echo "<option value='$cat->id' > $cat->specialist </option>";
                                    }
                                ?>
                               
                            </select>
                        </div>
                        <div>
                            <label>
                                <input name="location" placeholder="Enter Location:" type="text" tabindex="8" required="">
                            </label>
                        </div>
                        <div>
                            <label>
                                <input name="about" placeholder="Enter About" type="text" tabindex="9" required="">
                            </label>
                        </div>
                        <div>
                            <label>
                                <input name="password" placeholder="Enter a password for the doctor:" type="text" tabindex="10" required="">
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Doctor Picture</label>
                            <input id="picture" name="picture" type="file" tabindex="11" required="">
                            <p class="help-block">Input doctor picture with valid size & extention..</p>

                        </div>
                        <?php $unique = mt_rand(100000, 999999); ?>
                        <input name="status" type="hidden" value="Yes" required="">
                        <input name="unique_id" type="hidden" value="<?php echo $unique; ?>" required="">
                       <!-- <div>
                            <input type="submit" value="create a Doctor" name="crate_doctor">
                        </div>
                    </form> -->
                    <!-- /Form -->
                </div>
            </div>
            <div class="registration_left">
                <h2>Schedule Information</h2>
                <div class="registration_form">
                    <!-- Form -->
                    <h4>Morning Shift:</h4>
                        <div>
                            <label>
                                <input name="morning_vanue" placeholder="Enter Morning Vanue " type="text" tabindex="12" required="">
                            </label>
                        </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="morning_time_from">Time(From)</label>
                            <select id="selector1" class="form-control1" name="morning_time_from" tabindex="13">
                                <option value="7">07:00 AM</option>
                                <option value="8">08:00 AM</option>
                                <option value="9">09:00 AM</option>
                                <option value="10">10:00 AM</option>
                                <option value="11">11:00 AM</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="morning_time_to">Time(To)</label>
                        <select id="selector1" class="form-control1" name="morning_time_to" tabindex="14">
                            <option value="9">09:00 AM</option>
                            <option value="10">10:00 AM</option>
                            <option value="11">11:00 AM</option>
                            <option value="12">12:00 PM</option>
                            <option value="13">01:00 PM</option>
                        </select>
                    </div>
                    <h4>Evening Shift:</h4>
                        <div>
                            <label>
                                <input name="evening_vanue" placeholder="Enter Evening Vanue " type="text" tabindex="4">
                            </label>
                        </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="evening_time_from">Time(From)</label>
                        <select id="selector1" class="form-control1" name="evening_time_from" tabindex="15">
                            <option value="12">12:00 PM</option>
                            <option value="13">01:00 PM</option>
                            <option value="14">02:00 PM</option>
                            <option value="15">03:00 PM</option>
                            <option value="16">04:00 PM</option>
                            <option value="17">05:00 PM</option>
                            <option value="18">06:00 PM</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="evening_time_to">Time(To)</label>
                        <select id="selector1" class="form-control1" name="evening_time_to" tabindex="16">
                            <option value="16">04:00 PM</option>
                            <option value="17">05:00 PM</option>
                            <option value="18">06:00 PM</option>
                            <option value="19">07:00 PM</option>
                            <option value="20">08:00 PM</option>
                            <option value="21">09:00 PM</option>
                            <option value="22">10:00 PM</option>
                            <option value="23">11:00 PM</option>
                        </select>
                    </div> <br />
                    <div class="form-group">
                        <label for="checkbox">Select Day</label>
                            <div class="checkbox-inline1">
                                <label>
                                    <input type="checkbox" value="Saturday" name="day[]" checked="checked">
                                    Saturday
                                </label>
                                <label>
                                    <input type="checkbox" value="Sunday" name="day[]" checked="checked">
                                    Sunday
                                </label>
                                <label>
                                    <input type="checkbox" value="Monday" name="day[]" checked="checked">
                                    Monday
                                </label>
                                <label>
                                    <input type="checkbox" value="Tuesday" name="day[]" checked="checked">
                                    Tuesday
                                </label>
                                <label>
                                    <input type="checkbox" value="Wednesday" name="day[]" checked="checked">
                                    Wednesday
                                </label>
                                <label>
                                    <input type="checkbox" value="Thursday" name="day[]" checked="checked">
                                    Thursday
                                </label>
                                <label>
                                    <input type="checkbox" value="Friday" name="day[]" checked="checked">
                                    Friday
                                </label>
                            </div>
                        </div>
                        <div>
                            <input type="submit" value="Add Doctor" name="add_doctor">
                        </div>
                    </form>
                    <!-- /Form -->
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
</div>
      <!--End Main area description -->

 <?php include "../../resource/admin/inc/footer.php"; ?>