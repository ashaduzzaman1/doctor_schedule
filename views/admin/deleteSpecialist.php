<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
require_once ("../../vendor/autoload.php");

use App\Specialist\Specialist;
$objectSpecialist = new Specialist();
$objectSpecialist->setData($_GET);

$objectSpecialist->delete();