<?php
	session_start();
	/*if(!isset($_SESSION['user'])) {
		header('location:gtgenter.php');
		die;
	}*/
?>

<html>
	<head>
		<title>Plus Dollars Order Database</title>

		<!--<link href="lib/css/style_m.css" rel="stylesheet" type="text/css">-->
		<link rel="stylesheet" type="text/css" href="lib/css/component.css" />

		<script type="text/javascript" src="lib/js/jquery.stickytableheaders.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
		<script src="lib/js/jquery.stickyheader.js"></script>
	</head>

	<body>

		<br /><br />

		<?php

		include('inc/db_connect.php');

		//$sql = "insert into 5423gtgformresponsetbl values (NULL, 'Natalie Conners', 'nec5rh@virginia.edu', '4848855229', 'No', '', '10', '', '', '', '', 'Snack Box ($10)', '', '', '', '', '', '', '')";
		//mysql_query($sql, $conn);
		/*$sql = "insert into 5423gtgformresponsetbl values (NULL, 'Grant Schwab', 'gjs4tu@virginia.edu', '201-783-6898', 'No', '', '27', '', '', '', '', 'Produce + Meat ($27)', '', '', '', '', '', '', '')";
		mysql_query($sql, $conn);
		$sql = "insert into 5423gtgformresponsetbl values (NULL, 'Anna Elyse Frazier', 'aef4zg@virginia.edu', '7034349224', 'No', '', '10', '', '', '', '', 'Snack Box ($10)', '', '', '', '', '', '', '')";
		mysql_query($sql, $conn);
		$sql = "insert into 5423gtgformresponsetbl values (NULL, 'Ronda Grizzle', 'rag9b@virginia.edu', '924-3965', 'No', '', '55', '', '', '', '', 'Produce + Meat + A La Carte Item ($30)', 'Produce + A La Carte Item ($25)', '', '', '', '', '', '')";
		mysql_query($sql, $conn);
		$sql = "insert into 5423gtgformresponsetbl values (NULL, 'Hannah Pfotenhauer', 'hsp4ua@virginia.edu', '480-495-3382', 'No', '', '22', '', '', '', '', 'Produce ($22)', '', '', '', '', '', '', '')";
		mysql_query($sql, $conn);*/

		//$sql = "update sp1015gtgpaidresponsebl set `Total Cost`=136 where `Total Cost`=180";
		//$result = mysql_query($sql, $conn);
		//$sql = "delete from sp1015gtgpaidresponsebl where id=11";
		//mysql_query($sql, $conn);
		//$sql = "delete from 6774gtgunpaidresponsetbl where Email=''";
		//mysql_query($sql, $conn);

		/*print <<<HERE
		<br /><br />
			<a href="unpaid_response_table.php">Click for Unpaid Table</a>
		<br /><br />
		<p style='font-weight:bold;'>Sort By Individual Weeks</p>
		<form action="order_table.php" method="post">
			<select name="weekSearch">
HERE;
			$sql = "select `Pick-Up Week` from 8171gtgweekmanagerkok";
			$result = mysql_query($sql, $conn);
			while ($row = mysql_fetch_assoc($result)){
				foreach($row as $col=>$val) print "<option value='$val'>$val</option>";
			}
		print <<<HERE
			</select>
			<input type="submit" value="Search" name="submit" />
		</form>
HERE;
		$weekVar = $_POST["weekSearch"];
		if($weekVar != '') {
			print "<br /><h2 style='font-weight:bold; font-size:18px;'>RESULTS FOR WEEK OF: &nbsp;&nbsp;&nbsp;&nbsp;$weekVar</h2>";
			$sql = "select Name, Email, `Phone Number`, `Is Delivery?`, Address, `$weekVar`, `All Weeks` from sp1015gtgpaidresponsebl where `$weekVar`!='' or `All Weeks`!='' order by id";
			$result = mysql_query($sql, $conn);
			print "<div class='component'><table border=1 >\n";
			print "<thead style='background-color:white;'><tr>\n";
			while ($field = mysql_fetch_field($result))
				print "  <th>$field->name</th>\n";
			print "</tr></thead>\n\n<tbody>";
			while ($row = mysql_fetch_assoc($result)){
				print "<tr>\n";
				foreach ($row as $col=>$val) {
					print "  <td>$val</td>\n";
				}
				print "</tr></tbody>\n\n";
			}
			print "</table></div>";
		}*/

		//$sql = "ALTER TABLE sp1015gtgpaidresponsebl CHANGE September_12th `September 12th` varchar(65)";
		//$result = mysql_query($sql, $conn);
		$sql = "SELECT * FROM plusdollars_orders ORDER BY timestamp DESC";
		$result = $mysqli->query($sql);

		//print "<br /><p style='font-weight:bold;'>Entire Database Below:</p>";
		print "<div class='component'><table border=1 >\n";
		print "<thead style='background-color:white;'><tr>\n";
		print "<th>id</th><th>Timestamp</th><th>Name</th><th>Email</th><th>Phone Number</th><th>Year</th><th>Cost</th><th>Package</th><th>Box Content</th><th>ODOS</th><th>Comments</th>";
		print "</tr></thead>\n\n<tbody>";
		while ($row = $result->fetch_assoc()) {
			$id = $row['id'];
			$timestamp = $row['timestamp'];
			$name = $row['name'];
			$email = $row['email'];
			$phone_number = $row['phone_number'];
			$year = $row['year'];
			$cost = $row['cost'];
			$package = $row['package'];
			$box_content = $row['box_content'];
			$odos = $row['odos'];
			$comments = $row['comments'];

			print "<tr>\n";
			print "<td>$id</td>";
			print "<td>$timestamp</td>";
			print "<td>$name</td>";
			print "<td>$email</td>";
			print "<td>$phone_number</td>";
			print "<td>$year</td>";
			print "<td>$cost</td>";
			print "<td>$package</td>";
			print "<td>$box_content</td>";
			print "<td>$odos</td>";
			print "<td>$comments</td";
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