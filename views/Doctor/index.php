<?php include "../../resource/doctor/inc/header.php"; ?>
<?php
require_once ("../../vendor/autoload.php");
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
	<div class="content">
		<div class="monthly-grid">
			<div class="panel panel-widget">
				<div class="panel-title">
					Welcome to Doctor Schedule Management (DSM) Doctor Panel

				</div>
				<div class="panel-body">
					<!-- status -->
					Suspendisse metus turpis, blandit sed dolor quis, comio odo commodo elit. Sed sagttis mollis ligula eget rhoncu.
					Nam blandit pellentesque odio.Sus pendisse metus turp is,
					blandit sed dolor quis, com modo commodo elit. Sed sagittis mollis ligula eget rhoncu.
						<div class="gantt"></div>


					Duis sed odio sit amet nibh vulate cursus sit amet mauris.Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.
					Sed no mauris vitae erat consequat auctor eu in elit.
					Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
					Mauris ine rat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit.
					Sed ut imperdiet nisi. Proin condimentum fermentum nunc.
					Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque.
					Suspendisse in orci enim. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
					Ut enim ad minim et ven veni am, quis nostrud exercitation ullamco laboris nisi ut aliquip ex commodo consequat.
					Duis aute irure dolor in reprehenderit in voluptate velit esse er os cillum dolore eu fugiat nulla pariatur.

					Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.
					Sed non mauris vitae erat consequat auctor eu in elit.
					Class apte nt taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo.
					Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit.
					Sed ut imperdiet nisi. Proin condimentum fermentum nunc.
					Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque.
					Suspendisse in orci enim.

				</div>
					<!-- status -->
				</div>
			</div>
		</div>
		<!--end main area description -->

<?php include "../../resource/doctor/inc/footer.php"; ?>