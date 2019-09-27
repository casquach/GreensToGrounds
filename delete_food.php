<?php
//ADD LOGIN CHECKER

			$id = $_POST["id"];

			include('inc/db_connect.php');

			$sql = "DELETE FROM weekly_food WHERE id='$id'";
			$result = $mysqli->query($sql);

// kill post session
	$_POST = array();
	header('Location:week_manager.php');
	die;

?>