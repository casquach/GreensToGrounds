<!DOCTYPE html>
<html lang="en">

<head>

  <?php
    $title="Events";
    include('inc/head.php');
    include('inc/scripts.php');
  ?>

</head>

<body>

  <div class="container">

    <?php include 'inc/nav.php'; ?>

      <h1 class="text-center">All Greens to Grounds Events:</h1>
      <hr />

      <div style="width: 50%; margin: 0 auto;">
        <iframe src="https://www.google.com/calendar/embed?src=virginia.edu_b6v6j8vgnmt2p2a12tfdr3omec%40group.calendar.google.com&ctz=America/New_York" style="border: 0;" width="900" height="725" frameborder="0" scrolling="no"></iframe>
      </div>

  </div>

  <br /><br /><br />

  <?php
    include('inc/footer.php');
  ?>


  <script src="lib/js/jquery-1.11.0.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="lib/js/bootstrap.min.js"></script>

</body>

</html>
