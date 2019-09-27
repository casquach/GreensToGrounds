<?php
session_start();
	/*if(!isset($_SESSION['user'])) {
		header('location:gtgenter.php');
		die;
	}*/

	?>

	<html>
	<head>
		<title>G2G Info-Sheet Home Page</title>
		<style type="text/css">
			.quote-container {
				margin-top: 50px;
				position: relative;
			}

			.note {
				color: #333;
				position: relative;
				width: 300px;
				margin: 0 auto;
				padding: 20px;
				font-family: Satisfy;
				font-size: 30px;
				box-shadow: 0 10px 10px 2px rgba(0,0,0,0.3);
			}

			.note .author {
				display: block;
				margin: 40px 0 0 0;
				text-align: right;
			}

			.yellow {
				background: #eae672;
				-webkit-transform: rotate(2deg);
				-moz-transform: rotate(2deg);
				-o-transform: rotate(2deg);
				-ms-transform: rotate(2deg);
				transform: rotate(2deg);
			}

			.pin {
				background-color: #aaa;
				display: block;
				height: 32px;
				width: 2px;
				position: absolute;
				left: 50%;
				top: -16px;
				z-index: 1;
			}

			.pin:after {
				background-color: #A31;
				background-image: radial-gradient(25% 25%, circle, hsla(0,0%,100%,.3), hsla(0,0%,0%,.3));
				border-radius: 50%;
				box-shadow: inset 0 0 0 1px hsla(0,0%,0%,.1),
				inset 3px 3px 3px hsla(0,0%,100%,.2),
				inset -3px -3px 3px hsla(0,0%,0%,.2),
				23px 20px 3px hsla(0,0%,0%,.15);
				content: '';
				height: 12px;
				left: -5px;
				position: absolute;
				top: -10px;
				width: 12px;
			}

			.pin:before {
				background-color: hsla(0,0%,0%,0.1);
				box-shadow: 0 0 .25em hsla(0,0%,0%,.1);
				content: '';

				height: 24px;
				width: 2px;
				left: 0;
				position: absolute;
				top: 8px;

				transform: rotate(57.5deg);
				-moz-transform: rotate(57.5deg);
				-webkit-transform: rotate(57.5deg);
				-o-transform: rotate(57.5deg);
				-ms-transform: rotate(57.5deg);

				transform-origin: 50% 100%;
				-moz-transform-origin: 50% 100%;
				-webkit-transform-origin: 50% 100%;
				-ms-transform-origin: 50% 100%;
				-o-transform-origin: 50% 100%;
			}
		</style>

		<!--<link href="lib/css/style_m.css" rel="stylesheet" type="text/css">-->
		<link rel="stylesheet" type="text/css" href="lib/css/component.css" />

		<script type="text/javascript" src="lib/js/jquery.stickytableheaders.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
		<script src="lib/js/jquery.stickyheader.js"></script>
	</head>

	<body>

		<center>
			<h1 style="color:green; border-style:solid">GreensToGrounds Data Home</h1>
			<br /><br />
			<a href="week_manager.php">Week Manager</a>
			<br /><br />
			<a href="order_table.php">Paid Order Table</a>
			<br /><br />
			<a href="semester_packages.php">Semester Packages Table</a>
			<br /><br />
			<a href="order_sheet.php">Order Sheet Table</a>
			<br /><br />
			<a href="plus_dollar_table.php">Plus Dollar Order Table</a>
			<br /><br />
			<a href="weekly_client_list.php">Weekly-Client List Table</a>
			<br /><br />
			<a href="total_client_list.php">Total-Client List Table</a>
			<br /><br />
			<!--<a href="unpaid_response_table.php">Unpaid Table</a>
			<br /><br />-->

					<div class="quote-container">
			<i class="pin"></i>
			<blockquote class="note yellow">
				To Do:
			</br>
			1. Fix Pay With Paypal

