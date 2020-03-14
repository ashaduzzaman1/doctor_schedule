	<script type="text/javascript">
     /*   function ajax_post1(){
            var hr = new XMLHttpRequest();
            var url = "list.php";
            var cats = document.getElementById("category").value;
            var vars = "cate="+cats;
            hr.open("POST", url, true);
            hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            hr.onreadystatechange = function() {
                if(hr.readyState == 4 && hr.status == 200) {
                    var return_data = hr.responseText;
                    document.getElementById("status").innerHTML = return_data;
                }
            }
            document.getElementById("status").innerHTML = "processing...";
        }*/
    </script>
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
                    document.getElementById("status").innerHTML = return_data;
                }
            }
            hr.send(vars);
            document.getElementById("status").innerHTML = "processing...";
        }
    </script>


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

            <div id="status"></div>
            <!--
            <div class="input-field col s12 m12 l12">
                <button id="submit" class="coloured-btn submit" type="submit" name="advance"><i class="fa fa-search"></i> SEARCH</button>
            </div>-->
            <div class="input-field col s12"><button type="submit"><i class="fa fa-user-md"></i> Login Now</button></div>
            <input type="submit" value="search">
        </div>
    </form>