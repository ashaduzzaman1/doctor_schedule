<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
require_once ("../../vendor/autoload.php");

use App\Library\Library;
$object = new Library();
$object->setData($_POST);
$object->updateSchedule();
