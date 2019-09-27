<!DOCTYPE html>
<html lang="en">

  <head>
	<?php
	  $title = "Home";
	  include('inc/head.php');
	?>

	<link href="lib/css/homepage.css" rel="stylesheet" type="text/css">
	<link href="lib/css/box_examples.css" rel="stylesheet" type="text/css">

      <!-- temporarily here -->
      <link href="lib/css/nav.css" rel="stylesheet" type="text/css">

	  <style>
		  .b {font-weight: bold;};
		  .align {margin-left: 20px;};
	  </style>

  </head>

  <body>



	<div class="container">

        <?php include ('inc/nav.php'); ?>

		<div class="home-background-img">
		  <div class="g2g-logo"><img src="lib/imgs/g2glogo.png" height="400px" width="550px" alt="Greens to Grounds Logo"></div>
		  <div class="arrow"><a href="#here"><img src="lib/imgs/arrow.svg" height="60px" width="60px" alt="arrow"></a></div>
		</div>
		<div class="content-container">
		  <div class="our-mission-container row " id="here">
			<div class="our-mission-left eight columns">
			  <div class="our-mission-header">our mission</div>
			  <div class="our-mission-body">We are a non-profit, student-run CSA (community supported agriculture) model bringing fresh, local produce and specialty items to the UVA community. We strive to foster a more sustainable relationship between UVA and Charlottesville food producers. We seek to provide students, faculty, and staff with access to fresh, seasonal, and local food on a weekly basis, while providing local farmers and artisans with dedicated support from the University community. Join us in eating well, supporting Central Virginia farmers, and celebrating local food.</div>
			</div>
			<div class="our-mission-logo four columns"><img src="lib/imgs/handshake.png" alt="handshake"></div>
		  	<center><img src="lib/imgs/fixed_diagram.png" alt="arrow" width = "1000px" style="margin-top: 30px"></center>
		  </div>
		  <div class="box-example-container row" style="width:50%; margin:0 auto;">
			  <div class="our-mission-header">WHAT'S IN THE BOXES:</div>

			  <p><span class="b">March:</span><br />
					 Apples, Spinach, Herbs<br />

				<p><span class="b">April:</span><br />
					Apples, Asparagus, Spinach, Herbs, Strawberries, Onions<br />

				<p><span class="b">May:</span><br />
					Asparagus, Beets, Spinach, Herbs, Strawberries, Onions<br />

				<p><span class="b">Add-Ons (Vary Weekly):</span><br />
					Cheese, Freshly-Baked Bread, Granola, Chorizo Sausage, Pastured Ground Beef, Hummus, Queso, Salsa, Apple Cider Donuts, Eggs, Honey<br />


			  <div class="box-example-container row"><p style="text-align:center; padding: 5px;"><img src="lib/imgs/boxexample1.jpg" height="400px" width="550px" alt="box example"></div>
		  </div>
		  <div class="get-started-container row">
			<div class="eight columns">
			  <div class="get-started-header">ready to get started?</div>
			  <div class="get-started-body">Choose between pre-built snack boxes and produce boxes, delivered weekly. Starting at only $10</div>
			  <div class="get-started-btn"><a href="order.php"><img src="lib/imgs/ordernow.png" alt="Order Now!"></a></li></div>
			</div>
			</div>
			<div class="get-started-logo"><p style="text-align:center; padding: 5px;"><img src="lib/imgs/box.png" alt="handshake"> </div>
			<br />
			<p style="font-size: 10px; text-align: center; padding: 5px;">Although this organization has members who are University of Virginia students and may have University employees associated or engaged in its activities and affairs, the organization is not a part of or an agency of the University. It is a separate and independent organization which is responsible for and manages its own activities and affairs. The University does not direct, supervise or control the organization and is not responsible for the organization's contracts, acts or omissions.</p>
		</div>

		<br />
	</div>

	<?php include ('inc/footer.php'); ?>
	<?php include ('inc/scripts.php'); ?>
  </body>

</html>
