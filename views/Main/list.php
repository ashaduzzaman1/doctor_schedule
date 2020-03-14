<?php
require_once("../../vendor/autoload.php");
use App\Specialist\Specialist;

$objSpecialist = new Specialist();
$objSpecialist->setData($_POST);
$objSpecialist->setData($_FILES);

$fetchAll = $objSpecialist->viewAll();


if($_POST['pc'] == 1){
    echo "<label>Specialist: </label>
        <div class=\"input-field col s12 m12 l12\">
              <select class='browser-default' id=\"specialist\" name=\"specialist\" required='required'>
                 <option selected=\"selected\" disabled>Select a Specialist</option>";
                      foreach ($fetchAll as $item) {
                          echo "<option value='" . $item['id'] . "'>" . $item['specialist'] . "</option>";
                      }

    echo      "</select>
                <span></span>
               </div>";

}elseif($_POST['pc'] == 2){
    echo "<label>Symptoms: </label>
        <div class=\"input-field col s12 m12 l12\">
              <select class='browser-default' id=\"specialist\" name=\"specialist\" required='required'>
                 <option selected=\"selected\" disabled>Select a Symptoms</option>";
    foreach ($fetchAll as $item) {
        echo "<option value='" . $item['id'] . "'>" . $item['symptoms'] . "</option>";
    }

    echo      "</select>
                <span></span>
               </div>";
}

