<?php if(session_status()!=PHP_SESSION_ACTIVE) session_start();
require_once("../../vendor/autoload.php");
use App\Doctor\Doctor;
use App\Auth\Auth;
use App\Utility\Utility;
$obj= new Doctor();

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
    <title>Doctor Schedule Managenent || Doctor Panel </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Doctor Schedule Management" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Bootstrap Core CSS -->
    <link href="../../resource/admin/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="../../resource/admin/css/style.css" rel='stylesheet' type='text/css' />
    <!-- Graph CSS -->
    <link href="../../resource/admin/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="../../resource/admin/css/jquery-ui.css" />
    <link rel="stylesheet" href="../../resource/admin/css/viewstyle.css" />
    <!-- jQuery -->
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="../../resource/admin/css/icon-font.min.css" type='text/css' />
    <script src="../../resource/admin/js/amcharts.js"></script>
    <script src="../../resource/admin/js/serial.js"></script>
    <script src="../../resource/admin/js/light.js"></script>
    <!-- //lined-icons -->
    <script src="../../resource/admin/js/jquery-1.10.2.min.jss"></script>
    <script src="../../resource/admin/js/jquery.min.jss"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!--pie-chart--->
    <script src="../../resource/admin/js/pie-chart.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#3bb2d0',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#fbb03b',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ed6498',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });


        });

    </script>
</head>
<body>
<div class="page-container">
    <!--/content-inner-->
    <div class="left-content">
        <div class="inner-content">
            <!-- header-starts -->
            <div class="header-section">
                <!-- top_bg -->
                <div class="top_bg">

                    <div class="header_top">
                        <div class="top_right">
                            <ul>
                                <li><a href="#">help</a></li>|
                                <li><a href="../main/index.php">Go Main Page</a></li>|
                                <li><a href="Authentication/logout.php">Logout</a></li>

                            </ul>
                        </div>
                        <div class="top_left">
                            <h2><span></span> Call us : 032 2352 782</h2>
                        </div>
                        <div class="clearfix"> </div>
                    </div>

                </div>
                <div class="clearfix"></div>
                <!-- /top_bg -->
            </div>
            <!--Search Box -->
            <div class="header_bg">
                <div class="header">
                    <div class="head-t">
                        <div class="logo">
                            <a href=""><img src="../../resource/admin/images/logo.png" class="img-responsive" alt=""> </a>
                        </div>
                        <!-- start header_right -->
                        <div class="header_right">

                            <div class="search input-append span12">
                                <form id="searchForm" action="#" method="get" class="search-form">
                                    <input id="searchID" class="search-query" name="search" type="text" value="" placeholder="search...">
                                    <input type="submit" value="">
                                </form>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>

            </div> <!--  Search Box and Header End -->