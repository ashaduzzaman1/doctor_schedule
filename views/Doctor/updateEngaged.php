<?php if(session_status()!=PHP_SESSION_ACTIVE) session_start();
require_once("../../vendor/autoload.php");
use App\Engaged\Engaged;
use App\Utility\Utility;
use App\Message\Message;

$objEngaged = new Engaged();
if (isset($_GET['engaged_id'])){
    $objEngaged->setData($_GET);
}else{
    Utility::redirect("engagedWith.php");
}

$allData = $objEngaged->viewRow();
//Utility::dd($allData);

if ($allData == false){
    Utility::redirect("engagedWith.php");
}
?>
<?php include "../../resource/doctor/inc/header.php"; ?>
    <!-- Start of main content description -->
    <div class="content">
        <?php
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <div class="women_main">
            <div class="form-title">
                <h4> Improve Your Account :</h4>
            </div
                <!-- start content -->
            <div class="registration">

                <!-- <div class="registration_left">-->

                <h2> <span> Update Your Engaged Organization/Group Information </span></h2>
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
                    <a href="webContent.php" type="buttom" class="btn-primary">Skip</a>
                    <form action="controlEngaged.php" method="post" class="myform">
                        <div class="myfield">
                            <fieldset><legend>Update Organization/Group:</legend>
                                <div>
                                    <label>
                                        <input name="org_name" id="org_name" value="<?php echo $allData->org_name; ?>" type="text" tabindex="2" required="" autofocus="">
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="org_level">Organization/Group Type: </label>
                                    <select id="org_level" class="form-control1" name="org_level" tabindex="1" required="required">
                                        <option value="1" disabled> Select a Type</option>
                                        <option value="1" <?php if ($allData->org_level == 1) echo "selected='selected'"; ?>> local</option>
                                        <option value="2" <?php if ($allData->org_level == 2) echo "selected='selected'"; ?>> National</option>
                                        <option value="3" <?php if ($allData->org_level == 3) echo "selected='selected'"; ?>> International</option>
                                    </select>
                                </div>
                                <input name="engaged_id" value="<?php echo $allData->id; ?>" type="hidden">

                            </fieldset>
                        </div> <!--- // End of myField Class -->
                        <div>
                            <input type="submit" value="Save" name="update_engaged">
                        </div>
                    </form>
                    <!-- /Form -->
                </div>
            </div>

            <div class="clearfix"></div>
        </div> <!---  //End of registration Class  --->
    </div>
    <!--End Main area description -->

<?php include "../../resource/doctor/inc/footer.php"; ?>