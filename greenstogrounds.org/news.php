<!DOCTYPE html>
<html lang="en">

<head>

  <?php
    $title="News";
    include 'inc/head.php';
  ?>

  <link href="lib/css/news.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Rubik:500&display=swap" rel="stylesheet">
</head>

<body>

  <div class="container">

    <div class="container">

      <?php include 'inc/nav.php'; ?>

      <div class="order-header-container">
        <div class="order-logo"><img src="lib/imgs/presslogo.png" height="70px" width="70px" alt="press logo"></div>
        <div class="order-header">Greens to Grounds in the news</div>
      </div>

      <div class="news-container">
        <div class="row news-row">
        <div class="four columns">
            <div class="news-column"><img src="lib/imgs/starternoise.png" height="70px" width="350px" alt="starternoise">
              <ul id="left-list">
                <a href="http://www.starternoise.com/campus-get-better-food-students/" target="_blank"><li class="links">"What This Campus Did to Get Better Food to Students" by Caitlin O'Brien</li></a>
              </ul>
            </div>
          </div>
          <div class="four columns">
              <div class="news-column"><img src="lib/imgs/wuva.png" height="70px" width="350px" alt="WUVA">
                <ul id="left-list">
                  <li class="links">"Sustainability Straight to Students"</li>
                </ul>
              </div>
          </div>
          <div class="four columns">
            <div class="news-column">
              <img src="lib/imgs/spoon_uni.png" height="70px" width="350px" alt="spoon university">
              <br>
              <ul id="left-list">
                <a href="http://uva.spoonuniversity.com/live/this-uva-student-run-organization-makes-buying-fresh-produce-easier-than-ever/" target="_blank"><li class="links">"This UVA Student-Run Organization Makes Buying Fresh Produce Easier Than Ever" by Stephanie DeVaux</li></a>
              </ul>
            </div>
          </div>
        </div>
        <div class="row news-row">
            <div class="four columns">
              <div class="news-column"><img src="lib/imgs/startup.png" height="70px" width="350px" alt="start up">
                <ul id="left-list">
                  <a href="http://www.collegestartup.org/2015/03/27/boxed-sunshine-your-own-farmers-market/" target="_blank"><li class="links">"Boxed Sunshine: Your own Farmers Market"</li></a>
                </ul>
              </div>
            </div>
            <div class="four columns">
            <div class="news-column">
              <img src="lib/imgs/cavdaily_press.png" height="70px" width="350px" alt="Cavalier Daily">
              <br>
              <ul id="left-list">
                <a href="http://www.cavalierdaily.com/article/2017/04/uva-kicks-off-earth-week-with-farmers-market" target="_blank"><li class="links">"U.Va. kicks off Earth Week with farmers market"</li></a>
              </ul>
            </div>
          </div>
            <div class="four columns">
              <div class="news-column-cav"><img src="lib/imgs/cavdaily.png" height="190px" width="350px" alt="cavalier daily">
                <ul id="left-list">
                  <a href="http://www.cavalierdaily.com/article/2014/09/bringing-greens-to-grounds" target="_blank"><li class="links">"Bringing Greens to Grounds"</li></a>
                  <a href="http://www.cavalierdaily.com/article/2014/10/aljassar-living-locally" target="_blank"><li class="links">"Living Locally"</li></a>
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

