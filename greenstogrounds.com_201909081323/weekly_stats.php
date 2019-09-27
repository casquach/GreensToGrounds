<?php
	session_start();
?>

<html>
	<head>
		<title>Orders Database</title>

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

			<h1 style="color:green; border-style:solid"> This Week's Stats </h1>
		</center>


		<?php

		include('inc/db_connect.php');

		$sql = "SELECT food_type, food FROM weekly_food";

		

		$result = $mysqli->query($sql);
		$result2 = $mysqli->query($sql);

		print "<div class='component'><table border=1 >\n";
		print "<thead style='background-color:white;'><tr>\n";
		print "</tr></thead>\n\n<tbody>";
		while ($row = $result->fetch_assoc()) {
			$food_type = $row['food_type'];
			$food = $row['food'];
			$res = '';
			
			if ($food_type == 'Produce Box' || $food_type == 'Snack Box'){
				$res = $food_type;
			}
			else{
				$res = $food;
			}

			print "<th>$res</th>";
	
		}
		print "<tr>";
		while ($row = $result2->fetch_assoc()) {
			$food_type = $row['food_type'];
			$food = $row['food'];
			$res = '';
			
			if ($food_type == 'Produce Box' || $food_type == 'Snack Box'){
				$res = $food_type;
			}
			else{
				$res = $food;
			}
			$query = "SELECT COUNT(year) as count FROM paid_orders WHERE paid_orders.box_content like '%".$res."%' AND (  timestamp LIKE '%04/29/2019%' OR timestamp LIKE '%04/30/2019%' OR timestamp LIKE '%05/01/2019%' )";

			$query_result = $mysqli->query($query);


			$print = "";
			
			while ($row = $query_result->fetch_assoc()) {
				$print = $row['count'];
				print "<td>$print</td>";
			}
			
		}
		print "</tr>";
		print "</tbody>\n\n";
		print "</table></div>";



		$query_full_snack = "SELECT COUNT(year) as count FROM paid_orders WHERE (lower(paid_orders.package) like '%full%' AND lower(paid_orders.package) like '%1%') AND ( timestamp LIKE '%3/25/2019%' OR timestamp LIKE '%3/26/2019%' OR timestamp LIKE '%3/27/2019%'  )";
		$query_full_produce = "SELECT COUNT(year) as count FROM paid_orders WHERE (lower(paid_orders.package) like '%full%' AND lower(paid_orders.package) like '%2%') AND ( timestamp LIKE '%3/25/2019%' OR timestamp LIKE '%3/26/2019%' OR timestamp LIKE '%3/27/2019%' )";
		$query_half_snack = "SELECT COUNT(year) as count FROM paid_orders WHERE (lower(paid_orders.package) like '%half%' AND lower(paid_orders.package) like '%1%') AND ( timestamp LIKE '%3/25/2019%' OR timestamp LIKE '%3/26/2019%' OR timestamp LIKE '%3/27/2019%'  )";
		$query_half_produce = "SELECT COUNT(year) as count FROM paid_orders WHERE (lower(paid_orders.package) like '%half%' AND lower(paid_orders.package) like '%2%') AND (timestamp LIKE '%3/25/2019%' OR timestamp LIKE '%3/26/2019%' OR timestamp LIKE '%3/27/2019%' )";
		$query_full_snack_result = $mysqli->query($query_full_snack);
		$query_full_produce_result = $mysqli->query($query_full_produce);
		$query_half_snack_result = $mysqli->query($query_half_snack);
		$query_half_produce_result = $mysqli->query($query_half_produce);

		print "<div class='component'><table border=1 >\n";
		print "<thead style='background-color:white;'><tr>\n";
		print "<th>Full Season Snack Package Orders</th><th>Full Season Produce Package Orders</th><th>Half Season Snack Package Orders</th><th>Half Season Produce Package Orders</th>";
		print "</tr></thead>\n\n<tbody>";
		print "<tr>\n";
		while ($row = $query_full_snack_result->fetch_assoc()) {
			$full_count = $row['count'];
			print "<td>$full_count</td>";
			
		}
		while ($row = $query_full_produce_result->fetch_assoc()) {
			$full_count = $row['count'];
			print "<td>$full_count</td>";
			
		}
		while ($row = $query_half_snack_result->fetch_assoc()) {
			$half_count = $row['count'];
			print "<td>$half_count</td>";
			
		}
		while ($row = $query_half_produce_result->fetch_assoc()) {
			$half_count = $row['count'];
			print "<td>$half_count</td>";
			
		}
		print "</tr></tbody>\n\n";
		print "</table></div>";





		?>

		<script type="text/javascript" charset="utf-8">
			$(function(){
				$("table").stickyTableHeaders();
			});
		</script>
	</body>
</html>