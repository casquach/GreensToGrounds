<?php
	session_start();
	/*if(!isset($_SESSION['user'])) {
		header('location:gtgenter.php');
		die;
	}*/
?>

<html>
	<head>
		<title>Marketing Database</title>

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

		$sql = "SELECT * FROM marketing_survey ORDER BY timestamp DESC";
		$result = $mysqli->query($sql);

		//print "<br /><p style='font-weight:bold;'>Entire Database Below:</p>";
		print "<div class='component'><table border=1 >\n";
		print "<thead style='background-color:white;'><tr>\n";
		print "<th>id</th><th>Timestamp</th><th>Response</th>";
		print "</tr></thead>\n\n<tbody>";
		while ($row = $result->fetch_assoc()) {
			$id = $row['id'];
			$timestamp = $row['timestamp'];
			$marketing = $row['marketing'];

			print "<tr>\n";
			print "<td>$id</td>";
			print "<td>$timestamp</td>";
			print "<td>$marketing</td>";
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