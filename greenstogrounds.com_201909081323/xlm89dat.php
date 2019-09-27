<?php
	include('db_connection_info.inc');
	$conn = mysql_connect("mysql.greenstogrounds.com", $gtgBlogEntUsername, $gtgBlogEntPassword) or die(mysql_error());
	mysql_select_db("9847hgtgorderforminf") or die(mysql_error());

	/*$sql = "CREATE TABLE `annonData` (
	`id` int(4) NOT NULL auto_increment,
	`timesUsed` int NOT NULL,
	`totalAmount` int NOT NULL,
	PRIMARY KEY (`id`)
	)";
	$result = mysql_query($sql, $conn);*/

/*
	$sql = "select * from annonData";
	$result = mysql_query($sql, $conn);
	$row = mysql_fetch_assoc($result);
	$i = 0;
	$data = array(3);
	foreach ($row as $col=>$val) {
	print "val: $val <br />";
		$data[$i] = $val;
		$i++;
	}
	$timesUsed = $data[1] + 1;
	print "timesUsed: $timesUsed <br />";
	$totalAmount = $data[2] + 12;
	print "totalAmount: $totalAmount <br />";
	$sql = "update annonData set timesUsed=$timesUsed";
	$result = mysql_query($sql, $conn);
	$sql = "update annonData set totalAmount=$totalAmount";
	$result = mysql_query($sql, $conn);
*/
	//$sql = "update annonData set totalAmount=936";
	//$result = mysql_query($sql, $conn);

	//$sql = "delete from annonData where id=4";
	//mysql_query($sql, $conn);
	//$sql = "insert into annonData values (NULL, 0, 0)";
	//$result = mysql_query($sql, $conn);

	$sql = "select * from annonData";
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
?>