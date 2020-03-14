<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
require_once ("../../vendor/autoload.php");

use App\Library\Library;
$objectLibrary = new Library();
$objectLibrary->setData($_GET);

$objectLibrary->trash("doctor_info");