<?php

session_start();
if(!isset($_SESSION["discount"])) {
	header('Location:index.php');
	die;
}

$name = '';
$email = '';
$phone_num = '';

if(isset($_SESSION['name']))
{
	$name = $_SESSION["name"];
	$email = $_SESSION["email"];
	$phone_num = $_SESSION["phone_num"];
	$box_content = $_SESSION["box_content"];
	$cost = 10;
}
?>

<html>
	<head>

		<?php
		$title = "Order Receipt";
		include('inc/head.php');
		?>

		<link href="lib/css/style_m.css" rel="stylesheet" type="text/css">

	</head>

	<body>

		<?php include('inc/nav.php'); ?>

		<div class="container">

			<div class="content">
			<br /><br /><br />
			<?php
				print <<<HERE
				<h1 style='font-size:16px;'>Order Successfully Completed!</h1>
				<h3 style='font-size:16px;'>Below is a copy of your receipt:</h3>
				<br />
				<p><span class='b'>Name:</span> $name</p>
				<p><span class='b'>Email:</span> $email</p>
				<p><span class='b'>Phone Number:</span> $phone_num</p>
HERE;
				print "<p><span class='b'>Box Type:</span> $box_content ($$cost)</p>";

				print "<p><span class='b'>Your total is:</span> &nbsp;$$cost</p>";
				print "<p><span class='b'>Discount code:</span> &nbsp;-$$cost</p>";
				print "<p><span class='b'>Your total w/ discount is:</span> &nbsp;$0.00</p>";

				// kill session
				unset($_SESSION["discount"]);
			?>
		</div>

	</body>
</html>