<?php include "../../resource/doctor/inc/header.php"; ?>
    <!-- Start of main content description -->
    <div class="content">
        <?php
        require_once ("../../vendor/autoload.php");
        use App\WebContent\WebContent;
        $objWebContent = new WebContent();
        $objWebContent->setData($_SESSION);
        $allData = $objWebContent->view();
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
        <script>
            var _bmdc_id      = false;
            var _facebook_url = false;
            var _website_url  = false;
        </script>
        
        <div class="women_main">
            <div class="form-title">
                <h4> Improve Your Account :</h4>
            </div
                <!-- start content -->
            <div class="registration">

                <!-- <div class="registration_left">-->

                <h2> <span> Modified Your Web Content Information </span></h2>
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
    <?php if(!$allData){ ?>
                <div class="registration_form">
                    <!-- Form -->
                    <form action="controlWebContent.php" method="post" class="myform" onsubmit="return checkFields();">
                        <div class="myfield">
                            <fieldset><legend>Web Content Info </legend>
                                <div>
                                    <label> BM & DC ID:
                                        <input name="bmdc_id" id="bmdc_id" placeholder="Enter your BM & DC ID:" type="text" tabindex="1" autofocus="">
                                    </label>
                                </div>
                                <div>
                                    <label> Facebook page or profile URL:
                                        <input name="facebook_url" id="facebook_url" placeholder="Enter Facebook page or profile URL:" type="text" tabindex="2" autofocus="">
                                    </label>
                                </div>
                                <div>
                                    <label> Personal Website URL:
                                        <input name="website_url" id="website_url" placeholder="Enter your Personal Website URL:" type="text" tabindex="3" autofocus="">
                                    </label>
                                </div>
                            </fieldset>
                        </div> <!--- // End of myField Class -->
                        <div>
                            <input type="submit" value="Save & Finish" name="store_web_content">
                        </div>
                    </form>
                    <!-- /Form -->
                </div>
            </div>

            <div class="clearfix"></div>
        </div> <!---  //End of registration Class  --->
        <!---Start of the Table of the View Web Content. -->
        <h2> <span> List of Your Recognized WebContent Organization/Group </span></h2>
        <div class="panel-body">






<?php }else{ ?>

            <div class="container-fluid"><hr>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-calendar"></i> </span>
                                <h5>Details of Doctor</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <div class="col-xs-9 col-sm-9 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Doctor's Schedule Information</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">

                                                <div class=" col-md-9 col-lg-9 ">
                                                    <table class="table table-user-information">
                                                        <tbody>
                                                        <tr>
                                                            <td>BM & DC ID:</td>
                                                            <td><?php echo $allData->bmdc_id; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td> Facebook URL</td>
                                                            <td><?php echo $allData->facebook_url; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td> Website URL</td>
                                                            <td><?php echo $allData->website_url; ?></td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div><!--End of col-md-9 col-lg-9  class-->
                                            </div><!--End of row class-->
                                        </div><!--End of panel-body class-->
                                        <div class="panel-footer">
                                            <a onclick="return confirm('Are you want to delete this Web Content?')" class="btn btn-sm btn-primary" type="button" data-toggle="tooltip" data-original-title="" href="controlWebContent.php?delete=<?php echo $allData->id; ?>">
                                                <i class="glyphicon glyphicon-remove"></i>
                                            </a>
                                        <span class="pull-right">
                                            <a onclick="return confirm('Are you want to Edit the Web Content?')" class="btn btn-sm btn-warning" type="button" data-toggle="tooltip" data-original-title="Edit this doctor Schedule" href="updateWebContent.php?web_content_id=<?php echo $allData->id; ?>">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                        </span>
                                        </div>
                                    </div><!--End of panel panel-info class and doctor shedule info -->



                                </div><!--End of Col-sm col-lg-3-5--- class-->
                            </div><!--End of widget-content nopadding class-->
                        </div><!--End of widget-box class-->
                    </div> <!--End of span12 class-->
                </div><!--End of row-fluid class-->
            </div> <!--End of container-fluid class-->
<?php } ?>




        </div> <!-- //grids_of_4 -->

    </div>
    <!--End Main area description -->


    <script type="text/javascript">
        $(document).ready(function() {
            $("[id=bmdc_id]").change(function() {
                _bmdc_id= true;
            });
            $("[id=facebook_url]").change(function() {
                _facebook_url = true;
            });
            $("[id=website_url]").change(function() {
                _website_url = true;
            });

        });

        function checkFields() {
            if ((_bmdc_id == true) || (_facebook_url == true) || (_website_url == true) ) {
                return true;
            }else{
                alert('____Can\'t add blank data! Please Fill the Field. ');
                return false;
            }
        }
    </script>
    <script>
        function ConfirmDelete() {
            var x = confirm("Are you sure you want to delete this Data ?");
            if (x)
                return true;
            else
                return false;
        }

        $('#message').show().delay(20).fadeOut();
        $('#message').show().delay(15).fadeIn();
        $('#message').show().delay(20).fadeOut();
        $('#message').show().delay(25).fadeIn();
        $('#message').show().delay(1200).fadeOut();
    </script>
<?php include "../../resource/doctor/inc/footer.php"; ?>