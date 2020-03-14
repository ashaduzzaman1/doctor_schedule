<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
require_once("../../vendor/autoload.php");
use App\Library\Library;
use App\Schedule\Schedule;
use App\Utility\Utility;

$objLibrary = new Library();
$objSchedule = new Schedule();

//$objLibrary->setData($_POST);
//Utility::dd($_POST);
$objSchedule->setData($_POST['doctor_id'],$_POST['booking_day'], $_POST['booking_date']);
$serial = $objSchedule->makeSerial();                                                  // Get the Patient Serial...
//echo $serial; die();
$objSchedule->setData($_POST['doctor_id'],$_POST['booking_day'], $_POST['booking_date']);
$shift = $objSchedule->findShift($_POST['booking_time']);                            //Find Shift...

$a = $objLibrary->timeFormat($_POST['booking_time']);
$another = $_POST['booking_time']+1;
$b = $objLibrary->timeFormat($another);
$booking_time = $a."-".$b;                                                          ///Find Perfect Time Format

$data = array("doctor_id"=>$_POST['doctor_id'], "user_id"=>$_SESSION['id'], "booking_serial"=>$serial, "booking_shift"=>$shift, "booking_time"=>$booking_time, "booking_date"=>$_POST['booking_date'], "booking_day"=>$_POST['booking_day'], "status"=>"Ok");

//Utility::dd($data);
$objSchedule->storeBooking($data);