</blockquote>
</div>



		</center>
		<?php

		include('inc/db_connect.php');
				print'<center>';
		print "<div class='component' ><table class='fixed' border=1 >\n";
		print "<col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/>";

		print "<thead style='background-color:white;'><tr>\n";
		print "<th>Semester</th><th>Week</th><th>Total Orders</th><th>Plus Orders</th><th>Gross Profit</th><th>1st Yr Orders</th><th>2nd Yr Orders</th><th>3rd Yr Orders</th><th>4th Yr Orders</th><th>Misc. Orders</th><th>Food Stats</th>";

		if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%3/18/2019%' OR timestamp LIKE '%3/19/2019%' OR timestamp LIKE '%3/20/2019%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%3/18/2019%' OR timestamp LIKE '%3/19/2019%' OR timestamp LIKE '%3/20/2019%'";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%3/18/2019%' OR timestamp LIKE '%3/19/2019%' OR timestamp LIKE '%3/20/2019%'";
			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%3/18/2019%' OR timestamp LIKE '%3/19/2019%' OR timestamp LIKE '%3/20/2019%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%3/18/2019%' OR timestamp LIKE '%3/19/2019%' OR timestamp LIKE '%03/20/2019%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%3/18/2019%' OR timestamp LIKE '%3/19/2019%' OR timestamp LIKE '%3/20/2019%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%3/18/2019%' OR timestamp LIKE '%3/19/2019%' OR timestamp LIKE '%3/20/2019%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%3/18/2019%' OR timestamp LIKE '%3/19/2019%' OR timestamp LIKE '%3/20/2019%')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%3/18/2019%' OR timestamp LIKE '%3/19/2019%' OR timestamp LIKE '%3/20/2019%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Spring '19</td>";
			print "<td>(3/18/2019-3/20/2019) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			
		}
		if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%3/25/2019%' OR timestamp LIKE '%3/26/2019%' OR timestamp LIKE '%3/27/2019%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%3/25/2019%' OR timestamp LIKE '%3/26/2019%' OR timestamp LIKE '%3/27/2019%'";
			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%3/25/2019%' OR timestamp LIKE '%3/26/2019%' OR timestamp LIKE '%3/27/2019%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%3/25/2019%' OR timestamp LIKE '%3/26/2019%' OR timestamp LIKE '%3/27/2019%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%3/25/2019%' OR timestamp LIKE '%3/26/2019%' OR timestamp LIKE '%3/27/2019%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%3/25/2019%' OR timestamp LIKE '%3/26/2019%' OR timestamp LIKE '%3/27/2019%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%3/25/2019%' OR timestamp LIKE '%3/26/2019%' OR timestamp LIKE '%3/27/2019%')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%3/25/2019%' OR timestamp LIKE '%3/26/2019%' OR timestamp LIKE '%3/27/2019%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Fall '18</td>";
			print "<td>(10/15/2018-10/17/2018) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			
		}

		print'<center>';
		print "<div class='component' ><table class='fixed' border=1 >\n";
		print "<col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/>";

		print "<thead style='background-color:white;'><tr>\n";
		print "<th>Semester</th><th>Week</th><th>Total Orders</th><th>Plus Orders</th><th>Gross Profit</th><th>1st Yr Orders</th><th>2nd Yr Orders</th><th>3rd Yr Orders</th><th>4th Yr Orders</th><th>Misc. Orders</th><th>Food Stats</th>";

		if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%10/22/2018%' OR timestamp LIKE '%10/23/18%' OR timestamp LIKE '%10/24/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%10/22/2018%' OR timestamp LIKE '%10/23/18%' OR timestamp LIKE '%10/24/2018%'";
			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%10/22/2018%' OR timestamp LIKE '%10/23/2018%' OR timestamp LIKE '%10/24/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%10/22/2018%' OR timestamp LIKE '%10/23/2018%' OR timestamp LIKE '%10/24/2018%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%10/22/2018%' OR timestamp LIKE '%10/23/2018%' OR timestamp LIKE '%10/24/2018%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%10/22/2018%' OR timestamp LIKE '%10/23/2018%' OR timestamp LIKE '%10/24/2018%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%10/22/2018%' OR timestamp LIKE '%10/23/2018%' OR timestamp LIKE '%10/24/2018')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%10/22/2018%' OR timestamp LIKE '%10/23/2018%' OR timestamp LIKE '%10/24/2018%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Fall '18</td>";
			print "<td>(10/22/2018-10/24/2019) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			
		}

		if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%10/15/2018%' OR timestamp LIKE '%10/16/2018%' OR timestamp LIKE '%10/17/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%10/15/2018%' OR timestamp LIKE '%10/16/2018%' OR timestamp LIKE '%10/17/2018%'";
			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%10/15/2018%' OR timestamp LIKE '%10/16/2018%' OR timestamp LIKE '%10/17/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%10/15/2018%' OR timestamp LIKE '%10/16/2018%' OR timestamp LIKE '%010/17/2018%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%10/15/2018%' OR timestamp LIKE '%10/16/2018%' OR timestamp LIKE '%10/17/2018%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%10/15/2018%' OR timestamp LIKE '%10/16/2018%' OR timestamp LIKE '%10/17/2018%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%10/15/2018%' OR timestamp LIKE '%10/16/2018%' OR timestamp LIKE '%10/17/2018%')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%10/15/2018%' OR timestamp LIKE '%10/16/2018%' OR timestamp LIKE '%10/17/2018%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Fall '18</td>";
			print "<td>(10/15/2018-10/17/2018) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			
		}


		if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%10/08/2018%' OR timestamp LIKE '%10/09/2018%' OR timestamp LIKE '%10/10/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%10/08/2018%' OR timestamp LIKE '%10/09/2018%' OR timestamp LIKE '%10/10/2018%'";
			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%10/08/2018%' OR timestamp LIKE '%10/09/2018%' OR timestamp LIKE '%10/10/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%10/08/2018%' OR timestamp LIKE '%10/09/2018%' OR timestamp LIKE '%10/10/2018%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%10/08/2018%' OR timestamp LIKE '%10/09/2018%' OR timestamp LIKE '%10/10/2018%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%10/08/2018%' OR timestamp LIKE '%10/09/2018%' OR timestamp LIKE '%10/10/2018%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%10/08/2018%' OR timestamp LIKE '%10/09/2018%' OR timestamp LIKE '%10/10/2018%')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%10/08/2018%' OR timestamp LIKE '%10/09/2018%' OR timestamp LIKE '%10/10/2018%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Fall 2018</td>";
			print "<td>(10/08-10/10) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			
		}

		print'<center>';
		print "<div class='component' ><table class='fixed' border=1 >\n";
		print "<col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/>";

		print "<thead style='background-color:white;'><tr>\n";
		print "<th>Semester</th><th>Week</th><th>Total Orders</th><th>Plus Orders</th><th>Gross Profit</th><th>1st Yr Orders</th><th>2nd Yr Orders</th><th>3rd Yr Orders</th><th>4th Yr Orders</th><th>Misc. Orders</th><th>Food Stats</th>";

		if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%09/24/2018%' OR timestamp LIKE '%09/25/2018%' OR timestamp LIKE '%09/26/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%09/24/2018%' OR timestamp LIKE '%09/25/2018%' OR timestamp LIKE '%09/26/2018%'";
			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%09/24/2018%' OR timestamp LIKE '%09/25/2018%' OR timestamp LIKE '%09/26/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%09/24/2018%' OR timestamp LIKE '%09/25/2018%' OR timestamp LIKE '%09/26/2018%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%09/24/2018%' OR timestamp LIKE '%09/25/2018%' OR timestamp LIKE '%09/26/2018%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%09/24/2018%' OR timestamp LIKE '%09/25/2018%' OR timestamp LIKE '%09/26/2018%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%09/24/2018%' OR timestamp LIKE '%09/25/2018%' OR timestamp LIKE '%09/26/2018%')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%09/24/2018%' OR timestamp LIKE '%09/25/2018%' OR timestamp LIKE '%09/26/2018%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Fall '18</td>";
			print "<td>(09/24/2018-09/26/2018) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			
		}
