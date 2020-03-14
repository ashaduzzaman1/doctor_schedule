<?php
session_start();
require_once("../../vendor/autoload.php");
use App\Implementation\Implementation;
use App\Doctor\Doctor;
use App\Library\Library;
$objLibrary = new Library();

$objImplementation = new Implementation();
$objDoctor = new Doctor();

$doctors = $objDoctor->indexId("obj");
?>
    <style>
        table {
            border: solid 1px;
            text-align: center;
            border-collapse:collapse;
            style: 600px;
        }

        tr.header{
            font-weight: bold;
            background-color: #ffffff
        }

        td {
            border: 1px solid AppWorkspace;
            margin: 0;
            padding: 3px;
        }

    </style>
    <table>
    <tr class="header">
        <td>Name</td>
        <td>Rating</td>
        <td>Ranking</td>
    </tr>
<?php


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

    $patientReview = ($patientReview/35)*5;


    $doc = $objLibrary->viewById('doctor_info', $doctor->doctor_id);
    $docName = $doc->dr_name;

    ?>

        <tr>
            <td><?php echo $docName; ?></td>
            <td><?php echo round($patientReview, 5); ?></td>
            <td>  </td>

        </tr>


<?php
    

//  echo "ID ".$doctor->doctor_id." ----->  ".$total.'<br />';
    //$objImplementation->saveRating($total);

    $objImplementation->ResetObject();

}
?>
    </table>
