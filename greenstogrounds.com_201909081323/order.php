<?php

session_start();

include('inc/db_connect.php');

$errors = '';

$name = '';
$email = '';
$phone_num = '';
$year = '';
$box_content_arr = array();
$discount = '';
$studentid = '';
$marketing = '';
$payment_method = '';
$comments = '';



if(isset($_POST['submit']) && isset($_POST['discount'])) {
	$discount = filter_input(INPUT_POST, "discount");
	if(IsInjected($discount))
		$errors .= "\n Bad discount value!";

	//For ODOS box
	if($discount == "TR36G1K5") {
		// check times used
		$sql = $mysqli->prepare("SELECT times_used FROM annon_data WHERE discount_code='$discount'");
		$sql->execute();
		$sql->store_result();
		$sql->bind_result($times_used);
		$sql->fetch();

		if($times_used >= 19) {
			$errors .= "\n Unfortunately this discount code has been used too many times this week, please check in tomorrow to see if we have increased the amount of people who can use the discount code this week. If not we hope you come back next week so we can get you a box!";
			$maxReached = true;
		}
		if(empty($errors) && $maxReached != true) {
			$_SESSION["discount"] = $discount;
			header('Location:complete_order.php');
			die;
		}
	}
	
	//for free box from survey - 1
	else if($discount == "TEST300") {
		// check times used
		$sql = $mysqli->prepare("SELECT times_used FROM annon_data WHERE discount_code='$discount'");
		$sql->execute();
		$sql->store_result();
		$sql->bind_result($times_used);
		$sql->fetch();

		if($times_used >= 0) {
			$errors .= "\n Unfortunately this discount code has been used too many times.";
			$maxReached = true;
		}
		if(empty($errors) && $maxReached != true) {
			$_SESSION["discount"] = $discount;
			header('Location:complete_order.php');
			die;
		}
	}
	//for free box from survey - 2
	else if($discount == "QI0UFVC1") {
		// check times used
		$sql = $mysqli->prepare("SELECT times_used FROM annon_data WHERE discount_code='$discount'");
		$sql->execute();
		$sql->store_result();
		$sql->bind_result($times_used);
		$sql->fetch();

		if($times_used >= 1) {
			$errors .= "\n Unfortunately this discount code has been used too many times.";
			$maxReached = true;
		}
		if(empty($errors) && $maxReached != true) {
			$_SESSION["discount"] = $discount;
			header('Location:complete_order.php');
			die;
		}
	}
	//for free box from survey - 3
	else if($discount == "Z4XV5HLK") {
		// check times used
		$sql = $mysqli->prepare("SELECT times_used FROM annon_data WHERE discount_code='$discount'");
		$sql->execute();
		$sql->store_result();
		$sql->bind_result($times_used);
		$sql->fetch();

		if($times_used >= 1) {
			$errors .= "\n Unfortunately this discount code has been used too many times.";
			$maxReached = true;
		}
		if(empty($errors) && $maxReached != true) {
			$_SESSION["discount"] = $discount;
			header('Location:complete_order.php');
			die;
		}
	}
	//for free box from survey - 4
	else if($discount == "3DHIGURR") {
		// check times used
		$sql = $mysqli->prepare("SELECT times_used FROM annon_data WHERE discount_code='$discount'");
		$sql->execute();
		$sql->store_result();
		$sql->bind_result($times_used);
		$sql->fetch();

		if($times_used >= 1) {
			$errors .= "\n Unfortunately this discount code has been used too many times.";
			$maxReached = true;
		}
		if(empty($errors) && $maxReached != true) {
			$_SESSION["discount"] = $discount;
			header('Location:complete_order.php');
			die;
		}
	}
	//for free box from survey - 5
	else if($discount == "68D9NOYB") {
		// check times used
		$sql = $mysqli->prepare("SELECT times_used FROM annon_data WHERE discount_code='$discount'");
		$sql->execute();
		$sql->store_result();
		$sql->bind_result($times_used);
		$sql->fetch();

		if($times_used >= 1) {
			$errors .= "\n Unfortunately this discount code has been used too many times.";
			$maxReached = true;
		}
		if(empty($errors) && $maxReached != true) {
			$_SESSION["discount"] = $discount;
			header('Location:complete_order.php');
			die;
		}
	}
	//for free box from survey - 6
	else if($discount == "2H6WB2TU") {
		// check times used
		$sql = $mysqli->prepare("SELECT times_used FROM annon_data WHERE discount_code='$discount'");
		$sql->execute();
		$sql->store_result();
		$sql->bind_result($times_used);
		$sql->fetch();

		if($times_used >= 1) {
			$errors .= "\n Unfortunately this discount code has been used too many times.";
			$maxReached = true;
		}
		if(empty($errors) && $maxReached != true) {
			$_SESSION["discount"] = $discount;
			header('Location:complete_order.php');
			die;
		}
	}  else
		$errors .= "\n Invalid discount code!";
} else if(isset($_POST['submit'])) {
	$name = filter_input(INPUT_POST, "name");
	$email = filter_input(INPUT_POST, "email");
	$phone_num = filter_input(INPUT_POST, "phone_num");
	$year = filter_input(INPUT_POST, "year");
	$package = filter_input(INPUT_POST, "packages");
	$box_content_arr = $_POST['box_content'];
	$comments = filter_input(INPUT_POST, "comments");
	$marketing = filter_input(INPUT_POST, "marketing");

	//check emptiness
	if(empty($name))
		$errors .= "\n Please enter your name";
	if(empty($email))
		$errors .= "\n Please enter your email";
	if(empty($phone_num))
		$errors .= "\n Please enter your phone number";


	//check injections
	if(IsInjected($name))
		$errors .= "\n Bad name value!";
	if(IsInjected($email))
		$errors .= "\n Bad email value!";
	if(IsInjected($phone_num))
		$errors .= "\n Bad phone number value!";
	if(IsInjected($year))
		$errors .= "\n Bad year value!";


	//check captcha
	if($_POST['s3capcha'] == $_SESSION['s3capcha'] && $_POST['s3capcha'] != '') {
		unset($_SESSION['s3capcha']);
	} else {
		$errors .= "\n The captcha code does not match!";
	}

	//do if no errors
	if(empty($errors)) {
		$_SESSION["name"] = preg_replace("/[^a-zA-Z0-9]+/", " ", html_entity_decode($name, ENT_QUOTES));
		$_SESSION["email"] = $email;
		$_SESSION["phone_num"] = $phone_num;
		$_SESSION["year"] = $year;
		$_SESSION["package"] = $package;
		$_SESSION["box_content_arr"] = $box_content_arr;
		$_SESSION["marketing"] = $marketing;
		$_SESSION["comments"] = $comments;
		$_SESSION["studentid"] = $studentid;
		$_SESSION["payment_method"] = $payment_method;

		if($comments != "") {
			$to      = 'greenstogrounds@gmail.com';
			$subject = 'GreensToGrounds | Questions/Concerns';
			$message = '
			Name: '.$name.'
			Email: '.$email.'
			Message: '.$comments.'';
			$headers = 'From:greenstogrounds@gmail.com' . "\r\n";
			mail($to, $subject, $message, $headers);
		}

		if($comments != "") {
			$to      = 'gjs4tu@virginia.edu.com';
			$subject = 'GreensToGrounds | Questions/Concerns';
			$message = '
			Name: '.$name.'
			Email: '.$email.'
			Message: '.$comments.'';
			$headers = 'From:gjs4tu@virginia.edu.com' . "\r\n";
			mail($to, $subject, $message, $headers);
		}

		header('Location:pay.php');
		die;
	}
}

