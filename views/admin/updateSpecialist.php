<?php
require_once ("../../vendor/autoload.php");
use App\Specialist\Specialist;
use App\Utility\Utility;
$object = new Specialist();
$object->setData($_GET);
$getAllData = $object->view();
if ($getAllData == false) {
    Utility::redirect("specialist.php");
}
?>
<?php include "../../resource/admin/inc/header.php"; ?>

    <!-- Start of main content description -->
    <div class="content">
<?php
require_once ("../../vendor/autoload.php");
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
            <h4>Edit Specialist Category:</h4>
        </div
            <!-- start content -->
        <div class="registration">

            <div class="registration_left">

                <h2> <span> Specialist Information </span></h2>
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
                    <form action="specialistEdit.php" method="post">

                        <div>
                            <label>
                                <input name="specialist" value="<?php echo $getAllData->specialist ?>" type="text" tabindex="1" required="">
                            </label>
                        </div>
                        <div>
                            <label>
                                <input name="symptoms" value="<?php echo $getAllData->symptoms ?>" type="text" tabindex="2">
                            </label>
                        </div>
                        <input name="id" type="hidden" value="<?php echo $getAllData->id ?>">
                        <div>
                            <input type="submit" value="Save" name="update">
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