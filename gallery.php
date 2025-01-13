<?php

include('./resources/conn.php')

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery | <?php echo $name ?></title>
  <link rel="shortcut icon" href="./assets/img/main/favicon.png" type="image/x-icon">
  <!-- links -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

  <!-- custom css -->
  <link rel="stylesheet" href="./assets/css/resources/resource.css">
  <link rel="stylesheet" href="./assets/css/resources/style.css">
  <link rel="stylesheet" href="./assets/css/gallery/style.css">


</head>

<body>
  <!-- navbar -->

  <?php include('./resources/navbar.php') ?>

  <header style="background:url(./assets/img/header/Gallery.png) no-repeat center/cover;">
    <h2>GALLERY</h2>
  </header>



  <!-- Place images -->
  <section id="place-images">
  <div class="place-site-icon">
        <img src="./assets/img/main/favicon.png" alt="">
      </div>
      <div class="place-site-icon-2">
        <img src="./assets/img/gallery/leaf.png" alt="">
      </div>
      <div class="place-site-icon-3">
        <img src="./assets/img/gallery/leaf2.png" alt="">
      </div>
    <div class="place-image-main">
    <div class="place-image-content">
      <h2>Explore Our Healing <br> Space</h2>
      <p>
        Experience our tranquil spaces designed to inspire relaxation and support your wellness journey.
      </p>
      <p>
        Discover natural therapies, yoga, and Ayurveda captured in our state-of-the-art facilities.
      </p>
    </div>
    <div class="place-images">
    <img src="./assets/img/footer/img1.jpg" alt="" >
            <img src="./assets/img/footer/img1.jpg" alt="" >
            <img src="./assets/img/footer/img1.jpg" alt="" >
            <img src="./assets/img/footer/img1.jpg" alt="" >
            <img src="./assets/img/footer/img1.jpg" alt="" >
            <img src="./assets/img/footer/img1.jpg" alt="" >
         
    </div>
    </div>
  </section>






  <!-- footer -->
  <?php include('./resources/footer.php') ?>

  <!-- custom scripts -->
  <script src="./assets/js/resource/script.js"></script>
  <script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>
</body>

</html>