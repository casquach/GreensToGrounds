<!DOCTYPE html>
<html lang="en">

<head>
  
 <?php 
    $title = "Box Examples";
    include('inc/head.php'); 
  ?>

</head>

<body>

  <?php include('inc/nav.php'); ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header text-center">
          <h1>A Brief Box History</h1>
          <p>Since the best available produce varies by season, an order from Greens to Grounds will look a little different each week Check out some recent examples!</p>
        </div>
      </div>
    </div>
  </div>


  <!-- Header Carousel -->
  <header id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <div class="fill" style="background-image:url('lib/imgs/box.jpg');"></div>
        <div class="carousel-caption">
          <h2>September 12</h2>
          <p>Peaches, grapes, tomatoes, romaine lettuce, melons, red peppers, honey, bratwurst, donuts, and flowers</p>
        </div>
      </div>
      <div class="item">
        <div class="fill" style="background-image:url('lib/imgs/box2.jpg');"></div>
        <div class="carousel-caption">
          <h2>September 19</h2>
          <p>Peaches, melons, grapes, Asians pears, cherry tomatoes, green beans, red potatoes, zucchini, donuts, ground beef, pancake mix, and flowers</p>
        </div>
      </div>
      <div class="item">
        <div class="fill" style="background-image:url('lib/imgs/fullbox_color.jpg');"></div>
        <div class="carousel-caption">
          <h2>September 26</h2>
          <p>Peaches, apples, melons, tomatoes, green beans, swiss chard, butternut squash, sausage, and flowers</p>
        </div>
      </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="icon-next"></span>
    </a>
  </header>
  <br />
  <hr />

  <?php include('inc/footer.php'); ?>

  </div><!-- /.container -->

 <?php include ('inc/scripts.php'); ?>


</body>

</html>
