<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
require_once ("../../vendor/autoload.php");

use App\Patient\Patient;
$objectPatient = new Patient();
$objectPatient->setData($_GET);

$objectPatient->trash("patient");