<?php

session_start();
if(!isset($_SESSION["discount"])) {
	header('Location:index.php');
	die;
}

$errors = '';
$name = '';
$email = '';
$phone_num = '';
$box_content = '';
$cost = 10.00;
$discount = $_SESSION["discount"];
$comments = '';

if(isset($_POST['name']))
{
	$name = filter_input(INPUT_POST, "name");
	$email = filter_input(INPUT_POST, "email");
	$phone_num = filter_input(INPUT_POST, "phone_num");
	$box_content = filter_input(INPUT_POST, "box_content");
	$comments = filter_input(INPUT_POST, "comments");

  //check emptiness
	if(empty($name))
		$errors .= "\n Please enter your name";
	if(empty($email))
		$errors .= "\n Please enter your email";
	if(empty($phone_num))
		$errors .= "\n Please enter your phone number";
	if(empty($box_content))
		$errors .= "\n Please choose a box";

  //check injections
  if(IsInjected($name))
	$errors .= "\n Bad name value!";
  if(IsInjected($email))
  	$errors .= "\n Bad email value!";
  if(IsInjected($phone_num))
  	$errors .= "\n Bad phone number value!";

	//check captcha
	if($_POST['s3capcha'] == $_SESSION['s3capcha'] && $_POST['s3capcha'] != '') {
		unset($_SESSION['s3capcha']);
	} else {
		$errors .= "\n The captcha code does not match!";
	}

	//do if no errors
	if(empty($errors)) {
		$_SESSION["name"] = $name;
		$_SESSION["email"] = $email;
		$_SESSION["phone_num"] = $phone_num;

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

		date_default_timezone_set('US/Eastern');
		$date = date_create();
		$timestamp = date_format($date, 'm/d/Y H:i:s');

		include('inc/db_connect.php');
		$sql = "INSERT INTO unpaid_orders VALUES (NULL, '$timestamp', '$name', '$email', '$phone_num', '$year', '$final_cost', '$package', '$box_content', 'yes', '$comments')";
		$result = $mysqli->query($sql);
		$sql = "INSERT INTO paid_orders VALUES (NULL, '$timestamp', '$name', '$email', '$phone_num', '$year', '$final_cost', '$package', '$box_content', 'yes', '$comments')";
		$result = $mysqli->query($sql);

		$sql = $mysqli->prepare("SELECT times_used FROM annon_data WHERE discount_code='$discount'");
		$sql->execute();
		$sql->store_result();
		$sql->bind_result($times_used);
		$sql->fetch();
		$newTimesUsed = $times_used + 1;
		$sql = "UPDATE annon_data SET times_used=$newTimesUsed WHERE discount_code='$discount'";
		$result = $mysqli->query($sql);
		header('Location:order_receipt.php');
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

<html>
	<head>

		<?php
			$title = "Finalize Order";
			include('inc/head.php');
			include('inc/scripts.php');
		?>

		<link href="lib/css/order.css" rel="stylesheet">

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
				<div class="order-logo"><img src="lib/imgs/orderlogo.png" alt="order logo"></div>
				<div class="order-header">box order form</div>
			</div>

			<div class="order-form-container">
				<div class="order-form-content-container">
					<h3><span style="color:#2492FF;">Discount code accepted!</span><br />Free Snack or Produce Box for pick-up</h3>
					<div class="order-form-questions">Please complete the rest of the form below to finish the order</div>
					<?php
						if(!empty($errors)){
							echo "<p class='error'>".nl2br($errors)."</p>";
						}
					?>
					<form method="post" name="signup_form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
						<div class="order-form-header">Contact info:</div><br />
						<!--name-->
						<input type="text" name="name" placeholder="full name" class="form-control" value='<?php echo htmlentities($name) ?>'><br />
						<!--email-->
						<input type="text" name="email" placeholder="email" class="form-control" value='<?php echo htmlentities($email) ?>'><br />
						<!--phone_num-->
						<input type="text" name="phone_num" placeholder="phone number" class="form-control" value='<?php echo htmlentities($phone_num) ?>'><br />
						<!--box_content-->
						<input type='radio' name='box_content' value='Produce Box ($10)'>Produce Box ($10)<br />
						<input type='radio' name='box_content' value='Snack Box ($10)'>Snack Box ($10)<br />
<!-- 						<input type='radio' name='box_content' value='Wine Night Box ($15)'>Wine Night Box ($15)<br />
 -->					<div class="alert">***Please be aware that, due to the local, organic nature of our food, some last-minute swaps may be necessary to accommodate unexpected changes in availability</div>
						<!--comments-->

						<div class="order-form-header">Comments:</div>
						<br />Please specify any dietary restrictions so we may accomodate you<br /><textarea name="comments" rows=4 cols=30></textarea>
						<input type="text" name="comments" class="form-control" value='<?php echo htmlentities($comments) ?>'><br />
						<!--captcha-->
						<div id="capcha">
							<div class="order-form-header">Captcha Test: </div>
							<?php include("s3Capcha.php"); ?>
						</div>
						<br /><br /><br />
						<div class="order-form-questions" style="font-weight: bold;">Box pick-ups are on Fridays from 12-3pm on Mad Bowl (unless otherwise noted).  If you or a friend cannot be there to pick-up your box, please contact us BEFORE placing your order to make other arrangements with our staff. We do not store boxes after Friday and we donate all unclaimed food to the Haven.</div>
						<br />
						<input type="checkbox" name="agreement" value="agreed" required>
						<strong style="color:#2492FF;">&nbsp;I have read and understood the above statement</strong>
						<br /><br />
						<div class="order-form-questions">If you have any questions about your order, please feel free to contact us at <strong>greenstogrounds@gmail.com</strong></div>
						<br />
						<input type="image" name="submit" value="Proceed to Next Step" src="lib/imgs/submit.png">
					</form>
				</div>
			</div>
		</div>

	<?php
		include('inc/footer.php');
	?>

	</body>
</html>