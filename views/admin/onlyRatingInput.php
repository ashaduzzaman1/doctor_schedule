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
        <td>Ratient Review</td>
        <td>Degree</td>
        <td>University</td>
        <td>Research</td>
        <td>Achievement</td>
        <td>Membership</td>
        <td>BMDC</td>
        <td>Website</td>
        <td>SocailNetwork</td>
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


    $doc = $objLibrary->viewById('doctor_info', $doctor->doctor_id);
    $docName = $doc->dr_name;

    ?>

        <tr>
            <td><?php echo $docName; ?></td>
            <td><?php echo $objImplementation->overallNumber; ?></td>
            <td><?php echo $objImplementation->sumDoctorValue($doctor->doctor_id,'degree_value', 'degree_table'); ?></td>
            <td><?php echo $objImplementation->singleMaxValue($doctor->doctor_id, 'institute_rate', 'degree_table'); ?></td>
            <td><?php echo $objImplementation->sumDoctorValue($doctor->doctor_id, 'paper_rating', 'research_table'); ?></td>
            <td><?php echo $objImplementation->sumDoctorValue($doctor->doctor_id, 'org_level', 'achievement_table'); ?></td>
            <td><?php echo $objImplementation->sumDoctorValue($doctor->doctor_id, 'org_level', 'engaged_table'); ?></td>
            <td><?php $bmdc = $objImplementation->viewRowById('web_content_table', $doctor->doctor_id); echo $bmdc->bmdc_value; ?></td>
            <td><?php echo $objImplementation->findSingleValue('website_value', 'web_content_table'); ?></td>
            <td><?php echo $objImplementation->findSingleValue('facebook_value', 'web_content_table'); ?></td>

        </tr>


<?php




    //$total = $patientReview + $bmdc + $researchPaper + $university + $degree + $achievement + $membership + $website + $socialNetwork;

//  echo "ID ".$doctor->doctor_id." ----->  ".$total.'<br />';
    //$objImplementation->saveRating($total);

    //$objImplementation->ResetObject();

}
?>
    </table>
