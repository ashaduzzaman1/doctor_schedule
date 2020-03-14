<?php include "../../resource/doctor/inc/header.php"; ?>
    <!-- Start of main content description -->
    <div class="content">
        <?php
        require_once ("../../vendor/autoload.php");
        use App\Research\Research;
        $objResearch = new Research();
        $objResearch->setData($_SESSION);
        $allData = $objResearch->index("obj");
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
            var _paper_value = false;
            var _doi_no      = false;
            var _journal     = false;
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
                        $(wrapper).append('<div><fieldset><legend>Research Paper:</legend><div class="form-group"><label class="col-sm-2 control-label" for="degree_value">Paper Heading: </label><input name="paper_name[]" id="paper_name" placeholder="Enter Research Paper Name:" type="text" tabindex="1" required="" autofocus=""></div><div><label><input name="dio_no[]" id="doi_no" placeholder="Enter DOI No:" type="text" tabindex="2" required="" autofocus=""></label></div><div><label><input name="journal[]" id="journal" placeholder="Enter Published jounal:" type="text" tabindex="3" required="" autofocus=""></label></div> </fieldset><input class="remove_field" type="button" name="subadd" value="- Remove"><hr></div>');
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

                <h2> <span> Modified Your Research Paper Information </span></h2>
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
                    <a href="achievement.php" class="btn-primary">Skip</a>
                    <form action="controlPaper.php" method="post" class="myform" onsubmit="return checkFields();">
                        <div class="myfield">
                            <div>
                                <input type="button" name="add" value="+Add" onclick="loadMore();" id="add" title="Add another paper">
                            </div>
                            <fieldset><legend>Research Paper:</legend>
                                <div>
                                    <label>
                                        <input name="paper_name[]" id="paper_name" placeholder="Enter Research Paper Name:" type="text" tabindex="1" required="" autofocus="">
                                    </label>
                                </div>
                                <div>
                                    <label>
                                        <input name="doi_no[]" id="doi_no" placeholder="Enter DOI No:" type="text" tabindex="2" required="" autofocus="">
                                    </label>
                                </div>
                                <div>
                                    <label>
                                        <input name="journal[]" id="journal" placeholder="Enter Published Journal:" type="text" tabindex="3" required="" autofocus="">
                                    </label>
                                </div>
                            </fieldset>
                        </div> <!--- // End of myField Class -->
                        <div>
                            <input type="submit" value="Save & Next" name="store_paper">
                        </div>
                    </form>
                    <!-- /Form -->
                </div>
            </div>

            <div class="clearfix"></div>
        </div> <!---  //End of registration Class  --->
        <!---Start of the Table of the View Degrees. -->
        <h2> <span> List of Your Research Paper </span></h2>
        <div class="grids_of_12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Research Paper Name</th>
                    <th>DOI Number</th>
                    <th>Published Journal</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $serial = 0;
                foreach($allData as $key => $values){
                    $serial++;
                    $paper_name = substr($values->paper_name, 0, 20);
                    echo "      
                               <tr> 
                                   <td> 
                                   $serial</td>
                                   <td>". $paper_name. "</td>
                                   <td>$values->doi_no</td>
                                   <td>$values->journal</td>
                                   <td>
                                       <td><span class=\"pull-right\"><a class=\"btn btn-sm btn-warning\" type=\"button\" data-toggle=\"tooltip\" data-original-title=\"Edit this Paper\" href=\"updatePaper.php?paper_id=$values->id\"><i class=\"glyphicon glyphicon-edit\"></i></a></span></td>
                                       <td><span class=\"pull-right\"><a class=\"btn btn-sm bt-warning\" onclick=\"return confirm('Are you want to delete this Paper?')\" type=\"button\" data-toggle=\"tooltip\" data-original-title=\"Delete this Paper\" href=\"controlPaper.php?delete=$values->id\"><i class=\"glyphicon glyphicon-remove\"></i></a></span></td>   
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
            $("[id=paper_name]").change(function() {
                _paper_name = true;
            });
            $("[id=doi_no]").change(function() {
                _doi_no = true;
            });
            $("[id=journal]").change(function() {
                _journal = true;
            });

        });

        function checkFields() {
            if ((_paper_name == true) && (_doi_no == true) && (_journal == true) ) {
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
            var x = confirm("Are you sure you want to delete this Research Paper?");
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