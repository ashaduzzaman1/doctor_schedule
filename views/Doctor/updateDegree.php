<?php
        require_once("../../vendor/autoload.php");
        use App\Degree\Degree;
        use App\Utility\Utility;
        use App\Message\Message;

        $objDegree = new Degree();
        if (isset($_GET['degree_id'])){
            $objDegree->setData($_GET);
        }else{
            Utility::redirect("degreeStore.php");
        }

        $allData = $objDegree->viewRow();
    //Utility::dd($allData);

        if ($allData == false){
            Utility::redirect("degreeStore.php");
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

                <h2> <span> Update Degree Information </span></h2>
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
                    <a href="researchPaper.php.php" type="buttom" class="btn-primary">Skip</a>
                    <form action="controlDegree.php" method="post" class="myform">
                        <div class="myfield">
                            <fieldset><legend>Update Degree:</legend>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="degree_value">Degree Type: </label>
                                    <select id="degree_value" class="form-control1" name="degree_value" tabindex="1" required="required">
                                        <option value="1" disabled> Select a Degree</option>
                                        <option value="4" <?php if ($allData->degree_name == 4) echo "selected='selected'"; ?>> Bachelor's / Honours degree</option>
                                        <option value="1.5" <?php if ($allData->degree_name == 1.5) echo "selected='selected'"; ?>> Master's / Magister degree</option>
                                        <option value="2" <?php if ($allData->degree_name == 2) echo "selected='selected'"; ?>> Specialist / Engineer's degree</option>
                                        <option value="2.5" <?php if ($allData->degree_name == 2.5) echo "selected='selected'"; ?>> Doctorate degree</option>
                                        <option value="3" <?php if ($allData->degree_name == 3) echo "selected='selected'"; ?>> Higher doctorate / Habilitation</option>
                                        <option value="1" <?php if ($allData->degree_name == 1) echo "selected='selected'"; ?>> Others</option>
                                    </select>
                                </div>
                                <div>
                                    <label>
                                        <input name="degree_name" id="degree_name" value="<?php echo $allData->degree_name; ?>" type="text" tabindex="2" required="" autofocus="">
                                    </label>
                                </div>
                                <div>
                                    <label>
                                        <input name="institute" id="institute" value="<?php echo $allData->institute; ?>" type="text" tabindex="3" required="" autofocus="">
                                    </label>
                                </div>
                                <input name="degree_id" value="<?php echo $allData->id; ?>" type="hidden">
                            </fieldset>
                        </div> <!--- // End of myField Class -->
                        <div>
                            <input type="submit" value="Save" name="update_degree">
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