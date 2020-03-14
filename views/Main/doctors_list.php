<?php if(session_status()!=PHP_SESSION_ACTIVE) session_start();
require_once ("../../vendor/autoload.php");
use App\Search\Search;
use App\Library\Library;
use App\Utility\Utility;
use App\Message\Message;
$objSearch = new Search();
$objLibrary = new Library();
if (isset($_POST['specialist'])){
    $_SESSION['s_id'] = $_POST['specialist'];
    $_SESSION['s_id'] = (int) trim($_SESSION['s_id']);
}elseif(isset($_SESSION['s_id'])){

}else{
    Message::message('Sorry! Please Try Again.');
    Utility::redirect('advance_search.php');
}

$allData = $objSearch->index("obj", $_SESSION['s_id']);

######################## pagination code block#1 of 2 start ######################################
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
$someData = $objSearch->indexPaginator($page, $itemsPerPage, $_SESSION['s_id']);

$serial = (($page-1) * $itemsPerPage) +1;
####################### pagination code block#1 of 2 end #########################################
?>

<?php include('../../resource/main/inc/header.php'); ?>

<div class="pagetop">
    <div class="container">
        <span>What We Actually Do?</span>
        <h1><span>MEDICALIST</span> LIST OF DOCTORS</h1>
        <ul>
            <li><a href="index.php" title="">Home</a></li>
        </ul>
    </div>
</div>
<?php
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
<div class="block double-parallax remove-bottom" style="">
    <div class="col l4 m12 s12 column" style="margin: -70px 0px 0px 0px">
        <div class="appointment-form" style="height: 0px">
            <div class="row" style="padding: 0px 0px 0px 100px; margin: -30px;">
                <form class="first-form">
                    <div class="input-field col s12" style="width: 220px; float: left;">
                        <form id="searchForm" action="index.php"  method="get">
                            <input type="text" value="" id="searchID" name="search" placeholder="Search" width="60" >
                            <input hidden type="submit" class="btn-primary" value="search">
                        </form>
                        <a href="advance_search.php">Advance Search</a>
                    </div>
                </form>
                <form>
                    <div class="input-field col s12" style="width: 220px">
                        <select  type="text" size="25" name="ItemsPerPage" id="ItemsPerPage" onchange="javascript:location.href = this.value;" >
                            <?php
                            if($itemsPerPage==5 ) echo '<option value="?ItemsPerPage=5" selected > 5  </option>';
                            else echo '<option  value="?ItemsPerPage=5"> 5 </option>';

                            if($itemsPerPage==10 )  echo '<option  value="?ItemsPerPage=10" selected > 10  </option>';
                            else  echo '<option  value="?ItemsPerPage=10"> 10  </option>';

                            if($itemsPerPage==20 )  echo '<option  value="?ItemsPerPage=20" selected > 20  </option>';
                            else echo '<option  value="?ItemsPerPage=20"> 20  </option>';

                            if($itemsPerPage==30 )  echo '<option  value="?ItemsPerPage=30"selected > 30  </option>';
                            else echo '<option  value="?ItemsPerPage=30"> 30  </option>';

                            if($itemsPerPage==40 )   echo '<option  value="?ItemsPerPage=40"selected > 40  </option>';
                            else echo '<option  value="?ItemsPerPage=10"> 10  </option>';

                            if($itemsPerPage==50 )  echo '<option  value="?ItemsPerPage=50"selected > 50  </option>';
                            else    echo '<option  value="?ItemsPerPage=15"> 50  </option>';
                            ?>
                        </select>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </form>

            </div>
        </div>
    </div>
</div>

