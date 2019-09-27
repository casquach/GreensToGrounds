<?php
	session_start();
	/*if(!isset($_SESSION['user'])) {
		header('location:gtgenter.php');
		die;
	}*/
?>

<html>
	<head>
		<title>Orders Database</title>

		<!--<link href="lib/css/style_m.css" rel="stylesheet" type="text/css">-->
		<link rel="stylesheet" type="text/css" href="lib/css/component.css" />

		<script type="text/javascript" src="lib/js/jquery.stickytableheaders.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
		<script src="lib/js/jquery.stickyheader.js"></script>
	</head>

	<body>
		<center>
			<br /><br />
			<a href="g2g_data_home.php" style="border:solid">Go Back to HOME</a>
			<br /><br />
			<a href="weekly_client_list.php">Weekly-Client List Table</a>
			<br /><br />

			<h1 style="color:green; border-style:solid">Total Client List</h1>
			
		</center>
		<?php

		include('inc/db_connect.php');

		
		$sql = "SELECT * FROM paid_orders WHERE lower(paid_orders.name) NOT LIKE '%test%'AND name != ''  GROUP BY lower(paid_orders.name) ORDER BY `paid_orders`.`timestamp` ASC";


		$result = $mysqli->query($sql);

				print "<br /><p style='font-weight:bold;'>Entire Database Below:</p>";
				print "<div class='component'><table border=1 >\n";
				print "<thead style='background-color:white;'><tr>\n";
				print "<th>Name</th><th>Box Content</th><th>Email</th><th>Year</th><th>Phone Number</th>";
				print "</tr></thead>\n\n<tbody>";
				while ($row = $result->fetch_assoc()) {
					$name = $row['name'];
					$email = $row['email'];
					$phone_number = $row['phone_number'];
					$year = $row['year'];
					$box_content = $row['box_content'];

					print "<tr>\n";
					print "<td>$name</td>";
					print "<td>$box_content</td>";
					print "<td>$email</td>";
					print "<td>$year</td>";
					print "<td>$phone_number</td>";
					print "</tr></tbody>\n\n";
				}
				print "</table></div>";

		// $stmt = $mysqli->stmt_init();

		// if($stmt->prepare("SELECT * FROM paid_orders WHERE lower(paid_orders.name) NOT LIKE '%test%' AND year LIKE ?")) {
		// 	$searchString = '%' . $_GET['searchCust'] . '%';
		// 	$stmt->bind_param(s, $searchString);
		// 	$stmt->execute();
		// 	$stmt->bind_result($name, $email, $phone_number,$year,$box_content);
		// 	echo "<table border=1><th>name</th><th>email</th><th>phone_number</th><th>year</th><th>box_content</th>\n";
		// 	while($stmt->fetch()) {
		// 		echo "<tr><td>$name</td><td>$email</td><td>$phone_number</td><td>$year</td><td>$box_content</td></tr>";
		// 	}
		// 	echo "</table>";

		// 	// $stmt->close();
		// }	



		
		?>

		<script type="text/javascript" charset="utf-8">
			$(function(){
				$("table").stickyTableHeaders();
			});
		</script>
	</body>
</html>