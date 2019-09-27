<?php

	session_start();
	include('inc/db_connect.php');

	// read the post from PayPal system and add 'cmd'
	$req = 'cmd=_notify-validate';
	foreach ($_POST as $key => $value) {
	$value = urlencode(stripslashes($value));
	$req .= "&$key=$value";
	}
	// post back to PayPal system to validate
	$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
	$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
	$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

	$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);
	// Test With Sandbox
	//$fp = fsockopen ('www.sandbox.paypal.com', 80, $errno, $errstr, 30);
	//$txn = $_POST;
	//parse_str($txn);

	if (!$fp) {
		// HTTP ERROR
	} else {
		fputs ($fp, $header . $req);
		while (!feof($fp)) {
			$res = fgets ($fp, 1024);
			if (strcmp ($res, "VERIFIED") == 0) {
				//if ($receiver_email == 'greenstogrounds@gmail.com') {

				$cust = $_POST['custom'];
				parse_str($cust);

				$sql = $mysqli->prepare("SELECT * FROM unpaid_orders WHERE id='$id'");
				$sql->execute();
				$sql->store_result();
				$sql->bind_result($id, $timestamp, $name, $email, $phone_num, $year, $cost, $package, $box_content, $odos, $comments);
				$sql->fetch();

				$sql = "INSERT INTO paid_orders VALUES (NULL, '$timestamp', '$name', '$email', '$phone_num', '$year', '$cost', '$package', '$box_content', '$odos', '$comments')";
				$result = $mysqli->query($sql);
				//}
			} else if (strcmp ($res, "INVALID") == 0) {
				$to      = 'ebo6jt@virginia.edu';
				$subject = 'GreensToGrounds | Invalid Payment';
				$message = '
				 
				Dear Administrator,
				 
				A payment has been made but is flagged as INVALID.
				Please verify the payment manualy and contact the buyer.
				 
				Buyer Email: '.$email.'
				';
				$headers = 'From:greenstogrounds@gmail.com' . "\r\n";
				mail($to, $subject, $message, $headers);
			}
		}
		fclose ($fp);
	}
?>
