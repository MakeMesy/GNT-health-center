<?php

include('./resources/conn.php')

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About | <?php echo $name ?></title>
  <link rel="shortcut icon" href="./assets/img/main/favicon.png" type="image/x-icon">
  <!-- links -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  
  <!-- custom css -->

   <link rel="stylesheet" href="./assets/css/resources/style.css">
  <link rel="stylesheet" href="./assets/css/about/style.css">

</head>
<body>



<!-- navbar -->

<?php include('./resources/navbar.php') ?>


<!-- header -->
<header style="background:url(./assets/img/header/about.jpg) no-repeat center/cover;">
  <h2>ABOUT US</h2>
</header>





<!-- about us  -->

<section id="section-1">

<div class="about-main">

<div class="about-main-img">
  <div class="image-1">
        <img src="./assets/img/about/products.jpeg" alt="flower medicine" width="380px" height="380px">
  </div>
  <div class="image-2">
         <img src="./assets/img/about/healing.jpeg" alt="acupuncture" width="680px" height="380px">
  </div>
  <div class="site-icon">
      <img src="./assets/img/main/favicon.png" alt="" width="100px">
  </div>

  <div class="img-content">
       <h2>
       250+
       </h2>
       <p>
       Trusted Saticfied
       Customers
       </p>
  </div>
</div>
<div class="about-main-content">
  <h2>
    ABOUT
  </h2>
  <h2>
  Your Path to Holistic <br> Healing and Wellness
  </h2>

  <p>
  We focus on holistic healing through therapies like Ayurveda, yoga, and chiropractic care, blending traditional practices with modern techniques for complete wellness.
  </p>
  <p>
  Our expert team provides personalized care tailored to your needs, ensuring effective treatments that promote balance, vitality, and overall well-being.
  </p>
</div>
</div>

</section>







<!-- footer -->
<?php include('./resources/footer.php') ?>



<script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>
</body>
</html>