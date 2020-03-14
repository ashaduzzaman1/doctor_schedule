<?php
require_once ("../../vendor/autoload.php");
use App\Patient\Patient;
use App\Utility\Utility;
$object = new Patient();
$object->setData($_GET);
$getAllData = $object->view();
if ($getAllData == false) {
    Utility::redirect("userList.php");
}
?>
<?php include "../../resource/admin/inc/header.php"; ?>

    <!-- Start of main content description -->
    <div class="content">

        <div class="women_main">
            <div class="form-title">
                <h4>Update Patient Information :</h4>
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
                        <form action="editPatient.php" method="post">
                            <div>
                                <lebel><strong>Patient Name: </strong></lebel>
                                <label>
                                    <input name="patient_name" value="<?php echo $getAllData->patient_name ?>" type="text" tabindex="1" required="" autofocus="">
                                </label>
                            </div>
                            <div>
                                <lebel><strong>Patient Phone Number: </strong></lebel>
                                <label>
                                    <input name="patient_phone" value="<?php echo $getAllData->patient_phone ?>" type="text" tabindex="2" required="" autofocus="">
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input name="email" value="<?php echo $getAllData->email ?>" type="text" tabindex="3" required="">
                                </label>
                            </div>
                            <?php $unique = mt_rand(100000, 999999); ?>
                            <div class="sky-form">
                                <label for="">Select Gender</label>
                                <div class="sky_form1">
                                    <ul>
                                        <li><label class="radio left"><input type="radio" value="Male" name="gender" tabindex="4" <?php if($getAllData->gender == "Male"){ echo "checked='checked'";} ?>><i></i>Male</label></li>
                                        <li><label class="radio"><input type="radio" value="Female" name="gender" <?php if($getAllData->gender == "Female"){ echo "checked='checked'";} ?>><i></i>Female</label></li>
                                        <div class="clearfix"></div>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <lebel><strong>Patient Address: </strong></lebel>
                                <label>
                                    <input name="patient_address" value="<?php echo $getAllData->patient_address ?>" type="text" tabindex="5" required="">
                                </label>
                            </div>

                            <input name="id" type="hidden" value="<?php echo $getAllData->id ?>" required="">
                            <input type="submit" value="Save">
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