<?php include "../../resource/doctor/inc/header.php"; ?>
    <!-- Start of main content description -->
    <div class="content">
        <?php
        require_once ("../../vendor/autoload.php");
        use App\Achievement\Achievement;
        $objAchievement = new Achievement();
        $objAchievement->setData($_SESSION);
        $allData = $objAchievement->index("obj");
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
            var _achievement_name = false;
            var _org_level     = false;
        </script>
        <script>
            function loadMore(){
            }
            $(document).ready(function() {
                var max_fields      = 18;               //maximum input boxes allowed
                var wrapper         = $(".myfield");    //Fields wrapper
                var add_button      = $("#add");        //Add button ID

                var x = 1; //initlal text box count
                $(add_button).click(function(e){        //on add input button click
                    e.preventDefault();
                    if(x < max_fields){                 //max input box allowed
                        x++;                            //text box increment
                        $(wrapper).append('<div><fieldset><legend>Achievement :</legend><div class="form-group"><label class="col-sm-2 control-label" for="achievement_name">Achievement Name: </label><input name="achievement_name[]" id="achievement_name" placeholder="Enter Achievement Name:" type="text" tabindex="1" required="" autofocus=""></div><div class="form-group"> <label class="col-sm-2 control-label" for="degree_value">Organization Type: </label><select id="org_level" class="form-control1" name="org_level[]" tabindex="1" required="required"><option value="0" selected="selected" disabled> Select a Type</option><option value="1"> Local</option><option value="2"> National</option><option value="3"> International</option></select></div> </fieldset><input class="remove_field" type="button" name="subadd" value="- Remove"><hr></div>');
                        //_degree_value = false;
                        //_degree_name  = false;
                        //_institute    = false;
                    }
                });


                $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                    e.preventDefault(); $(this).parent('div').remove(); x--;
                })
            });
        </script>
        <div class="women_main">
            <div class="form-title">
                <h4> Improve Your Account :</h4>
            </div
                <!-- start content -->
            <div class="registration">

                <!-- <div class="registration_left">-->

                <h2> <span> Modified Your Achievement Information </span></h2>
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
                    <a href="engagedWith.php" class="btn-primary">Skip</a>
                    <form action="controlAchievement.php" method="post" class="myform" onsubmit="return checkFields();">
                        <div class="myfield">
                            <div>
                                <input type="button" name="add" value="+Add" onclick="loadMore();" id="add" title="Add achievement">
                            </div>
                            <fieldset><legend>Achievement or Award:</legend>
                                <div>
                                    <label>
                                        <input name="achievement_name[]" id="achievement_name" placeholder="Enter Achievement Name:" type="text" tabindex="1" required="" autofocus="">
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="degree_value">Organization Type: </label>
                                    <select id="org_level" class="form-control1" name="org_level[]" tabindex="1" required="required">
                                        <option value="0" selected="selected" disabled> Select a Type</option>
                                        <option value="1"> Local</option>
                                        <option value="2"> National</option>
                                        <option value="3"> International</option>
                                    </select>
                                </div>
                            </fieldset>
                        </div> <!--- // End of myField Class -->
                        <div>
                            <input type="submit" value="Save & Next" name="store_achievement">
                        </div>
                    </form>
                    <!-- /Form -->
                </div>
            </div>

            <div class="clearfix"></div>
        </div> <!---  //End of registration Class  --->
        <!---Start of the Table of the View Degrees. -->
        <h2> <span> List of Your Achievement </span></h2>
        <div class="grids_of_12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Achievement Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $serial = 0;
                foreach($allData as $key => $values){
                    $serial++;
                    $achievement_name = substr($values->achievement_name, 0, 20);
                    echo "      
                               <tr> 
                                   <td> 
                                   $serial</td>
                                   <td>". $achievement_name. "</td>
                                   <td>
                                       <td><span class=\"pull-right\"><a class=\"btn btn-sm btn-warning\" type=\"button\" data-toggle=\"tooltip\" data-original-title=\"Edit this Achievement\" href=\"updateAchievement.php?achievement_id=$values->id\"><i class=\"glyphicon glyphicon-edit\"></i></a></span></td>
                                       <td><span class=\"pull-right\"><a class=\"btn btn-sm bt-warning\" onclick=\"return confirm('Are you want to delete this Achievement?')\" type=\"button\" data-toggle=\"tooltip\" data-original-title=\"Delete this Achievement\" href=\"controlAchievement.php?delete=$values->id\"><i class=\"glyphicon glyphicon-remove\"></i></a></span></td>  
                                   </td>
                               </tr>";

                }
                if ($allData < 0){
                    echo "No Recound Found !";
                }
                ?>

                </tbody>
            </table>

        </div> <!-- //grids_of_4 -->


    </div>
    <!--End Main area description -->


    <script type="text/javascript">
        $(document).ready(function() {
            $("[id=achievement_name]").change(function() {
                _achievement_name = true;
            });
            $("[id=org_level]").change(function() {
                _org_level = true;
            });

        });

        function checkFields() {
            if ((_achievement_name == true) && (_org_level == true) ) {
                //alert('EveryThings Okay !');
                return true;
            }else{
                alert('____Please Fill all Field !');
                return false;
            }
        }
    </script>
    <script>
        function ConfirmDelete() {
            var x = confirm("Are you sure you want to delete this Achievement?");
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