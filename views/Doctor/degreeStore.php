<?php include "../../resource/doctor/inc/header.php"; ?>
    <!-- Start of main content description -->
    <div class="content">
<?php
require_once ("../../vendor/autoload.php");
use App\Degree\Degree;
$objDegree = new Degree();
$objDegree->setData($_SESSION);
$allData = $objDegree->index("obj");
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
            var _degree_value = false;
            var _degree_name  = false;
            var _institute    = false;
        </script>

        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
                        $(wrapper).append('<div><fieldset><legend>Degree:</legend><div class="form-group"><label class="col-sm-2 control-label" for="degree_value">Degree Type: </label><select class="form-control1" name="degree_value[]" id="degree_value" tabindex="1" required=""> <option value="1" selected="selected"> Select a Degree</option><option value="4">Bachelor / Honours degree</option><option value="1.5">Masters / Magister degree</option><option value="2">Specialist / Engineer s degree</option><option value="2.5"> Doctorate degree</option><option value="3">Higher doctorate / Habilitation</option> <option value="6"> Others</option></select></div><div><label><input name="degree_name[]" id="degree_name" placeholder="Enter Degree Name:" type="text" tabindex="2" required="" autofocus=""></label></div><div><label><input name="institute[]" id="institute" placeholder="Enter Institution:" type="text" tabindex="3" required="" autofocus=""></label></div> </fieldset><input class="remove_field" type="button" name="subadd" value="- Remove"><hr></div>');
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

                <h2> <span> Modified Your Degree Information </span></h2>
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
                   <a href="researchPaper.php" class="btn-primary">Skip</a>
                    <form action="controlDegree.php" method="post" class="myform" onsubmit="return checkFields();">
                        <div class="myfield">
                            <div>
                                <input type="button" name="add" value="+Add" onclick="loadMore();" id="add" title="Add another degree">
                            </div>
                     <fieldset><legend>Degree:</legend>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="degree_value">Degree Type: </label>
                            <select id="degree_value" class="form-control1" name="degree_value[]" tabindex="1" required="required">
                                <option value="1" selected="selected" disabled> Select a Degree</option>
                                <option value="4"> Bachelor's / Honours degree</option>
                                <option value="1.5"> Master's / Magister degree</option>
                                <option value="2"> Specialist / Engineer's degree</option>
                                <option value="2.5"> Doctorate degree</option>
                                <option value="3"> Higher doctorate / Habilitation</option>
                                <option value="1"> Others</option>
                            </select>
                        </div>
                        <div>
                            <label>
                                <input name="degree_name[]" id="degree_name" placeholder="Enter Degree Name:" type="text" tabindex="2" required="" autofocus="">
                            </label>
                        </div>
                        <div>
                            <label>
                                <input name="institute[]" id="institute" placeholder="Enter Institution:" type="text" tabindex="3" required="" autofocus="">
                            </label>
                        </div>
                    </fieldset>
                        </div> <!--- // End of myField Class -->
                        <div>
                            <input type="submit" value="Save & Next" name="store_degree">
                        </div>
                     </form>
                        <!-- /Form -->
                </div>
            </div>

            <div class="clearfix"></div>
        </div> <!---  //End of registration Class  --->
        <!---Start of the Table of the View Degrees. -->
        <h2> <span> List of Your Degree/Education Info </span></h2>
        <div class="grids_of_12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Degree Name</th>
                    <th>Institution Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $serial = 0;
                foreach($allData as $key => $values){
                    $serial++;
                    echo "      
                               <tr> 
                                   <td> 
                                   $serial</td>
                                   <td> $values->degree_name</td>
                                   <td>$values->institute</td>
                                   <td>
                                   <td><span class=\"pull-right\"><a class=\"btn btn-sm btn-warning\" type=\"button\" data-toggle=\"tooltip\" data-original-title=\"Edit this Degree\" href=\"updateDegree.php?degree_id=$values->id\"><i class=\"glyphicon glyphicon-edit\"></i></a></span></td>
                                   <td><span class=\"pull-right\"><a class=\"btn btn-sm btn-warning\" onclick=\"return confirm('Are you want to this degree?')\" type=\"button\" data-toggle=\"tooltip\" data-original-title=\"Delete  this degree\" href=\"controlDegree.php?delete=$values->id\"><i class=\"glyphicon glyphicon-remove\"></i></a></span></td>                                        
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
             $("[id=degree_value]").change(function() {
                 _degree_value = true;
             });
             $("[id=degree_name]").change(function() {
                 _degree_name = true;
             });
             $("[id=institute]").change(function() {
                 _institute = true;
             });

         });

         function checkFields() {
             if ((_degree_value == true) && (_degree_name == true) && (_institute == true) ) {
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
            var x = confirm("Are you sure you want to delete this Degree?");
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