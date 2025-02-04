<?php

include('../resources/conn.php')

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="shortcut icon" href="../assets/img/main/favicon.png" type="image/x-icon">
  <!-- links -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

  <!-- custom css -->
  <link rel="stylesheet" href="../assets/css/wp-admin/style.css">
</head>

<body>

  <?php include('./navbar.php') ?>

<div class="main-section">
  <ul>
    <li><a href="./appointments.php"><i class="fas fa-calendar-check"></i> <span>Appointments</span></a></li>
    <li><a href="./treatments.php"><i class="fas fa-procedures"></i> <span>Treatments</span></a></li>
    <li><a href="./adsbanner.php"><i class="fa fa-bullhorn"></i> <span>Ads Banner</span></a></li>
    <li><a href="./gallery.php"><i class="fa-brands fa-envira"></i> <span>Gallery</span></a></li>
    <li><a href="./testimonialadd.php"><i class="fas fa-comments"></i> <span>Testimonials</span></a></li>
    <li><a href="./setting.php"><i class="fa fa-cog" aria-hidden="true"></i> <span>Settings</span></a></li>
  </ul>

  </div>





  <!-- custom scripts -->
  <script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>
</body>

</html>