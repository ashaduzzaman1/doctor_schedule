<?php
include_once('../../vendor/autoload.php');
if(!isset($_SESSION) )session_start();
use App\Message\Message;
?>

<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
    <title>Medicalist || Doctors Schedule Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="../../resource/main/css/materialize.min.css" />
    <link rel="stylesheet" href="../../resource/main/css/icons.css">
    <link rel="stylesheet" type="text/css" href="../../resource/main/css/style.css" />
    <link rel="stylesheet" type="text/css" href="../../resource/admin/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../../resource/main/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="../../resource/main/css/color.css" />

    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css" href="../../resource/main/css/revolution/settings.css">
    <link rel="stylesheet" type="text/css" href="../../resource/main/css/revolution/navigation.css">
    <link rel="stylesheet" type="text/css" href="../../resource/main/css/revolution/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
</head>
<body>
<div class="theme-layout">


    <div class="pageloader">
        <div class="loader">
            <div class="loader-inner ball-scale-ripple-multiple">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div><!-- Pageloader -->

    <div class="responsive-header">
        <div class="responsive-topbar">
            <div class="responsive-topbar-info">
                <div class="active"><i class="icon-telephone"></i><p><i class="icon-telephone"></i><strong>Call Us Today!</strong>  (732) 431-1616-01</p></div>
                <div><i class="icon-envelope2"></i><p><i class="icon-envelope2"></i><strong>Email!</strong>  youremail@yourdomain.com</p></div>
            </div><!-- Topbar Info -->
            <div class="topbar-social-search">
                <div class="responsive-social">
                    <a href="#" title=""><i class="fa fa-twitter"></i></a>
                    <a href="#" title=""><i class="fa fa-facebook"></i></a>
                    <a href="#" title=""><i class="fa fa-google-plus"></i></a>
                    <a href="#" title=""><i class="fa fa-linkedin"></i></a>
                </div>
                <form>
                    <input type="text" placeholder="Enter Your Search" />
                    <button><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div><!-- Responsive Topbar -->
        <div class="responsive-menu">
            <div class="logo"><a href="#" title=""><img src="../../resource/main/images/logo.png" alt="" /></a></div>
            <div class="responsive-menu-btns">
                <a class="call-popup popup1" href="#" title=""><i class="fa fa-user-md"></i> Get Free Consultation</a>
                <a class="open-menu" href="#" title=""><i class="fa fa-list"></i></a>
            </div>
        </div><!-- Responsive Menu -->

        <div class="responsive-links">
            <span><i class="fa fa-remove"></i></span>
            <ul>
                <li><a href="Non-index.php" title="">Home</a></li>
                <li><a href="about.php" title="">About Page</a></li>

                <li><a href="login.php" title="">Login</a></li>
                <li><a href="register.php" title="">Register</a></li>
                <li><a href="index.php" title="">Doctor Team</a></li>
                <li><a href="appointment.php" title="">Appointment</a></li>
                <li><a href="timetable.php" title="">Doctor's Timetable</a></li>

            </ul>
        </div><!-- Responsive Links -->
    </div><!-- Responsive Header -->

    <header class="stick">
        <div class="topbar style2">
            <div class="container">
                <ul class="topbar-info">
                    <li><i class="icon-telephone2"></i> <strong>Call Us Today!</strong>  (732) 431-1616-01</li>
                    <li><i class="icon-envelope"></i> <strong>Email:</strong>  sohojlovvo@phpwarrior.com</li>
                </ul>
                <div class="social-icons">
                    <a class="facebook" title="" href="#"><i class="fa fa-facebook"></i></a>
                    <a class="linkedin" title="" href="#"><i class="fa fa-linkedin"></i></a>
                    <a class="twitter" title="" href="#"><i class="fa fa-twitter"></i></a>
                    <a class="skype" title="" href="#"><i class="fa fa-skype"></i></a>
                </div>
                <div class="topbar-btn"><a class="call-popup popup1" href="#" title=""><i class="fa fa-user"></i> Get Free Consultation</a></div>
            </div>
        </div><!-- Topbar -->
        <div class="menu-bar-height"></div>
        <div class="menu-bar">
            <div class="container">
                <div class="logo"><a href="#" title=""><img src="../../resource/main/images/logo.png" alt="" /></a></div>
                <nav class="menu">
                </nav>
            </div>
        </div><!-- Menu Bar -->
    </header><!-- Header -->

    <div class="col-lg-8">
        <?php  if(isset($_SESSION['message']) && ($_SESSION['message']!="")){ ?>
            <?php  echo "&nbsp;".Message::message(); Message::message(NULL); ?>
        <?php } ?>
    </div>
    <style>
        @import "compass/css3";
        .alert{
            margin-left: 100px;
            margin-right: 400px !important;
        }
    </style>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 4000);
    </script>


    <div class="pagetop">
        <div class="container">
            <span>What We Actually Do?</span>
            <h1><span>MEDICALIST</span> Login </h1>
            <ul>
                <li><a href="register.php" title="">Home</a></li>
                <li>Registration</li>
            </ul>
        </div>
    </div>


    <section>
        <div class="block">
            <div class="parallax-container"><div data-speed="1" data-bleed="12" class="parallax"><img src="../../resource/main/images/resource/parallax6.jpg" alt="" /></div></div>
            <div class="container">
                <div class="row">
                    <div class="col offset-l1 l10 m12 s12 column">
                        <div class="registration-page">
                            <div class="theme-form login-form">
                                <div class="white-title">
                                    <i class="icon-key"></i>
                                    <h4>LOGIN NOW</h4>
                                    <span>Fill in the form below to get instant access</span>
                                </div>
                                <form action="User/Authentication/login.php" method="post">
                                    <div class="input-field col s12"><input type="email" name="email" placeholder="Email Address" required=""/></div>
                                    <div class="input-field col s12"><input type="password" name="password" placeholder="Password" required=""/></div>
                                    <a href="User/Profile/forgotten.php" title="">I Forgot My Password</a>
                                    <div class="input-field col s12"><button type="submit"><i class="fa fa-user-md"></i> Login Now</button></div>

                                </form>
                                <form action="register.php" >
                                <div class="other-logins button">
                                    <strong>Don't have any account?</strong>
                                    <button type="submit"><i class="fa fa-user-md"></i> Register Now</button>
                                </div>
                                </form>
                            </div><!-- Login Form -->

                        </div><!-- Registration Popup -->
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="bottom-footer">
        <div class="container">
            <p><a href="#" title=""> Soohojlovvo © 2018.</a> All Rights Reserved. </p>
            <ul>
                <li><a href="Non-index.php" title="">Home</a></li>
                <li><a href="service.php" title="">Medical Services</a></li>
                <li><a href="appointment.php" title="">Find a Physician</a></li>
                <li><a href="contact.php" title="">Contact Us</a></li>
                <li><a href="index.php" title="">Professionals</a></li>
            </ul>
        </div>
    </div>





