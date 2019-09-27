<?php

    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $msg = $_POST['message'];

        require("class.phpmailer.php");

        $mail = new PHPMailer();

        $mail->IsSMTP();
        $mail->SMTPDebug = 1;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "adp4fm@virginia.edu";
        $mail->Password = "Qissopdbavjup22!";

        $mail->SetFrom("adp4fm@virginia.edu");
        $mail->Subject = "Test";
        $mail->Body = "$msg";
        $mail->AddAddress("$email");
        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message has been sent";
        }
    }

?>

<!DOCTYPE html>

<html>
	<head>
        <?php
        $title = "";
        include('inc/head.php');
        ?>

		<script type="text/javascript" src="lib/js/jquery-1.11.3.min.js"></script>
	</head>

	<body>
        <form method="post" action="">
            Email: <input type="text" name="email"><br />
            Message: <input type="text" name="message"><br />
            <input type="submit" name="submit" value="Submit">
        </form>
	</body>
</html>
