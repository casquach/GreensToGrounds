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

			<h1 style="color:green; border-style:solid"> Plus Dollar Orders </h1>
		</center>


		<?php

		include('inc/db_connect.php');

		$sql = "SELECT * FROM plusdollars_orders WHERE timestamp LIKE '%09/16/2019%' OR timestamp LIKE '%09/17/2019%' OR timestamp LIKE '%09/18/2019%' ";

		

		$result = $mysqli->query($sql);

		//print "<br /><p style='font-weight:bold;'>Entire Database Below:</p>";
		print "<div class='component'><table border=1 >\n";
		print "<thead style='background-color:white;'><tr>\n";
		print "<th>id</th><th>Timestamp</th><th>Name</th><th>Email</th><th>Cost</th>";
		print "</tr></thead>\n\n<tbody>";
		while ($row = $result->fetch_assoc()) {
			$id = $row['ID'];
			$timestamp = $row['Timestamp'];
			$name = $row['Full Name'];
			$email = $row['UVA Email'];
			$cost = $row['Cost'];
	
			print "<tr>\n";
			print "<td>$id</td>";
			print "<td>$timestamp</td>";
			print "<td>$name</td>";
			print "<td>$email</td>";
			print "<td>$cost</td>";
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