function IsInjected($str)
{
  $injections = array('(\n+)', '(\r+)', '(\t+)', '(%0A+)', '(%0D+)', '(%08+)', '(%09+)');
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    return true;
  else
    return false;
}

?>

<!DOCTYPE html>
<html lang="en">

	<head>

		<?php
			$title = "Order";
			include('inc/head.php');
			include('inc/scripts.php');
		?>

		<script src="lib/js/jquery-1.11.0.js"></script>
		<link href="lib/css/order.css" rel="stylesheet">

		<script type="text/javascript" language="JavaScript" src="lib/js/gen_validatorv31.js"></script>
		<script type="text/javascript" src="lib/js/s3Capcha.js" type="text/javascript"></script>

		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#capcha').s3Capcha();
			});
		</script>

		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">

		<style>
			#capcha div {
				float: left;
			}
		</style>

	</head>

	<body>

		<div class="container">

			<?php include('inc/nav.php'); ?>

			<div class="order-header-container">
				<div class="order-header"><img src="lib/imgs/box-compressed.jpg" alt="order logo" style = "width:500px;height:300px;" align = "center"></div>
				<div class="order-header">box order form</div>
			</div>

			<div class="order-form-container">
				<div class="order-form-content-container">

					<?php
					include('inc/db_connect.php');

					$sql = $mysqli->prepare("SELECT close_at FROM close_time WHERE id=1");
					$sql->execute();
					$sql->store_result();
					$sql->bind_result($close_at);
					$sql->fetch();

					date_default_timezone_set('US/Eastern');
					$date = new DateTime();
					if ($date < new DateTime("$close_at"))
						include('inc/order_open.php');
					else
						include('inc/order_closed.php');
					?>

				<br />
				</div>
			  </div>
		  </div>

	<?php
		include('inc/footer.php');
	?>

	</body>
</html>