if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%09/17/2018%' OR timestamp LIKE '%09/18/2018%' OR timestamp LIKE '%09/19/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%09/17/2018%' OR timestamp LIKE '%09/18/2018%' OR timestamp LIKE '%09/19/2018%'";
			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%09/17/2018%' OR timestamp LIKE '%09/18/2018%' OR timestamp LIKE '%09/19/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%09/17/2018%' OR timestamp LIKE '%09/18/2018%' OR timestamp LIKE '%09/19/2018%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%09/17/2018%' OR timestamp LIKE '%09/18/2018%' OR timestamp LIKE '%09/19/2018%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%09/17/2018%' OR timestamp LIKE '%09/18/2018%' OR timestamp LIKE '%09/19/2018%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%09/17/2018%' OR timestamp LIKE '%09/18/2018%' OR timestamp LIKE '%09/19/2018%')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%09/17/2018%' OR timestamp LIKE '%09/18/2018%' OR timestamp LIKE '%09/19/2018%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Fall '18</td>";
			print "<td>(09/17/2018-09/19/2018) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			
		}


		if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%09/10/2018%' OR timestamp LIKE '%09/11/2018%' OR timestamp LIKE '%09/12/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%09/10/2018%' OR timestamp LIKE '%09/11/2018%' OR timestamp LIKE '%09/12/2018%'";
			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%09/10/2018%' OR timestamp LIKE '%09/11/2018%' OR timestamp LIKE '%09/12/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%09/10/2018%' OR timestamp LIKE '%09/11/2018%' OR timestamp LIKE '%09/12/2018%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%09/10/2018%' OR timestamp LIKE '%09/11/2018%' OR timestamp LIKE '%09/12/2018%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%09/10/2018%' OR timestamp LIKE '%09/11/2018%' OR timestamp LIKE '%09/12/2018%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%09/10/2018%' OR timestamp LIKE '%09/11/2018%' OR timestamp LIKE '%09/12/2018%')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%09/10/2018%' OR timestamp LIKE '%09/11/2018%' OR timestamp LIKE '%09/12/2018%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Fall '18</td>";
			print "<td>(09/10/2018-09/12/2018) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			
		}

		if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%09/03/2018%' OR timestamp LIKE '%09/04/2018%' OR timestamp LIKE '%09/05/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%09/03/2018%' OR timestamp LIKE '%09/04/2018%' OR timestamp LIKE '%09/05/2018%'";
			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%09/03/2018%' OR timestamp LIKE '%09/04/2018%' OR timestamp LIKE '%09/05/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%09/03/2018%' OR timestamp LIKE '%09/04/2018%' OR timestamp LIKE '%09/05/2018%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%09/03/2018%' OR timestamp LIKE '%09/04/2018%' OR timestamp LIKE '%09/05/2018%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%09/03/2018%' OR timestamp LIKE '%09/04/2018%' OR timestamp LIKE '%09/05/2018%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%09/03/2018%' OR timestamp LIKE '%09/04/2018%' OR timestamp LIKE '%09/05/2018%')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%09/03/2018%' OR timestamp LIKE '%09/04/2018%' OR timestamp LIKE '%09/05/2018%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Fall '18</td>";
			print "<td>(09/03/2018-09/05/2018) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			
		}



		include('inc/db_connect.php');
		print'<center>';
		print "<div class='component' ><table class='fixed' border=1 >\n";
		print "<col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/>";

		print "<thead style='background-color:white;'><tr>\n";
		print "<th>Semester</th><th>Week</th><th>Total Orders</th><th>Plus Orders</th><th>Gross Profit</th><th>1st Yr Orders</th><th>2nd Yr Orders</th><th>3rd Yr Orders</th><th>4th Yr Orders</th><th>Misc. Orders</th><th>Food Stats</th>";

		if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%04/23/2018%' OR timestamp LIKE '%04/24/2018%' OR timestamp LIKE '%04/25/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%04/23/2018%' OR timestamp LIKE '%04/24/2018%' OR timestamp LIKE '%04/25/2018%'";
			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%04/23/2018%' OR timestamp LIKE '%04/24/2018%' OR timestamp LIKE '%04/25/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%04/23/2018%' OR timestamp LIKE '%04/24/2018%' OR timestamp LIKE '%04/25/2018%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%04/23/2018%' OR timestamp LIKE '%04/24/2018%' OR timestamp LIKE '%04/25/2018%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%04/23/2018%' OR timestamp LIKE '%04/24/2018%' OR timestamp LIKE '%04/25/2018%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%04/23/2018%' OR timestamp LIKE '%04/24/2018%' OR timestamp LIKE '%04/25/2018%')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%04/23/2018%' OR timestamp LIKE '%04/24/2018%' OR timestamp LIKE '%04/25/2018%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Spring '18</td>";
			print "<td>(04//23/2018-04/25/2018) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			
		}if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%04/16/2018%' OR timestamp LIKE '%04/17/2018%' OR timestamp LIKE '%04/18/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%04/16/2018%' OR timestamp LIKE '%04/17/2018%' OR timestamp LIKE '%04/18/2018%'";
			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%04/16/2018%' OR timestamp LIKE '%04/17/2018%' OR timestamp LIKE '%04/18/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%04/16/2018%' OR timestamp LIKE '%04/17/2018%' OR timestamp LIKE '%04/18/2018%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%04/16/2018%' OR timestamp LIKE '%04/17/2018%' OR timestamp LIKE '%04/18/2018%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%04/16/2018%' OR timestamp LIKE '%04/17/2018%' OR timestamp LIKE '%04/18/2018%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%04/16/2018%' OR timestamp LIKE '%04/17/2018%' OR timestamp LIKE '%04/18/2018%')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%04/16/2018%' OR timestamp LIKE '%04/17/2018%' OR timestamp LIKE '%04/18/2018%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Spring '18</td>";
			print "<td>(04/16/2018-04/18/2018) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			

		}if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%04/09/2018%' OR timestamp LIKE '%04/10/2018%' OR timestamp LIKE '%04/11/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%04/09/2018%' OR timestamp LIKE '%04/10/2018%' OR timestamp LIKE '%04/11/2018%'";
			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%04/09/2018%' OR timestamp LIKE '%04/10/2018%' OR timestamp LIKE '%04/11/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%04/09/2018%' OR timestamp LIKE '%04/10/2018%' OR timestamp LIKE '%04/11/2018%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%04/09/2018%' OR timestamp LIKE '%04/10/2018%' OR timestamp LIKE '%04/11/2018%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%04/09/2018%' OR timestamp LIKE '%04/10/2018%' OR timestamp LIKE '%04/11/2018%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%04/09/2018%' OR timestamp LIKE '%04/10/2018%' OR timestamp LIKE '%04/11/2018%')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%04/09/2018%' OR timestamp LIKE '%04/10/2018%' OR timestamp LIKE '%04/11/2018%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Spring '18</td>";
			print "<td>(04/09/2018-04/11/2018) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			

		}
		if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%04/02/2018%' OR timestamp LIKE '%04/03/2018%' OR timestamp LIKE '%04/04/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%04/02/2018%' OR timestamp LIKE '%04/03/2018%' OR timestamp LIKE '%04/04/2018%'";
			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%04/02/2018%' OR timestamp LIKE '%04/03/2018%' OR timestamp LIKE '%04/04/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%04/02/2018%' OR timestamp LIKE '%04/04/2018%' OR timestamp LIKE '%04/04/2018%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%04/02/2018%' OR timestamp LIKE '%04/03/2018%' OR timestamp LIKE '%04/04/2018%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%04/02/2018%' OR timestamp LIKE '%04/03/2018%' OR timestamp LIKE '%04/04/2018%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%04/02/2018%' OR timestamp LIKE '%04/03/2018%' OR timestamp LIKE '%04/04/2018%')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%04/02/2018%' OR timestamp LIKE '%04/03/2018%' OR timestamp LIKE '%04/04/2018%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Spring '18</td>";
			print "<td>(04/02/2018-04/04/2018) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			

		}
		if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%03/26/2018%' OR timestamp LIKE '%03/27/2018%' OR timestamp LIKE '%03/28/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%03/26/2018%' OR timestamp LIKE '%03/27/2018%' OR timestamp LIKE '%03/28/2018%'";
			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%03/26/2018%' OR timestamp LIKE '%03/27/2018%' OR timestamp LIKE '%03/28/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%03/26/2018%' OR timestamp LIKE '%03/27/2018%' OR timestamp LIKE '%03/28/2018%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%03/26/2018%' OR timestamp LIKE '%03/27/2018%' OR timestamp LIKE '%03/28/2018%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%03/26/2018%' OR timestamp LIKE '%03/27/2018%' OR timestamp LIKE '%03/28/2018%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%03/26/2018%' OR timestamp LIKE '%03/27/2018%' OR timestamp LIKE '%03/28/2018%')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%03/26/2018%' OR timestamp LIKE '%03/27/2018%' OR timestamp LIKE '%03/28/2018%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Spring '18</td>";
			print "<td>(03/26/2018-03/28/2018) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			

		}
		if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%03/19/2018%' OR timestamp LIKE '%03/20/2018%' OR timestamp LIKE '%03/21/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%03/19/2018%' OR timestamp LIKE '%03/20/2018%' OR timestamp LIKE '%03/21/2018%'";
			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%03/19/2018%' OR timestamp LIKE '%03/20/2018%' OR timestamp LIKE '%03/21/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%03/19/2018%' OR timestamp LIKE '%03/20/2018%' OR timestamp LIKE '%03/21/2018%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%03/19/2018%' OR timestamp LIKE '%03/20/2018%' OR timestamp LIKE '%03/21/2018%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%03/19/2018%' OR timestamp LIKE '%03/20/2018%' OR timestamp LIKE '%03/21/2018%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%03/19/2018%' OR timestamp LIKE '%03/20/2018%' OR timestamp LIKE '%03/21/2018%')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%03/19/2018%' OR timestamp LIKE '%03/20/2018%' OR timestamp LIKE '%03/21/2018%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Spring '18</td>";
			print "<td>(03/19/2018-03/21/2018) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			

		}
