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
					 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</form>
			<!--
			<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>-->


		</div>
</div>
</div>
</div>

<section>
	<div class="block">
		<div class="container">
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
                                            
                                            <li class=\"disabled\"><a href=\"index.php?Page=1\">1</a></li>
                                            
                                            <li class=\"disabled\"><a href=\"#\" >Next </a></li>
                                       ";
							}else {

								if (($page == 1) || ($pages == 1)):?>
									<li class="disabled"><a href="#">Previous</a></li>
									
								<?php elseif ($page == $pages): ?>
									<li>
										<a href='index.php?Page=<?php echo $page - 1; ?>'>Previous</a>
									</li>
								<?php else: ?>
									<li>
										<a href='index.php?Page=<?php echo $page - 1; ?>' >Previous</a>
									</li>
								<?php endif; ?>
								<?php
								for ($i = 1; $i <= $pages; $i++):
									?>
									<li class='<?php if ($i == $page) echo 'active'; ?>' id="<?php echo $i; ?>">
										<a href='index.php?Page=<?php echo $i; ?>'><?php echo $i; ?> </a>
									</li>
								<?php endfor; ?>
								<?php
								if ($page == $pages ): ?>
									<li class="disabled">
										<a href='#' aria-label="Next">Next</a>
									</li>
								<?php else: ?>
									<li  >
										<a href='index.php?Page=<?php echo $page + 1; ?>'>Next</a>
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
