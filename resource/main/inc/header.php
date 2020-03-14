<?php if(session_status()!=PHP_SESSION_ACTIVE) session_start();

require_once("../../vendor/autoload.php");
use App\User\User;
use App\User\Auth;
use App\Utility\Utility;
$obj= new User();

$auth= new Auth();
$status = $auth->logged_in();

if(!$status) {
    Utility::redirect('login.php');
    return;
}
?>

<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
    <title>Doctor Schedule & Appointment || Medicalist</title>
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

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
            <div class="logo"><a href="index.php" title=""><img src="../../resource/main/images/logo.png" alt="" /></a></div>
            <div class="responsive-menu-btns">
                <a class="call-popup popup1" href="#" title=""><i class="fa fa-user-md"></i> Get Free Consultation</a>
                <a class="open-menu" href="#" title=""><i class="fa fa-list"></i></a>
            </div>
        </div><!-- Responsive Menu -->

        <div class="responsive-links">
            <span><i class="fa fa-remove"></i></span>
            <ul>
                <li><a href="index.php" title="">Home</a></li>
                <li><a href="about.php" title="">About Page</a></li>

                <li><a href="staff.php" title="">Doctor Team</a></li>
                <li><a href="appointment.php" title="">Appointment</a></li>
                <li><a href="timetable.php" title="">Doctor's Timetable</a></li>
                <li><a href="../User/Authentication/logout.php"><i class="icon-key"></i> Log Out</a></li>

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
                <div class="topbar-btn"><a class="call-popup popup1" href="#" title=""><i class="fa fa-user"></i> Get Free Consultation</a></div>
            </div>
        </div><!-- Topbar -->
        <div class="menu-bar-height"></div>
        <div class="menu-bar">
            <div class="container">
                <div class="logo"><a href="index.php" title=""><img src="../../resource/main/images/logo.png" alt="" /></a></div>
                <nav class="menu">
                    <ul>
                        <li><a href="index.php" title="Home">Home</a></li>
                        <li><a href="about.php" title="About Us">About Page</a></li>
                        <li><a href="advance_search.php" title="time">Advance Search</a></li>
                        <li><a href="appointment.php" title="Doctor's Appointment">Appointment</a></li>
                        <li><a href="patientScheduleList.php" title="Show Schedule">Your Schedule List</a></li>
                        <li><a href="patientProfile.php" title="Show Profile">Your Profile</a></li>
                        <li><a href="User/Authentication/logout.php" title="Log Out"> Log Out</a></li>
                    </ul>

                </nav>
            </div>
        </div><!-- Menu Bar -->
    </header><!-- Header -->