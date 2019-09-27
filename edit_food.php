<?php
//ADD LOGIN CHECKER

	$id = $_POST["id"];

	include('inc/db_connect.php');

	$sql = $mysqli->prepare("SELECT * FROM weekly_food WHERE id='$id'");
	$sql->execute();
	$sql->store_result();
	$sql->bind_result($id, $food_type, $food, $price);
	$sql->fetch();
?>

<html>
	<head>
		<?php
		$title = "EDIT Join Page";
		include 'inc/head.php';
		?>
	</head>

	<body style="padding: 5%;">
		<form method="post" name="editweek_form" action="update_food.php">
			<table>
				<thead><span class="subheader" style="font-weight:bold;">New Food Information</span><br /><br /></thead>
				<!-- box types -->
				<tr>
					<td class="newweek">
						<label for='name'><span class="b">Box Types:</span></label>
					</td>
					<td class="newweek" style="padding-top: 2%;">
						<select name="food_type">
							<?php
								if($food_type == 'Semester Package')
									print "<option value='Semester Package' selected>Semester Package</option>";
								else
									print "<option value='Semester Package'>Semester Package</option>";
								if($food_type == 'Produce Box')
									print "<option value='Produce Box' selected>Produce Box</option>";
								else
									print "<option value='Produce Box'>Produce Box</option>";
								if($food_type == 'Snack Box')
									print "<option value='Snack Box' selected>Snack Box</option>";
								else
									print "<option value='Snack Box'>Snack Box</option>";
								if($food_type == 'Specialty Box')
									print "<option value='Specialty Box' selected>Dessert Box</option>";
								else
									print "<option value='Specialty Box'>Dessert Box</option>";
								if($food_type == 'Add-on')
									print "<option value='Add-on' selected>Add-on</option>";
								else
									print "<option value='Add-on'>Add-on</option>";
							?>
						</select>
					</td>
				</tr>
				<!-- list of food -->
				<tr>
					<td class="newweek">
						<label for='name'><span class="b">Food:</span></label>
					</td>
					<td class="newweek">
						<textarea name="food_list" class="form-control"rows=4 cols=30><?php echo $food; ?></textarea>
					</td>
				</tr>
				<tr>
					<td class="newweek">
						<label for='name'><span class="b">Price:</span></label>
					</td>
					<td class="newweek">
						<input type="text" name="price" value="<?php echo $price; ?>">
					</td>
				</tr>
			</table>
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<br /><br />
			<input type="submit" name="submit" value="Update Week" class="button btn btn-primary">
		</form>
		<br /><a href="week_manager.php" class="button btn btn-primary">Return to Week Manager</a>
	</body>
</html>