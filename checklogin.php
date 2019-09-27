<?php
	ob_start();
	session_start();
	$tbl_name="165gtgaghte783"; // Table name

	// Connect to server and select databse.
	include('db_connection_info.inc');
	$conn = mysql_connect("mysql.greenstogrounds.com", $gtgBlogEntUsername, $gtgBlogEntPassword) or die(mysql_error());
	mysql_select_db("3591zgtgfnttl", $conn) or die(mysql_error());

	// username and password sent from form
	$user=$_POST['user'];
	$pass=$_POST['pass'];

	// To protect MySQL injection (more detail about MySQL injection)
	$user = stripslashes($user);
	$pass = stripslashes($pass);
	$user = mysql_real_escape_string($user);
	$pass = mysql_real_escape_string($pass);

	$sql="SELECT * FROM $tbl_name WHERE username='$user' and password='$pass'";
	$result = mysql_query($sql);

	//$row = mysql_fetch_assoc($result);

	// If result matched $user and $pass, table row must be 1 row
	if($user=='!GTGbloguSERName8743'){
		$_SESSION['user'] = $user;
		$_SESSION['pass'] = $pass;
		header('location:gtgblogpost.php');
	} else if($user=='!GTGorders123' && $pass=='!gtgORDERS456') {
		$_SESSION['user'] = $user;
		$_SESSION['pass'] = $pass;
		header('location:order_table.php');
	} else if($user=='!gtgweeks123' && $pass=='!gtgweeks456') {
		$_SESSION['user'] = $user;
		$_SESSION['pass'] = $pass;
		header('location:week_manager.php');
	} else {
		echo "Wrong Username or Password";
	}
	ob_end_flush();
?>
