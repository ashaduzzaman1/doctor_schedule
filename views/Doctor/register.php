<?php
include_once('../../vendor/autoload.php');
if(!isset($_SESSION) )session_start();
use App\Library\Library;
use App\Message\Message;
$objLibrary = new Library();
?>

<!DOCTYPE HTML>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
	<title> Doctor Registration || Doctors Schedule Management</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="" />
	<meta name="keywords" content="" />

	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="../../resource/main/css/materialize.min.css" />
	<link rel="stylesheet" href="../../resource/main/css/icons.css">
	<link rel="stylesheet" type="text/css" href="../../resource/main/css/style.css" />
	<link rel="stylesheet" type="text/css" href="../../resource/main/css/responsive.css" />
	<link rel="stylesheet" type="text/css" href="../../resource/main/css/color.css" />

	<!-- REVOLUTION STYLE SHEETS -->
	<link rel="stylesheet" type="text/css" href="../../resource/main/css/revolution/settings.css">
	<link rel="stylesheet" type="text/css" href="../../resource/main/css/revolution/navigation.css">
	<link rel="stylesheet" type="text/css" href="../../resource/main/css/revolution/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
</head>
<body>
<div class="theme-layout">


	<div class="pageloader">
		<div class="loader">
			<div class="loader-inner ball-scale-ripple-multiple">
				<div></div>
				<div></div>
				<div></div>
			</div>
		</div>
	</div><!-- Pageloader -->

	<div class="responsive-header">
		<div class="responsive-topbar">
			<div class="responsive-topbar-info">
				<div class="active"><i class="icon-telephone"></i><p><i class="icon-telephone"></i><strong>Call Us Today!</strong>  (732) 431-1616-01</p></div>
				<div><i class="icon-envelope2"></i><p><i class="icon-envelope2"></i><strong>Email!</strong>  phpwarrrior@phpwarrior.com</p></div>
			</div><!-- Topbar Info -->
			<div class="topbar-social-search">
				<div class="responsive-social">
					<a href="#" title=""><i class="fa fa-twitter"></i></a>
					<a href="#" title=""><i class="fa fa-facebook"></i></a>
					<a href="#" title=""><i class="fa fa-google-plus"></i></a>
					<a href="#" title=""><i class="fa fa-linkedin"></i></a>
				</div>
				<form>
					<input type="text" placeholder="Enter Your Search" />
					<button><i class="fa fa-search"></i></button>
				</form>
			</div>
		</div><!-- Responsive Topbar -->
		<div class="responsive-menu">
			<div class="logo"><a href="#" title=""><img src="../../resource/main/images/logo.png" alt="" /></a></div>
			<div class="responsive-menu-btns">
				<a class="call-popup popup" href="../main/login.php" title=""><i class="fa fa-user-md"></i> Login As Patient/User</a>
				<a class="open-menu" href="#" title=""><i class="fa fa-list"></i></a>
			</div>
		</div><!-- Responsive Menu -->

		<div class="responsive-links">
			<span><i class="fa fa-remove"></i></span>
			<ul>
				<li><a href="Non-index.php" title="">Home</a></li>
				<li><a href="about.php" title="">About Page</a></li>

				<li><a href="login.php" title="">Login</a></li>
				<li><a href="register.php" title="">Register</a></li>
				<li><a href="index.php" title="">Doctor Team</a></li>
				<li><a href="appointment.php" title="">Appointment</a></li>
				<li><a href="timetable.php" title="">Doctor's Timetable</a></li>

			</ul>
		</div><!-- Responsive Links -->
	</div><!-- Responsive Header -->

	<header class="stick">
		<div class="topbar style2">
			<div class="container">
				<ul class="topbar-info">
					<li><i class="icon-telephone2"></i> <strong>Call Us Today!</strong>  (732) 431-1616-01</li>
					<li><i class="icon-envelope"></i> <strong>Email:</strong>  phpwarrior@phpwarrior.com</li>
				</ul>
				<div class="social-icons">
					<a class="facebook" title="" href="#"><i class="fa fa-facebook"></i></a>
					<a class="linkedin" title="" href="#"><i class="fa fa-linkedin"></i></a>
					<a class="twitter" title="" href="#"><i class="fa fa-twitter"></i></a>
					<a class="skype" title="" href="#"><i class="fa fa-skype"></i></a>
				</div>
				<div class="topbar-btn"><a class="" href="../main/login.php" title=""><i class="fa fa-user"></i> Login as Patient/User</a></div>
			</div>
		</div><!-- Topbar -->
		<div class="menu-bar-height"></div>
		<div class="menu-bar">
			<div class="container">
				<div class="logo"><a href="#" title=""><img src="../../resource/main/images/logo.png" alt="" /></a></div>
				<nav class="menu">
				</nav>
			</div>
		</div><!-- Menu Bar -->
	</header><!-- Header -->
	
	<div>
		<table>
			<tr>
				<td width='230' >

				<td width='600' height="50" >

					<?php  if(isset($_SESSION['message']) )if($_SESSION['message']!=""){ ?>

						<div  id="message" class="form button"   style="font-size: smaller  " >
							<center>
								<?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
									echo "&nbsp;".Message::message();
								}
								Message::message(NULL);
								?></center>
						</div>
					<?php } ?>
				</td>
			</tr>
		</table>
	</div>


	<div class="pagetop">
		<div class="container">
			<span>What We Actually Do?</span>
			<h1><span>MEDICALIST</span> DOCTOR REGISTRATION </h1>
			<ul>
				<li><a href="register.php" title="">Home</a></li>
				<li>Registration</li>
			</ul>
		</div>
	</div>


	<section>
		<div class="block">
			<div class="parallax-container"><div data-speed="1" data-bleed="12" class="parallax"><img src="../../resource/main/images/resource/parallax6.jpg" alt="" /></div></div>
			<div class="container">
				<div class="row">
					<div class="col offset-l1 l10 m12 s12 column">
						<div class="registration-page">

							<div class="theme-form registration-form">
								<div class="white-title">
									<i class="icon-signin"></i>
									<h4>DOCTOR REGISTER</h4>
									<span>Fill in the form below to get instant access</span>
								</div>
								<form action="store.php" method="post" enctype="multipart/form-data">
									<div class="input-field simple-label col s12 l6 m6">
										<h6>Doctor Basic Information</h6>
									</div>
									<div class="input-field col s12"><input type="text" name="name" placeholder="Doctor complete Name" required="" /></div>
									<div class="input-field col s12"><input type="email" name="email" placeholder="Email Address" required=""/></div>
									<div class="input-field col s12"><input type="text" name="phone" placeholder="Phone Number" required=""/></div>
									<div class="input-field col s12">
										<select name="gender" id="gender">
											<option selected="selected" disabled>Gender</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
									</div>
									<div class="input-field col s12"><input type="text" name="qualification" placeholder="Enter Qualification" required="" /></div>
									<div class="input-field col s12"><input type="text" name="institute" placeholder="Enter Educational Institute" required="" /></div>
									<div class="input-field col s12">
										<?php $allCat = $objLibrary->viewSpecialist(); ?>
										<label class="col-sm-2 control-label" for="specialist_id">Specialist</label>
										<select id="" class="form-control1" name="specialist_id" tabindex="">
											<option value='' selected="selected" disabled> Select Specialist</option>
											<?php
											foreach($allCat as $cat) {
												echo "<option value='$cat->id' > $cat->specialist </option>";
											}
											?>

										</select>
									</div>
									<div class="input-field col s12"><input type="text" name="location" placeholder="Enter Location" required="" /></div>
									<div class="input-field col s12"><input type="text" name="about" placeholder="Enter About of Doctor" required="" /></div>
									<div class="input-field col s12"><input type="password" name="password" placeholder="Create a new Password" required="" /></div>
									<div class="input-field col s12"><input type="password" name="password1" placeholder="Re-enter Password" required="" /></div>
									<div class="pe-7s-file col s12">
										<label for="picture">Doctor Picture</label>
										<input id="picture" name="picture" type="file" tabindex="11" required="">
										<p class="help-block">Input doctor picture with valid size & extention..</p>

									</div>
									<?php $unique = mt_rand(100000, 999999); ?>
									<input name="status" type="hidden" value="Yes" required="">
									<input name="unique_id" type="hidden" value="<?php echo $unique; ?>" required="">
									
									<div class="input-field simple-label col s12 l6 m6">
										<h6> Schedule Information</h6>
										<label>Morning Shift:</label>
									</div>

									<div class="input-field col s12"><input type="text" name="morning_vanue" placeholder="Enter Morning Vanue" required="" /></div>
									<div class="input-field col s12">
										<label class="col-sm-2 control-label" for="morning_time_from">Time(From)</label>
										<select id="selector1" class="form-control1" name="morning_time_from" tabindex="13">
											<option selected="selected" disabled>Select Time From</option>
											<option value="7">07:00 AM</option>
											<option value="8">08:00 AM</option>
											<option value="9">09:00 AM</option>
											<option value="10">10:00 AM</option>
											<option value="11">11:00 AM</option>
										</select>
									</div>
									<div class="input-field col s12">
										<label class="col-sm-2 control-label" for="morning_time_to">Time(To)</label>
										<select id="selector1" class="form-control1" name="morning_time_to" tabindex="14">
											<option selected="selected" disabled>Select Time To</option>
											<option value="9">09:00 AM</option>
											<option value="10">10:00 AM</option>
											<option value="11">11:00 AM</option>
											<option value="12">12:00 PM</option>
											<option value="13">01:00 PM</option>
										</select>
									</div>
									<div class="input-field simple-label col s12 l6 m6">
										<label>Evening Shift:</label>
									</div>
									<div class="input-field col s12"><input type="text" name="evening_vanue" placeholder="Enter Evening Vanue" required="" /></div>
									<div class="input-field col s12">
										<label class="col-sm-2 control-label" for="evening_time_from">Time(From)</label>
										<select id="selector1" class="form-control1" name="evening_time_from" tabindex="15">
											<option selected="selected" disabled>Select Time From</option>
											<option value="12">12:00 PM</option>
											<option value="13">01:00 PM</option>
											<option value="14">02:00 PM</option>
											<option value="15">03:00 PM</option>
											<option value="16">04:00 PM</option>
											<option value="17">05:00 PM</option>
											<option value="18">06:00 PM</option>
										</select>
									</div>
									<div class="input-field col s12">
										<label class="col-sm-2 control-label" for="evening_time_to">Time(To)</label>
										<select id="selector1" class="form-control1" name="evening_time_to" tabindex="16">
											<option selected="selected" disabled>Select Time To</option>
											<option value="16">04:00 PM</option>
											<option value="17">05:00 PM</option>
											<option value="18">06:00 PM</option>
											<option value="19">07:00 PM</option>
											<option value="20">08:00 PM</option>
											<option value="21">09:00 PM</option>
											<option value="22">10:00 PM</option>
											<option value="23">11:00 PM</option>
										</select>
									</div> <br />

									<div class="input-field simple-label col s12 l6 m6">
										<label for="checkbox">Select Working Day</label>
									</div>
									<div class="input-field col s12">
										<select class="selectpicker" multiple data-actions-box="true" id="selector1" class="form-control1" name="day[]" tabindex="16">
											<option selected="selected" disabled>Select Day</option>
											<option value="Saturday">Saturday</option>
											<option value="Sunday">Sunday</option>
											<option value="Monday">Monday</option>
											<option value="Tuesday">Tuesday</option>
											<option value="Wednesday">Wednesday</option>
											<option value="Thursday">Thursday</option>
											<option value="Friday">Friday</option>
										</select>
									</div> <br />

										<!--</div>
									</div>-->

									<div class="input-field col s12"><button type="submit"><i class="fa fa-user-md"></i>Register Now</button></div>
								</form>
								<form action="login.php" >
									<div class="other-logins button">
										<strong>Are you already Registered ?</strong>
										<button type="submit" name="register"><i class="fa fa-user-md"></i> Please Login Now</button>
									</div>
								</form>
							</div><!-- Registration Form -->
						</div><!-- Registration Popup -->
					</div>
				</div>
			</div>
		</div>
	</section>



	<div class="bottom-footer">
		<div class="container">
			<p><a href="#" title=""> PHP Warrior © 2016.</a> All Rights Reserved. </p>
			<ul>
				<li><a href="Non-index.php" title="">Home</a></li>
				<li><a href="#" title="">Medical Services</a></li>
				<li><a href="appointment.php" title="">Find a Physician</a></li>
				<li><a href="contact.php" title="">Contact Us</a></li>
				<li><a href="index.php" title="">Professionals</a></li>
			</ul>
		</div>
	</div>


</div>




<script src="../../resource/main/js/jquery.min.js" type="text/javascript"></script>

<script src="../../resource/main/js/materialize.min.js" type="text/javascript"></script>
<script src="../../resource/main/js/enscroll-0.5.2.min.js"></script>
<script type="text/javascript" src="../../resource/main/js/jquery.poptrox.min.js"></script>
<script src="../../resource/main/js/owl.carousel.min.js"></script>
<script src="../../resource/main/js/smoothscroll.js"></script>
<script src="../../resource/main/js/script.js" type="text/javascript"></script>


</body>
</html>