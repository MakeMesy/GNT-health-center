<?php

include('./resources/conn.php')

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GNT Research Health Care Center</title>
  <link rel="shortcut icon" href="./assets/img/main/favicon.png" type="image/x-icon">
  <!-- links -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <!-- custom css -->

  <link rel="stylesheet" href="./assets/css/resources/style.css">
  <link rel="stylesheet" href="./assets/css/resources/resource.css">
  <link rel="stylesheet" href="./assets/css/home/style.css">

</head>

<body>



  <!-- navbar -->

  <?php include('./resources/navbar.php') ?>

  <!-- hero section -->

  <div id="hero-section">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
      <div class="swiper-slide myslider-1" style="background: url(./assets/img/home/slider1.jpg) no-repeat center/cover;">
    <div class="slider-content">
        <h2>Experience Holistic Healing</h2>
        <p>Discover natural therapies like Ayurveda, acupuncture, and yoga for a balanced, healthier lifestyle.</p>
   <div class="hero-slider-btn">
    <button>Book Now</button>
   </div> 
      </div>
</div>
<div class="swiper-slide myslider-2" style="background: url(./assets/img/home/slider2.jpg) no-repeat center/cover;">
    <div class="slider-content">
        <h2>Personalized Care for Every Need</h2>
        <p>Tailored treatment plans designed to address your unique health and wellness goals effectively.</p>
   <div class="hero-slider-btn">
    <button>Learn More</button>
   </div> 
      </div>
</div>
<div class="swiper-slide myslider-3" style="background: url(./assets/img/home/slider3.jpg) no-repeat center/cover;">
    <div class="slider-content">
        <h2>Expert Practitioners You Can Trust</h2>
        <p>Our skilled professionals combine traditional practices with modern techniques for optimal health outcomes.</p>
   <div class="hero-slider-btn">
    <button>Read More</button>
   </div> 
      </div>
</div>

      </div>
      <div class="swiper-button-next-btn">
      <div class="swiper-button-next"></div>
      </div>
     <div class="swiper-button-prev-btn">
     <div class="swiper-button-prev"></div>
     </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>


  <?php include('./resources/aboutcard.php') ?>



  <?php include('./resources/form.php') ?>


<div id="offer-banner">
  <div class="offer-main-banner">
    <div class="offer-img">
      <img src="./assets/img/home/offer.png" alt="">
    </div>
    <div class="offer-content">
      <h2>OFFER NAME</h2>
      <ul>
        <li>OFFER !</li>
        <li>OFFER !</li>
        <li>OFFER !</li>
        <li>OFFER !</li>
      </ul>
      <div class="offer-btn">
        <button>
          Book Now
        </button>
      </div>
    </div>
    <div class="offer-banner-ad">
      <img src="./assets/img/home/banner.jpg" alt="">
    </div>
  </div>
</div>









  <?php include('./resources/footer.php') ?>

  <script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="./assets/js/resource/script.js"></script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 30,
      effect: "fade",
      loop: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      autoplay: {
        delay: 2000,
      },
    });
  </script>
</body>

</html>