<?php session_start() ?>

<html>
	<head>

		<?php
			$title = "Payment";
			include('inc/head.php');
		?>

		<!-- temporarily here -->
		<link href="lib/css/nav.css" rel="stylesheet" type="text/css">

		<style>
			.b {font-weight: bold;}
			.content {width:70%; margin: 0 auto;}
		</style>

	</head>

	<body>

		<div class="container">

			<?php include('inc/nav.php'); ?>

			<div class="content">
			<?php
				$name = $_SESSION["name"];
				$email = $_SESSION["email"];
				$phone_num = $_SESSION["phone_num"];
				$year = $_SESSION["year"];
				$marketing = $_SESSION["marketing"];
				$package = $_SESSION["package"];
				$box_content_arr = $_SESSION["box_content_arr"];
				$comments = $_SESSION["comments"];
				$discount = $_SESSION["discount"];





				if ($package != "None"){
					if (count($box_content_arr) != 0){
						array_push($box_content_arr, $package);
					}
					else {
						$box_content_arr[0] = $package;
					}
				}
				$box_selected = false;
				$cost = 0;

				

					//$sql1 = "INSERT INTO order_discount
					//VALUES (NULL, '$timestamp', '$name', '$email', '$studentid', '$final_cost', '$$discount_code2', $discount_code1)";
					//$result = $mysqli->query($sql1);
					

				print <<<HERE
				<h1 style='font-size:16px;'>Please make sure all of this information is correct </h1>
				<p><span class='b'>Name:</span> $name</p>
				<p><span class='b'>Email:</span> $email</p>
				<p><span class='b'>Phone Number:</span> $phone_num</p>

HERE;

				print "<span class='b'>Box Content Chosen:</span><br /><br />";
				$paypalVal = "";

				include('inc/db_connect.php');


				for($i = 0; $i < count($box_content_arr); $i++) {
					$box_content = $box_content_arr[$i];
					$food = strstr($box_content, '($', true);
					$box_content_entry .= $box_content_arr[$i] . ", ";

					if ($food == "Snack Box " || $food == "Produce Box ") {
						$cost += 10;
						$box_selected = true;
					} if ($food == "Dessert Box ") {
						$cost += 12;
						$box_selected = true;
					} if($package == "Full Season Snack Box" || $package == "Full Season Produce Box") {
						$cost += 59;
						$package .= " ($52.99)";
					} if($package == "Half Season Snack Box" || $package == "Half Season Produce Box") {
						$cost += 28;
						$package .= " ($27.99)";
					}
						$sql = $mysqli->prepare("SELECT price FROM weekly_food WHERE food='$food'");
						$sql->execute();
						$sql->store_result();
						$sql->bind_result($price);
						$sql->fetch();
						$cost += $price;


					if ($box_content == "Half Season Snack Box" || $box_content == "Half Season Produce Box") {
						$box_content .= " ($27.99)";
					}
					if ($box_content == "Full Season Snack Box" || $box_content == "Full Season Produce Box") {
						$box_content .= " ($52.99)";
					}
					if($package != "None" && ($food == "Snack Box " || $food == "Produce Box " || $food == "Dessert Box")) {
						$paypalVal .= "&nbsp;&nbsp;$box_content";
						print "<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$box_content</div>";
					} elseif($package != "None" && $box_selected == false) {
						$paypalVal .= "&nbsp;&nbsp; $box_content";
						print "<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $box_content</div>";
					} elseif ($cost == "0") {
						print "<p><span class='b' style='color:red;'>PLEASE GO BACK AND SELECT A BOX TO ORDER</span></p><br />";
						die;
					} else {
						$paypalVal .= "&nbsp;&nbsp;$box_content";
						print "<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$box_content</div>";
					}
					
				}



				$final_cost = number_format($cost, 2);
				$_SESSION["cost_final"] = $final_cost;


				print "<br /><p><span class='b'>Your total is:</span> $$final_cost</p><br />";
				print "<p class='b'>If any of this information is incorrect please feel free to redo the form</p>";
				print "<form action='order.php'><input type='submit' value='Click Here To Go Back' style='padding:5px; font-weight:bold;'></form><br />";



				if($cost == 0)
					print "<p><span class='b' style='color:red;'>YOUR TOTAL WAS $0, PLEASE GO BACK AND SELECT A BOX TO ORDER</span></p><br />";

				date_default_timezone_set('US/Eastern');
				$date = date_create();
				$timestamp = date_format($date, 'm/d/Y H:i:s');

				$sql = "INSERT INTO unpaid_orders VALUES (NULL, '$timestamp', '$name', '$email', '$phone_num', '$year', '$final_cost', '$package', '$box_content_entry', '', '$comments')";
				$result = $mysqli->query($sql);
				$sql = $mysqli->prepare("SELECT id FROM unpaid_orders ORDER BY id DESC LIMIT 1");
				$sql->execute();
				$sql->store_result();
				$sql->bind_result($id);
				$sql->fetch();

				if ($marketing != NULL) {
					$sql2 = "INSERT INTO marketing_survey VALUES (NULL, '$timestamp', '$marketing')";
					$result2 = $mysqli->query($sql2);
				}
				
				print <<<HERE
				<p class="b"> Pay with PayPal here! </p>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_ext-enter">
				<input type="hidden" name="redirect_cmd" value="_xclick">
				<input type="hidden" name="upload" value="1">
				<input type="hidden" name="business" value="greenstogrounds@gmail.com">
				<input type="hidden" name="item_name" value="Greens to Grounds Box: $paypalVal">
				<input type="hidden" name="currency_code" value="USD">
				<input type="hidden" name="amount" value="$final_cost">
				<input type="hidden" name="custom" value="id=$id">
				<input type="hidden" name="cancel_return" value="http://greenstogrounds.com/">
				<input type="hidden" name="hosted_button_id" value="K7N522Y6NFSZG">
				<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" width="160" height="80">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
HERE;
				print <<<HERE
				<p class="b"> Or pay with UVA Plus Dollars here! </p>
				<form action="paywithplus.php" method="post" target="_top">
				<input type="image" src="lib/imgs/studentid.jpeg" border="0" name="submit" alt="Pay with UVA Plus Dollars!" width="160" heaight="80">
				</form>
HERE;
				//<br />;

			?>
			</div>
		</div>

		<?php include ('inc/footer.php'); ?>

	</body>
</html>