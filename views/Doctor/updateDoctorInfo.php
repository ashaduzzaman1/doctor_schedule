<?php if(session_status()!=PHP_SESSION_ACTIVE) session_start();
require_once ("../../vendor/autoload.php");
use App\Library\Library;
use App\Utility\Utility;
$object = new Library();
$object->setData($_SESSION);
$getAllData = $object->view("doctor_info");
if ($getAllData == false) {
    Utility::redirect("doctorList.php");
}
?>
<?php include "../../resource/doctor/inc/header.php"; ?>

<!-- Start of main content description -->
<div class="content">

        <div class="women_main">
        <div class="form-title">
            <h4>Update Doctor Basic Information :</h4>
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
                    <form action="editDoctor.php" method="post" enctype="multipart/form-data">
                        <div>
                            <label>
                                <input name="name" value="<?php echo $getAllData->dr_name ?>" type="text" tabindex="1" required="" autofocus="">
                            </label>
                        </div>
                        <div>
                            <label>
                                <input name="phone" value="<?php echo $getAllData->phone ?>" type="text" tabindex="2" required="" autofocus="">
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
                                    <li><label class="radio"><input type="radio" value="Female" name="gender" <?php if($getAllData->gender == "Female"){ echo "checked='checked'";} ?> ><i></i>Female</label></li>
                                    <div class="clearfix"></div>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <label>
                                <input name="qualification" value="<?php echo $getAllData->qualification ?>" type="text" tabindex="5" required="">
                            </label>
                        </div>
                        <div>
                            <label>
                                <input name="institute" value="<?php echo $getAllData->institute ?>" type="text" tabindex="6" required="">
                            </label>
                        </div>
                        <div class="form-group">
                            <?php $allCat = $object->viewSpecialist(); ?>
                            <label class="col-sm-2 control-label" for="specialist_id">Specialist</label>
                            <select id="" class="form-control1" name="specialist_id" tabindex="7">
                                <option value='' disabled> Select Specialist</option>
                                <?php
                                foreach($allCat as $cat) {
                                    if ( $getAllData->specialist_id == $cat->id) {
                                        echo "<option value='$cat->id' selected> $cat->specialist </option>";
                                    }else{
                                        echo "<option value='$cat->id' > $cat->specialist </option>";
                                    }
                                }
                                ?>

                            </select>
                        </div>
                        <div>
                            <label>
                                <input name="location" value="<?php echo $getAllData->location ?>" type="text" tabindex="8" required="">
                            </label>
                        </div>
                        <div>
                            <label>
                                <input name="about" value="<?php echo $getAllData->about ?>" type="text" tabindex="9" required="">
                            </label>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Previous Picture</label>
                            <div class="controls">
                                <div style='width:100px;border:1px solid black;'><img height="98" width="98" src='../../resource/drPicture/<?php echo $getAllData->picture ?>'/></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Doctor Picture</label>
                            <input id="picture" name="picture" type="file" tabindex="11" required="">
                            <p class="help-block">Input doctor picture with valid size & extention..</p>

                        </div>
                        <input name="id" type="hidden" value="<?php echo $getAllData->id ?>" required="">
                             <input type="submit" value="Update Doctor Info">
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