</div>

<div class="popup">
    <div class="popup-container">
        <div class="popup-wrapper">
            <span class="close-all-popup"><i class="fa fa-close"></i></span>
            <div class="has-popup-content popup1">
                <div class="consultaion-popup">

                    <div class="consult-contact">
                        <i class="icon-telephone"></i>
                        <p>Please be patient while waiting for response.<strong>(24/7 Support!)</strong> Phone General Inquiries:</p>
                        <strong>+1 (022) 319 2687</strong>
                    </div>

                    <div class="appointment-form">
                        <div class="creative-title">
                            <i>Provide Comprehensive Quality Care</i>
                            <h4>Get Free Consulations</h4>
                            <span>Questions Or Inquiries</span>
                        </div>
                        <form>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" placeholder="Complete Name" />
                                </div>
                                <div class="input-field col s12">
                                    <input type="email" placeholder="Email Address" />
                                </div>
                                <div class="input-field col s12">
                                    <input type="text" placeholder="Subject" />
                                </div>
                                <div class="input-field col s12">
                                    <textarea placeholder="Description"></textarea>
                                </div>
                                <div class="input-field col s12">
                                    <button type="submit"><i class="fa fa-user-md"></i> Contact Us Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- Consultation Popup -->
            </div>

            <div class="has-popup-content popup2">
                <div class="appointment-popup">
                    <div class="appointment-tab style2">
                        <div class="row">
                            <div class="col s12 m12 l6">
                                <div class="appointment-details">
                                    <span>Provide Comprehensive</span>
                                    <h4>Make An <span>Appointment</span></h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam adipiscing elit orem.</p>
                                    <h5 class="subtitle">OPENING HOURS</h5>
                                    <div class="opening">
                                        <div class="timing"><span>Monday- Friday</span><i>8am to 7pm</i></div>
                                        <div class="timing"><span>Saturday</span><i>10am to 4pm</i></div>
                                        <div class="timing"><span>Sunday</span><i>Closed</i></div>
                                    </div>
                                </div><!-- Appointment Details -->
                            </div>
                            <div class="col s12 m12 l6">
                                <div class="appointment-form">
                                    <form>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <select>
                                                    <option value="" disabled selected>Select Your Country</option>
                                                    <option value="1">Option 1</option>
                                                    <option value="2">Option 2</option>
                                                    <option value="3">Option 3</option>
                                                </select>
                                            </div>
                                            <div class="input-field col s12">
                                                <select>
                                                    <option value="" disabled selected>Choose Service</option>
                                                    <option value="1">Option 1</option>
                                                    <option value="2">Option 2</option>
                                                    <option value="3">Option 3</option>
                                                </select>
                                            </div>
                                            <div class="input-field col s12">
                                                <select>
                                                    <option value="" disabled selected>Select Doctor</option>
                                                    <option value="1">Option 1</option>
                                                    <option value="2">Option 2</option>
                                                    <option value="3">Option 3</option>
                                                </select>
                                            </div>
                                            <div class="input-field simple-label col s12 l6 m6">
                                                <label>DATE FROM *</label>
                                            </div>
                                            <div class="input-field date-icon col s12 l6 m6">
                                                <input type="date" class="datepicker" placeholder="Choose Date" />
                                            </div>
                                            <div class="input-field simple-label col s12 l6 m6">
                                                <label>DESIRABLE TIME *</label>
                                            </div>
                                            <div class="input-field col s12 l6 m6">
                                                <select>
                                                    <option value="" disabled selected>Select Time</option>
                                                    <option value="1">01:00 AM</option>
                                                    <option value="2">05:00 PM</option>
                                                    <option value="3">09:00 PM</option>
                                                </select>
                                            </div>
                                            <div class="col s12">
                                                <p>All Fields With An ( * ) Are Required.</p>
                                            </div>
                                            <div class="input-field col s12">
                                                <button type="submit"><i class="fa fa-recycle"></i> Check Now</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Appointment Popup -->
            </div>

            <div class="has-popup-content popup3">
                <div class="gift-popup">
                    <div class="send-gift">
                        <div class="mockup"><img src="../../resource/main/images/mockup3.png" alt="" /></div>
                        <div class="gift-popup-text">
                            <i>Provide Comprehensive Quality Care</i>
                            <h3>Send Your Gift</h3>
                            <span>Care Health</span>
                            <p>Suspendisse metus blandit sed dolor quis, comiodo commodo elit mollis ligula eget.</p>
                            <div class="facny-btn-set">
                                <a class="color1" href="#" title="">
                                    <i class="fancy-icon icon-telephone"></i>
                                    <strong>(021) 987-234-56</strong>
                                    <i>Call Us Everyday</i>
                                </a>
                                <a class="color2" href="#" title="">
                                    <i class="fancy-icon icon-doctor"></i>
                                    <strong>Ask Us To Collect</strong>
                                    <i>Call Us Everyday</i>
                                </a>
                                <a class="color3" href="#" title="">
                                    <i class="fancy-icon icon-home"></i>
                                    <span>3200 Barbaros Bulvarı Istanbul</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!-- Gift Popup -->
            </div>

            <div class="has-popup-content popup4">
                <div class="event-registration">
                    <div class="event-popup-top">
                        <div class="event-popup-title">
                            <i>whats going on there come and learn</i>
                            <h3>about event <span>Registration</span></h3>
                        </div>
                        <div class="event-info">
                            <div class="event-cell half"><i class="fa fa-key"></i>245 Tickets</div>
                            <div class="event-cell half"><i class="fa fa-key"></i>Jan 17-19, 2015</div>
                            <div class="event-cell"><i class="fa fa-key"></i>3200 Barbaros Bulvarı Besiktas/Istanbul, TR</div>
                        </div>
                    </div>

                    <div class="appointment-form center">
                        <form>
                            <div class="row">
                                <div class="input-field col s12 m12 l4">
                                    <input type="text" placeholder="Complete Name" />
                                </div>
                                <div class="input-field col s12 m12 l4">
                                    <input type="email" placeholder="Email Address" />
                                </div>
                                <div class="input-field col s12 m12 l4">
                                    <input type="text" placeholder="Phone Number" />
                                </div>
                                <div class="input-field col s12">
                                    <button type="submit"><i class="fa fa-paper-plane"></i> Register Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="has-popup-content popup5">
                <div class="cash-popup">
                    <div class="cash-popup-inner">
                        <span>Provide Comprehensive Quality Care</span>
                        <h4>Send Us Cash Gift <span>Care Health</span></h4>
                        <p>Suspendisse metus blandit sed dolor quis, comiodo <br/> commodo elit mollis ligula eget.</p>
                        <form>
                            <div class="row">
                                <div class="col s12 m12 offset-l3 l6 ">
                                    <select>
                                        <option>Select Your Currency</option>
                                        <option>Currency 1</option>
                                        <option>Currency 2</option>
                                        <option>Currency 3</option>
                                        <option>Currency 4</option>
                                        <option>Currency 5</option>
                                    </select>
                                </div>
                                <div class="select-donate-price">
                                    <strong>How much would you like to Donate?</strong>
									<span class="button-set">
										<a href="#" title="">.00</a>
										<a class="active" href="#" title="">.00</a>
										<a href="#" title="">.00</a>
										<a href="#" title="">.00</a>
									</span>
									<span class="other-amount">
										<textarea placeholder="Enter The Amout You Want"></textarea>
									</span>
                                </div><!-- Select Donate Price -->
                                <div class="select-type">
                                    <strong>Select Your Payment Type</strong>
									<span class="button-set">
										<a href="#" title="">Reccurring</a>
										<a class="active" href="#" title="">One Time Payment</a>
									</span>
                                </div><!-- Select Type -->
                                <div class="select-option">
                                    <strong>Select Your Payment Option</strong>
									<span class="button-set">
										<a href="#" title="">Credit Card</a>
										<a class="active" href="#" title=""> Banking Transfer</a>
										<a href="#" title="">Paypal</a>
									</span>
                                    <p>In Case of credit card ,Transaction in Doller($) will be accepted.</p>
                                    <div class="row">
                                        <div class="col s12 m12 offset-l3 l6">
                                            <input type="text" placeholder="Enter your 16 digit card number:" />
                                        </div>
                                        <div class="col s12 m12 offset-l3 l6">
                                            <select>
                                                <option>Month Of Expiry</option>
                                                <option>Januray</option>
                                                <option>Feburary</option>
                                                <option>March</option>
                                                <option>April</option>
                                            </select>
                                        </div>
                                        <div class="col s12 m12 offset-l3 l6">
                                            <select>
                                                <option>Month Of Expiry</option>
                                                <option>Januray</option>
                                                <option>Feburary</option>
                                                <option>March</option>
                                                <option>April</option>
                                            </select>
                                        </div>
                                        <div class="col s12 m12 offset-l3 l6">
                                            <input type="text" placeholder="Card Verification Number" />
                                        </div>
                                    </div>
                                </div><!-- Select Type -->
                                <div class="personal-detail">
                                    <strong>Personal Detail</strong>
                                    <div class="row">
                                        <div class="col s12 m12 l6">
                                            <input type="text" placeholder="First Name" />
                                        </div>
                                        <div class="col s12 m12 l6">
                                            <input type="text" placeholder="Last Name" />
                                        </div>
                                        <div class="col s12 m12 l6">
                                            <input type="email" placeholder="Email Ids" />
                                        </div>
                                        <div class="col s12 m12 l6">
                                            <input type="text" placeholder="Phone Number" />
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <input type="text" placeholder="Address" />
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <textarea placeholder="Detail"></textarea>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <button class="dark-btn">Donate Now</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- Cash Popup -->
            </div>

        </div>
    </div>
</div><!-- Popup -->




<script src="../../resource/main/js/jquery.min.js" type="text/javascript"></script>

<script src="../../resource/main/js/materialize.min.js" type="text/javascript"></script>
<script src="../../resource/main/js/enscroll-0.5.2.min.js"></script>
<script type="text/javascript" src="../../resource/main/js/jquery.poptrox.min.js"></script>
<script src="../../resource/main/js/owl.carousel.min.js"></script>
<script src="../../resource/main/js/smoothscroll.js"></script>
<script src="../../resource/main/js/script.js" type="text/javascript"></script>


</body>
</html>