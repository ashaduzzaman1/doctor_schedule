<?php
require_once("../../vendor/autoload.php");
use App\Research\Research;
use App\Utility\Utility;
use App\Message\Message;

$objResearch = new Research();
if (isset($_GET['paper_id'])){
    $objResearch->setData($_GET);
}else{
    Utility::redirect("researchPaper.php");
}

$allData = $objResearch->viewRow();
//Utility::dd($allData);

if ($allData == false){
    Utility::redirect("researchPaper.php");
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

                <h2> <span> Update Research Paper Information </span></h2>
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
                    <button class="ti-layout-cta-btn-right"><a href="#" type="buttom">Skip</a></button>
                    <form action="controlPaper.php" method="post" class="myform">
                        <div class="myfield">
                            <fieldset><legend>Update Research Paper:</legend>
                                <div>
                                    <label>
                                        <input name="paper_name" id="paper_name" value="<?php echo $allData->paper_name; ?>" type="text" tabindex="1" required="" autofocus="">
                                    </label>
                                </div>
                                <div>
                                    <label>
                                        <input name="doi_no" id="doi_no" value="<?php echo $allData->doi_no; ?>" type="text" tabindex="2" required="" autofocus="">
                                    </label>
                                </div>
                                <div>
                                    <label>
                                        <input name="journal" id="journal" value="<?php echo $allData->journal; ?>" type="text" tabindex="3" required="" autofocus="">
                                    </label>
                                </div>
                                <input name="paper_id" value="<?php echo $allData->id; ?>" type="hidden">
                            </fieldset>
                        </div> <!--- // End of myField Class -->
                        <div>
                            <input type="submit" value="Save" name="update_paper">
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