if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%03/12/2018%' OR timestamp LIKE '%03/13/2018%' OR timestamp LIKE '%03/14/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%03/12/2018%' OR timestamp LIKE '%03/13/2018%' OR timestamp LIKE '%03/14/2018%'";
			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%03/12/2018%' OR timestamp LIKE '%03/13/2018%' OR timestamp LIKE '%03/14/2018%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%03/12/2018%' OR timestamp LIKE '%03/13/2018%' OR timestamp LIKE '%03/14/2018%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%03/12/2018%' OR timestamp LIKE '%03/13/2018%' OR timestamp LIKE '%03/14/2018%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%03/12/2018%' OR timestamp LIKE '%03/13/2018%' OR timestamp LIKE '%03/14/2018%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%03/12/2018%' OR timestamp LIKE '%03/13/2018%' OR timestamp LIKE '%03/14/2018%')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%03/12/2018%' OR timestamp LIKE '%03/13/2018%' OR timestamp LIKE '%03/14/2018%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Spring '18</td>";
			print "<td>(03/12/2018-03/14/2018) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			

		}

	include('inc/db_connect.php');


	print'<center>';
	print "<div class='component' ><table class='fixed' border=1 >\n";
	print "<col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/>";

	print "<thead style='background-color:white;'><tr>\n";
	print "<th>Semester</th><th>Week</th><th>Total Orders</th><th>Plus Orders</th><th>Gross Profit</th><th>1st Yr Orders</th><th>2nd Yr Orders</th><th>3rd Yr Orders</th><th>4th Yr Orders</th><th>Misc. Orders</th><th>Food Stats</th>";

