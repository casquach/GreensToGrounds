<?php
session_start();
//ADD LOGIN CHECKER

	$food_type = $_POST["food_type"];
	$food = $_POST["food_list"];
	$price = $_POST["price"];

	include('inc/db_connect.php');
	// insert food entry into weekmanager table
	$sql = "INSERT INTO weekly_food VALUES (NULL, '$food_type', '$food', '$price')";
	$result = $mysqli->query($sql);

// kill post session
	$_POST = array();
	header('Location:week_manager.php');
	die;

?>