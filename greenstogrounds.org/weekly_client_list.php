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
			<a href="total_client_list.php">Click for Total-Client List Table</a>
			<br /><br />

			<h1 style="color:green; border-style:solid">Weekly Client List</h1>
		</center>

		<?php

		include('inc/db_connect.php');


		//$sql = "ALTER TABLE sp1015gtgpaidresponsebl CHANGE September_12th `September 12th` varchar(65)";
		//$result = mysql_query($sql, $conn);
		$sql = "SELECT * FROM paid_orders WHERE timestamp LIKE '%10/14/2019%' OR timestamp LIKE '%10/15/2019%' OR timestamp LIKE '%10/16/2019%'  AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";


		$result = $mysqli->query($sql);

		//print "<br /><p style='font-weight:bold;'>Entire Database Below:</p>";
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
		?>


		<script type="text/javascript" charset="utf-8">
			$(function(){
				$("table").stickyTableHeaders();
			});
		</script>
	</body>
</html>