<section>
    <div class="block">
        <div class="container">
            <div class="member-detail">
                <?php $cat = $objLibrary->viewSpecialistById($_SESSION['s_id']); ?>
                <h2>Category Name -  <b><?php echo $cat->specialist; ?></b><strong></strong></h2>
                <span>Result <?php echo $_SESSION['ItemsPerPage']; ?> of <?php echo $recordCount; ?></span>
            </div><!-- Member Detail -->
            <div class="row">
                <div class="col column s12 m12 l12">
                    <div class="all-surgeons">
                        <div class="row">

                            <?php
                            $i = 0;
                            foreach($someData as $key => $values){
                                $i++;
                                ?>

                                <div class="col s12 m6 l3">
                                    <div class="surgeon">
                                        <a href="doctorDetails.php?id=<?php echo $values->id ?>" title="Doctor Details"><img src="../../resource/drPicture/<?php echo $values->picture ?>" height="300px" alt="" /></a>
                                        <div class="surgeon-info">
                                            <div class="surgeon-name">
                                                <h3><a href="#" title=""><?php echo $values->dr_name ?></a></h3>

                                                <div class="rating-symbol" style="display: inline-block; position: relative;">
                                                    <div class="rating-symbol-background fa fa-star-o fa-3x" style="visibility: visible;"></div>
                                                    <div class="rating-symbol-foreground" style="display: inline-block; position: absolute; overflow: hidden; left: 0px; right: 0px; width: <?php echo round($values->rating_point); ?>%;">
                                                        <span class="fa fa-star fa-3x"></span>
                                                    </div>
                                                </div>
                                                <strong style="font-size: 25px;"> &nbsp; &nbsp; <?php echo $objSearch->makeRate($values->rating_point); ?></strong>


                                                <span> ID: <?php echo $values->unique_id ?></span>
                                                <?php $cat = $objLibrary->viewSpecialistById($values->specialist_id); ?>
                                                <span>Specialist: <?php echo $cat->specialist ?></span>
                                            </div>
                                            <a class="dark-btn" href="appointment.php?d_id=<?php echo $values->id ?>" title="Book The Doctor">
                                                <i class="fa fa-user"></i>
                                                BOOK NOW
                                            </a>
                                        </div>
                                    </div><!-- Surgeon -->
                                </div>

                                <?php
                                $serial++;
                            }
                            ?>


                        </div> <!-- row class-- -->
                    </div><!-- All Surgeons -->

                    <ul class="pagination theme-pagi">
                        <?php if(!empty($pages)):

                            if ($page > $pages){
                                echo "      <li class=\"disabled\"><a href=\"#\">Previous</a></li>
                                            
                                            <li class=\"disabled\"><a href=\"doctors_list.php?Page=1\">1</a></li>
                                            
                                            <li class=\"disabled\"><a href=\"#\" >Next </a></li>
                                       ";
                            }else {

                                if (($page == 1) || ($pages == 1)):?>
                                    <li class="disabled"><a href="#">Previous</a></li>

                                <?php elseif ($page == $pages): ?>
                                    <li>
                                        <a href='doctors_list.php?Page=<?php echo $page - 1; ?>'>Previous</a>
                                    </li>
                                <?php else: ?>
                                    <li>
                                        <a href='doctors_list.php?Page=<?php echo $page - 1; ?>' >Previous</a>
                                    </li>
                                <?php endif; ?>
                                <?php
                                for ($i = 1; $i <= $pages; $i++):
                                    ?>
                                    <li class='<?php if ($i == $page) echo 'active'; ?>' id="<?php echo $i; ?>">
                                        <a href='doctors_list.php?Page=<?php echo $i; ?>'><?php echo $i; ?> </a>
                                    </li>
                                <?php endfor; ?>
                                <?php
                                if ($page == $pages ): ?>
                                    <li class="disabled">
                                        <a href='#' aria-label="Next">Next</a>
                                    </li>
                                <?php else: ?>
                                    <li  >
                                        <a href='doctors_list.php?Page=<?php echo $page + 1; ?>'>Next</a>
                                    </li>
                                <?php endif; ?>
                                <?php
                            }
                        endif;?>
                    </ul>


                </div>
            </div>
        </div>
    </div>
</section>

<?php include('../../resource/main/inc/footer.php'); ?>

<script>
    $('#message').show().delay(20).fadeOut();
    $('#message').show().delay(15).fadeIn();
    $('#message').show().delay(20).fadeOut();
    $('#message').show().delay(25).fadeIn();
    $('#message').show().delay(1200).fadeOut();
</script>
