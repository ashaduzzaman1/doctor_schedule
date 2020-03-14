<?php if(session_status()!=PHP_SESSION_ACTIVE) session_start();
require_once("../../vendor/autoload.php");
use App\WebContent\WebContent;
use App\Utility\Utility;
use App\Message\Message;

$objWebContent = new WebContent();
if (isset($_GET['web_content_id'])){
    $objWebContent->setData($_GET);
}else{
    Utility::redirect("webContent.php");
}

$allData = $objWebContent->viewRow();
//Utility::dd($allData);

if ($allData == false){
    Utility::redirect("webContent.php");
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

                <h2> <span> Update Your Web Content Information </span></h2>
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
                    <a href="webContent.php" type="buttom" class="btn-primary">Back</a>
                    <form action="controlWebContent.php" method="post" class="myform">
                        <div class="myfield">
                            <fieldset><legend>Update Organization/Group:</legend>
                                <div>
                                    <label> BM & DC ID:
                                        <input name="bmdc_id" id="bmdc_id" value="<?php echo $allData->bmdc_id; ?>" type="text" tabindex="1" autofocus="">
                                    </label>
                                </div>
                                <div>
                                    <label> Facebook page or profile URL:
                                        <input name="facebook_url" id="facebook_url" value="<?php echo $allData->facebook_url; ?>" type="text" tabindex="2" autofocus="">
                                    </label>
                                </div>
                                <div>
                                    <label> Personal Website URL:
                                        <input name="website_url" id="website_url" value="<?php echo $allData->website_url; ?>"" type="text" tabindex="3" autofocus="">
                                    </label>
                                </div>
                                <input name="web_content_id" value="<?php echo $allData->id; ?>" type="hidden">

                            </fieldset>
                        </div> <!--- // End of myField Class -->
                        <div>
                            <input type="submit" value="Save" name="update_web_content">
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