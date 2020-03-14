<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
require_once ("../../vendor/autoload.php");

use App\Specialist\Specialist;
use App\Utility\Utility;
$object = new Specialist();
$object->setData($_POST);

if (array_key_exists("update", $_POST)) {
    $object->update();
}
elseif (array_key_exists("deleteMarks", $_POST))
{
    $object->deleteMarked($_POST['marked']);
}
else
{
    Utility::redirect("specialist.php");
}