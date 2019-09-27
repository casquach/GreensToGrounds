<!DOCTYPE html>
<html lang="en">

<head>

  <?php
    $title="News";
    include 'inc/head.php';
  ?>

  <link href="lib/css/news.css" rel="stylesheet" type="text/css">
</head>

<body>

  <div class="container">

    <div class="container">

      <?php include 'inc/nav.php'; ?>

      <div class="order-header-container">
        <div class="order-logo"><img src="lib/imgs/presslogo.png" alt="press logo"></div>
        <div class="order-header">in the news</div>
      </div>
      <div class="news-container">
        <div class="row news-row">
        <div class="four columns">
            <div class="news-column"><img src="lib/imgs/cavdaily_press.png" height="50px" width="250px" alt="Cavalier Daily">
              <ul id="left-list">
                <a href="http://www.cavalierdaily.com/article/2017/04/uva-kicks-off-earth-week-with-farmers-market" target="_blank"><li>"U.Va. kicks off Earth Week with farmers market"</li></a>
              </ul>
            </div>
          </div>
          <div class="four columns">
            <div class="news-column"><img src="lib/imgs/cavdaily.png" height="150px" width="300px" alt="cavalier daily">
              <ul id="left-list">
                <a href="http://www.cavalierdaily.com/article/2014/09/bringing-greens-to-grounds" target="_blank"><li>"Bringing Greens to Grounds"</li></a>
                <a href="http://www.cavalierdaily.com/article/2014/10/aljassar-living-locally" target="_blank"><li>"Living Locally"</li></a>
              </ul>
            </div>
          </div>
          <div class="four columns">
            <div class="news-column"><img src="lib/imgs/wuva.png" height="50px" width="250px" alt="WUVA">
              <ul id="left-list">
                <li>"Sustainability Straight to Students"</li>
              </ul>
            </div>
          </div>
          <div class="four columns">
            <div class="news-column"><img src="lib/imgs/startup.png" height="50px" width="250px" alt="start up">
              <ul id="left-list">
                <a href="http://www.collegestartup.org/2015/03/27/boxed-sunshine-your-own-farmers-market/" target="_blank"><li>"Boxed Sunshine: Your own Farmers Market"</li></a>
              </ul>
            </div>
          </div>
          <div class="four columns">
            <div class="news-column"><img src="lib/imgs/starternoise.png" height="50px" width="250px" alt="starternoise">
              <ul id="left-list">
                <a href="http://www.starternoise.com/campus-get-better-food-students/" target="_blank"><li>"What This Campus Did to Get Better Food to Students" by Caitlin O'Brien</li></a>
              </ul>
            </div>
          </div>
          <div class="four columns">
            <div class="news-column"><img src="lib/imgs/spoon_uni.png" height="50px" width="250px" alt="spoon university">
              <ul id="left-list">
                <a href="http://uva.spoonuniversity.com/live/this-uva-student-run-organization-makes-buying-fresh-produce-easier-than-ever/" target="_blank"><li>"This UVA Student-Run Organization Makes Buying Fresh Produce Easier Than Ever" by Stephanie DeVaux</li></a>
              </ul>
            </div>
          </div>
        </div>



      </div>
    </div>
  </div>

  <br><br><br><hr>

  <?php include 'inc/footer.php'; ?>

  <script src="lib/js/jquery-1.11.0.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="lib/js/bootstrap.min.js"></script>

</body>

</html>

