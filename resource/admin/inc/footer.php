<div class="fo-top-di">
    <div class="foot-top">

        <div class="col-md-6 s-c">
            <li>
                <div class="fooll">
                    <h1>follow us on</h1>
                </div>
            </li>
            <li>
                <div class="social-ic">
                    <ul>
                        <li><a href="#"><i class="facebok"> </i></a></li>
                        <li><a href="#"><i class="twiter"> </i></a></li>
                        <li><a href="#"><i class="goog"> </i></a></li>
                        <li><a href="#"><i class="be"> </i></a></li>
                        <div class="clearfix"></div>
                    </ul>
                </div>
            </li>
            <div class="clearfix"> </div>
        </div>
        <div class="col-md-6 s-c">
            <div class="stay">
                <div class="stay-left">
                    <form>
                        <input type="text" placeholder="Enter your email" required="">
                    </form>
                </div>
                <div class="btn-1">
                    <form>
                        <input type="submit" value="join">
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="clearfix"> </div>

    </div>
<div class="footer">
    <div class="col-md-3 cust">
        <h4>CUSTOMER CARE</h4>
        <li><a href="contact.html">Help Center</a></li>
        <li><a href="faq.html">FAQ</a></li>
        <li><a href="details.html">How To Buy</a></li>
        <li><a href="checkout.html">Delivery</a></li>
    </div>
    <div class="col-md-2 abt">
        <h4>ABOUT US</h4>
        <li><a href="products.html">Our Stories</a></li>
        <li><a href="products.html">Press</a></li>
        <li><a href="faq.html">Career</a></li>
        <li><a href="contact.html">Contact</a></li>
    </div>
    <div class="col-md-2 myac">
        <h4>MY ACCOUNT</h4>
        <li><a href="register.html">Register</a></li>
        <li><a href="checkout.html">My Cart</a></li>
        <li><a href="checkout.html">Order History</a></li>
        <li><a href="details.html">Payment</a></li>
    </div>
    <div class="col-md-5 our-st">
        <div class="our-left">
            <h4>OUR STORES</h4>
        </div>

        <li><i class="add"> </i>Mark peter</li>
        <li><i class="phone"> </i>012-586987</li>
        <li><a href="mailto:info@phpwarrior.com"><i class="mail"> </i>info@phpwarrior.com </a></li>
    </div>
    <div class="clearfix"> </div>
    <p>© 2016-2017 Phpwarrior. All Rights Reserved | Design by <a href="#">phpwarrior</a></p>
</div>
</div>
</div>
<!--content-->
</div>
</div>
<!--//content-inner-->
<!--/sidebar-menu-->
<div class="sidebar-menu">
    <header class="logo1">
        <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>
    </header>
    <div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
    <div class="menu">
        <ul id="menu" >
            <li><a href="index.php"><i class="fa fa-tachometer"></i> <span>Home</span></a></li>
            <li id="menu-academico"><a href="specialist.php"><i class="fa fa-table"></i> <span>Manage Specialist</span></a></li>
            <li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i> <span> Manage Doctor</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" ><a href="doctorAdd.php">Doctor Add</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="doctorList.php">Doctor List</a></li>
                    <li id="menu-academico-boletim" ><a href="doctorTrashList.php">Doctor Trash List</a></li>
                </ul>
            </li>
            <li id="menu-academico" ><a href="verificationDocInfo.php"><i class="fa fa-table"></i> <span>Verification</span></a></li>
            <li id="menu-academico" ><a href="doctorScheduleList.php"><i class="fa fa-table"></i> <span>Doctor Schedule List</span></a></li>
            <li id="menu-academico" ><a href="#"><i class="lnr lnr-layers"></i> <span>Manage Patient</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" ><a href="userList.php">Patient list</a></li>
                    <li id="menu-academico-boletim" ><a href="patientTrashed.php">Patient Trashed</a></li>

                </ul>
            </li>
            <li id="menu-academico"><a href="#"><i class="fa fa-table"></i> <span>Mange Admin</span></a></li>

        </ul>
    </div>
</div>
<div class="clearfix"></div>
</div>
<script>
    var toggle = true;

    $(".sidebar-icon").click(function() {
        if (toggle)
        {
            $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
            $("#menu span").css({"position":"absolute"});
        }
        else
        {
            $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
            setTimeout(function() {
                $("#menu span").css({"position":"relative"});
            }, 400);
        }

        toggle = !toggle;
    });
