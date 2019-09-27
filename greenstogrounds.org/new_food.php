<?php
	/*session_start();
	if(!isset($_SESSION['user'])) {
		header('location:index.php');
		die;
	}*/
?>

<html>
	<head>
		<?php $title = "ADD New Food";
			include('inc/head.php');

		?>
	</head>

	<body style="padding:5%;">
		<form method="post" name="new_food_form" action="insert_food.php">
			<table>
				<thead><span class="subheader" style="font-weight:bold;">New Food Information</span><br /><br /></thead>
<!-- box types -->
				<tr>
					<td class="newweek">
						<label for='name'><span class="b">Box Types:</span></label>
					</td>
					<td class="newweek" style="padding-top: 2%;">
						<select name="food_type">
							<option value="Semester Package">Semester Package</option>
							<option value="Produce Box">Produce Box</option>
							<option value="Snack Box">Snack Box</option>
							<option value="Specialty Box">Dessert Box</option>
							<option value="Add-on">Add-on</option>
						</select>
					</td>
				</tr>
<!-- list of food -->
				<tr>
					<td class="newweek">
						<label for='name'><span class="b">Food:</span></label>
					</td>
					<td class="newweek">
						<textarea name="food_list" class="form-control"rows=4 cols=30></textarea>
					</td>
				</tr>
				<tr>
					<td class="newweek">
						<label for='name'><span class="b">Price:</span></label>
					</td>
					<td class="newweek">
						<input type="text" name="price">
					</td>
				</tr>
			</table>
			<br /><br />
			<input type="submit" name="submit" value="Submit New Food" class="button btn btn-primary">
		</form>
		<br /><a href="week_manager.php" class="button btn btn-primary">Return to Week Manager</a>
	</body>
</html>