<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
require_once ("../../vendor/autoload.php");

use App\Patient\Patient;

$object = new Patient();
$object->setData($_POST);
$object->update();