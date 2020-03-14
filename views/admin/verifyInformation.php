<?php
require_once ("../../vendor/autoload.php");
use App\Library\Library;
use App\Doctor\Doctor;
use App\Degree\Degree;
use App\Research\Research;
use App\Achievement\Achievement;
use App\Engaged\Engaged;
use App\WebContent\WebContent;

$objLibrary = new Library();
$objDoctor = new Doctor();
$objDegree = new Degree();
$objResearch = new Research();
$objAchievement = new Achievement();
$objEngaged = new Engaged();
$objWebContent = new WebContent();

$allData = $objDoctor->indexId("obj");

$recordCount = count($allData);


if(isset($_REQUEST['Page']))   $page = $_REQUEST['Page'];
else if(isset($_SESSION['Page']))   $page = $_SESSION['Page'];
else   $page = 1;
$_SESSION['Page']= $page;

if(isset($_REQUEST['ItemsPerPage']))   $itemsPerPage = $_REQUEST['ItemsPerPage'];
else if(isset($_SESSION['ItemsPerPage']))   $itemsPerPage = $_SESSION['ItemsPerPage'];
else   $itemsPerPage = 5;
$_SESSION['ItemsPerPage'] = $itemsPerPage;

$pages = ceil($recordCount/$itemsPerPage);
if ($_SESSION['Page'] > $pages) $page = 1;
$someData = $objDoctor->indexPaginator($page,$itemsPerPage);


$serial = (($page-1) * $itemsPerPage) +1;

?>


<?php include "../../resource/admin/inc/header.php"; ?>
<?php
use App\Message\Message;
$msg = Message::message();
if($msg != '')
{
    echo "<div class='alert alert-success alert-block' id='message'>
                <a class='close' data-dismiss='alert' href='#'>×</a>
                <h4 class='alert-heading'>Message!</h4>";
    echo $msg;
    echo "</div>";
}
?>


<!-- Start of main content description -->
<div class="content" xmlns="http://www.w3.org/1999/html">
    <nav class="women_main">
        <div class="w_content">
            <div class="panel-title">
                Doctor Schedule Management (DSM) || Doctor Advance Information
            </div>

            <div class="women">
                <div class="">
                    <form id="selectForm" action="" method="post">
                        <select  class="select2-container"  name="ItemsPerPage" id="ItemsPerPage" onchange="javascript:location.href = this.value;" >
                            <?php
                            if($itemsPerPage==5 ) echo '<option value="?ItemsPerPage=5" selected > 5  </option>';
                            else echo '<option  value="?ItemsPerPage=5"> 5 </option>';

                            if($itemsPerPage==10 )  echo '<option  value="?ItemsPerPage=10" selected > 10  </option>';
                            else  echo '<option  value="?ItemsPerPage=10"> 10  </option>';

                            if($itemsPerPage==15 )  echo '<option  value="?ItemsPerPage=15" selected > 15  </option>';
                            else echo '<option  value="?ItemsPerPage=15"> 15  </option>';

                            if($itemsPerPage==20 )  echo '<option  value="?ItemsPerPage=20"selected > 20  </option>';
                            else echo '<option  value="?ItemsPerPage=20"> 20  </option>';

                            if($itemsPerPage==30 )   echo '<option  value="?ItemsPerPage=30"selected > 30  </option>';
                            else echo '<option  value="?ItemsPerPage=30"> 30  </option>';

                            if($itemsPerPage==40 )  echo '<option  value="?ItemsPerPage=40"selected > 40  </option>';
                            else    echo '<option  value="?ItemsPerPage=40"> 40  </option>';
                            ?>
                        </select>
                        Items Per Page &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <h4>
                    Total Number of Information Need verification -
                    <span> <?php echo $recordCount; ?> </span>
                </h4>
                <div class="clearfix"></div>
            </div>


            <div class="grids_of_12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Doctor Name</th>
                        <th>Unique ID</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($someData as $key => $singleDr){
                        $values = $objLibrary->viewById('doctor_info', $singleDr->doctor_id);
                        echo "     
                               <tr>  
                                   <td>$serial</td>
                                   <td>
                                        <a href='verificationDocInfo.php?doctor=$values->id'>$values->dr_name </a>
                                   </td>
                                   <td>
                                       <a href='verificationDocInfo.php?doctor=$values->id'>$values->unique_id </a>
                                   </td>
                                   <td>
                                       <a href='verificationDocInfo.php?doctor=$values->id'>$values->email </a>
                                   </td>
                               </tr> ";

                        //if (($i % 4) == 0 && $i != 0) echo '<div class="clearfix"></div>';
                        $serial++;
                    }
                    ?>

                    </tbody>
                </table>

            </div> <!-- //grids_of_4 -->

            </form>

        </div><!-- //w-content-->
        <div class="clearfix"></div>
        <nav>
            <ul class="pagination">
                <?php if(!empty($pages)):

                    if ($page > $pages){
                        echo "<div class=\"pagination\">
                                        <ul>
                                            <li class=\"page-item disabled\">
                                            <a class=\"page-link\" href=\"#\" tabdoctorList=\"-1\" aria-label=\"Previous\">
                                            <span aria-hidden=\"true\">&laquo;</span>
                                            <span class=\"sr-only\">Previous</span>
                                            </a>
                                            </li>
                                            <li class=\"page-item disabled\">
                                            <a class=\"page-link\" href=\"verifyInformation.php?Page= 1\" tabdoctorList=\"-1\" aria-label=\"Previous\">
                                            <span aria-hidden=\"true\">1</span>
                                            <span class=\"sr-only\">1</span>
                                            </a>
                                            </li>
                                            <li class=\"page-item disabled\">
                                            <a class=\"page-link\" href=\"#\" tabdoctorList=\"-1\" aria-label=\"Next\">
                                            <span aria-hidden=\"true\">&raquo;</span>
                                            <span class=\"sr-only\">Next</span>
                                            </a>
                                            </li>
                                        </ul>
                                        </div>";
                    }else {

                        if (($page == 1) || ($pages == 1)):?>
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                        <?php elseif ($page == $pages): ?>
                            <li class="page-item">
                                <a class="page-link" href='verifyInformation.php?Page=<?php echo $page - 1; ?>' tabindex="-1" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="page-item">
                                <a class="page-link" href='verifyInformation.php?Page=<?php echo $page - 1; ?>' tabindex="-1" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php
                        for ($i = 1; $i <= $pages; $i++):
                            ?>
                            <li class=' page-link <?php if ($i == $page) echo 'active'; ?>' id="<?php echo $i; ?>">
                                <a class="page-link" href='verifyInformation.php?Page=<?php echo $i; ?>'><?php echo $i; ?> <span class="sr-only">(current)</span></a>
                            </li>
                        <?php endfor; ?>
                        <?php
                        if ($page == $pages ): ?>
                            <li class="page-item disabled">
                                <a class="page-link" href='#' aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="page-item">
                                <a class="page-link" href='verifyInformation.php?Page=<?php echo $page + 1; ?>' aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php
                    }
                endif;?>
            </ul>
        </nav>
        <!--End of Pagination --->
        <!-- //women_main -->
        <!--end main area description -->

        <?php include "../../resource/admin/inc/footer.php"; ?>

        <script>
            function ConfirmDelete() {
                var x = confirm("Are you sure you want to delete?");
                if (x)
                    return true;
                else
                    return false;
            }

            $('#message').show().delay(20).fadeOut();
            $('#message').show().delay(15).fadeIn();
            $('#message').show().delay(20).fadeOut();
            $('#message').show().delay(25).fadeIn();
            $('#message').show().delay(1200).fadeOut();
        </script>
