<html>
	<head>
	</head>

	<body>
	<?php
		include('inc/db_connect.php');
// to use commented out sql commands change back db name above to other name as well
		/*$sql = "CREATE TABLE `unpaid_orders` (
			`id` int(4) NOT NULL auto_increment,
			`timestamp` varchar(30) NOT NULL default '',
			`name` varchar(65) NOT NULL default '',
			`email` varchar(65) NOT NULL default '',
			`phone_number` varchar(15) NOT NULL default '',
			`cost` varchar(6) NOT NULL default '',
			`box_content` TEXT NOT NULL default '',
			`odos` varchar(3) NOT NULL default '',
			PRIMARY KEY (`id`)
			)";
		$result = $mysqli->query($sql);

		$sql = "CREATE TABLE `paid_orders` (
			`id` int(4) NOT NULL auto_increment,
			`timestamp` varchar(30) NOT NULL default '',
			`name` varchar(65) NOT NULL default '',
			`email` varchar(65) NOT NULL default '',
			`phone_number` varchar(15) NOT NULL default '',
			`cost` varchar(6) NOT NULL default '',
			`box_content` TEXT NOT NULL default '',
			`odos` varchar(3) NOT NULL default '',
			PRIMARY KEY (`id`)
			)";
		$result = $mysqli->query($sql);

		$sql = "CREATE TABLE `weekly_food` (
			`id` int(4) NOT NULL auto_increment,
			`food_type` varchar(15) NOT NULL default '',
			`food` varchar(65) NOT NULL default '',
			`price` varchar(4) NOT NULL default '',
			PRIMARY KEY (`id`)
			)";
		$result = $mysqli->query($sql);

		$sql = "CREATE TABLE `annon_data` (
			`id` int(4) NOT NULL auto_increment,
			`discount_code` varchar(15) NOT NULL default '',
			`times_used` int(4) NOT NULL default 0,
			PRIMARY KEY (`id`)
			)";
		$result = $mysqli->query($sql);*/

		/*$sql = "CREATE TABLE `165gtgaghte783` (
		`id` int(4) NOT NULL auto_increment,
		`username` varchar(65) NOT NULL default '',
		`password` varchar(65) NOT NULL default '',
		PRIMARY KEY (`id`)
		)";*/
		//$result = mysql_query($sql, $conn);
		//$sql = "insert into 165gtgaghte783 values (NULL, '!GTGbloguSERName8743', '!blogpaSSWOrd7692')";
		//$sql = "alter table 6774gtgunpaidresponsetbl drop column Discount";
		//$result = mysql_query($sql, $conn);
		//$sql = "insert into 165gtgaghte783 values (NULL, '!GTGwEEKManager9236', '!WeeKmanaGER2131')";
		//$result = mysql_query($sql, $conn);

		//$sql = "alter table 8171gtgweekmanagerkok modify `Box Types Allowed` VARCHAR(2000)";
		//$result = mysql_query($sql, $conn);

		/*$sql = "alter table sp3015gtgunpaidresponsetbl drop column `March 20`";
		$result = mysql_query($sql, $conn);
		$sql = "alter table sp1015gtgpaidresponsebl drop column `March 20`";
		$result = mysql_query($sql, $conn);
		$sql = "delete from 8171gtgweekmanagerkok where `Pick-Up Week`=`November 20`";
		$result = mysql_query($sql, $conn);

		$sql = "alter table sp3015gtgunpaidresponsetbl change `March 21` `March 20` varchar(65) NOT NULL default ''";
		$result = mysql_query($sql, $conn);
		$sql = "alter table sp1015gtgpaidresponsebl change `March 21` `March 20` varchar(65) NOT NULL default ''";
		$result = mysql_query($sql, $conn);*/
		//$sql = "update 8171gtgweekmanagerkok set `Pick-Up Week`=`March 20` where `Pick-Up Week`=`November 20`";
		//$result = mysql_query($sql, $conn);

		//$sql = "delete from sp3015gtgunpaidresponsetbl where Email='test@test.com'";
		//mysql_query($sql, $conn);
		//$sql = "delete from sp1015gtgpaidresponsebl where Email='test@test.com'";
		//mysql_query($sql, $conn);

		//$sql = "insert into sp1015gtgpaidresponsebl values (NULL, 'Jane Muir', 'kjm5xw@virginia.edu', '202-213-1062', 'Yes', 'Casa Bolivar', '22', '', '', '', 'Produce ($22)', '', '', '', '')";
		//mysql_query($sql, $conn);

		/*$sql = "drop table `annonData`";
		$result = mysql_query($sql, $conn);
		$sql = "CREATE TABLE `annonData` (
		`id` int(4) NOT NULL auto_increment,
		`Discount Code` varchar(65) NOT NULL default '',
		`Times Used` int(4) NOT NULL default 0,
		PRIMARY KEY (`id`)
		)";
		$result = mysql_query($sql, $conn);

		$sql = "insert into annonData values (NULL, 'lyg90', 0)";
		$result = mysql_query($sql, $conn);
		$sql = "insert into annonData values (NULL, 'ps24t', 0)";
		$result = mysql_query($sql, $conn);
		$sql = "insert into annonData values (NULL, '9tre8', 0)";
		$result = mysql_query($sql, $conn);
		$sql = "insert into annonData values (NULL, 'hr54z', 0)";
		$result = mysql_query($sql, $conn);
		$sql = "insert into annonData values (NULL, 'boq42', 0)";
		$result = mysql_query($sql, $conn);
		$sql = "insert into annonData values (NULL, 'avy33', 0)";
		$result = mysql_query($sql, $conn);
		*/

		/*$sql = "select * from annonData order by id";
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
		print "</table></div>";*/

		/*$sql = "CREATE TABLE `8171gtgweekmanagerkokdev` (
		`id` int(4) NOT NULL auto_increment,
		`Ordering Closes At` varchar(65) NOT NULL default '',
		`Pick-Up Date` varchar(65) NOT NULL default '',
		`Pick-Up Week` varchar(65) NOT NULL default '',
		`Box Types Allowed` varchar(200) NOT NULL default '',
		`Food List` text NOT NULL default '',
		PRIMARY KEY (`id`)
		)";
		$result = mysql_query($sql, $conn);*/

		/*$sql = "drop table 8171gtgweekmanagerkok";
		$result = mysql_query($sql, $conn);
		$sql = "CREATE TABLE `8171gtgweekmanagerkok` (
		`id` int(4) NOT NULL auto_increment,
		`Ordering Closes At` varchar(65) NOT NULL default '',
		`Pick-Up Date` varchar(65) NOT NULL default '',
		`Box Types Allowed` varchar(200) NOT NULL default '',
		`Food List` text NOT NULL default '',
		PRIMARY KEY (`id`)
		)";
		$result = mysql_query($sql, $conn);*/

		/*$sql = "drop table 8171gtgweekmanagerkok";
		$result = mysql_query($sql, $conn);
		$sql = "CREATE TABLE `8171gtgweekmanagerkok` (
		`id` int(4) NOT NULL auto_increment,
		`Ordering Closes At` varchar(65) NOT NULL default '',
		`Pick-Up Date` varchar(65) NOT NULL default '',
		`Pick-Up Week` varchar(65) NOT NULL default '',
		`Box Types Allowed` varchar(200) NOT NULL default '',
		`Food List` text NOT NULL default '',
		PRIMARY KEY (`id`)
		)";
		$result = mysql_query($sql, $conn);

		$sql = "drop table sp1015gtgpaidresponsebl";
		$result = mysql_query($sql, $conn);
		$sql = "CREATE TABLE `sp1015gtgpaidresponsebl` (
		`id` int(4) NOT NULL auto_increment,
		`Name` varchar(65) NOT NULL default '',
		`Email` varchar(65) NOT NULL default '',
		`Phone Number` varchar(65) NOT NULL default '',
		`Is Delivery?` varchar(65) NOT NULL default '',
		`Address` varchar(200) NOT NULL default '',
		`Total Cost` varchar(65) NOT NULL default '',
		`All Weeks` varchar(65) NOT NULL default '',
		PRIMARY KEY (`id`)
		)";
		$result = mysql_query($sql, $conn);

		$sql = "drop table sp3015gtgunpaidresponsetbl";
		$result = mysql_query($sql, $conn);
		$sql = "CREATE TABLE `sp3015gtgunpaidresponsetbl` (
		`id` int(4) NOT NULL auto_increment,
		`Name` varchar(65) NOT NULL default '',
		`Email` varchar(65) NOT NULL default '',
		`Phone Number` varchar(65) NOT NULL default '',
		`Is Delivery?` varchar(65) NOT NULL default '',
		`Address` varchar(200) NOT NULL default '',
		`Total Cost` varchar(65) NOT NULL default '',
		`All Weeks` varchar(65) NOT NULL default '',
		PRIMARY KEY (`id`)
		)";
		$result = mysql_query($sql, $conn);*/
	?>
	</body>
</html>