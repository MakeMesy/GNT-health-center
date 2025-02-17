<?php

include('./resources/conn.php')

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> <?php echo $name ?></title>
  <link rel="shortcut icon" href="./assets/img/main/favicontop.png" type="image/x-icon">
  <!-- links -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <!-- custom css -->
  <link rel="stylesheet" href="./assets/css/resources/style.css">
  <link rel="stylesheet" href="./assets/css/courses/style.css">


</head>

<body>

  <!-- navbar -->

  <?php include('./resources/navbar.php') ?>

  <header style="background:url(./assets/img/header/course.webp) no-repeat center/cover;">
    <h2 class="text-uppercase">Courses</h2>
  </header>


  <!-- list out courses -->
  <div id="unqiue-thinks">
    <div class="unique-thinks">
      <div class="unique-thinks-heading text-center ">
        <h2> Unique Features of Our Courses</h2>
      </div>
      <div class="unique-thinks-content">
        <div class="unique-image">
          <img src="./assets/img/courses/main.png" alt="">
        </div>
        <div class="unique-main-points">
          <div class="unique-point-heading">
            <h2>Why Choose Our Courses</h2>
            <h4>
              Learn, Practice, Master - Where Knowledge Meets Experience
            </h4>
          </div>
          <div class="unique-points">
            <ul>
              <li>Hands-On Training 🎓</li>

              <li>Interactive Learning Experience 💬</li>

              <li>Focused Learning Environment 🎯</li>


              <li>Hands-On Training 🛠️</li>

            </ul>
          </div>

        </div>
      </div>
    </div>
  </div>


  <?php include('./resources/feedback.php') ?>

  <!-- footer -->
  <?php include('./resources/footer.php') ?>



  <!-- custom scripts -->
  <script src="./assets/js/resource/script.js"></script>
  <script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>
</body>

</html>