if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%10/23/2017%' OR timestamp LIKE '%10/24/2017%' OR timestamp LIKE '%10/25/2017%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%10/23/2017%' OR timestamp LIKE '%10/24/2017%' OR timestamp LIKE '%10/25/2017%'";
			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%10/23/2017%' OR timestamp LIKE '%10/24/2017%' OR timestamp LIKE '%10/25/2017%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%10/23/2017%' OR timestamp LIKE '%10/24/2017%' OR timestamp LIKE '%10/25/2017%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%10/23/2017%' OR timestamp LIKE '%10/24/2017%' OR timestamp LIKE '%10/25/2017%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%10/23/2017%' OR timestamp LIKE '%10/24/2017%' OR timestamp LIKE '%10/25/2017%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%10/23/2017%' OR timestamp LIKE '%10/24/2017%' OR timestamp LIKE '%10/25/2017%')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%10/23/2017%' OR timestamp LIKE '%10/24/2017%' OR timestamp LIKE '%10/25/2017%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Fall '17</td>";
			print "<td>(10/23/17-10/25/17) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			

		}
	
		if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%10/16/2017%' OR timestamp LIKE '%10/17/2017%' OR timestamp LIKE '%10/18/2017%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%10/16/2017%' OR timestamp LIKE '%10/17/2017%' OR timestamp LIKE '%10/18/2017%'";
			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%10/16/2017%' OR timestamp LIKE '%10/17/2017%' OR timestamp LIKE '%10/18/2017%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%10/16/2017%' OR timestamp LIKE '%10/17/2017%' OR timestamp LIKE '%10/18/2017%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%10/16/2017%' OR timestamp LIKE '%10/17/2017%' OR timestamp LIKE '%10/18/2017%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%10/16/2017%' OR timestamp LIKE '%10/17/2017%' OR timestamp LIKE '%10/18/2017%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%10/16/2017%' OR timestamp LIKE '%10/17/2017%' OR timestamp LIKE '%10/18/2017%')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%10/16/2017%' OR timestamp LIKE '%10/17/2017%' OR timestamp LIKE '%10/18/2017%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Fall '17</td>";
			print "<td>(10/16/17-10/18/17) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			

		}

		if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%10/09/2017%' OR timestamp LIKE '%10/10/2017%' OR timestamp LIKE '%10/11/2017%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%10/09/2017%' OR timestamp LIKE '%10/10/2017%' OR timestamp LIKE '%10/11/2017%'";
			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%10/09/2017%' OR timestamp LIKE '%10/10/2017%' OR timestamp LIKE '%10/11/2017%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%10/09/2017%' OR timestamp LIKE '%10/10/2017%' OR timestamp LIKE '%10/11/2017%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%10/09/2017%' OR timestamp LIKE '%10/10/2017%' OR timestamp LIKE '%10/11/2017%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%10/09/2017%' OR timestamp LIKE '%10/10/2017%' OR timestamp LIKE '%10/11/2017%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%10/09/2017%' OR timestamp LIKE '%10/10/2017%' OR timestamp LIKE '%10/11/2017%')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%10/09/2017%' OR timestamp LIKE '%10/10/2017%' OR timestamp LIKE '%10/11/2017%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Fall '17</td>";
			print "<td>(10/09/17-10/11/17) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			

		}

			if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%10/02/2017%' OR timestamp LIKE '%10/03/2017%' OR timestamp LIKE '%10/04/2017%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%10/02/2017%' OR timestamp LIKE '%10/03/2017%' OR timestamp LIKE '%10/04/2017%'";

			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%10/02/2017%' OR timestamp LIKE '%10/03/2017%' OR timestamp LIKE '%10/04/2017%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%10/02/2017%' OR timestamp LIKE '%10/03/2017%' OR timestamp LIKE '%10/04/2017%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%10/02/2017%' OR timestamp LIKE '%10/03/2017%' OR timestamp LIKE '%10/04/2017%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%10/02/2017%' OR timestamp LIKE '%10/03/2017%' OR timestamp LIKE '%10/04/2017%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%10/02/2017%' OR timestamp LIKE '%10/03/2017%' OR timestamp LIKE '%10/04/2017%')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%10/02/2017%' OR timestamp LIKE '%10/03/2017%' OR timestamp LIKE '%10/04/2017%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Fall '17</td>";
			print "<td>(10/02/17-10/04/17) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			

		}


		if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%09/25/2017%' OR timestamp LIKE '%09/26/2017%' OR timestamp LIKE '%09/27/2017%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%09/25/2017%' OR timestamp LIKE '%09/26/2017%' OR timestamp LIKE '%09/27/2017%' ";

			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%09/25/2017%' OR timestamp LIKE '%09/26/2017%' OR timestamp LIKE '%09/27/2017%'   AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%09/25/2017%' OR timestamp LIKE '%09/26/2017%' OR timestamp LIKE '%09/27/2017%' )";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%09/25/2017%' OR timestamp LIKE '%09/26/2017%' OR timestamp LIKE '%09/27/2017%' )";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%09/25/2017%' OR timestamp LIKE '%09/26/2017%' OR timestamp LIKE '%09/27/2017%' )";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%09/25/2017%' OR timestamp LIKE '%09/26/2017%' OR timestamp LIKE '%09/27/2017%' )";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%09/25/2017%' OR timestamp LIKE '%09/26/2017%' OR timestamp LIKE '%09/27/2017%' )";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Fall '17</td>";
			print "<td>(9/25/17-9/27/17) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			

		}

		if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%09/18/2017%' OR timestamp LIKE '%09/19/2017%' OR timestamp LIKE '%09/20/2017%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%09/18/2017%' OR timestamp LIKE '%09/19/2017%' OR timestamp LIKE '%09/20/2017%' ";

			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%09/18/2017%' OR timestamp LIKE '%09/19/2017%' OR timestamp LIKE '%09/20/2017%'   AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%09/18/2017%' OR timestamp LIKE '%09/19/2017%' OR timestamp LIKE '%09/20/2017%' )";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%09/18/2017%' OR timestamp LIKE '%09/19/2017%' OR timestamp LIKE '%09/20/2017%' )";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%09/18/2017%' OR timestamp LIKE '%09/19/2017%' OR timestamp LIKE '%09/20/2017%' )";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%09/18/2017%' OR timestamp LIKE '%09/19/2017%' OR timestamp LIKE '%09/20/2017%' )";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%09/18/2017%' OR timestamp LIKE '%09/19/2017%' OR timestamp LIKE '%09/20/2017%' )";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Fall '17</td>";
			print "<td>(9/18/17-9/20/17) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			

		}
		if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%09/11/2017%' OR timestamp LIKE '%09/12/2017%' OR timestamp LIKE '%09/13/2017%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%09/11/2017%' OR timestamp LIKE '%09/12/2017%' OR timestamp LIKE '%09/13/2017%' ";

			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%09/11/2017%' OR timestamp LIKE '%09/12/2017%' OR timestamp LIKE '%09/13/2017%'   AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%09/11/2017%' OR timestamp LIKE '%09/12/2017%' OR timestamp LIKE '%09/13/2017%' )";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%09/11/2017%' OR timestamp LIKE '%09/12/2017%' OR timestamp LIKE '%09/13/2017%' )";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%09/11/2017%' OR timestamp LIKE '%09/12/2017%' OR timestamp LIKE '%09/13/2017%' )";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%09/11/2017%' OR timestamp LIKE '%09/12/2017%' OR timestamp LIKE '%09/13/2017%' )";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%09/11/2017%' OR timestamp LIKE '%09/12/2017%' OR timestamp LIKE '%09/13/2017%' )";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Fall '17</td>";
			print "<td>(9/11/17-9/13/17) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			

		}


		if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%09/04/2017%' OR timestamp LIKE '%09/05/2017%' OR timestamp LIKE '%09/06/2017%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%09/04/2017%' OR timestamp LIKE '%09/05/2017%' OR timestamp LIKE '%09/06/2017%' ";

			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%09/04/2017%' OR timestamp LIKE '%09/05/2017%' OR timestamp LIKE '%09/06/2017%'   AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%09/04/2017%' OR timestamp LIKE '%09/05/2017%' OR timestamp LIKE '%09/06/2017%' )";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%09/04/2017%' OR timestamp LIKE '%09/05/2017%' OR timestamp LIKE '%09/06/2017%' )";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%09/04/2017%' OR timestamp LIKE '%09/05/2017%' OR timestamp LIKE '%09/06/2017%' )";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%09/04/2017%' OR timestamp LIKE '%09/05/2017%' OR timestamp LIKE '%09/06/2017%' )";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%09/04/2017%' OR timestamp LIKE '%09/05/2017%' OR timestamp LIKE '%09/06/2017%' )";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Fall '17</td>";
			print "<td>(9/04/17-9/06/17) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			

		}


		if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%08/28/2017%' OR timestamp LIKE '%08/29/2017%' OR timestamp LIKE '%08/30/2017%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%08/28/2017%' OR timestamp LIKE '%08/29/2017%' OR timestamp LIKE '%08/30/2017%'";

			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%08/28/2017%' OR timestamp LIKE '%08/29/2017%' OR timestamp LIKE '%08/30/2017%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%08/28/2017%' OR timestamp LIKE '%08/29/2017%' OR timestamp LIKE '%08/30/2017%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%08/28/2017%' OR timestamp LIKE '%08/29/2017%' OR timestamp LIKE '%08/30/2017%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%08/28/2017%' OR timestamp LIKE '%08/29/2017%' OR timestamp LIKE '%08/30/2017%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%08/28/2017%' OR timestamp LIKE '%08/29/2017%' OR timestamp LIKE '%08/30/2017%')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%08/28/2017%' OR timestamp LIKE '%08/29/2017%' OR timestamp LIKE '%08/30/2017%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Fall '17</td>";
			print "<td>(8/28/17-8/30/17) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			

		}
		print "</table></div>";
		print'</center>';


		print'<center>';
		print "<div class='component'><table class='fixed' border=1 >\n";
		print "<col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/> <col width='30px'/>";

		print "<thead style='background-color:white;'><tr>\n";
		print "<th>Semester</th><th>Week</th><th>Total Orders</th><th>Plus Orders</th><th>Gross Profit</th><th>1st Yr Orders</th><th>2nd Yr Orders</th><th>3rd Yr Orders</th><th>4th Yr Orders</th><th>Misc. Orders</th><th>Food Stats</th>";

				if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%03/13/2017%' OR timestamp LIKE '%03/14/2017%' OR timestamp LIKE '%03/15/2017%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%03/13/2017%' OR timestamp LIKE '%03/14/2017%' OR timestamp LIKE '%03/15/2017%'";

			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%03/13/2017%' OR timestamp LIKE '%03/14/2017%' OR timestamp LIKE '%03/15/2017%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%03/13/2017%' OR timestamp LIKE '%03/14/2017%' OR timestamp LIKE '%03/15/2017%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%03/13/2017%' OR timestamp LIKE '%03/14/2017%' OR timestamp LIKE '%03/15/2017%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND ( timestamp LIKE '%03/13/2017%' OR timestamp LIKE '%03/14/2017%' OR timestamp LIKE '%03/15/2017%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND ( timestamp LIKE '%03/13/2017%' OR timestamp LIKE '%03/14/2017%' OR timestamp LIKE '%03/15/2017%')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%03/13/2017%' OR timestamp LIKE '%03/14/2017%' OR timestamp LIKE '%03/15/2017%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Spring '17</td>";
			print "<td>(3/13/17-3/17/17) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			

		}

		if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%03/13/2017%' OR timestamp LIKE '%03/14/2017%' OR timestamp LIKE '%03/15/2017%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%03/13/2017%' OR timestamp LIKE '%03/14/2017%' OR timestamp LIKE '%03/15/2017%'";

			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%03/13/2017%' OR timestamp LIKE '%03/14/2017%' OR timestamp LIKE '%03/15/2017%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%03/13/2017%' OR timestamp LIKE '%03/14/2017%' OR timestamp LIKE '%03/15/2017%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%03/13/2017%' OR timestamp LIKE '%03/14/2017%' OR timestamp LIKE '%03/15/2017%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND ( timestamp LIKE '%03/13/2017%' OR timestamp LIKE '%03/14/2017%' OR timestamp LIKE '%03/15/2017%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND ( timestamp LIKE '%03/13/2017%' OR timestamp LIKE '%03/14/2017%' OR timestamp LIKE '%03/15/2017%')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%03/13/2017%' OR timestamp LIKE '%03/14/2017%' OR timestamp LIKE '%03/15/2017%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Spring '17</td>";
			print "<td>(3/13/17-3/17/17) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			

		}
		if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%03/22/2017%' OR timestamp LIKE '%03/20/2017%' OR timestamp LIKE '%03/21/2017%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%03/19/2017%' OR timestamp LIKE '%03/20/2017%' OR timestamp LIKE '%03/21/2017%'";

			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%03/22/2017%' OR timestamp LIKE '%03/20/2017%' OR timestamp LIKE '%03/21/2017%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%03/17/2017%' OR timestamp LIKE '%03/18/2017%' OR timestamp LIKE '%03/19/2017%' OR timestamp LIKE '%03/20/2017%' OR timestamp LIKE '%03/21/2017%' OR timestamp LIKE '%03/22/2017%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%03/17/2017%' OR timestamp LIKE '%03/18/2017%' OR timestamp LIKE '%03/19/2017%' OR timestamp LIKE '%03/20/2017%' OR timestamp LIKE '%03/21/2017%' OR timestamp LIKE '%03/22/2017%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%03/17/2017%' OR timestamp LIKE '%03/18/2017%' OR timestamp LIKE '%03/19/2017%' OR timestamp LIKE '%03/20/2017%' OR timestamp LIKE '%03/21/2017%' OR timestamp LIKE '%03/22/2017%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%03/17/2017%' OR timestamp LIKE '%03/18/2017%' OR timestamp LIKE '%03/19/2017%' OR timestamp LIKE '%03/20/2017%' OR timestamp LIKE '%03/21/2017%' OR timestamp LIKE '%03/22/2017%')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%03/17/2017%' OR timestamp LIKE '%03/18/2017%' OR timestamp LIKE '%03/19/2017%' OR timestamp LIKE '%03/20/2017%' OR timestamp LIKE '%03/21/2017%' OR timestamp LIKE '%03/22/2017%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Spring '17</td>";
			print "<td>(3/20/17-3/24/17) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			

		}



		if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%03/27/2017%' OR timestamp LIKE '%03/28/2017%' OR timestamp LIKE '%03/29/2017%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%03/27/2017%' OR timestamp LIKE '%03/28/2017%' OR timestamp LIKE '%03/29/2017%'";

			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%03/27/2017%' OR timestamp LIKE '%03/28/2017%' OR timestamp LIKE '%03/29/2017%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%03/27/2017%' OR timestamp LIKE '%03/28/2017%' OR timestamp LIKE '%03/29/2017%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%03/27/2017%' OR timestamp LIKE '%03/28/2017%' OR timestamp LIKE '%03/29/2017%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND ( timestamp LIKE '%03/27/2017%' OR timestamp LIKE '%03/28/2017%' OR timestamp LIKE '%03/29/2017%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND ( timestamp LIKE '%03/27/2017%' OR timestamp LIKE '%03/28/2017%' OR timestamp LIKE '%03/29/2017%')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%03/27/2017%' OR timestamp LIKE '%03/28/2017%' OR timestamp LIKE '%03/29/2017%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Spring '17</td>";
			print "<td>(3/26/17-3/31/17) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			

		}

		if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%04/03/2017%' OR timestamp LIKE '%04/05/2017%' OR timestamp LIKE '%04/05/2017%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%04/03/2017%' OR timestamp LIKE '%04/05/2017%' OR timestamp LIKE '%04/05/2017%'";

			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%04/03/2017%' OR timestamp LIKE '%04/05/2017%' OR timestamp LIKE '%04/05/2017%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%04/03/2017%' OR timestamp LIKE '%04/05/2017%' OR timestamp LIKE '%04/05/2017%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%04/03/2017%' OR timestamp LIKE '%04/05/2017%' OR timestamp LIKE '%04/05/2017%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%04/03/2017%' OR timestamp LIKE '%04/05/2017%' OR timestamp LIKE '%04/05/2017%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%04/03/2017%' OR timestamp LIKE '%04/05/2017%' OR timestamp LIKE '%04/05/2017%')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%04/03/2017%' OR timestamp LIKE '%04/05/2017%' OR timestamp LIKE '%04/05/2017%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Spring '17</td>";
			print "<td>(4/03/17-4/07/17) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			

		}

		if (true){
			$sql = "SELECT COUNT(*) as count FROM paid_orders WHERE timestamp LIKE '%04/10/2017%' OR timestamp LIKE '%04/11/2017%' OR timestamp LIKE '%04/12/2017%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC";
			$plusSql = "SELECT COUNT(*) FROM plusdollars_orders WHERE timestamp LIKE '%04/10/2017%' OR timestamp LIKE '%04/11/2017%' OR timestamp LIKE '%04/12/2017%'";

			$sql2 = "SELECT SUM(cost) as sum FROM paid_orders WHERE timestamp LIKE '%04/10/2017%' OR timestamp LIKE '%04/11/2017%' OR timestamp LIKE '%04/12/2017%' AND name != '' AND lower(paid_orders.name) NOT LIKE '%test%' ORDER BY `paid_orders`.`timestamp` DESC"; 
			$sql3 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%1st%' AND ( timestamp LIKE '%04/10/2017%' OR timestamp LIKE '%04/11/2017%' OR timestamp LIKE '%04/12/2017%')";
			$sql4 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%2nd%' AND ( timestamp LIKE '%04/10/2017%' OR timestamp LIKE '%04/11/2017%' OR timestamp LIKE '%04/12/2017%')";
			$sql5 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%3rd%' AND (timestamp LIKE '%04/10/2017%' OR timestamp LIKE '%04/11/2017%' OR timestamp LIKE '%04/12/2017%')";
			$sql6 = "SELECT COUNT(year)  FROM paid_orders WHERE paid_orders.year like '%4th%' AND (timestamp LIKE '%04/10/2017%' OR timestamp LIKE '%04/11/2017%' OR timestamp LIKE '%04/12/2017%')";
			$sql7 = "SELECT COUNT(year)  FROM paid_orders WHERE (paid_orders.year NOT LIKE '%1st%' AND paid_orders.year NOT LIKE '%2nd%' AND paid_orders.year NOT LIKE '%3rd%' AND paid_orders.year NOT LIKE '%4th%') AND ( timestamp LIKE '%04/10/2017%' OR timestamp LIKE '%04/11/2017%' OR timestamp LIKE '%04/12/2017%')";
			
			
			$result = $mysqli->query($sql);
			$plusResult = $mysqli->query($plusSql);
			$result2 = $mysqli->query($sql2);
			$result3 = $mysqli->query($sql3);
			$result4 = $mysqli->query($sql4);
			$result5 = $mysqli->query($sql5);
			$result6 = $mysqli->query($sql6);
			$result7 = $mysqli->query($sql7);
			
			print "</tr></thead>\n\n<tbody>";

			print "<tr>\n";
			print "<td>Spring '17</td>";
			print "<td>(4/10/17-4/12/17) </td>";

			$print1 = "";
			$printplus = "";
			$print2 = "";
			$print3 = "";
			$print4 = "";
			$print5 = "";
			$print6 = "";
			$print7 = "";
			while($row = $result->fetch_assoc()){
				$print1 = $row['count'];
			}
			while($row = $plusResult->fetch_assoc()){
				$printplus = $row['COUNT(*)'];
			}
			while($row = $result2->fetch_assoc()){
				$print2 = $row['sum'];
			}
			while($row = $result3->fetch_assoc()){
				$print3 = $row['COUNT(year)'];
			}
			while($row = $result4->fetch_assoc()){
				$print4 = $row['COUNT(year)'];
			}
			while($row = $result5->fetch_assoc()){
				$print5 = $row['COUNT(year)'];
			}
			while($row = $result6->fetch_assoc()){
				$print6 = $row['COUNT(year)'];
			}
			while($row = $result7->fetch_assoc()){
				$print7 = $row['COUNT(year)'];
			}
			
			print "<td>$print1</td>";
			print "<td>$printplus</td>";
			print "<td>$print2</td>";
			print "<td>$print3</td>";
			print "<td>$print4</td>";
			print "<td>$print5</td>";
			print "<td>$print6</td>";
			print "<td>$print7</td>";
			print "<td> <a href='weekly_stats.php'>Weekly Stats</a> </td>";

			print "</tr></tbody>\n\n";
			

		}


		print "</table></div>";
		print'</center>';

		?>



<script type="text/javascript" charset="utf-8">
	$(function(){
		$("table").stickyTableHeaders();
	});
</script>
</body>
</html>