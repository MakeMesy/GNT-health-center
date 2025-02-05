<?php

include('./resources/conn.php')

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery | <?php echo $name ?></title>
  <link rel="shortcut icon" href="./assets/img/main/favicontop.png" type="image/x-icon">
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
    <img src="./assets/img/gallery/img1.jpg" alt="" >
            <img src="./assets/img/gallery/img2.jpg" alt="" >
            <img src="./assets/img/gallery/img3.jpg" alt="" >
            <img src="./assets/img/gallery/img4.jpg" alt="" >
            <img src="./assets/img/gallery/img5.jpg" alt="" >
            <img src="./assets/img/gallery/img6.jpg" alt="" >
         
    </div>
    </div>
  </section>


  <section id="place-images" style="background: none;" >
  <div class="place-site-icon-1" id="place-site-icon-1">
        <img src="./assets/img/main/favicon.png" alt="">
      </div>
      <div class="place-site-icon-2" id="place-site-icon-2">
        <img src="./assets/img/gallery/leaf.png" alt="">
      </div>
    <div class="place-image-main" id="place-img-main">
    <div class="place-images" style="background: var(--bglight-color);">
    <img src="./assets/img/gallery/needle.svg" alt="" >
            <img src="./assets/img/gallery/accu.webp" alt="" >
            <img src="./assets/img/gallery/ayur.webp" alt="" >
            <img src="./assets/img/gallery/cupping.jpeg" alt="" >
            <img src="./assets/img/gallery/flower.webp" alt="" >
            <img src="./assets/img/gallery/gusa.jpeg" alt="" >
         
    </div>
    <div class="place-image-content">
      <h2>Acupuncture Tools</h2>
      <p>
      Fine, sterile needles are carefully used to target specific energy points, promoting healing and restoring balance. Additional tools like heat lamps and cups may complement the treatment for enhanced results.      </p>
      <p>
      Herbal oils, medicinal powders, and natural remedies form the core of Ayurveda, supported by specialized massage tools and therapeutic equipment to rejuvenate and detoxify the body.      </p>
    </div>
   
    </div>
  </section>


<!-- main gallery -->


  <!-- footer -->
  <?php include('./resources/footer.php') ?>

  <!-- custom scripts -->
  <script src="./assets/js/resource/script.js"></script>
  <script src="https://kit.fontawesome.com/181ea7bd20.js" crossorigin="anonymous"></script>
</body>

</html>