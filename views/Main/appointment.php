<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
require_once "../../vendor/autoload.php";
use App\Library\Library;
use App\Schedule\Schedule;
use App\Utility\Utility;
use App\Message\Message;

$objSchedule = new Schedule();

$objLibrary = new Library();
date_default_timezone_set('Asia/Dhaka');

$date = date("Y-m-d");
$day = date("l");
$currentDay = date("l");
//unset($_SESSION['day']);

$_SESSION['date'] = $date;
$objLibrary->setData($_GET);
$isDoctorExists =  $objLibrary->view("doctor_info");

if (array_key_exists('d_id',$_GET)){
	$_SESSION['d_id'] = $_GET['d_id'];

	if ($isDoctorExists == true){

	}else{
		Message::message('Please Select a doctor to appointment...');
		Utility::redirect('index.php');
	}
}elseif (!isset($_SESSION['d_id'])){
	Utility::redirect('index.php');
}

if (isset($_GET['dayName'])){
	$day = $_GET['dayName'];
	$_SESSION['dayName'] = $_GET['dayName'];
}else{
	$_SESSION['dayName'] = $day;
}
//Utility::dd($_SESSION);
?>
<?php include('../../resource/main/inc/header.php'); ?>


	<div class="block double-parallax remove-bottom">
		<div class="col l4 m12 s12 column">
			<div class="appointment-form">
				<div class="row">
					<form>
						<div class="input-field col s12" style="width: 220px">
							<select  type="text" size="25" name="dayName" id="dayName" onchange="javascript:location.href = this.value;" >
								<?php
								if($day == "Saturday") echo '<option value="?dayName=Saturday" selected > Saturday  </option>';
								else echo '<option  value="?dayName=Saturday"> Saturday </option>';

								if($day == "Sunday") echo '<option value="?dayName=Sunday" selected > Sunday  </option>';
								else echo '<option  value="?dayName=Sunday"> Sunday </option>';

								if($day == "Monday") echo '<option value="?dayName=Monday" selected > Monday  </option>';
								else echo '<option  value="?dayName=Monday"> Monday </option>';

								if($day == "Thuesday") echo '<option value="?dayName=Thuesday" selected > Thuesday  </option>';
								else echo '<option  value="?dayName=Thuesday"> Thuesday </option>';

								if($day == "Wednesday") echo '<option value="?dayName=Wednesday" selected > Wednesday  </option>';
								else echo '<option  value="?dayName=Wednesday"> Wednesday </option>';

								if($day == "Thursday") echo '<option value="?dayName=Thursday" selected > Thursday  </option>';
								else echo '<option  value="?dayName=Thursday"> Thursday </option>';

								if($day == "Friday") echo '<option value="?dayName=Friday" selected > Friday  </option>';
								else echo '<option  value="?dayName=Friday"> Friday </option>';
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

<?php
$list = $objSchedule->weekRange($date);
$objSchedule->setDayName($day);
$selectDate = $objSchedule->findNextDate($list[0]);
//Utility::dd($next);
$objSchedule->setData($_SESSION['d_id'], $day, $selectDate);
$rowMoring  = $objSchedule->checkScheduleByDay("Morning");
//var_dump($rowMoring);
?>
<?php
$objLibrary->setData($_SESSION);
$doctorData = $objLibrary->view("doctor_info");
$doctorScheduleData = $objLibrary->viewSchedule($doctorData->unique_id);
?>
<?php
$mStart = $doctorScheduleData->morning_time_from;
$mEnd = $doctorScheduleData->morning_time_to;

