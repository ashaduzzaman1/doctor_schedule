<?php
include_once('../../vendor/autoload.php');
if(!isset($_SESSION) )session_start();
use App\Message\Message;
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
    <title>Login || Doctor Panel || Doctors Schedule Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="../../resource/main/css/materialize.min.css" />
    <link rel="stylesheet" href="../../resource/main/css/icons.css">
    <link rel="stylesheet" type="text/css" href="../../resource/main/css/style.css" />
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
                <div><i class="icon-envelope2"></i><p><i class="icon-envelope2"></i><strong>Email!</strong>  phpwarrior@phpwarrior.com</p></div>
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
                <a class="call-popup popup1" href="../main/login.php" title=""><i class="fa fa-user-md"></i> Login as Patient/User</a>
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
                    <li><i class="icon-envelope"></i> <strong>Email:</strong>  phpwarrior@phpwarrior.com</li>
                </ul>
                <div class="social-icons">
                    <a class="facebook" title="" href="#"><i class="fa fa-facebook"></i></a>
                    <a class="linkedin" title="" href="#"><i class="fa fa-linkedin"></i></a>
                    <a class="twitter" title="" href="#"><i class="fa fa-twitter"></i></a>
                    <a class="skype" title="" href="#"><i class="fa fa-skype"></i></a>
                </div>
                <div class="topbar-btn"><a class="" href="../main/login.php" title=""><i class="fa fa-user"></i> Login as Patient/User</a></div>
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
<div>
    <table>
        <tr>
            <td width='230' >

            <td width='600' height="50" >

                <?php  if(isset($_SESSION['message']) )if($_SESSION['message']!=""){ ?>

                    <div  id="message" class="form button"   style="font-size: smaller  " >
                        <center>
                            <?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
                                echo "&nbsp;".Message::message();
                            }
                            Message::message(NULL);
                            ?></center>
                    </div>
                <?php } ?>
            </td>
        </tr>
    </table>
</div>


    <div class="pagetop">
        <div class="container">
            <span>What We Actually Do?</span>
            <h1><span>MEDICALIST</span> Doctor Login </h1>
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
                                    <h4>DOCTOR LOGIN</h4>
                                    <span>Fill in the form below to get instant access</span>
                                </div>
                                <form action="Authentication/login.php" method="post">
                                    <div class="input-field col s12"><input type="email" name="email" placeholder="Email Address" required=""/></div>
                                    <div class="input-field col s12"><input type="password" name="password" placeholder="Password" required=""/></div>
                                    <a href="#" title="">I Forgot My Password</a>
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
            <p><a href="#" title=""> PHP Warrior © 2016.</a> All Rights Reserved. </p>
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




<script src="../../resource/main/js/jquery.min.js" type="text/javascript"></script>

<script src="../../resource/main/js/materialize.min.js" type="text/javascript"></script>
<script src="../../resource/main/js/enscroll-0.5.2.min.js"></script>
<script type="text/javascript" src="../../resource/main/js/jquery.poptrox.min.js"></script>
<script src="../../resource/main/js/owl.carousel.min.js"></script>
<script src="../../resource/main/js/smoothscroll.js"></script>
<script src="../../resource/main/js/script.js" type="text/javascript"></script>


</body>
</html>