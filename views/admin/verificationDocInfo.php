<?php if(session_status()!=PHP_SESSION_ACTIVE) session_start();
require_once("../../vendor/autoload.php");

use App\Utility\Utility;
use App\Message\Message;
use App\Library\Library;

use App\Degree\Degree;
use App\Research\Research;
use App\Achievement\Achievement;
use App\Engaged\Engaged;
use App\WebContent\WebContent;

$objLibrary      = new Library();
$objDegree      = new Degree();
$objResearch    = new Research();
$objAchievement = new Achievement();
$objEngaged     = new Engaged();
$objWebContent  = new WebContent();

if (isset($_GET['doctor'])){
    //$objWebContent->setData($_GET);
    $id = trim($_GET['doctor']);
    $idid = (int)$id;
    if (!filter_var($idid, FILTER_VALIDATE_INT) === false) {
        $id =  $idid;
    } else {
        Utility::redirect("verifyInformation.php");
    }
}else{
    Utility::redirect("verifyInformation.php");
}

$allData = $objLibrary->viewById('doctor_info', $id);
//Utility::dd($allData);

if ($allData == false){
    Utility::redirect("verifyInformation.php");
}
?>
<?php include "../../resource/admin/inc/header.php"; ?>
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
                <h4> Verified Doctor Information (Advance) :</h4>
            </div
                <!-- start content -->
            <div class="registration">

                <!-- <div class="registration_left">-->

                <h2> <span> Verification Doctor Information </span></h2>
                <a href="verifyInformation.php" type="buttom" class="btn-primary">Back</a>
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
                    <form action="controlVerification.php" method="post" class="myform">





                        <?php
                        $degreeData = $objResearch->getMultipleData('degree_table', $id);
                        //Utility::dd($degreeData);
                        if ($degreeData == true){
                            $no = 0;
                            foreach ($degreeData as $dData){
                                $no++;
                                ?>
                                <!-- start myField clsss of Degree and Institute TABLE -->

                                <div class="myfield">
                                    <fieldset><legend>Institute and Degree Table Data - <?php echo $no; ?> :</legend>

                                        <div>
                                            <label>
                                                <b>Degree Name:</b> <?php echo $dData->degree_name; ?><br>
                                                <b>Institute/University Name:</b> <?php echo $dData->institute; ?><br>
                                                <br> <strong>Enter Ranking value of-</strong> (From www.webometrics.info)
                                                <input name="institute_rate[]" id="institute_rate" value="<?php echo $dData->institute_rate; ?>" type="text" autofocus="">
                                            </label>
                                        </div>

                                        <input name="degree_id[]" value="<?php echo $dData->id; ?>" type="hidden">
                                        <hr>

                                    </fieldset>
                                </div>
                            <?php }   } ?>
                        <!--- // End of myField Class && Degree and Institute Part -->





                        <?php
                        $researchData = $objResearch->getMultipleData('research_table', $id);
                        //Utility::dd($researchData);
                        if ($researchData == true){
                            $no = 0;
                            foreach ($researchData as $rData){
                                $no++;
                            ?>
                            <!-- start myField clsss of Research Paper TABLE -->

                            <div class="myfield">
                                <fieldset><legend>Research Table Data <?php echo $no; ?> :</legend>


                                    <div>
                                        <label>
                                            <b>Paper Name:</b> <?php echo $rData->paper_name; ?><br>
                                            <b>DOI or ISSN NO:</b> <?php echo $rData->doi_no; ?><br>
                                            <b>Journal Name:</b> <?php echo $rData->journal; ?><br>
                                            <br> <strong>Enter value of SJR-</strong> (From www.scimagojr.com)
                                            <input name="paper_rating[]" id="paper_rating" value="<?php echo $rData->paper_rating; ?>" type="text" autofocus="">
                                        </label>
                                    </div>

                                    <input name="paper_id[]" value="<?php echo $rData->id; ?>" type="hidden">
                                    <hr>

                                </fieldset>
                            </div>
                        <?php }   } ?>
                        <!--- // End of myField Class && Research Paper Part -->





                        <?php
                            $tableData = $objEngaged->getSingleData('web_content_table', $id);
                            //Utility::dd($tableData);
                            if ($tableData == true){
                        ?>

                        <!-- start myField clsss of WEB CONTENT TABLE -->
                        <div class="myfield">
                            <fieldset><legend>Web Content Information:</legend>
                                <div>
                                    <label> <b>BM&DC ID:</b> <?php echo $tableData->bmdc_id; ?>
                                        <br> <strong>Does this BM&DC ID is exists? -</strong> (Form http://bmdc.org.bd/)
                                        <select id="bmdc_value" class="form-control1" name="bmdc_value">
                                            <option value="0" disabled> Select one</option>
                                            <option value="1" <?php if ($tableData->bmdc_value == 1) echo "selected='selected'"; ?>> Yes</option>
                                            <option value="0" <?php if ($tableData->bmdc_value == 0) echo "selected='selected'"; ?>> No</option>
                                        </select>
                                    </label>
                                </div>
                                <div>
                                    <label> <b>Facebook page or profile URL:</b> <?php echo $tableData->facebook_url; ?>
                                        <br> <strong>Enter the Number of Facebook follower -</strong> (Form www.facebook.com)
                                        <input name="facebook_value" id="facebook_url" value="<?php echo $tableData->facebook_value; ?>" type="text" autofocus="">
                                    </label>
                                </div>
                                <div>
                                    <label> <b>Personal Website URL:</b> <?php echo $tableData->facebook_url; ?>
                                        <br> <strong>Enter the Number of Website ranking value -</strong> (Form www.alexa.com)
                                        <input name="website_value" id="website_url" value="<?php echo $tableData->website_value; ?>"" type="text" autofocus="">
                                    </label>
                                </div>
                                <input name="web_content_id" value="<?php echo $tableData->id; ?>" type="hidden">
                                <hr>

                            </fieldset>
                        </div>
                            <?php } ?>
                        <!--- // End of myField Class && Web Content Part -->
                        


                        <div>
                            <input type="submit" value="verified" name="verified_data">
                        </div>
                    </form>
                    <!-- /Form -->
                </div>
            </div>

            <div class="clearfix"></div>
        </div> <!---  //End of registration Class  --->
    </div>
    <!--End Main area description -->

<?php include "../../resource/admin/inc/footer.php"; ?>