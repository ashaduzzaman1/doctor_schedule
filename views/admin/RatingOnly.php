<?php
session_start();
require_once("../../vendor/autoload.php");
use App\Implementation\Implementation;
use App\Doctor\Doctor;
use App\Library\Library;

/* Main Part of the Program(Rating) */
$objLibrary = new Library();
$objImplementation = new Implementation();
$objDoctor = new Doctor();

$doctors = $objDoctor->indexId("obj");

    foreach ($doctors as $doctor) {
        $objImplementation->id = $doctor->doctor_id;

        $patientReview = $objImplementation->patientReview(35);
        $university = $objImplementation->university(10);
        $degree = $objImplementation->degree(15);
        $researchPaper = $objImplementation->researchPaper(15);

        $achievement = $objImplementation->achievement(6);
        $membership = $objImplementation->membership(6);
        $bmdc = $objImplementation->bmdc(10);
        $website = $objImplementation->website(4);
        $socialNetwork = $objImplementation->socialNetwork(3);
        $total = $patientReview + $bmdc + $researchPaper + $university +
            $degree + $achievement + $membership + $website + $socialNetwork;

        $objImplementation->saveRating($total); // Store the rating
        $objImplementation->ResetObject();  // reset the previous value of object
    }









?>
