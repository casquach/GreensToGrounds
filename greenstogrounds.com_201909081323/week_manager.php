<?php
	session_start();
	if(!isset($_SESSION['user'])) {
		//header('location:gtgenter.php');
		//die;
	}
?>

<html>
	<head>
		<?php
		$title = "Week Manager";
		include 'inc/head.php';
		?>
	</head>

	<body style="padding: 5%;">
		<div style="float:left;">
			<br /><br />
			<a href="g2g_data_home.php" style="border:solid">Go Back to HOME</a>
			
			<h1>Weekly Food Manager</h1><br />
		<?php
			include('inc/db_connect.php');

			$sql = "SELECT * FROM weekly_food";
			$result = $mysqli->query($sql);

			print "<div class='component'><table border=1 >\n";
			print "<thead style='background-color:white;'><tr>\n";
			print "<th>Box Type</th>\n";
			print "<th>Food</th>\n";
			print "<th>Price</th>\n";
			print "<th></th>\n";
			print "<th></th>\n";
			print "</tr></thead>\n\n<tbody>";
			while ($row = $result->fetch_assoc()) {
				print "<tr>\n";
				$id = $row['id'];
				$food_type = $row['food_type'];
				$food = $row['food'];
				$price = $row['price'];
				print "<td>$food_type</td>\n";
				print "<td>$food</td>\n";
				print "<td>$price</td>\n";
				print "<td><form action='edit_food.php' method='post'><input type='hidden' name='id' value='$id'><input type='submit' class='btn btn-primary' value='Edit'></form></td>";
				print "<td><form action='delete_food.php' method='post'><input type='hidden' name='id' value='$id'><input type='submit' class='btn btn-primary' value='Delete'></form></td>";
				print "</tr></tbody>\n\n";
			}
			print "</table></div>";
			print " <br /><form action='new_food.php' method='post'><input type='submit' value='Add New Food' class='button btn btn-primary'></form>";

			$sql = $mysqli->prepare("SELECT close_at FROM close_time WHERE id=1");
			$sql->execute();
			$sql->store_result();
			$sql->bind_result($close_at);
			$sql->fetch();

			print "<br /><br /><span style='font-weight: bold'>Orders Close At: $close_at</span><br /><br />";
			print "<form action='edit_time.php' method='post'><input type='hidden' name='close_at' value='$close_at'><input type='submit' value='Edit Time' class='button btn btn-primary'></form>";


		?>