</script>
<!--js -->
<script src="../../resource/admin/js/jquery.nicescroll.js"></script>
<script src="../../resource/admin/js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../../resource/admin/js/bootstrap.min.js"></script>
<!-- /Bootstrap Core JavaScript -->
<!-- real-time -->
<script language="javascript" type="text/javascript" src="../../resource/admin/js/jquery.flot.js"></script>
<script type="text/javascript">

    $(function() {

        // We use an inline data source in the example, usually data would
        // be fetched from a server

        var data = [],
            totalPoints = 300;

        function getRandomData() {

            if (data.length > 0)
                data = data.slice(1);

            // Do a random walk

            while (data.length < totalPoints) {

                var prev = data.length > 0 ? data[data.length - 1] : 50,
                    y = prev + Math.random() * 10 - 5;

                if (y < 0) {
                    y = 0;
                } else if (y > 100) {
                    y = 100;
                }

                data.push(y);
            }

            // Zip the generated y values with the x values

            var res = [];
            for (var i = 0; i < data.length; ++i) {
                res.push([i, data[i]])
            }

            return res;
        }

        // Set up the control widget

        var updateInterval = 30;
        $("#updateInterval").val(updateInterval).change(function () {
            var v = $(this).val();
            if (v && !isNaN(+v)) {
                updateInterval = +v;
                if (updateInterval < 1) {
                    updateInterval = 1;
                } else if (updateInterval > 2000) {
                    updateInterval = 2000;
                }
                $(this).val("" + updateInterval);
            }
        });

        var plot = $.plot("#placeholder", [ getRandomData() ], {
            series: {
                shadowSize: 0	// Drawing is faster without shadows
            },
            yaxis: {
                min: 0,
                max: 100
            },
            xaxis: {
                show: false
            }
        });

        function update() {

            plot.setData([getRandomData()]);

            // Since the axes don't change, we don't need to call plot.setupGrid()

            plot.draw();
            setTimeout(update, updateInterval);
        }

        update();

        // Add the Flot version string to the footer

        $("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
    });

</script>
<!-- /real-time -->
<script src="../../resource/admin/js/jquery.fn.gantt.js"></script>
<script>

    $(function() {

        "use strict";

        $(".gantt").gantt({
            source: [{
                name: "Sprint 0",
                desc: "Analysis",
                values: [{
                    from: "/Date(1320192000000)/",
                    to: "/Date(1322401600000)/",
                    label: "Requirement Gathering",
                    customClass: "ganttRed"
                }]
            },{
                name: " ",
                desc: "Scoping",
                values: [{
                    from: "/Date(1322611200000)/",
                    to: "/Date(1323302400000)/",
                    label: "Scoping",
                    customClass: "ganttRed"
                }]
            },{
                name: "Sprint 1",
                desc: "Development",
                values: [{
                    from: "/Date(1323802400000)/",
                    to: "/Date(1325685200000)/",
                    label: "Development",
                    customClass: "ganttGreen"
                }]
            },{
                name: " ",
                desc: "Showcasing",
                values: [{
                    from: "/Date(1325685200000)/",
                    to: "/Date(1325695200000)/",
                    label: "Showcasing",
                    customClass: "ganttBlue"
                }]
            },{
                name: "Sprint 2",
                desc: "Development",
                values: [{
                    from: "/Date(1326785200000)/",
                    to: "/Date(1325785200000)/",
                    label: "Development",
                    customClass: "ganttGreen"
                }]
            },{
                name: " ",
                desc: "Showcasing",
                values: [{
                    from: "/Date(1328785200000)/",
                    to: "/Date(1328905200000)/",
                    label: "Showcasing",
                    customClass: "ganttBlue"
                }]
            },{
                name: "Release Stage",
                desc: "Training",
                values: [{
                    from: "/Date(1330011200000)/",
                    to: "/Date(1336611200000)/",
                    label: "Training",
                    customClass: "ganttOrange"
                }]
            },{
                name: " ",
                desc: "Deployment",
                values: [{
                    from: "/Date(1336611200000)/",
                    to: "/Date(1338711200000)/",
                    label: "Deployment",
                    customClass: "ganttOrange"
                }]
            },{
                name: " ",
                desc: "Warranty Period",
                values: [{
                    from: "/Date(1336611200000)/",
                    to: "/Date(1349711200000)/",
                    label: "Warranty Period",
                    customClass: "ganttOrange"
                }]
            }],
            navigate: "scroll",
            scale: "weeks",
            maxScale: "months",
            minScale: "days",
            itemsPerPage: 10,
            onItemClick: function(data) {
                alert("Item clicked - show some details");
            },
            onAddClick: function(dt, rowId) {
                alert("Empty space clicked - add an item!");
            },
            onRender: function() {
                if (window.console && typeof console.log === "function") {
                    console.log("chart rendered");
                }
            }
        });

        $(".gantt").popover({
            selector: ".bar",
            title: "I'm a popover",
            content: "And I'm the content of said popover.",
            trigger: "hover"
        });

        prettyPrint();

    });

</script>
<script src="../../resource/admin/js/menu_jquery.jss"></script>
</body>
</html>