<?php
session_start();

$title = "Plus Dollar Payment";
include('inc/head.php');

?>

<html>
<head>

	<style>
		.b {font-weight: bold;}
		.content {width:70%; margin: 0 auto;}
		.error {color: #FF0000;}
		.receipt-header {color: #4CC417; font-weight: bold; font-size: 30;}
	</style>

	<body>

		<div class="container">

			<?php include('inc/nav.php'); 
			include ('inc/db_connect.php'); ?>

			<div class="content">
				<?php
				
				date_default_timezone_set('US/Eastern');
				$date = date_create();
				$timestamp = date_format($date, 'm/d/Y H:i:s');

				$name = $_SESSION["name"];
				$email = $_SESSION["email"];
				$phone_num = $_SESSION["phone_num"];
				$year = $_SESSION["year"];
				$package = $_SESSION["package"];
				$box_content_arr = $_SESSION["box_content_arr"];
				$box_content = "";
				$comments = $_SESSION["comments"];
				if ($package != "None"){
					if (count($box_content_arr) != 0){
						array_push($box_content_arr, $package);
					}
					else {
						$box_content_arr[0] = $package;
					}
				}
				$box_selected = false;
				$final_cost = $_SESSION["cost_final"]; 
				for($i = 0; $i < count($box_content_arr); $i++) {
					$box_content = $box_content_arr[$i];
					$box_content_entry .= $box_content_arr[$i] . ", ";
				}

				$studentid = filter_input(INPUT_POST, "studentid");
				if(empty($studentid))
					$errors .= "\n Please enter your Student ID";
				if(empty($errors)) 
					$_SESSION["studentid"] = $studentid;

				$_SESSION['studentid'] = $_POST['text']; 
				$studentidErr = ''; 

				$payment_method = filter_input(INPUT_POST, "payment_method");
				if(empty($payment_method))
					$errors .= "\n Please enter your Payment Method";
				if(empty($errors)) 
					$_SESSION["payment_method"] = $payment_method;

				$_SESSION['payment_method'] = $_POST['text']; 
				$paymentErr = ''; ?>

				<?php if (!empty($_POST['studentid']) && strlen($_POST['studentid'])==9): 
				if ($payment_method == "Cavalier Advantage") {
					$final_cost = $final_cost * 1.053;
				}
				?>

				<div class="order-header-container">
					<div class="receipt-header">Thanks for your order!</div>
					<?php

					$sql1 = "INSERT INTO plusdollars_orders
					VALUES (NULL, '$timestamp', '$name', '$email', '$studentid', '$final_cost', '$payment_method')";
					$result = $mysqli->query($sql1);

					$sql2 = "INSERT INTO paid_orders
					VALUES (NULL, '$timestamp', '$name', '$email', '$phone_num', '$year', '$final_cost', '$package', '$box_content_entry', '', '$comments')";
					$result = $mysqli->query($sql2);

						// $sql3 = "DELETE FROM unpaid_orders WHERE 
						// VALUES = (NULL, '$timestamp', '$name', '$email', '$phone_num', '$year', '$final_cost', '$package', '$box_content_entry', '', '$comments')";
						// $result = $mysqli->query($sql3);

					// Subject of confirmation email.
					$conf_subject = 'Your Greens to Grounds Order';

					// Who should the confirmation email be from?
					$conf_sender = 'Greens to Grounds <greenstogrounds@gmail.com>';

					$msg = "Thank you for your order of $box_content_entry! Here are the details of your order:\n";
					// $msg .= "Name:" .$name "\n";
					// $msg .= "Order:" .$box_content_entry "\n";
					// $msg .= "Cost:" .$final_cost "\n";
					$msg .= "\n\n";
					$msg .= "Box pick-ups are on Fridays from 12-3pm on Mad Bowl (unless otherwise noted).  If you or a friend cannot be there to pick-up your box, please contact us BEFORE placing your order to make other arrangements with our staff. We do not store boxes after Friday and we donate all unclaimed food to the Haven.";

					mail($email, $conf_subject, $msg, 'From: ' . $conf_sender );

					?>
				</div>
				Your order with student ID <?php echo htmlspecialchars($_POST["studentid"]); ?> is complete. <br>Please screenshot this page for proof of your order in case there are any issues on the day of pickups. <br>
			<?php else: 
			$studentidErr = 'Student ID is a required field';
			?>
			<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
				<p class='b'>Please enter your 9-digit UVA student ID below to place your order:</p>
				Student ID: <input type="text" name="studentid"> <span class="error">* <?php echo $studentidErr;?></span> <br>
				<!-- <p class='b'>Are you paying with Plus Dollars or Cavalier Advantage?</p> -->
				Payment Method: <select name="payment_method">
				<option value="Plus Dollars">Plus Dollars</option>
				<!-- <option value="Cavalier Advantage">Cavalier Advantage (5.3% sales tax will be added on)</option> -->
			</select><br />
			<p>Please make sure you have enough plus dollars to cover your Greens to Grounds purchases.<br> You can easily check your balance at www.virginia.edu/cavalieradvantage. Also, please keep in mind we only take Plus Dollars and not CavAdvantage</p>
			<input type="checkbox" name="agreement" value="agreed" required>
    		<strong style="color:#2492FF;">&nbsp;I have checked my Plus Dollar balance and have sufficient funds to go through with this order</strong>
    		<br /><br />
			<input type="submit" value="Place Order">
		</form>
	<?php endif; 


	?>

</div>
</div>
</body>

</head>
</html>









