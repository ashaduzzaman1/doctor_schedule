<?php include('../../resource/main/inc/header.php'); ?>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.jss"></script>
    <script>
        function ajax_post(){
            var hr = new XMLHttpRequest();
            var url = "list.php";
            var pc = document.getElementById("category").value;
            var vars = "pc="+pc;
            hr.open("POST", url, true);
            hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            hr.onreadystatechange = function() {
                if(hr.readyState == 4 && hr.status == 200) {
                    var return_data = hr.responseText;
                    document.getElementById("statust").innerHTML = return_data;
                }
            }
            hr.send(vars);
            document.getElementById("statust").innerHTML = "<img src='User/loads.gif' width='40' height='40' />";
        }
    </script>

    <div class="pagetop">
        <div class="container">
            <span>What We Actually Do?</span>
            <h1>Advance <span>SEARCH</span></h1>
            <ul>
                <li><a href="index.php" title="Home">Home</a></li>
                <li>Advance Search</li>
            </ul>
        </div>
    </div>
<?php
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
 <!--   <section>
        <div class="block gray">
            <div class="container">
                <div class="row">
                    <div class="col column offset-l2 s12 m12 l8">
                        <div class="modern-title">
                            <h2>If you need to Search by <span> Specialist or Symptoms </span><br/> Search Here </h2>
                            <span>Advance Search</span>
                        </div>

                        <div class="contact-form">
                            <div id="formresult"></div>
                            <form action="doctors_list.php" id="contact-form" method="post">
                                <div class="row">
                                    <label>Search By: </label>
                                    <div class="input-field col s12 m12 l12">
                                        <select class="browser-default" id="category" name="category" onclick="ajax_post();">
                                            <option selected="selected" disabled>Select One</option>
                                            <option value="1">Doctor's Specialist</option>
                                            <option value="2">Disease Symptoms </option>
                                        </select>
                                    </div>

                                    <div id="statust"></div>

                                    <div class="input-field col s12 m12 l12">
                                        <button id="submit" class="coloured-btn submit" type="submit" name="advance"><i class="fa fa-search"></i> SEARCH</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

<section>
    <div class="block gray">
        <div class="container">
            <div class="row">
                <div class="col column offset-l2 s12 m12 l8">
                    <div class="modern-title">
                        <h2>If you need to Search by <span> Specialist or Symptoms </span><br/> Search Here </h2>
                        <span>Advance Search</span>
                    </div>

                    <div class="contact-form">
                        <div id="formresult"></div>
                            <form action="doctors_list.php" id="formresult" method="post">
                                <div class="row">
                                    <label>Search By: </label>
                                    <div class="input-field col s12 m12 l12">
                                        <select class="browser-default" id="category" name="category" onclick="ajax_post();">
                                            <option selected="selected" disabled>Select One</option>
                                            <option value="1">Doctor's Specialist</option>
                                            <option value="2">Disease Symptoms </option>
                                        </select>
                                    </div>

                                    <div id="statust"></div>
                                    <div class="input-field col s12 m12 l12">
                                        <button id="submit" class="coloured-btn submit" type="submit" name="advance"><i class="fa fa-search"></i> SEARCH</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>






<?php include('../../resource/main/inc/footer.php'); ?>
<script>
    $('#message').show().delay(20).fadeOut();
    $('#message').show().delay(15).fadeIn();
    $('#message').show().delay(20).fadeOut();
    $('#message').show().delay(25).fadeIn();
    $('#message').show().delay(1200).fadeOut();
</script>