$eStart = $doctorScheduleData->evening_time_from;
$eEnd = $doctorScheduleData->evening_time_to;
?>

	<section>
		<div class="block double-parallax remove-bottom" style="margin: -80px 0px -30px 0px;">
			<div class="parallax-container"><div data-speed="1" data-bleed="12" class="parallax"><img src="../../resource/main/images/resource/double-parallax1.jpg" alt="" /></div></div>
			<div class="parallax-container"><div data-speed="0.4" class="parallax"><img src="../../resource/main/images/resource/double-parallax2.jpg" alt="" /></div></div>
			<div class="row">
				<div class="col l4 m12 s12 column">
					<div class="opening-shortcode">
						<div class="modern-title">
							<h2>DOCTOR WORKING <span>HOURS</span></h2>
							<span>Aenean cursus fermentum euismod rase sodales nibh sed egestas adipiscing.</span>
						</div>
						<div class="opening">
							<p>Morning Shift Time</p>
							<?php
							for ($i= $mStart; $i<= $mEnd; $i++) {
								$a = $objLibrary->timeFormat($i);
								$b = $objLibrary->timeFormat($i+1);
								echo "<div class=\"timing\"><span>Time </span><i> $a – $b </i></div>";
							}
							?>
							<hr>
							<p>Evening Shift Time</p>
							<?php
							for ($i= $eStart; $i<= $eEnd; $i++) {
								$a = $objLibrary->timeFormat($i);
								$b = $objLibrary->timeFormat($i+1);
								echo "<div class=\"timing\"><span>Time </span><i> $a – $b </i></div>";
							}
							?>
						</div><!-- Opening Hours -->
					</div><!-- Opening Shortcode -->
				</div>

				<div class="col l4 m12 s12 column">
					<div class="appointment-form">
						<div class="simple-title">
							<h5>Booking Date: <?php echo $selectDate ?></h5>
							<h4>Make An Appointment Of</h4>
							<h4><?php echo $doctorData->dr_name." || ".$doctorData->unique_id ?></h4>
							<?php $cat = $objLibrary->viewSpecialistById($doctorData->specialist_id); ?>
							<span><?php echo $cat->specialist." || ".$doctorData->location ?></span>
							<span>Booking Date: <?php echo $selectDate ?></span>
						</div>
						<form action="booking.php" method="post">
							<div class="row">
								<div class="input-field col s12">
									<select name="booking_time" required="required">
										<option value="" disabled selected>Select Time Slot</option>
										<option disabled>Morning Shift</option>

										<?php
										for ($i= $mStart; $i<= $mEnd; $i++) {
											$a = $objLibrary->timeFormat($i);
											$b = $objLibrary->timeFormat($i+1);
											$slot = $a.'-'.$b;
											$objSchedule->setData($_SESSION['d_id'], $_SESSION['dayName'], $selectDate);
											$total = $objSchedule->checkPatientInHour($slot);
											if ($total > 3 ) {
												echo "<option value=\"$i\" disabled='disabled'>$a - $b </option>";
											}else{
												echo "<option value=\"$i\">$a - $b </option>";
											}
										}
										?>
										<option disabled>Evening Shift</option>
										<?php
										for ($i= $eStart; $i<= $eEnd; $i++) {
											$a = $objLibrary->timeFormat($i);
											$b = $objLibrary->timeFormat($i+1);
											$slot = $a.'-'.$b;
											$objSchedule->setData($_SESSION['d_id'], $_SESSION['dayName'], $selectDate);
											$total = $objSchedule->checkPatientInHour($slot);
											if ($total > 3 ) {
												echo "<option value=\"$i\" disabled>$a - $b </option>";
											}else{
												echo "<option value=\"$i\">$a - $b </option>";
											}
										}
										?>
									</select>
								</div>
								<input type="hidden" name="doctor_id" value="<?php echo $_SESSION['d_id']; ?>">
								<input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
								<input type="hidden" name="booking_date" value="<?php echo $selectDate; ?>">
								<input type="hidden" name="booking_day" value="<?php echo $_SESSION['dayName']; ?>">
								<input type="hidden" name="schedule_id" value="<?php echo $doctorScheduleData->id; ?>">

								<div class="col s12">
									<p>All Fields With An ( * ) Are Required.</p>
								</div>
								<div class="input-field col s12">
									<button type="submit"><i class="fa fa-recycle"></i> Book Schedule</button>
								</div>
							</div>
						</form>

					</div><!-- Appointment Form -->
				</div>
				<div class="col l4 m12 s12 column">
					<div class="mockup overlap"><img src="../../resource/main/images/mockup.png" alt="" /></div>
				</div>
				<!-- $Start - Review and rating system Part -->
				<link rel="stylesheet" type="text/css" href="../../resource/main/css/review.css" />
						<div id="dv0"></div>
				<script type="text/javascript">
					$(document).ready(function () {
						$("#demo3 .stars").click(function () {
							$.post('rating.php',{rating:$(this).val()},function(d){
								document.getElementById("thanks").innerHTML = d;
							});
							var label = $("label[for='" + $(this).attr('id') + "']");

							//$("#feedback").text(label.attr('title'));

							$(this).attr("checked");
							$('#demo3').show().delay(200).fadeOut();
							$('#feedback').show().delay(900).fadeOut();
							$('#thanks').show().delay(100).fadeIn();
							document.getElementById("thanks").innerHTML = "Thanks for Rating......";
							$('#thanks').css('color', 'green').css('visibility', 'visible');
						});

					});
				</script>
				<h5>Rating This Doctor:</h5>
				<fieldset id='demo3' class="rating">
					<input class="stars" type="radio" id="star" name="rating" value="5" />
					<label class = "full" for="star" title="Awesome - 5 stars"></label>
					<input class="stars" type="radio" id="star43" name="rating" value="4" />
					<label class = "full" for="star43" title="Pretty good - 4 stars"></label>
					<input class="stars" type="radio" id="star33" name="rating" value="3" />
					<label class = "full" for="star33" title="Meh - 3 stars"></label>
					<input class="stars" type="radio" id="star23" name="rating" value="2" />
					<label class = "full" for="star23" title="Kinda bad - 2 stars"></label>
					<input class="stars" type="radio" id="star13" name="rating" value="1" />
					<label class = "full" for="star13" title="Sucks big time - 1 star"></label>
				</fieldset>
				<div id='feedback'></div>
				<div id="thanks" style="visibility: hidden;"></div>
				<!--// End Review and rating system Part -->
			</div>

		</div>
	</section>



<?php include('../../resource/main/inc/footer.php'); ?>
