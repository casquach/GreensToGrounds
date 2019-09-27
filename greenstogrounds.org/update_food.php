<?php
session_start();
//ADD LOGIN CHECKER

			$id = $_POST["id"];
			$food_type = $_POST["food_type"];
			$food = $_POST["food_list"];
			$price = $_POST["price"];

			include('inc/db_connect.php');

			$sql = "UPDATE weekly_food SET food_type='$food_type', food='$food', price='$price' WHERE id='$id'";
			$result = $mysqli->query($sql);

// kill post session
	$_POST = array();
	header('Location:week_manager.php');
	die;

?>