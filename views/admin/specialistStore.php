<?php
require_once("../../vendor/autoload.php");
use App\Specialist\Specialist;

$objSpecialist = new Specialist();
$objSpecialist->setData($_POST);

$objSpecialist->storeSpecialist();

