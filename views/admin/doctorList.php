<?php
require_once ("../../vendor/autoload.php");
use App\Library\Library;
$objLibrary = new Library();

$allData = $objLibrary->index("obj");

################## search  block1 start ##################
if(isset($_REQUEST['search']) )$allData =  $objLibrary->search($_REQUEST);

$availableKeywords=$objLibrary->getAllKeywords();
$comma_separated_keywords= '"'.implode('","',$availableKeywords).'"';
################## search  block1 end ##################

######################## pagination code block#1 of 2 start ######################################
$recordCount= count($allData);


if(isset($_REQUEST['Page']))   $page = $_REQUEST['Page'];
else if(isset($_SESSION['Page']))   $page = $_SESSION['Page'];
else   $page = 1;
$_SESSION['Page']= $page;

if(isset($_REQUEST['ItemsPerPage']))   $itemsPerPage = $_REQUEST['ItemsPerPage'];
else if(isset($_SESSION['ItemsPerPage']))   $itemsPerPage = $_SESSION['ItemsPerPage'];
else   $itemsPerPage = 3;
$_SESSION['ItemsPerPage']= $itemsPerPage;

$pages = ceil($recordCount/$itemsPerPage);
if ($_SESSION['Page'] > $pages) $page = 1;
$someData = $objLibrary->indexPaginator($page,$itemsPerPage);

$serial = (($page-1) * $itemsPerPage) +1;

####################### pagination code block#1 of 2 end #########################################

################## search  block2 start ##################

if(isset($_REQUEST['search']) ) {
    $someData = $objLibrary->search($_REQUEST);
    $serial = 1;
}
################## search  block2 end ##################

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
                    Doctor Schedule Management (DSM) || Active Doctor List

                </div>
                <script language="JavaScript">
                    function checkAll(theForm, cName) {
                        for (i=0,n=theForm.elements.length;i<n;i++)
                            if (theForm.elements[i].className.indexOf(cName) !=-1)
                                if (theForm.elements[i].checked == true) {
                                    theForm.elements[i].checked = false;
                                } else {
                                    theForm.elements[i].checked = true;
                                }
                    }
                </script>

                <div class="women">
                    <div class="">
                        <form id="selectForm" action="marked.php" method="post">
                        Select All &nbsp; <input type="checkbox" type="checkbox" onclick="checkAll(document.getElementById('selectForm'), 'marked');" />
                        &nbsp; Show &nbsp;
                        <select  class="select2-container"  name="ItemsPerPage" id="ItemsPerPage" onchange="javascript:location.href = this.value;" >
                            <?php
                            if($itemsPerPage==3 ) echo '<option value="?ItemsPerPage=3" selected > 3  </option>';
                            else echo '<option  value="?ItemsPerPage=3"> 3 </option>';

                            if($itemsPerPage==4 )  echo '<option  value="?ItemsPerPage=4" selected > 4  </option>';
                            else  echo '<option  value="?ItemsPerPage=4"> 4  </option>';

                            if($itemsPerPage==5 )  echo '<option  value="?ItemsPerPage=5" selected > 5  </option>';
                            else echo '<option  value="?ItemsPerPage=5"> 5  </option>';

                            if($itemsPerPage==6 )  echo '<option  value="?ItemsPerPage=6"selected > 6  </option>';
                            else echo '<option  value="?ItemsPerPage=6"> 6  </option>';

                            if($itemsPerPage==10 )   echo '<option  value="?ItemsPerPage=10"selected > 10  </option>';
                            else echo '<option  value="?ItemsPerPage=10"> 10  </option>';

                            if($itemsPerPage==15 )  echo '<option  value="?ItemsPerPage=15"selected > 15  </option>';
                            else    echo '<option  value="?ItemsPerPage=15"> 15  </option>';
                            ?>
                        </select>
                        Items Per Page &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <button class="btn btn-inverse" name="trashMarked">Trash All</button> &nbsp;&nbsp;
                        <button class="btn btn-danger" name="deleteMarked">Delete All</button>
                    </div>
                    <h4>
                        Total Number of Doctor -
                        <span><?php echo $recordCount; ?> </span>
                    </h4>
                    <div class="clearfix"></div>
                </div>

                <?php
                $i = 0;
                foreach($someData as $key => $values){
                $i++;
                ?>
                <div class="grids_of_4">
                    <div class="grid1_of_4">
                        <div class="content_box"><a href="doctorDetails.php?id=<?php echo $values->id ?>">
                                <img width="" height="" src="../../resource/drPicture/<?php echo $values->picture ?>" class="img-responsive" alt="">
                            </a>
                            <h4><a href="doctorDetails.php?id=<?php echo $values->id ?>"> <?php echo $values->dr_name ?></a></h4>
                            <p><input class="marked" type='checkbox' name='marked[]' value='<?php echo $values->id ?>'/> &nbsp; ID - <?php echo $values->unique_id ?></p>
                            <div class="grid_1 simpleCart_shelfItem">
                                <?php $cat = $objLibrary->viewSpecialistById($values->specialist_id); ?>
                                <div class="item_add"><span class="item_price"><h6><?php echo $cat->specialist ?></h6></span></div>
                                <div class="item_add"><span class="item_price"><a href="doctorDetails.php?id=<?php echo $values->id ?>">View details</a></span></div>
                                <ul class="w_nav">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> <!-- //grids_of_4 -->

                <?php
                    if (($i % 4) == 0 && $i != 0) echo '<div class="clearfix"></div>';
                $serial++;
                }
                ?>
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
                                            <a class=\"page-link\" href=\"doctorList.php?Page= 1\" tabdoctorList=\"-1\" aria-label=\"Previous\">
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
                                    <a class="page-link" href='doctorList.php?Page=<?php echo $page - 1; ?>' tabindex="-1" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                            <?php else: ?>
                                <li class="page-item">
                                    <a class="page-link" href='doctorList.php?Page=<?php echo $page - 1; ?>' tabindex="-1" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php
                            for ($i = 1; $i <= $pages; $i++):
                                ?>
                                <li class=' page-link <?php if ($i == $page) echo 'active'; ?>' id="<?php echo $i; ?>">
                                    <a class="page-link" href='doctorList.php?Page=<?php echo $i; ?>'><?php echo $i; ?> <span class="sr-only">(current)</span></a>
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
                                    <a class="page-link" href='doctorList.php?Page=<?php echo $page + 1; ?>' aria-label="Next">
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

    $(function() {
        var availableTags = [

            <?php
            echo $comma_separated_keywords;
            ?>
        ];
        // Filter function to search only from the beginning of the string
        $( "#searchID" ).autocomplete({
            source: function(request, response) {

                var results = $.ui.autocomplete.filter(availableTags, request.term);

                results = $.map(availableTags, function (tag) {
                    if (tag.toUpperCase().indexOf(request.term.toUpperCase()) === 0) {
                        return tag;
                    }
                });

                response(results.slice(0, 15));

            }
        });


        $( "#searchID" ).autocomplete({
            select: function(event, ui) {
                $("#searchID").val(ui.item.label);
                $("#searchForm").submit();
            }
        });

    });

</script>
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
